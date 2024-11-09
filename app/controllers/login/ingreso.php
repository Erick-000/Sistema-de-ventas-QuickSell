<?php

// Incluye un archivo de configuración que contiene configuraciones globales, como conexión a la base de datos.
include('../../config.php');

// Se capturan los valores enviados a través de un formulario usando el método POST (email y contraseña).
$email = $_POST['email'];
$password_user = $_POST['password_user'];

// Se inicializa un contador para contar el número de usuarios encontrados que coinciden con las credenciales.
$contador = 0;

// Se construye la consulta SQL para buscar un usuario que coincida con el email y la contraseña proporcionados.
$sql = "SELECT * FROM tb_usuarios WHERE email = '$email' AND password_user = '$password_user'";

// Se prepara la consulta utilizando el objeto PDO.
$query = $pdo->prepare($sql);
// Se ejecuta la consulta.
$query->execute();

// Se obtienen los resultados de la consulta como un array asociativo.
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

// Se recorre el resultado de la consulta para contar los usuarios encontrados y extraer algunos datos.
foreach($usuarios as $usuario) {
    $contador = $contador + 1; // Se incrementa el contador por cada usuario encontrado.
    $email_tabla = $usuario['email']; // Se almacena el email del usuario.
    $nombres_tabla = $usuario['nombres']; // Se almacena el nombre del usuario.
}

// Se verifica si se encontró al menos un usuario con las credenciales proporcionadas.
if ($contador == 0) {
    // Si no hay coincidencias, se muestra un mensaje de error.
    echo "Datos de inicio de sesión incorrectos";
    // Se inicia una sesión y se guarda un mensaje de error en la variable de sesión.
    session_start();
    $_SESSION['mensaje'] = "Datos de inicio de sesión incorrectos";
    // Se redirige al usuario a la página de inicio de sesión.
    header('Location: '.$URL.'/login');
} else {
    // Si las credenciales son correctas, se muestra un mensaje de éxito.
    echo "Datos de incio de sesión correctos";
    // Se inicia una sesión y se almacena el email en una variable de sesión.
    session_start();
    $_SESSION['sesion_email'] = $email;
    // Se redirige al usuario a la página principal.
    header('Location: '.$URL.'/index.php');
}
