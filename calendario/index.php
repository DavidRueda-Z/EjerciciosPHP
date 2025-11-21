<?php

require_once __DIR__ . '/controllers/EventoController.php';

$controller = new EventoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->agregar(
        $_POST['titulo'],
        $_POST['descripcion'],
        $_POST['fecha']
    );

    header("Location: index.php");
    exit;
}

$eventos = $controller->listar();

require __DIR__ . '/views/calendario.php';
