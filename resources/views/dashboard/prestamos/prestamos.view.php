<?php
    include_once LAYOUTS . 'dashboard/head.php';

    setHeader($d);
   
    $prestamos = json_decode($d->prestamos);
    $libros = json_decode($d->libros);
    $usuarios = json_decode($d->usuarios);
?>

<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-bold text-biblio-orange">Préstamos</h2>
    <a href="#" onclick="abrirModal('modalCrearPrestamo')" class="px-4 py-2 font-semibold text-white rounded-lg shadow transition-all duration-200 bg-biblio-orange hover:bg-orange-600">
        <i class="mr-2 bi bi-plus-lg"></i> Registrar préstamo
    </a>
</div>

<div class="bg-[#ffe6c8] rounded-2xl shadow-md p-4 overflow-hidden lg:overflow-visible">
    <div class="overflow-x-scroll lg:overflow-x-visible lg:overflow-y-visible">
        <table id="prestamosTable" class="min-w-full text-left border-collapse">
            <thead class="bg-[#f8dcb9] text-biblio-orange">
                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Usuario</th>
                    <th class="px-4 py-3">Fecha Préstamo</th>
                    <th class="px-4 py-3">Fecha Devolución</th>
                    <th class="px-4 py-3">Fecha Entrega</th>
                    <th class="px-4 py-3">Estado</th>
                    <th class="px-4 py-3 text-center">Opciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 bg-white">
                <?php if (is_array($prestamos) || $prestamos instanceof Traversable): ?>
                    <?php foreach ($prestamos as $p): ?>
                        <?php
                            $bgColor = $p->estado === 'activo' ? '!bg-green-100' :
                                    ($p->estado === 'devuelto' ? '!bg-blue-100' :
                                    ($p->estado === 'cancelada' ? '!bg-red-100' : '!bg-yellow-100'));

                            $estadoBadge = '';
                            if ($p->estado === 'devuelto') {
                                $estadoBadge = '<span class="font-semibold text-blue-600">Devuelto</span>';
                            } else if ($p->estado === 'cancelada') {
                                $estadoBadge = '<span class="font-semibold text-red-600">Cancelada</span>';
                            } else {
                                $fecha_devolucion = new DateTime(str_replace('-', '/', $p->fecha_devolucion));
                                $hoy = new DateTime();
                                if ($fecha_devolucion > $hoy) {
                                    $estadoBadge = '<span class="font-semibold text-green-600">Activo</span>';
                                } else {
                                    $estadoBadge = '<span class="font-semibold text-red-600">Atrasado</span>';
                                }
                            }

                            $fecha_prestamo = date('d/m/Y', strtotime(str_replace('-', '/', $p->fecha_prestamo)));
                            $fecha_devolucion = date('d/m/Y', strtotime(str_replace('-', '/', $p->fecha_devolucion)));
                            $fecha_entrega = $p->fecha_entrega ? date('d/m/Y', strtotime(str_replace('-', '/', $p->fecha_entrega))) : '-';
                        ?>
                        <tr class="<?= $bgColor ?> border-b border-[#f4c892]">
                            <td class="px-4 py-3"><?= $p->id ?></td>
                            <td class="px-4 py-3"><?= $p->usuario_nombre ?></td>
                            <td class="px-4 py-3"><?= $fecha_prestamo ?></td>
                            <td class="px-4 py-3"><?= $fecha_devolucion ?></td>
                            <td class="px-4 py-3"><?= $fecha_entrega ?></td>
                            <td class="px-4 py-3"><?= $estadoBadge ?></td>
                            <td class="relative px-4 py-3 text-center">
                            <?php if ($p->estado !== 'devuelto' && $p->estado !== 'cancelada'){ ?>
                                <div class="inline-block relative">
                                    <button onclick="togglePrestamoActions(this)" class="text-xl text-biblio-orange hover:text-orange-600 focus:outline-none">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <div class="hidden absolute right-0 z-50 mt-2 w-48 bg-white rounded-lg border shadow-lg border-biblio-orange">
                                        <a href="#" onclick="cambiarEstadoPrestamo(<?= $p->id ?>, 'devuelto')" class="block px-4 py-2 text-sm text-blue-600 hover:bg-[#e6f0ff]">Marcar como Devuelto</a>
                                        <a href="#" onclick="cambiarEstadoPrestamo(<?= $p->id ?>, 'cancelada')" class="block px-4 py-2 text-sm text-red-600 hover:bg-[#e6f0ff]">Marcar como Cancelada</a>
                                    </div>
                                </div>
                            <?php } else { ?> 
                                <button class="text-xl text-gray-500 !cursor-default focus:outline-none">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                            <?php } ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once VIEWS . 'dashboard/prestamos/createModal.php'; ?>

<script>
    $(document).ready(function () {
        $('#prestamosTable').DataTable({
            paging: true,
            responsive: true,
            searching: false,
            info: false,
            language: {
                paginate: {
                    previous: "Anterior",
                    next: "Siguiente"
                },
                emptyTable: "No hay préstamos registrados"
            }
        });
    });

    function cargarPrestamos() {
        fetch(app.routes.prestamos.getAllPrestamos)
            .then(response => response.json())
            .then(result => {
                const prestamos = result.data;
                const tbody = document.querySelector("#prestamosTable tbody");
                tbody.innerHTML = "";
                prestamos.forEach(p => {
                    let estadoBadge = '';
                    const fecha_devolucion = new Date(p.fecha_devolucion);
                    const hoy = new Date();
                    if (p.estado === 'devuelto') estadoBadge = '<span class="font-semibold text-blue-600">Devuelto</span>';
                    else if (fecha_devolucion > hoy) estadoBadge = '<span class="font-semibold text-green-600">Activo</span>';
                    else if (p.estado === 'cancelada') estadoBadge = '<span class="font-semibold text-red-600">Cancelada</span>';
                    else estadoBadge = '<span class="font-semibold text-red-600">Atrasado</span>';

                    tbody.innerHTML += `
                        <tr class="${p.estado === 'activo' ? '!bg-green-100' : (p.estado === 'devuelto' ? '!bg-blue-100' : (p.estado === 'cancelada' ? '!bg-red-100' : '!bg-yellow-100'))} border-b border-[#f4c892]">
                            <td class="px-4 py-3">${p.id}</td>
                            <td class="px-4 py-3">${p.usuario_nombre}</td>
                            <td class="px-4 py-3">${p.fecha_prestamo}</td>
                            <td class="px-4 py-3">${p.fecha_devolucion}</td>
                            <td class="px-4 py-3">${p.fecha_entrega ?? '-'}</td>
                            <td class="px-4 py-3">${estadoBadge}</td>
                            <td class="relative px-4 py-3 text-center">
                                ${renderOpcionesPrestamo(p)}
                            </td>
                        </tr>
                    `;
                });
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudieron cargar los préstamos',
                });
            });
    }

    function renderOpcionesPrestamo(p) {
        let opciones = '';
        if (p.estado !== 'devuelto') {
            opciones += `<div class="inline-block relative">
                <button onclick="togglePrestamoActions(this)" class="text-xl text-biblio-orange hover:text-orange-600 focus:outline-none">
                    <i class="bi bi-three-dots-vertical"></i>
                </button>
                <div class="hidden absolute right-0 z-50 mt-2 w-48 bg-white rounded-lg border shadow-lg border-biblio-orange">
                    <a href="#" onclick="cambiarEstadoPrestamo(${p.id}, 'devuelto')" class="block px-4 py-2 text-sm text-blue-600 hover:bg-[#e6f0ff]">Marcar como Devuelto</a>
                    <a href="#" onclick="cambiarEstadoPrestamo(${p.id}, 'cancelada')" class="block px-4 py-2 text-sm text-red-600 hover:bg-[#e6f0ff]">Marcar como Cancelada</a>
                </div>
            </div>`;
        } else {
            opciones += `<button class="text-xl text-gray-500 !cursor-default focus:outline-none">
                <i class="bi bi-three-dots-vertical"></i>
            </button>`
        }
        return opciones;
    }

    function togglePrestamoActions(button) {
        document.querySelectorAll('#prestamosTable td .absolute').forEach(menu => {
            if (!menu.contains(button)) menu.classList.add('hidden');
        });
        const menu = button.nextElementSibling;
        menu.classList.toggle('hidden');
    }

    document.addEventListener('click', function (e) {
        const openMenus = document.querySelectorAll('#prestamosTable td .absolute');
        openMenus.forEach(menu => {
            if (!menu.contains(e.target) && !menu.previousElementSibling.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    });

    function cambiarEstadoPrestamo(id, estado) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: `¿Deseas marcar este préstamo como ${estado}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, cambiar estado'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(app.routes.prestamos.togglePrestamo + '/' + id + '/' + estado, {
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
                            title: 'Éxito',
                            text: data.message,
                        });
                        cargarPrestamos();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.message,
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error al cambiar el estado del préstamo',
                    });
                });
            }
        });
    }

    function abrirModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }
    function cerrarModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
</script>

<?php
    include_once LAYOUTS . 'dashboard/footer.php';

    setFooter($d);

    closefooter();
