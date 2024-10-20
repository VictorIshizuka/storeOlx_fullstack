<div class="password-input-area">
    <input type="password" id="{{ $id }}" name="{{ $name }}" placeholder="{{ $placeholder }}" />
    <img src="/assets/icons/eyeIcon.png" alt="Ícone/mostrar senha"
        onclick="togglePasswordVisibility('{{ $id }}')" />
</div>

<script>
    if (typeof togglePasswordVisibility != 'function') {
        function togglePasswordVisibility(inputId) {
            const input = document.getElementById(inputId);
            if (input.type === 'password') {
                input.type = 'text'
            } else {
                input.type = 'password'
            }
        }
    }
</script>
