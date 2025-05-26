<!-- Modal: Editar Usuario -->
<div id="modalEditarUsuario" class="flex hidden fixed inset-0 z-50 justify-center items-center bg-black bg-opacity-40">
    <div class="relative p-6 w-full max-w-md bg-white rounded-xl shadow-lg">
        <h2 class="text-xl font-bold mb-4 text-[#e6942c]">Editar usuario</h2>

        <form id="formEditarUsuario" onsubmit="return validarEditarUsuario();">
            <input type="hidden" id="usuarioIdEditar">

            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Nombre completo</label>
                <input type="text" name="nombre" id="nombreEditar" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Correo electrónico</label>
                <input type="email" name="correo" id="correoEditar" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Rol</label>
                <select name="rol_id" id="rolEditar" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" required>
                    <option value="1">Admin</option>
                    <option value="3">Lector</option>
                </select>
            </div>

            <div class="flex justify-end mt-6 space-x-2">
                <button type="button" onclick="cerrarModal('modalEditarUsuario')" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-[#e6942c] text-white rounded-lg hover:bg-[#cc7d1a]">Guardar cambios</button>
            </div>
        </form>

        <button onclick="cerrarModal('modalEditarUsuario')" class="absolute top-2 right-3 text-2xl text-gray-400 hover:text-gray-600">&times;</button>
    </div>
</div>

<script>
    let originalData = {};

    function abrirModalEditar(usuario) {
        document.getElementById('modalEditarUsuario').classList.remove('hidden');

        document.getElementById('usuarioIdEditar').value = usuario.id;
        document.getElementById('nombreEditar').value = usuario.nombre;
        document.getElementById('correoEditar').value = usuario.correo;+
        console.log(usuario.rol_id)
        document.getElementById('rolEditar').value = usuario.rol_id;

        // Guardamos datos originales
        originalData = { ...usuario };
    }

    function validarEditarUsuario() {
        const nombre = document.getElementById('nombreEditar').value.trim();
        const correo = document.getElementById('correoEditar').value.trim();
        const rol = document.getElementById('rolEditar').value;

        if (!nombre || !correo || !rol) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Todos los campos son obligatorios',
            });
            return false;
        }

        if (
            nombre === originalData.nombre &&
            correo === originalData.correo &&
            rol == originalData.rol_id
        ) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se han realizado cambios',
            });
            return false;
        }

        $.ajax({
            url: app.routes.usuarios.editUser,
            type: 'POST',
            data: {
                id: document.getElementById('usuarioIdEditar').value,
                nombre: nombre,
                correo: correo,
                rol_id: rol,
            },
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Usuario editado correctamente',
                    text: response.message,
                });
                actualizarUsuarios();
                cerrarModal('modalEditarUsuario');
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
</script>
