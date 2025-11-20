<?php

require_once __DIR__ . '/controllers/PropinaController.php';

$controller = new PropinaController();
$resultado = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $monto = $_POST['monto'];
    $porcentaje = $_POST['porcentaje'];
    $resultado = $controller->calcular($monto, $porcentaje);
}

require_once __DIR__ . '/views/calculadora.php';
