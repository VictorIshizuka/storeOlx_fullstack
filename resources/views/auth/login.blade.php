<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="stylesheet" href="assets/loginSignUpStyle.css" />

    <title>StoreOlx - Login</title>
</head>

<body>
    {{-- <a href="index.html" class="back-button">← Voltar</a> --}}
    <div class="login-page">
        <div class="login-area">
            <h3 class="login-title">StoreOlx</h3>
            <div class="text-login">
                Use as suas credenciais para realizar o Login.
            </div>
            <form method="POST" action="{{ route('login_action') }}">
                @csrf
                @if ($message)
                    <p class="error">{{ $message }}</p>
                @endif
                <div class="email-area">
                    <div class="email-label">E-mail</div>
                    <input type="email" name="email" class="@error('email') is-invalid @enderror"
                        placeholder="Digite o seu e-mail" value="{{ $email ?? '' }}" />
                    {{-- tem @old('atributo/name') --}}
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="password-area">
                    <div class="password-label">
                        <div class="password-area-text">Senha</div>
                        <a href="{{ route('forgot-password') }}" class="password-area-forgot">Esqueceu sua
                            senha?</a>
                    </div>
                    <x-form.password-input name="password" id="password" placeholder="Digite a sua senha" />
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <button class="login-button">Entrar</button>
            </form>
            <div class="register-area">
                Ainda não tem cadastro? <a href="{{ route('register') }}">Cadastre-se</a>
            </div>
        </div>
        <div class="terms">
            Ao continuar, você concorda com os <a href="">Termos de Uso</a> e a
            <a href="">Política de Privacidade</a>, e também, em receber
            comunicações via e-mail e push de todos os nossos parceiros.
        </div>
    </div>
    <x-base.footer />
</body>

</html>
