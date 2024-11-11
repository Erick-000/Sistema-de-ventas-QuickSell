<?php

$id_usuario_get = $_GET['id'];

// Se construye una consulata para mostrar a todos los usarios
$sql_usuarios = "SELECT us.id_usuario as id_usuario, us.nombres as nombres, us.email as email, rol.rol as rol 
                  FROM tb_usuarios as us INNER JOIN tb_roles as rol ON us.id_rol = rol.id_rol WHERE id_usuario = '$id_usuario_get'";
// Se prepara la consulta utilziando PDO
$query_usuarios = $pdo->prepare($sql_usuarios);
// Se ejecuta la consulta
$query_usuarios->execute();

// Se obtienen los reultados de la consulta con un array asociativo
$usuarios_datos = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

foreach($usuarios_datos as $usuario_dato){
    $nombres = $usuario_dato['nombres'];
    $email = $usuario_dato['email'];
    $rol = $usuario_dato['rol'];
}