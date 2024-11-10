<?php

// Se incluye el archivo de configuración donde se encuentran declaradas variables globales
include('../app/config.php');
// Se incluye el archivo de sesión donde se encuentran las variables de sesión existentes
include('../layout/sesion.php');
// Se incluye el archivo donde se encuentra contenido y los nav-bar del sitio
include('../layout/parte1.php'); 

// Se verifica si existe una variable de sesión llamada 'mensaje'
if (isset($_SESSION['mensaje'])) {
  
  //Si la variable 'mensaje' existe se almacena en la variable 'respuesta'
  $respuesta = $_SESSION['mensaje']; ?>
  <script>
    Swal.fire({
      icon: "error",
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
          <h1 class="m-0">Registro de un nuevo usuario</h1>
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
      <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Creación de usuarios</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <form action="../app/controllers/usuarios/create.php" method="post">
                    <div class="form-group">
                      <label for="">Nombres</label>
                      <input type="text" name="nombres" class="form-control" placeholder="Nombre del usuario">
                    </div>
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" name="email" class="form-control" placeholder="Email del usuario">
                    </div>
                    <div class="form-group">
                      <label for="">Contraseña</label>
                      <input type="password" name="password_user" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">Confirmar contraseña</label>
                      <input type="password" name="password_repeat" class="form-control">
                    </div>
                    <div class="form-group">
                      <a href="index.php" class="btn btn-secondary">Cncelar</a>
                      <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
      </div>
    </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- // Se incluye el archivo donde se encuentra contenido y footer del sitio -->
<?php include('../layout/parte2.php'); ?>