<?php 
// Se incluve el archivo de configuraciones
include('../../config.php');

//Se inicia una sesión
session_start();
//Se verifica si la sesión está activa mediante la variable sesion_email
if(isset($_SESSION['sesion_email'])){
    //Si la sesion está activa es decir hay un usuario se cierrra y destruye la sesion del usaurio
    session_destroy();
    //Se redirige al usuario a la pagina principal
    header('Location: '.$URL.'/');
}