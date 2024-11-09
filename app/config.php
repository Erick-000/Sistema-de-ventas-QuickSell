<?php

// Se definen constantes para los parámetros de conexión con la base de datos.
define('SERVIDOR', 'localhost'); // Define el nombre del servidor (localhost para conexiones locales).
define('USUARIO', 'root'); // Define el nombre de usuario para la conexión (por defecto en MySQL).
define('PASSWORD', ''); // Define la contraseña asociada al usuario (en este caso, está vacía).
define('BD', 'sistemadeventas'); // Define el nombre de la base de datos a la que se va a conectar.

// Se forma una cadena de conexión para usar con PDO, concatenando el nombre de la base de datos y el host.
$servidor = "mysql:dbname=" . BD . ";host=" . SERVIDOR;

try {
    // Se intenta crear un nuevo objeto PDO para la conexión a la base de datos usando los datos configurados.
    // Se establece que las comunicaciones se harán en UTF-8.
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch (PDOException $e) {
    // Si hay un error en la conexión, se captura la excepción y se muestra un mensaje de error.
    echo "Error al conectarse a la base de datos";
}

// Definición de una URL base para la aplicación (puede ser usada para generar rutas o enlaces).
$URL = "http://localhost/www.quicksell.com";
