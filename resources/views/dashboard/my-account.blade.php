<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&family=Open+Sans:ital@0;1&family=Oswald:wght@400;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="/assets/style.css" />
    <link rel="stylesheet" href="/assets/myAccountStyle.css" />
    <title>StoreOlx</title>
</head>

<body>
    <x-header />
    <main>
        <main>
            <div class="my-account-page">
                <div class="sidebar">
                    <div class="sidebar-top">
                        <a href="/myAccount.html" class="config"><img src="../assets/icons/configIcon.png" />
                            Configurações</a>
                        <a href="/myAds.html"><img src="/assets/icons/layersIonGray.png" /> Meus Anúncios</a>
                    </div>
                    <div class="sidebar-bottom">
                        <a href="{{ route('logout') }}"><img src="/assets/icons/logoutIcon.png" /> Sair</a>
                    </div>
                </div>
                <div class="profile-area">
                    <h3 class="profile-title">Meu perfil</h3>
                    @if (session('success'))
                        <p style="background-color: rgba(0, 255, 0, 0.262)">{{ session('success') }}</p>
                    @endif
                    <form method="POST" action="{{ route('my_account_action') }}">
                        @csrf
                        <div class="name-area">
                            <div class="name-label">Nome</div>
                            <input type="text" name="name" class="@error('name') is-invalid @enderror"
                                placeholder="Digite o seu nome" value="{{ $user->name }}" />
                            @error('name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="email-area">
                            <div class="email-label">E-mail</div>
                            <input type="email" name="email" class="@error('email') is-invalid @enderror"
                                placeholder="Digite o seu e-mail" value="{{ $user->email }}" />
                            @error('email')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="password-area">
                            <div class="password-label">Senha</div>
                            <x-form.password-input name="password" id="password" placeholder="Digite a sua senha" />
                            @error('password')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="email-area">
                            <div class="email-label">Estado</div>
                            <select name="state_id" class="@error('state') is-invalid @enderror">
                                <option value="">Selecione seu estado</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}"
                                        {{ $state->id === $user->state_id ? 'selected' : '' }}>
                                        {{ $state->name }}</option>
                                @endforeach
                            </select>
                            @error('state')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="submit" class="save-button"value="Salvar" />
                    </form>
                </div>
            </div>
        </main>
    </main>
    <x-base.footer />
</body>

</html>
