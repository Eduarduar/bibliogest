<?php
    include_once LAYOUTS . 'dashboard/head.php';

    setHeader($d);
   
?>

<div class="p-4 md:p-6 lg:p-8">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-[#e6942c]">Categorías</h2>
        <a href="#" onclick="abrirModal('modalCrearCategoria')" class="bg-[#e6942c] hover:bg-[#d37f1f] text-white font-semibold py-2 px-4 rounded-lg shadow transition-all duration-200">
            <i class="mr-2 bi bi-plus-lg"></i> Agregar nueva categoría
        </a>
    </div>
    <div class="bg-[#ffe6c8] rounded-2xl shadow-md p-4 overflow-hidden lg:overflow-visible">
        <div class="overflow-x-scroll lg:overflow-x-visible lg:overflow-y-visible">
            <table id="categoriasTable" class="min-w-full text-left border-collapse">
                <thead class="bg-[#f8dcb9] text-[#e6942c]">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Nombre</th>
                        <th class="px-4 py-3">Descripción</th>
                        <th class="px-4 py-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 bg-white">
                    <?php 
                    $categorias = json_decode($d->categorias, true);
                    foreach ($categorias as $c): ?>
                        <tr class="border-b border-[#f4c892]">
                            <td class="px-4 py-3"><?= $c['id'] ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($c['nombre']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($c['descripcion']) ?></td>
                            <td class="relative px-4 py-3 text-center">
                                <button onclick="toggleActions(this)" class="text-[#e6942c] text-xl hover:text-[#c9731a] focus:outline-none">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <div class="hidden absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg z-50 border border-[#e6942c]">
                                    <a href="#" onclick='abrirModalEditarCategoria(<?= json_encode($c) ?>)' class="block px-4 py-2 text-sm text-[#e6942c] hover:bg-[#ffe6c8]">
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

<!-- Modal: Crear Categoria -->
<div id="modalCrearCategoria" class="flex hidden fixed inset-0 z-50 justify-center items-center bg-black bg-opacity-40">
    <div class="relative p-6 w-full max-w-lg bg-white rounded-xl shadow-lg">
        <h2 class="text-xl font-bold mb-4 text-[#e6942c]">Agregar nueva categoría</h2>
        <form id="formCrearCategoria" class="max-h-[80vh] overflow-y-auto">
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Nombre</label>
                <input type="text" name="nombre" id="nombreCrear" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Descripción</label>
                <textarea name="descripcion" id="descripcionCrear" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" rows="2" required></textarea>
            </div>
            <div class="flex justify-end mt-6 space-x-2">
                <button type="button" onclick="cerrarModal('modalCrearCategoria')" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-[#e6942c] text-white rounded-lg hover:bg-[#cc7d1a]">Registrar</button>
            </div>
        </form>
        <button onclick="cerrarModal('modalCrearCategoria')" class="absolute top-2 right-3 text-2xl text-gray-400 hover:text-gray-600">&times;</button>
    </div>
</div>

<!-- Modal: Editar Categoria -->
<div id="modalEditarCategoria" class="flex hidden fixed inset-0 z-50 justify-center items-center bg-black bg-opacity-40">
    <div class="relative p-6 w-full max-w-lg bg-white rounded-xl shadow-lg">
        <h2 class="text-xl font-bold mb-4 text-[#e6942c]">Editar categoría</h2>
        <form id="formEditarCategoria" class="max-h-[80vh] overflow-y-auto">
            <input type="hidden" id="categoriaIdEditar" name="id">
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Nombre</label>
                <input type="text" name="nombre" id="nombreEditar" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Descripción</label>
                <textarea name="descripcion" id="descripcionEditar" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" rows="2" required></textarea>
            </div>
            <div class="flex justify-end mt-6 space-x-2">
                <button type="button" onclick="cerrarModal('modalEditarCategoria')" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-[#e6942c] text-white rounded-lg hover:bg-[#cc7d1a]">Guardar cambios</button>
            </div>
        </form>
        <button onclick="cerrarModal('modalEditarCategoria')" class="absolute top-2 right-3 text-2xl text-gray-400 hover:text-gray-600">&times;</button>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#categoriasTable').DataTable({
            paging: true,
            responsive: true,
        });
        $('#formCrearCategoria').submit(validarCrearCategoria);
        $('#formEditarCategoria').submit(validarEditarCategoria);
    });

    async function recargarTablaCategorias() {
        try {
            const response = await fetch('/categorias/getAll', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            })
            const result = await response.json();
            const categorias = result.data;
            $('#categoriasTable').DataTable().clear().destroy();
            categorias.forEach(c => {
                const tr = document.createElement("tr");
                tr.className = "border-b border-[#f4c892]";
                tr.innerHTML = `
                    <td class=\"px-4 py-3\">${c.id}</td>
                    <td class=\"px-4 py-3\">${c.nombre}</td>
                    <td class=\"px-4 py-3\">${c.descripcion}</td>
                    <td class=\"relative px-4 py-3 text-center\">
                        <button onclick=\"toggleActions(this)\" class=\"text-[#e6942c] text-xl hover:text-[#c9731a] focus:outline-none\">
                            <i class=\"bi bi-three-dots-vertical\"></i>
                        </button>
                        <div class=\"hidden absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg z-50 border border-[#e6942c]\">
                            <a href=\"#\" onclick='abrirModalEditarCategoria(${JSON.stringify(c)})' class=\"block px-4 py-2 text-sm text-[#e6942c] hover:bg-[#ffe6c8]\"><i class=\"mr-2 bi bi-pencil-square\"></i> Editar</a>
                        </div>
                    </td>
                `;
                $('#categoriasTable tbody').append(tr);
            });
            $('#categoriasTable').DataTable().draw();
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
    function abrirModalEditarCategoria(categoria) {
        abrirModal('modalEditarCategoria');
        document.getElementById('categoriaIdEditar').value = categoria.id;
        document.getElementById('nombreEditar').value = categoria.nombre;
        document.getElementById('descripcionEditar').value = categoria.descripcion;
    }
    function validarCrearCategoria(e) {
        e.preventDefault();
        const nombre = $('#nombreCrear').val().trim();
        const descripcion = $('#descripcionCrear').val().trim();
        if (!nombre || !descripcion) {
            Swal.fire({ icon: 'error', title: 'Error', text: 'Todos los campos son obligatorios' });
            return;
        }
        $.ajax({
            url: '/categorias/createCategoria',
            type: 'POST',
            data: $(e.target).serialize(),
            success: function (response) {
                Swal.fire({ icon: 'success', title: 'Categoría creada', timer: 1200, showConfirmButton: false });
                cerrarModal('modalCrearCategoria');
                recargarTablaCategorias();
            },
            error: function () {
                Swal.fire({ icon: 'error', title: 'Error', text: 'No se pudo crear la categoría' });
            }
        });
    }
    function validarEditarCategoria(e) {
        e.preventDefault();
        const nombre = $('#nombreEditar').val().trim();
        const descripcion = $('#descripcionEditar').val().trim();
        if (!nombre || !descripcion) {
            Swal.fire({ icon: 'error', title: 'Error', text: 'Todos los campos son obligatorios' });
            return;
        }
        $.ajax({
            url: '/categorias/editCategoria',
            type: 'POST',
            data: $(e.target).serialize(),
            success: function (response) {
                Swal.fire({ icon: 'success', title: 'Categoría editada', timer: 1200, showConfirmButton: false });
                cerrarModal('modalEditarCategoria');
                recargarTablaCategorias();
            },
            error: function () {
                Swal.fire({ icon: 'error', title: 'Error', text: 'No se pudo editar la categoría' });
            }
        });
    }
</script>

<?php
    include_once LAYOUTS . 'dashboard/footer.php';

    setFooter($d);

    closefooter();
