<?php

require_once __DIR__ . '/controllers/ContrasenaController.php';

$controller = new ContrasenaController();
$resultado = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $longitud  = $_POST['longitud'];
    $mayus     = isset($_POST['mayus']);
    $minus     = isset($_POST['minus']);
    $numeros   = isset($_POST['numeros']);
    $simbolos  = isset($_POST['simbolos']);

    $resultado = $controller->generar($longitud, $mayus, $minus, $numeros, $simbolos);
}

require __DIR__ . '/views/generador.php';
