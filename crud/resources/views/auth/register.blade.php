<!DOCTYPE html>
<html lang="pt-br" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="W3crm:Customer Relationship Management Admin Bootstrap 5 Template">
	<meta property="og:title" content="W3crm:Customer Relationship Management Admin Bootstrap 5 Template">
	<meta property="og:description" content="W3crm:Customer Relationship Management Admin Bootstrap 5 Template">
	<meta property="og:image" content="https://w3crm.dexignzone.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>W3CRM Customer Relationship Management</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">
	<link href="assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
   	<link href="assets/css/style.css" rel="stylesheet">

   	<!-- CSS do Toastr -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

</head>

<body class="vh-100">
   <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row h-100">
				<div class="col-lg-6 col-md-7 col-sm-12 mx-auto align-self-center">
					<div class="login-form">
						<div class="text-center">
							<h3 class="title">Sign up your account</h3>
							<p>Sign in to your account to start using W3CRM</p>
						</div>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf 
                            <div class="mb-4">
                                <label class="mb-1 text-dark">Nome Completo</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            </div>
                            <div class="mb-4">
                                <label class="mb-1 text-dark">E-mail</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            </div>
                            <div class="mb-4 position-relative">
                                <label class="mb-1 text-dark">Senha</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="mb-4 position-relative">
                                <label class="mb-1 text-dark">Confirme a Senha</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>
                            <div class="text-center mb-4">
                                <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                            </div>
                            <p class="text-center">Já tem uma conta?  
                                <a class="btn-link text-primary" href="{{ route('login') }}">Entrar</a>
                            </p>
                        </form>
					</div>
				</div>
                <div class="col-xl-6 col-lg-6">
					<div class="pages-left h-100">
						<div class="login-content">
							<a href="index.html"><img src="assets/images/logo-full.png" class="mb-3 logo-dark" alt=""></a>
							<a href="index.html"><img src="assets/images/logi-white.png" class="mb-3 logo-light" alt=""></a>
							<p>CRM dashboard uses line charts to visualize customer-related metrics and trends over time.</p>
						</div>
						<div class="login-media text-center">
							<img src="assets/images/login.png" alt="">
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>

<!-- Required vendors -->
<script src="assets/vendor/global/global.min.js"></script>
<script src="assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/deznav-init.js"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Script para exibir mensagens do Toastr -->
<script>
    $(document).ready(function() {
        // Exibir mensagem de sucesso
        @if(session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        // Exibir mensagem de erro
        @if(session('error'))
            toastr.error("{{ session('error') }}");
        @endif

        // Exibir erros de validação
        @if($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    });
</script>

</body>
</html>
