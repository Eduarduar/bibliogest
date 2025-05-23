<!-- Modal para crear préstamo -->
<div id="modalCrearPrestamo" class="flex hidden fixed inset-0 z-50 justify-center items-center bg-black bg-opacity-40">
  <div class="w-full max-w-md bg-white rounded-lg shadow-lg">
    <div class="flex justify-between items-center px-6 py-4 border-b">
      <h3 class="text-lg font-bold text-biblio-orange">Registrar Préstamo</h3>
      <button onclick="cerrarModal('modalCrearPrestamo')" class="text-2xl text-gray-400 hover:text-gray-600">&times;</button>
    </div>
    <form id="formCrearPrestamo" class="px-6 py-4" onsubmit="return crearPrestamo(event)">
      <div class="mb-4">
        <label for="usuarioId" class="block mb-1 font-semibold text-gray-700">Usuario</label>
        <select id="usuarioId" name="usuario_id" class="px-3 py-2 w-full rounded border" required>
          <?php foreach ($usuarios as $usuario): ?>
            <option value="<?= $usuario->id ?>"><?= $usuario->nombre ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="mb-4">
        <label for="libroId" class="block mb-1 font-semibold text-gray-700">Libro</label>
        <select id="libroId" name="libro_id" class="px-3 py-2 w-full rounded border" required>
          <?php foreach ($libros as $libro): ?>
            <option value="<?= $libro->id ?>"><?= $libro->titulo ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="mb-4">
        <label for="fecha_prestamo" class="block mb-1 font-semibold text-gray-700">Fecha de Préstamo</label>
        <input type="date" id="fecha_prestamo" name="fecha_prestamo" class="px-3 py-2 w-full rounded border" required>
      </div>
      <div class="mb-4">
        <label for="fecha_devolucion" class="block mb-1 font-semibold text-gray-700">Fecha de Devolución</label>
        <input type="date" id="fecha_devolucion" name="fecha_devolucion" class="px-3 py-2 w-full rounded border" required>
      </div>
      <div class="mb-4">
        <label for="cantidad" class="block mb-1 font-semibold text-gray-700">Cantidad</label>
        <input type="number" id="cantidad" name="cantidad" min="1" class="px-3 py-2 w-full rounded border" required>
      </div>
      <div class="flex justify-end">
        <button type="button" onclick="cerrarModal('modalCrearPrestamo')" class="px-4 py-2 mr-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">Cancelar</button>
        <button type="submit" class="px-4 py-2 text-white rounded bg-biblio-orange hover:bg-orange-600">Registrar</button>
      </div>
    </form>
  </div>
</div>
<script>
function crearPrestamo(event) {
    event.preventDefault();
    let fecha_prestamo = document.getElementById('fecha_prestamo').value.split('-');
    let fecha_devolucion = document.getElementById('fecha_devolucion').value.split('-');

    let data = {
        usuario_id: document.getElementById('usuarioId').value,
        libro_id: document.getElementById('libroId').value,
        fecha_prestamo: `${fecha_prestamo[2]}-${fecha_prestamo[1]}-${fecha_prestamo[0]}`,
        fecha_devolucion: `${fecha_devolucion[2]}-${fecha_devolucion[1]}-${fecha_devolucion[0]}`,
        cantidad: document.getElementById('cantidad').value
    };
    $.ajax({
        url: app.routes.prestamos.createPrestamo,
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Préstamo registrado correctamente',
                    text: response.message,
                });
                cargarPrestamos();
                cerrarModal('modalCrearPrestamo');
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
</script>
