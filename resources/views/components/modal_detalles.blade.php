
<!-- Modal para mostrar los detalles de un plato -->
<div class="modal fade" id="modalInfo" tabindex="-1" aria-labelledby="modalInfoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-lg"> <!-- Modal centrado y de tamaño grande en pantallas grandes -->
        <div class="modal-content p-3 bg-info"> <!-- Contenedor del contenido del modal con padding -->
            <div class="modal-header">
                <h5 class="modal-title d-flex justify-content-right align-items-start" id="modalInfoLabel">Detalles del Plato</h5>
                <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Cerrar"></button> <!-- Botón para cerrar el modal -->
            </div>
            <div class="modal-body d-flex flex-column flex-md-row align-items-start">
                <!-- Imagen del plato, ajustable para que se mantenga dentro del contenedor -->
                <img id="imagenPlato" src="" class="img-fluid rounded me-md-4 mb-3 mb-md-0" alt="Imagen del Plato"
                    style="max-width: 100%; height: auto; max-height: 300px; object-fit: cover;">

                <!-- Contenedor de información del plato -->
                <div class="w-100">
                    <p><strong>Nombre:</strong> <span id="nombrePlato"></span></p>
                    <p><strong>Precio:</strong> <span id="precioPlato"></span></p>
                    <p><strong>Descripción:</strong> <span id="descripcionPlato"></span></p>
                    <p><strong>Cantidad disponible:</strong> <span id="cantidadDisponible"></span></p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- jQuery para manejar eventos -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function(){
    // Cuando el modal se muestra, ejecuta esta función
    $('#modalInfo').on('show.bs.modal', function(event){
      var button = $(event.relatedTarget); // Obtiene el botón que activó el modal
      var platoId = button.data('id'); // Extrae el ID del plato desde el botón

      // Llamada AJAX para obtener los datos del plato
      $.ajax({
        url: "/platos/" + platoId, // Ruta del backend que devuelve los detalles del plato
        method: "GET", // Método HTTP para obtener los datos
        success: function(data) { // Si la petición es exitosa, actualiza el contenido del modal
          $('#nombrePlato').text(data.nombre_plato);
          $('#precioPlato').text('$' + data.precio);
          $('#descripcionPlato').text(data.descripcion);
          $('#imagenPlato').attr('src', '/storage/' + data.imagen).attr('alt', data.nombre); // Actualiza la imagen
          $('#cantidadDisponible').text(data.cantidadDisponible);
        }
      });
    });
  });
</script>
