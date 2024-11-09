<?php 

// Se inicia una sesión para acceder a la variables de sesión existentes
session_start();

//Se verifica si existe una variable de sesión llamada 'sesion_email'
if (isset($_SESSION['sesion_email'])) {
  // Se crea la variable email_sesion y se iguala a la variable de sesión
  $email_sesion = $_SESSION['sesion_email'];
  // Se construye una consulata para buscar al email que concide con el email de la variable email_sesion
  $sql = "SELECT * FROM tb_usuarios WHERE email = '$email_sesion'";
  // Se prepara la consulta utilziando PDO
  $query = $pdo->prepare($sql);
  // Se ejecuta la consulta
  $query->execute();

  // Se obtienen los reultados de la consulta con un array asociativo
  $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
  
  // Se recorre el array de los usuarios obtenidos
  foreach ($usuarios as $usuario) {
    
    // Se toma el valor de 'nombres' de cada usuario encontrado y se almacena en la variable $nombres_sesion.
    $nombres_sesion = $usuario['nombres'];
  }
  
  // Si no se entra al bucle foreach significa que no hay una sesión inciada 
} else {
  echo "No existe ninguna sesión";

  //Redirige al usuario al inicio de sesión
  header('Location:' . $URL . '/login');
}
