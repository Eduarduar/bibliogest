<?php
include_once LAYOUTS . 'main_head.php';
setHeader($d);
?>

<div class="min-h-screen flex items-center justify-center bg-[#ec9224]/30">
    <div class="bg-white rounded-xl shadow-xl overflow-hidden flex w-full max-w-4xl">
        <!-- Imagen o decorado -->
        <div class="w-1/2 bg-cover bg-center hidden md:block p-2">
            <img src="<?= ASSETS ?>img/logo.png" alt="Logo">
        </div>

        <!-- Formulario -->
        <div class="w-full md:w-1/2 p-8 sm:p-12">
            <h2 class="text-2xl sm:text-3xl font-bold text-[#ec9224] mb-6 text-center">¡Bienvenido a BiblioGest!</h2>

            <form action="" id="login-form" class="space-y-4">
                <div>
                    <label for="correo" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label>
                    <input type="email" id="correo" name="correo" required
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-[#ec9224] focus:border-[#ec9224] focus:outline-none">
                </div>

                <div>
                    <label for="contrasena" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                    <input type="password" id="contrasena" name="contrasena" required
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-[#ec9224] focus:border-[#ec9224] focus:outline-none">
                </div>

                <!-- <div class="text-right text-sm">
                    <a href="#" class="text-[#ec9224] hover:underline">¿Olvidó su contraseña?</a>
                </div> -->

                <small class="text-red-600 hidden" id="error">Sus datos de inicio de sesión son incorrectos</small>

                <div class="mt-6">
                    <button type="submit"
                        class="w-full bg-[#ec9224] text-white py-2 px-4 rounded-md hover:bg-[#da7e1c] transition-colors duration-300">
                        Iniciar sesión
                    </button>
                </div>
                <div class="text-center mt-4">
                    <a href="/Register" class="text-[#ec9224] hover:underline">¿No tienes cuenta? Regístrate</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include_once LAYOUTS . 'main_foot.php';
setFooter($d);
?>

<script>
    $(function () {
        $("#login-form").submit(function (e) {
            e.preventDefault();
            let data = $(this).serialize();
            $.ajax({
                url: `${app.routes.login.auth}`,
                type: "POST",
                data: data,
                success: function (response) {
                    let res = JSON.parse(response);
                    if (res.success) {
                        app.setLocalUser({data: res.data});
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: res.message,
                        }).then(() => {
                            window.location.href = app.routes.dashboard.index;
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: res.message,
                        });
                    }
                }
            });
        });
    });
</script>

<?php
closefooter();
?>
