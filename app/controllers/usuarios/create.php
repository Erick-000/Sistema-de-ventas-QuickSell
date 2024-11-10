<?php

// Se incluye el archivo de configuración donde se encuentran declaradas variables globales
include('../../config.php');

// Se capturan las valores a travez de el metodo post
$nombres = $_POST['nombres'];
$email = $_POST['email'];
$password_user = $_POST['password_user'];
$password_repeat = $_POST['password_repeat'];

// Pregunta si las contraseñas son iguales
if($password_user == $password_repeat){

    // Encripta la contraseña usando passwordhash
    $password_user = password_hash("$password_user", PASSWORD_DEFAULT);
    
// Consulta sql donde se pasan los valores capturados por el post para insertarlos en la base de datos
$sentencia = $pdo->prepare("INSERT INTO tb_usuarios
( nombres, email, password_user,fyh_creacion) 
VALUES (:nombres, :email, :password_user, :fyh_creacion)");

// Se envian los paramentros de las variables capturadas por el metodo post
$sentencia->bindParam('nombres', $nombres);
$sentencia->bindParam('email', $email);
$sentencia->bindParam('password_user', $password_user);
$sentencia->bindParam('fyh_creacion', $fechaHora);

// Se ejecuta la sentencia
$sentencia->execute();
session_start();
    $_SESSION['mensaje'] = "Usuario registrado con exito";
    
    // Se redirige al usuario a la página de inicio de sesión.
    header('Location: '.$URL.'/usuarios/');

}else{
    // Se inicia una sesión y se guarda un mensaje de error en la variable de sesión 'mensaje' para que se pueda mostrar más adelante.
    session_start();
    $_SESSION['mensaje'] = "Las contraseñas deben ser iguales";
    
    // Se redirige al usuario a la página de inicio de sesión.
    header('Location: '.$URL.'/usuarios/create.php');
}
