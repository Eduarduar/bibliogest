<?php
    include_once LAYOUTS . 'dashboard/head.php';

    setHeader($d);

    $usuarios = json_decode($d->usuarios, true);
   
?>

<!-- Contenedor principal -->
<div class="p-4 md:p-6 lg:p-8">

    <!-- Encabezado de la sección -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-[#e6942c]">Usuarios</h2>
        <a href="#" onclick="abrirModal('modalCrearUsuario')" class="bg-[#e6942c] hover:bg-[#d37f1f] text-white font-semibold py-2 px-4 rounded-lg shadow transition-all duration-200">
            <i class="mr-2 bi bi-plus-lg"></i> Agregar nuevo usuario
        </a>
    </div>

    <!-- Card contenedora -->
    <div class="bg-[#ffe6c8] rounded-2xl shadow-md p-4 overflow-hidden lg:overflow-visible">
        <div class="overflow-x-scroll lg:overflow-x-visible lg:overflow-y-visible">
            <table id="usuariosTable" class="min-w-full text-left border-collapse">
                <thead class="bg-[#f8dcb9] text-[#e6942c]">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Nombre</th>
                        <th class="px-4 py-3">Correo</th>
                        <th class="px-4 py-3">Rol</th>
                        <th class="px-4 py-3">Fecha de registro</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 bg-white">
                    <?php foreach ($usuarios as $u): ?>
                        <tr class="border-b border-[#f4c892]">
                            <td class="px-4 py-3"><?= $u['id'] ?></td>
                            <td class="px-4 py-3"><?= $u['nombre'] ?></td>
                            <td class="px-4 py-3"><?= $u['correo'] ?></td>
                            <td class="px-4 py-3">
                                <?php
                                    switch ($u['rol']) {
                                        case 'admin': echo 'Admin'; break;
                                        case 'bibliotecario': echo 'Bibliotecario'; break;
                                        case 'lector': echo 'Lector'; break;
                                        default: echo 'Desconocido';
                                    }
                                ?>
                            </td>
                            <td class="px-4 py-3"><?= date('d/m/Y', strtotime($u['fecha_registro'])) ?></td>
                            <td class="px-4 py-3">
                                <?= $u['activo'] ? '<span class="font-semibold text-green-600">Activo</span>' : '<span class="font-semibold text-red-600">Inactivo</span>' ?>
                            </td>
                            <td class="relative px-4 py-3 text-center">
                                <?php if ($d->ua->id != $u['id']): ?>
                                    <!-- Botón de acciones -->
                                    <button onclick="toggleActions(this)" class="text-[#e6942c] text-xl hover:text-[#c9731a] focus:outline-none">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <!-- Menú de acciones -->
                                    <div class="hidden absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg z-50 border border-[#e6942c]">
                                        <a href="#" onclick='abrirModalEditar(<?= json_encode($u) ?>)' class="block px-4 py-2 text-sm text-[#e6942c] hover:bg-[#ffe6c8]"><i class="mr-2 bi bi-pencil-square"></i> Editar</a>
                                        <a href="#" onclick="toggleUsuario(<?= $u['id'] ?>, <?= $u['activo'] ?>)" class="block px-4 py-2 text-sm text-[#e6942c] hover:bg-[#ffe6c8]"><i class="mr-2 bi bi-person-dash"></i> <?= $u['activo'] ? 'Deshabilitar' : 'Habilitar' ?></a>
                                    </div>
                                <?php else: ?>
                                    <i class="bi bi-person text-[#e6942c] text-xl"></i>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once VIEWS . 'dashboard/usuarios/createModal.php'; ?>
<?php include_once VIEWS . 'dashboard/usuarios/editModal.php'; ?>


<script>
    $(document).ready(function () {
        $('#usuariosTable').DataTable({
            paging: true,
            responsive: true,
            searching: false,
            info: false,
            language: {
                paginate: {
                    previous: "Anterior",
                    next: "Siguiente"
                },
                emptyTable: "No hay usuarios registrados"
            }
        });
    });

    // Función para alternar el menú de acciones
    function toggleActions(button) {
        document.querySelectorAll('#usuariosTable td .absolute').forEach(menu => {
            if (!menu.contains(button)) menu.classList.add('hidden');
        });
        const menu = button.nextElementSibling;
        menu.classList.toggle('hidden');
    }

    // Ocultar menú al hacer clic fuera
    document.addEventListener('click', function (e) {
        const openMenus = document.querySelectorAll('#usuariosTable td .absolute');
        openMenus.forEach(menu => {
            if (!menu.contains(e.target) && !menu.previousElementSibling.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    });

    function toggleUsuario(id, activo) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Estas seguro de querer " + (activo ? 'deshabilitar' : 'habilitar') + " este usuario?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, ' + (activo ? 'deshabilitar' : 'habilitar')
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(app.routes.usuarios.toggleUser + '/' + id + '/' + (activo ? 0 : 1), {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Exito',
                            text: data.message,
                        });
                        actualizarUsuarios();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.message,
                        });
                    }
                })
                .catch(error => {
                    console.error('Error al ' + (activo ? 'deshabilitar' : 'habilitar') + ' usuario:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error al ' + (activo ? 'deshabilitar' : 'habilitar') + ' usuario',
                    });
                });
            }
        });
    }

    async function actualizarUsuarios() {
    try {
        const response = await fetch(app.routes.usuarios.getAllUsers);
        if (!response.ok) throw new Error("Error al obtener los usuarios");
        const result = await response.json();
        const usuarios = result.data;

        // Referencia al tbody
        const tbody = document.querySelector("#usuariosTable tbody");
        tbody.innerHTML = ""; // Limpiar tabla

        usuarios.forEach(u => {
            const tr = document.createElement("tr");
            tr.className = "border-b border-[#f4c892]";
            tr.innerHTML = `
                <td class="px-4 py-3">${u.id}</td>
                <td class="px-4 py-3">${u.nombre}</td>
                <td class="px-4 py-3">${u.correo}</td>
                <td class="px-4 py-3">${
                    u.rol === "admin" ? "Admin" :
                    u.rol === "lector" ? "Lector" : "Desconocido"
                }</td>
                <td class="px-4 py-3">${u.fecha_registro}</td>
                <td class="px-4 py-3">
                    ${u.activo ? '<span class="font-semibold text-green-600">Activo</span>' : '<span class="font-semibold text-red-600">Inactivo</span>'}
                </td>
                <td class="relative px-4 py-3 text-center">
                    ${
                        <?= json_encode($d->ua->id) ?> != u.id
                        ? `
                            <button onclick="toggleActions(this)" class="text-[#e6942c] text-xl hover:text-[#c9731a] focus:outline-none">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <div class="hidden absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg z-50 border border-[#e6942c]">
                                <a href="#" onclick='abrirModalEditar(${JSON.stringify(u)})' class="block px-4 py-2 text-sm text-[#e6942c] hover:bg-[#ffe6c8]">
                                    <i class="mr-2 bi bi-pencil-square"></i> Editar
                                </a>
                                <a href="#" onclick="toggleUsuario(${u.id}, ${u.activo})" class="block px-4 py-2 text-sm text-[#e6942c] hover:bg-[#ffe6c8]">
                                    <i class="mr-2 bi bi-person-dash"></i> Deshabilitar
                                </a>
                            </div>
                        `
                        : '<i class="bi bi-person text-[#e6942c] text-xl"></i>'
                    }
                </td>
            `;
            tbody.appendChild(tr);
        });

    } catch (error) {
        console.error("Fallo la carga de usuarios:", error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudieron cargar los usuarios',
        });
    }
}

</script>


<?php
    include_once LAYOUTS . 'dashboard/footer.php';

    setFooter($d);
    closefooter();
