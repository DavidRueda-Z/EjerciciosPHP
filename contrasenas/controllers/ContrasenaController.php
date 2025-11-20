<?php

require_once __DIR__ . '/../models/Contrasena.php';

class ContrasenaController
{
    public function generar($longitud, $mayus, $minus, $numeros, $simbolos)
    {
        return new Contrasena($longitud, $mayus, $minus, $numeros, $simbolos);
    }
}
