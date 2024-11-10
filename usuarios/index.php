<?php

// Se incluye el archivo de configuración donde se encuentran declaradas variables globales
include('../app/config.php');
// Se incluye el archivo de sesión donde se encuentran las variables de sesión existentes
include('../layout/sesion.php');
// Se incluye el archivo donde se encuentra contenido y los nav-bar del sitio
include('../layout/parte1.php');
// Se incluye el archivo listado de usuarios donde se encuentra la consulta para llamar a todos los usuarios
include('../app/controllers/usuarios/listado_de_usuarios.php');

// Se verifica si existe una variable de sesión llamada 'mensaje'
if (isset($_SESSION['mensaje'])) {
  
  //Si la variable 'mensaje' existe se almacena en la variable 'respuesta'
  $respuesta = $_SESSION['mensaje']; ?>
  <script>
    Swal.fire({
      icon: "success",
      //Se imprime la variable respuesta para mostrar el mensaje de la variable 'mensaje'
      title: "<?php echo $respuesta;?>",
    });
  </script>
<?php
  unset($_SESSION['mensaje']);
}

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Listado de usuarios</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Lista de usuarios registrados</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th><center>Nro</center></th>
                  <th><center>Nombre</center></th>
                  <th><center>Email</center></th>
                </tr>
                  </thead>
                  <tbody>
                  <?php
                  $contador = 0;
                  foreach($usuarios_datos as $usuario_dato){?>
                    <tr>
                      <td><center><?php echo $contador = $contador + 1;?></center></td>
                      <td><?php echo $usuario_dato['nombres'];?></td>
                      <td><?php echo $usuario_dato['email'];?></td>
                    </tr>
                    <?php
                  }
                  ?>
                  </tr>
                </tbody>
                  <tfoot>
                  <tr>
                  <th><center>Nro</center></th>
                  <th><center>Nombre</center></th>
                  <th><center>Email</center></th>
                </tr>
                  </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>


<!-- // Se incluye el archivo donde se encuentra contenido y footer del sitio -->
<?php include('../layout/parte2.php'); ?>

<!-- Script de los datatables -->
<script>
  $(function () {
    $("#example1").DataTable({
      /* cambio de idiomas de datatable */
      "pageLength": 5,
          language: {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
              "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
              "infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Usuarios",
              "loadingRecords": "Cargando...",
              "processing": "Procesando...",
              "search": "Buscador:",
              "zeroRecords": "Sin resultados encontrados",
              "paginate": {
                  "first": "Primero",
                  "last": "Ultimo",
                  "next": "Siguiente",
                  "previous": "Anterior"
              }
             },
      /* fin de idiomas */
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
