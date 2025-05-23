<!-- Modal: Crear Usuario -->
<div id="modalCrearUsuario" class="flex hidden fixed inset-0 z-50 justify-center items-center bg-black bg-opacity-40">
    <div class="relative p-6 w-full max-w-md bg-white rounded-xl shadow-lg">
        <h2 class="text-xl font-bold mb-4 text-[#e6942c]">Agregar nuevo usuario</h2>

        <form id="formCrearUsuario" action="" >
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Nombre completo</label>
                <input type="text" name="nombre" id="nombreCrear" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Correo electrónico</label>
                <input type="email" name="correo" id="correoCrear" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Contraseña</label>
                <input type="password" name="contrasena" id="contrasenaCrear" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" required minlength="6">
            </div>

            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Rol</label>
                <select name="rol_id" id="rolCrear" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" required>
                    <option value="" disabled selected>Seleccionar rol</option>
                    <option value="1">Admin</option>
                    <option value="2">Bibliotecario</option>
                    <option value="3">Lector</option>
                </select>
            </div>

            <div class="flex justify-end mt-6 space-x-2">
                <button type="button" onclick="cerrarModal('modalCrearUsuario')" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-[#e6942c] text-white rounded-lg hover:bg-[#cc7d1a]">Registrar</button>
            </div>
        </form>

        <button onclick="cerrarModal('modalCrearUsuario')" class="absolute top-2 right-3 text-2xl text-gray-400 hover:text-gray-600">&times;</button>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#formCrearUsuario').submit(validarCrearUsuario);
    });

    function validarCrearUsuario(e) {
        e.preventDefault();

        const nombre = document.getElementById('nombreCrear').value.trim();
        const correo = document.getElementById('correoCrear').value.trim();
        const contrasena = document.getElementById('contrasenaCrear').value.trim();
        const rol = document.getElementById('rolCrear').value;

        if (!nombre || !correo || !contrasena || !rol) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Todos los campos son obligatorios',
            });
            return false;
        }

        if (contrasena.length < 6) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'La contraseña debe tener al menos 6 caracteres',
            });
            return false;
        }

        const formData = new FormData(document.getElementById('formCrearUsuario'));
        const data = Object.fromEntries(formData.entries());

        $.ajax({
            url: app.routes.usuarios.addUser,
            type: 'POST',
            data: data,
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Usuario registrado correctamente',
                        text: response.message,
                    });
                    actualizarUsuarios();
                    cerrarModal('modalCrearUsuario');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                    });
                }
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: error,
                });
            }
        });

        return false;
    }

    function cerrarModal(id) {
        document.getElementById(id).classList.add('hidden');
    }

    function abrirModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }
</script>
