<?php
require "config/database.php";
require "funciones.php";
require __DIR__ . "/../vendor/autoload.php";
//Crear instancia a la base de datos
$db = conectarDB();

use App\Propiedad;

Propiedad::setDB($db);
