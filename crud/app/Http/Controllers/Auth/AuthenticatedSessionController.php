<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Exibir o formulário de login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

   /**
     * Processar a solicitação de login.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Tenta autenticar o usuário
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            // Se falhar, retorna com uma mensagem de erro
            return back()->withErrors([
                'email' => 'Credenciais inválidas. Verifique seu e-mail ou senha.',
            ])->onlyInput('email');
        }

        // Regenera a sessão para evitar fixação de sessão
        $request->session()->regenerate();

        // Redireciona para o dashboard em caso de sucesso
        return redirect()->intended(route('dashboard'))
                         ->with('success', 'Login realizado com sucesso!');
    }

    
    /**
     * Exibir o formulário de registro.
     */
    public function createRegister(): View
    {
        return view('auth.register');
    }

    /**
     * Processar a solicitação de registro.
     */
    public function registerStore(Request $request): RedirectResponse
    {
        // Validar os dados de entrada
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], 
            'password' => ['required', 'confirmed', Rules\Password::defaults()], 
        ]);

        // Criar o usuário
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Registro realizado com sucesso!');
    }

    /**
     * Destruir uma sessão autenticada.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
