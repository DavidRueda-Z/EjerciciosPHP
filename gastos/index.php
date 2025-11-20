<?php

require_once __DIR__ . '/controllers/GastoController.php';

$controller = new GastoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->agregar(
        $_POST['descripcion'],
        $_POST['monto'],
        $_POST['categoria'],
        $_POST['fecha']
    );
    header("Location: index.php");
    exit;
}

$gastos = $controller->listar();

require __DIR__ . '/views/lista.php';
