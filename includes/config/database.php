<?php

function conectarDB(): mysqli
{
    $db = new mysqli("localhost", "root", "root", "bienesraices_crud");

    $db->set_charset('utf8');
    if (!$db) {
        echo "No se pudo conectar";
        exit;
    }

    return $db;
}
