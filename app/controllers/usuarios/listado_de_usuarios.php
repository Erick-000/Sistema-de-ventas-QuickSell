<?php 

// Se construye una consulata para mostrar a todos los usarios
$sql_usuarios = "SELECT * FROM tb_usuarios";
// Se prepara la consulta utilziando PDO
$query_usuarios = $pdo->prepare($sql_usuarios);
// Se ejecuta la consulta
$query_usuarios->execute();

// Se obtienen los reultados de la consulta con un array asociativo
$usuarios_datos = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);