<?php

//Importar la Conexion
require("includes/config/database.php");
$db = conectarDB();

//Crear email y password;
$email = "correo@correo.com";
$password = "123456";

//Hasear el password
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

//Query para crear el usuario
$query = "INSERT INTO usuarios (email,password) VALUES ('{$email}','{$passwordHash}');";

exit;
//Agregarlo a la base de datos
mysqli_query($db, $query);

//Cerrar conexxion a la base de datos
mysqli_close($db);
