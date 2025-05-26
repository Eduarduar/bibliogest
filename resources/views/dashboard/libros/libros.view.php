<?php
    include_once LAYOUTS . 'dashboard/head.php';
    setHeader($d);
    $libros = json_decode($d->libros, true);
    $autores = json_decode($d->autores, true); // Debes pasar estos datos desde el controlador
    $categorias = json_decode($d->categorias, true); // Debes pasar estos datos desde el controlador
?>

<div class="p-4 md:p-6 lg:p-8">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-[#e6942c]">Libros</h2>
        <a href="#" onclick="abrirModal('modalCrearLibro')" class="bg-[#e6942c] hover:bg-[#d37f1f] text-white font-semibold py-2 px-4 rounded-lg shadow transition-all duration-200">
            <i class="mr-2 bi bi-plus-lg"></i> Agregar nuevo libro
        </a>
    </div>

    <div class="bg-[#ffe6c8] rounded-2xl shadow-md p-4 overflow-hidden lg:overflow-visible">
        <div class="overflow-x-scroll lg:overflow-x-visible lg:overflow-y-visible">
            <table id="librosTable" class="min-w-full text-left border-collapse">
                <thead class="bg-[#f8dcb9] text-[#e6942c]">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Título</th>
                        <th class="px-4 py-3">Autor</th>
                        <th class="px-4 py-3">Categoría</th>
                        <th class="px-4 py-3">ISBN</th>
                        <th class="px-4 py-3">Editorial</th>
                        <th class="px-4 py-3">Año</th>
                        <th class="px-4 py-3">Total</th>
                        <th class="px-4 py-3">Disponible</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 bg-white">
                    <?php foreach ($libros as $l): ?>
                        <tr class="border-b border-[#f4c892]">
                            <td class="px-4 py-3"><?= $l['id'] ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($l['titulo']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($l['autor']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($l['categoria']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($l['isbn']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($l['editorial']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($l['anio_publicacion']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($l['cantidad_total']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($l['cantidad_disponible']) ?></td>
                            <td class="px-4 py-3">
                                <?= $l['cantidad_disponible'] > 0 ? '<span class="font-semibold text-green-600">Disponible</span>' : '<span class="font-semibold text-red-600">No disponible</span>' ?>
                            </td>
                            <td class="relative px-4 py-3 text-center">
                                <!-- Botón de acciones -->
                                <button onclick="toggleActions(this)" class="text-[#e6942c] text-xl hover:text-[#c9731a] focus:outline-none">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <!-- Menú de acciones -->
                                <div class="hidden absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg z-50 border border-[#e6942c]">
                                    <a href="#" onclick='abrirModalEditarLibro(<?= json_encode($l) ?>)' class="block px-4 py-2 text-sm text-[#e6942c] hover:bg-[#ffe6c8]"><i class="mr-2 bi bi-pencil-square"></i> Editar</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: Crear Libro -->
<div id="modalCrearLibro" class="flex hidden fixed inset-0 z-50 justify-center items-center bg-black bg-opacity-40">
    <div class="relative p-6 w-full max-w-lg md:max-w-[1000px]  bg-white rounded-xl shadow-lg">
        <h2 class="text-xl font-bold mb-4 text-[#e6942c]">Agregar nuevo libro</h2>
        <form id="formCrearLibro" enctype="multipart/form-data" class="max-h-[80vh] overflow-y-auto">
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Título</label>
                <input type="text" name="titulo" id="tituloCrear" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Autor</label>
                <select name="autor_id" id="autorCrear" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" required>
                    <option value="" disabled selected>Seleccionar autor</option>
                    <?php foreach ($autores as $a): ?>
                        <option value="<?= $a['id'] ?>"><?= htmlspecialchars($a['nombre_completo']) ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Categoría</label>
                <select name="categoria_id" id="categoriaCrear" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" required>
                    <option value="" disabled selected>Seleccionar categoría</option>
                    <?php foreach ($categorias as $c): ?>
                        <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['nombre']) ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">ISBN</label>
                <input type="text" name="isbn" id="isbnCrear" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]">
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Editorial</label>
                <input type="text" name="editorial" id="editorialCrear" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]">
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Año de publicación</label>
                <input type="number" name="anio_publicacion" id="anioCrear" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" min="1000" max="9999">
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Cantidad total</label>
                <input type="number" name="cantidad_total" id="totalCrear" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" min="1" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Cantidad disponible</label>
                <input type="number" name="cantidad_disponible" id="disponibleCrear" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" min="0" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Descripción</label>
                <textarea name="descripcion" id="descripcionCrear" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" rows="2"></textarea>
            </div>
            <div class="flex justify-end mt-6 space-x-2">
                <button type="button" onclick="cerrarModal('modalCrearLibro')" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-[#e6942c] text-white rounded-lg hover:bg-[#cc7d1a]">Registrar</button>
            </div>
        </form>
        <button onclick="cerrarModal('modalCrearLibro')" class="absolute top-2 right-3 text-2xl text-gray-400 hover:text-gray-600">&times;</button>
    </div>
</div>

<!-- Modal: Editar Libro -->
<div id="modalEditarLibro" class="flex hidden fixed inset-0 z-50 justify-center items-center bg-black bg-opacity-40">
    <div class="relative p-6 w-full max-w-lg bg-white rounded-xl shadow-lg">
        <h2 class="text-xl font-bold mb-4 text-[#e6942c]">Editar libro</h2>
        <form id="formEditarLibro" enctype="multipart/form-data" class="max-h-[80vh] overflow-y-auto">
            <input type="hidden" id="libroIdEditar" name="id">
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Título</label>
                <input type="text" name="titulo" id="tituloEditar" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Autor</label>
                <select name="autor_id" id="autorEditar" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" required>
                    <option value="" disabled>Seleccionar autor</option>
                    <?php foreach ($autores as $a): ?>
                        <option value="<?= $a['id'] ?>"><?= htmlspecialchars($a['nombre_completo']) ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Categoría</label>
                <select name="categoria_id" id="categoriaEditar" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" required>
                    <option value="" disabled>Seleccionar categoría</option>
                    <?php foreach ($categorias as $c): ?>
                        <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['nombre']) ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">ISBN</label>
                <input type="text" name="isbn" id="isbnEditar" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]">
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Editorial</label>
                <input type="text" name="editorial" id="editorialEditar" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]">
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Año de publicación</label>
                <input type="number" name="anio_publicacion" id="anioEditar" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" min="1000" max="9999">
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Cantidad total</label>
                <input type="number" name="cantidad_total" id="totalEditar" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" min="1" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Cantidad disponible</label>
                <input type="number" name="cantidad_disponible" id="disponibleEditar" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" min="0" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-sm font-semibold">Descripción</label>
                <textarea name="descripcion" id="descripcionEditar" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#e6942c]" rows="2"></textarea>
            </div>
            <div class="flex justify-end mt-6 space-x-2">
                <button type="button" onclick="cerrarModal('modalEditarLibro')" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-[#e6942c] text-white rounded-lg hover:bg-[#cc7d1a]">Guardar cambios</button>
            </div>
        </form>
        <button onclick="cerrarModal('modalEditarLibro')" class="absolute top-2 right-3 text-2xl text-gray-400 hover:text-gray-600">&times;</button>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#librosTable').DataTable({
            paging: true,
            responsive: true,
        });
        $('#formCrearLibro').submit(validarCrearLibro);
        $('#formEditarLibro').submit(validarEditarLibro);
    });

    // funcion para recargar la tabla
    async function recargarTabla() {
        try {
            const response = await fetch('/libros/getAll', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            })

            const result = await response.json();
            const libros = result.data;

            // iniciamos dataTable
            $('#librosTable').DataTable().clear().destroy();

            libros.forEach(l => {
                const tr = document.createElement("tr");
                tr.className = "border-b border-[#f4c892]";
                tr.innerHTML = `
                    <td class="px-4 py-3">${l.id}</td>
                    <td class="px-4 py-3">${l.titulo}</td>
                    <td class="px-4 py-3">${l.autor}</td>
                    <td class="px-4 py-3">${l.categoria}</td>
                    <td class="px-4 py-3">${l.isbn}</td>
                    <td class="px-4 py-3">${l.editorial}</td>
                    <td class="px-4 py-3">${l.anio_publicacion}</td>
                    <td class="px-4 py-3">${l.cantidad_total}</td>
                    <td class="px-4 py-3">${l.cantidad_disponible}</td>
                    <td class="px-4 py-3">${l.descripcion}</td>
                    <td class="relative px-4 py-3 text-center">
                        <button onclick="toggleActions(this)" class="text-[#e6942c] text-xl hover:text-[#c9731a] focus:outline-none">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <div class="hidden absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg z-50 border border-[#e6942c]">
                            <a href="#" onclick='abrirModalEditarLibro(${JSON.stringify(l)})' class="block px-4 py-2 text-sm text-[#e6942c] hover:bg-[#ffe6c8]">
                                <i class="mr-2 bi bi-pencil-square"></i> Editar
                            </a>
                        </div>
                    </td>
                `;
                $('#librosTable tbody').append(tr);
                console.log(l);
            });
            $('#librosTable').DataTable().draw();
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
    function abrirModalEditarLibro(libro) {
        abrirModal('modalEditarLibro');
        document.getElementById('libroIdEditar').value = libro.id;
        document.getElementById('tituloEditar').value = libro.titulo;
        document.getElementById('autorEditar').value = libro.autor_id;
        document.getElementById('categoriaEditar').value = libro.categoria_id;
        document.getElementById('isbnEditar').value = libro.isbn;
        document.getElementById('editorialEditar').value = libro.editorial;
        document.getElementById('anioEditar').value = libro.anio_publicacion;
        document.getElementById('totalEditar').value = libro.cantidad_total;
        document.getElementById('disponibleEditar').value = libro.cantidad_disponible;
        document.getElementById('descripcionEditar').value = libro.descripcion;
    }
    function validarCrearLibro(e) {
        e.preventDefault();
        // Validación básica, puedes mejorarla
        const titulo = $('#tituloCrear').val().trim();
        const autor = $('#autorCrear').val();
        const categoria = $('#categoriaCrear').val();
        const isbn = $('#isbnCrear').val();
        const editorial = $('#editorialCrear').val();
        const anio_publicacion = $('#anioCrear').val();
        const total = $('#totalCrear').val();
        const disponible = $('#disponibleCrear').val();
        if (!titulo || !autor || !categoria || !total || !disponible) {
            Swal.fire({ icon: 'error', title: 'Error', text: 'Todos los campos obligatorios' });
            return false;
        }
        // Aquí puedes hacer el submit AJAX
        // ...
        // Swal.fire({ icon: 'success', title: 'Libro creado', timer: 1500 });
        $.ajax({
            url: '/libros/createBook',
            type: 'POST',
            data: {
                autor_id: autor,
                categoria_id: categoria,
                titulo: titulo,
                isbn: isbn,
                editorial: editorial,
                anio_publicacion: anio_publicacion,
                cantidad_total: total,
                cantidad_disponible: disponible,
                descripcion: $('#descripcionCrear').val(),
            },
            dataType: 'json',
            success: function (response) {
                console.log(response);
                if (response.success) {
                    Swal.fire({ icon: 'success', title: 'Libro creado', timer: 1500 });
                    recargarTabla();
                    cerrarModal('modalCrearLibro');
                } else {
                    Swal.fire({ icon: 'error', title: 'Error', text: response.message });
                }
            },
            error: function (xhr, status, error) {
                Swal.fire({ icon: 'error', title: 'Error', text: 'Error al crear el libro' });
            }
        });
        // Recarga o refresca tabla
    }
    function validarEditarLibro(e) {
        e.preventDefault();
        // Validación básica, puedes mejorarla
        const titulo = $('#tituloEditar').val().trim();
        const autor = $('#autorEditar').val();
        const categoria = $('#categoriaEditar').val();
        const isbn = $('#isbnEditar').val();
        const editorial = $('#editorialEditar').val();
        const anio_publicacion = $('#anioEditar').val();
        const total = $('#totalEditar').val();
        const disponible = $('#disponibleEditar').val();
        const descripcion = $('#descripcionEditar').val();
        if (!titulo || !autor || !categoria || !total || !disponible) {
            Swal.fire({ icon: 'error', title: 'Error', text: 'Todos los campos obligatorios' });
            return false;
        }
        // Aquí puedes hacer el submit AJAX
        // ...
        // Swal.fire({ icon: 'success', title: 'Libro actualizado', timer: 1500 });
        $.ajax({
            url: '/libros/editBook',
            type: 'POST',
            dataType: 'json',
            data: {
                id: $('#libroIdEditar').val(),
                titulo: titulo,
                autor_id: autor,
                categoria_id: categoria,
                isbn: isbn,
                editorial: editorial,
                anio_publicacion: anio_publicacion,
                cantidad_total: total,
                cantidad_disponible: disponible,
                descripcion: descripcion,
            },
            success: function (response) {
                if (response.success) {
                    Swal.fire({ icon: 'success', title: 'Libro actualizado', timer: 1500 });
                    recargarTabla();
                    cerrarModal('modalEditarLibro');
                } else {
                    Swal.fire({ icon: 'error', title: 'Error', text: response.message });
                }
            },
            error: function (xhr, status, error) {
                Swal.fire({ icon: 'error', title: 'Error', text: 'Error al actualizar el libro' });
            }
        });
        // Recarga o refresca tabla
    }
</script>

<?php
    include_once LAYOUTS . 'dashboard/footer.php';

    setFooter($d);

    closefooter();
