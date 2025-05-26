<?php
    include_once LAYOUTS . 'dashboard/head.php';

    setHeader($d);
   
?>

<div class="p-4 md:p-6 lg:p-8">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-[#e6942c]">Autores</h2>
        <a href="#" onclick="abrirModal('modalCrearAutor')" class="bg-[#e6942c] hover:bg-[#d37f1f] text-white font-semibold py-2 px-4 rounded-lg shadow transition-all duration-200">
            <i class="mr-2 bi bi-plus-lg"></i> Agregar nuevo autor
        </a>
    </div>
    <div class="bg-[#ffe6c8] rounded-2xl shadow-md p-4 overflow-hidden lg:overflow-visible">
        <div class="overflow-x-scroll lg:overflow-x-visible lg:overflow-y-visible">
            <table id="autoresTable" class="min-w-full text-left border-collapse">
                <thead class="bg-[#f8dcb9] text-[#e6942c]">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Nombre completo</th>
                        <th class="px-4 py-3">Nacionalidad</th>
                        <th class="px-4 py-3">Fecha de nacimiento</th>
                        <th class="px-4 py-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 bg-white">
                    <?php 
                    $autores = json_decode($d->autores, true);
                    foreach ($autores as $a): ?>
                        <tr class="border-b border-[#f4c892]">
                            <td class="px-4 py-3"><?= $a['id'] ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($a['nombre_completo']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($a['nacionalidad']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($a['fecha_nacimiento']) ?></td>
                            <td class="relative px-4 py-3 text-center">
                                <button onclick="toggleActions(this)" class="text-[#e6942c] text-xl hover:text-[#c9731a] focus:outline-none">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <div class="hidden absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg z-50 border border-[#e6942c]">
                                    <a href="#" onclick='abrirModalEditarAutor(<?= json_encode($a) ?>)' class="block px-4 py-2 text-sm text-[#e6942c] hover:bg-[#ffe6c8]">
                                        <i class="mr-2 bi bi-pencil-square"></i> Editar
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: Crear Autor -->
<div id="modalCrearAutor" class="flex hidden fixed inset-0 z-50 justify-center items-center bg-black bg-opacity-40">
    <div class="relative p-6 w-full max-w-lg bg-white rounded-xl shadow-lg">
        <h2 class="text-xl font-bold mb-4 text-[#e6942c]">Agregar nuevo autor</h2>
        <form id="formCrearAutor" class="max-h-[80vh] overflow-y-auto">
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Nombre completo</label>
                <input type="text" name="nombre_completo" id="nombreCompletoCrear" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Nacionalidad</label>
                <input type="text" name="nacionalidad" id="nacionalidadCrear" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" id="fechaNacimientoCrear" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" required>
            </div>
            <div class="flex justify-end mt-6 space-x-2">
                <button type="button" onclick="cerrarModal('modalCrearAutor')" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-[#e6942c] text-white rounded-lg hover:bg-[#cc7d1a]">Registrar</button>
            </div>
        </form>
        <button onclick="cerrarModal('modalCrearAutor')" class="absolute top-2 right-3 text-2xl text-gray-400 hover:text-gray-600">&times;</button>
    </div>
</div>

<!-- Modal: Editar Autor -->
<div id="modalEditarAutor" class="flex hidden fixed inset-0 z-50 justify-center items-center bg-black bg-opacity-40">
    <div class="relative p-6 w-full max-w-lg bg-white rounded-xl shadow-lg">
        <h2 class="text-xl font-bold mb-4 text-[#e6942c]">Editar autor</h2>
        <form id="formEditarAutor" class="max-h-[80vh] overflow-y-auto">
            <input type="hidden" id="autorIdEditar" name="id">
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Nombre completo</label>
                <input type="text" name="nombre_completo" id="nombreCompletoEditar" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Nacionalidad</label>
                <input type="text" name="nacionalidad" id="nacionalidadEditar" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" id="fechaNacimientoEditar" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" required>
            </div>
            <div class="flex justify-end mt-6 space-x-2">
                <button type="button" onclick="cerrarModal('modalEditarAutor')" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-[#e6942c] text-white rounded-lg hover:bg-[#cc7d1a]">Guardar cambios</button>
            </div>
        </form>
        <button onclick="cerrarModal('modalEditarAutor')" class="absolute top-2 right-3 text-2xl text-gray-400 hover:text-gray-600">&times;</button>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#autoresTable').DataTable({
            paging: true,
            responsive: true,
        });
        $('#formCrearAutor').submit(validarCrearAutor);
        $('#formEditarAutor').submit(validarEditarAutor);
    });

    async function recargarTablaAutores() {
        try {
            const response = await fetch('/autores/getAll', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            })
            const result = await response.json();
            const autores = result.data;
            $('#autoresTable').DataTable().clear().destroy();
            autores.forEach(a => {
                const tr = document.createElement("tr");
                tr.className = "border-b border-[#f4c892]";
                tr.innerHTML = `
                    <td class=\"px-4 py-3\">${a.id}</td>
                    <td class=\"px-4 py-3\">${a.nombre_completo}</td>
                    <td class=\"px-4 py-3\">${a.nacionalidad}</td>
                    <td class=\"px-4 py-3\">${a.fecha_nacimiento}</td>
                    <td class=\"relative px-4 py-3 text-center\">
                        <button onclick=\"toggleActions(this)\" class=\"text-[#e6942c] text-xl hover:text-[#c9731a] focus:outline-none\">
                            <i class=\"bi bi-three-dots-vertical\"></i>
                        </button>
                        <div class=\"hidden absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg z-50 border border-[#e6942c]\">
                            <a href=\"#\" onclick='abrirModalEditarAutor(${JSON.stringify(a)})' class=\"block px-4 py-2 text-sm text-[#e6942c] hover:bg-[#ffe6c8]\"><i class=\"mr-2 bi bi-pencil-square\"></i> Editar</a>
                        </div>
                    </td>
                `;
                $('#autoresTable tbody').append(tr);
            });
            $('#autoresTable').DataTable().draw();
        } catch (error) {
            console.error(error);
        }
    }
    function abrirModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }
    function cerrarModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
    function toggleActions(btn) {
        const menu = btn.nextElementSibling;
        menu.classList.toggle('hidden');
    }
    function abrirModalEditarAutor(autor) {
        abrirModal('modalEditarAutor');
        document.getElementById('autorIdEditar').value = autor.id;
        document.getElementById('nombreCompletoEditar').value = autor.nombre_completo;
        document.getElementById('nacionalidadEditar').value = autor.nacionalidad;
        document.getElementById('fechaNacimientoEditar').value = autor.fecha_nacimiento;
    }
    function validarCrearAutor(e) {
        e.preventDefault();
        const nombre = $('#nombreCompletoCrear').val().trim();
        const nacionalidad = $('#nacionalidadCrear').val().trim();
        const fecha = $('#fechaNacimientoCrear').val();
        if (!nombre || !nacionalidad || !fecha) {
            Swal.fire({ icon: 'error', title: 'Error', text: 'Todos los campos son obligatorios' });
            return;
        }
        $.ajax({
            url: '/autores/createAutor',
            type: 'POST',
            data: $(e.target).serialize(),
            success: function (response) {
                Swal.fire({ icon: 'success', title: 'Autor creado', timer: 1200, showConfirmButton: false });
                cerrarModal('modalCrearAutor');
                recargarTablaAutores();
            },
            error: function () {
                Swal.fire({ icon: 'error', title: 'Error', text: 'No se pudo crear el autor' });
            }
        });
    }
    function validarEditarAutor(e) {
        e.preventDefault();
        const nombre = $('#nombreCompletoEditar').val().trim();
        const nacionalidad = $('#nacionalidadEditar').val().trim();
        const fecha = $('#fechaNacimientoEditar').val();
        if (!nombre || !nacionalidad || !fecha) {
            Swal.fire({ icon: 'error', title: 'Error', text: 'Todos los campos son obligatorios' });
            return;
        }
        $.ajax({
            url: '/autores/editAutor',
            type: 'POST',
            data: $(e.target).serialize(),
            success: function (response) {
                Swal.fire({ icon: 'success', title: 'Autor editado', timer: 1200, showConfirmButton: false });
                cerrarModal('modalEditarAutor');
                recargarTablaAutores();
            },
            error: function () {
                Swal.fire({ icon: 'error', title: 'Error', text: 'No se pudo editar el autor' });
            }
        });
    }
</script>

<?php
    include_once LAYOUTS . 'dashboard/footer.php';

    setFooter($d);

    closefooter();
