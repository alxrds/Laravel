<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtém o usuário autenticado
        $user = Auth::user();
        
        // Passa os dados do usuário para a view
        return view('dashboard', compact('user'));
    }
}