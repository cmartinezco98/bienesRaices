<?php

define("TEMPLATES_URL", __DIR__ . "/templates");
define("FUNCIONES_URL", __DIR__ . "funciones.php");
define("CARPETA_IMAGENES", __DIR__ . "/../imagenes");


function incluirTemplate(string $nombre, bool $inicio = false)
{
    include TEMPLATES_URL . "/{$nombre}.php";
}

function estadoAuntenticado()
{
    session_start();

    if (!$_SESSION["login"]) {
        header("Location:/ProyectosPHP/bienesraices_inicio/login.php");
    }
}


function debuguear($variable)
{

    echo "<pre>";
    var_dump($variable);
    echo "</pre>";

    exit;
}

function sanitizarHTML($cadena)
{
    $cadenaEscapada = htmlspecialchars($cadena);
    return $cadenaEscapada;
}