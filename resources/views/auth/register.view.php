<?php
include_once LAYOUTS . 'main_head.php';
setHeader($d);
?>

<div class="min-h-screen flex items-center justify-center bg-[#ec9224]/30">
    <div class="bg-white rounded-xl shadow-xl overflow-hidden w-full max-w-2xl p-8 sm:p-12">
        <h2 class="text-2xl sm:text-3xl font-bold text-[#ec9224] mb-6 text-center">Crear cuenta</h2>

        <form action="" id="register-form" class="space-y-4">
    <!-- Nombre completo -->
    <div>
        <div class="flex items-center border border-gray-300 rounded-md px-3 py-2">
            <i class="bi bi-person-vcard text-[#ec9224] mr-2"></i>
            <input type="text" id="name" name="name" required
                class="w-full focus:outline-none"
                placeholder="Nombre completo">
        </div>
        <div class="text-red-600 hidden" id="name-error"></div>
    </div>

    <!-- Correo electrónico -->
    <div>
        <div class="flex items-center border border-gray-300 rounded-md px-3 py-2">
            <i class="bi bi-envelope-fill text-[#ec9224] mr-2"></i>
            <input type="email" id="email" name="email" required
                class="w-full focus:outline-none"
                placeholder="Correo electrónico">
        </div>
        <div class="text-red-600 hidden" id="email-error"></div>
    </div>

    <!-- Contraseña -->
    <div>
        <div class="flex items-center border border-gray-300 rounded-md px-3 py-2">
            <i class="bi bi-lock-fill text-[#ec9224] mr-2"></i>
            <input type="password" id="passwd" name="passwd" required
                class="w-full focus:outline-none"
                placeholder="Contraseña">
        </div>
        <div class="text-red-600 hidden" id="passwd-error"></div>
    </div>

    <!-- Confirmar contraseña -->
    <div>
        <div class="flex items-center border border-gray-300 rounded-md px-3 py-2">
            <i class="bi bi-lock-fill text-[#ec9224] mr-2"></i>
            <input type="password" id="passwd2" name="passwd2" required
                class="w-full focus:outline-none"
                placeholder="Confirmar contraseña">
        </div>
        <div class="text-red-600 hidden" id="passwd2-error"></div>
    </div>

    <hr class="my-4">

    <!-- Botones -->
    <div class="space-y-3">
        <button type="submit"
            class="w-full bg-[#ec9224] text-white py-2 px-4 rounded-md hover:bg-[#da7e1c] transition-colors duration-300 flex items-center justify-center gap-2">
            <i class="bi bi-box-arrow-in-right"></i> Registrarse
        </button>

        <a href="/login/" class="block text-center text-[#ec9224] hover:underline">
            Ya tengo una cuenta
        </a>
    </div>
</form>

    </div>
</div>

<?php
include_once LAYOUTS . 'main_foot.php';
setFooter($d);
?>

<script>
function showError(input, message) {
    const errorEl = $(`#${input.attr('id')}-error`);
    errorEl.text(message).show();
}

function clearError(input) {
    const errorEl = $(`#${input.attr('id')}-error`);
    errorEl.hide();
}

function validateField(input) {
    const id = input.attr('id');
    const val = input.val().trim();

    switch (id) {
        case 'name':
            if (!/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{3,}$/.test(val)) {
                showError(input, "Solo letras y mínimo 3 caracteres");
                return false;
            }
            break;
        case 'email':
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val)) {
                showError(input, "Correo no válido");
                return false;
            }
            break;
        case 'passwd':
            if (val.length < 6 || /\s/.test(val)) {
                showError(input, "Mínimo 6 caracteres, sin espacios");
                return false;
            }
            if ($("#passwd2").val().length > 0) {
                validateField($("#passwd2")); // validar confirmación también
            }
            break;
        case 'passwd2':
            if (val !== $("#passwd").val()) {
                showError(input, "Las contraseñas no coinciden");
                return false;
            }
            if ($("#passwd").val().length < 6 || /\s/.test($("#passwd").val())) {
                showError($("#passwd"), "La contraseña original no es válida");
                return false;
            }
            break;
    }

    clearError(input);
    return true;
}

$(function () {
    const $form = $("#register-form");

    // Validar campos en tiempo real
    $form.find("input").on("input", function () {
        validateField($(this));
    });

    // Validar todo al enviar
    $form.on("submit", function (e) {
        e.preventDefault();
        e.stopPropagation();

        let isValid = true;
        $form.find("input").each(function () {
            if (!validateField($(this))) {
                isValid = false;
            }
        });

        if (!isValid) return;

        const data = new FormData();
        data.append("nombre", $("#name").val());
        data.append("correo", $("#email").val());
        data.append("contrasena", $("#passwd").val());
        data.append("rol_id", 3);

        fetch(app.routes.register.register, {
            method: 'POST',
            body: data
        })
        .then(resp => resp.json())
        .then(({ success, message, data, errors, code }) => {
            if (success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: message,
                }).then(() => {
                    location.href = app.routes.login.index;
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: message,
                });
            }
        });
    });
});

</script>

<?php
closefooter();
?>
