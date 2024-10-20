<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="stylesheet" href="assets/loginSignUpStyle.css" />

    <title>StoreOlx | Selecionar Estado</title>
</head>

<body>
    <a href="{{ route('login') }}" class="back-button">← Voltar</a>
    <div class="login-page">
        <div class="login-area">
            <h3 class="login-title">StoreOlx</h3>
            {{-- <div class="text-login">
                Digite um email para recuperação da senha.
            </div> --}}
            <form method="POST" action="{{ route('state_action') }}">
                @csrf
                <div class="email-area">
                    <div class="email-label">Estado</div>
                    <select name="state" class="@error('state') is-invalid @enderror">
                        <option value="">Selecione seu estado</option>
                        @foreach ($states as $state)
                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                        @endforeach
                    </select>
                    @error('state')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <button class="login-button" style="margin-bottom: 10px">Selecionar</button>
            </form>
        </div>
    </div>
    <x-base.footer />
</body>

</html>
