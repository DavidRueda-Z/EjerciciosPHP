<?php

require_once __DIR__ . '/controllers/ReservaController.php';

$controller = new ReservaController();
$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $mensaje = $controller->reservar(
        $_POST['nombre'],
        $_POST['servicio'],
        $_POST['fecha'],
        $_POST['hora']
    );

    header("Location: index.php");
    exit;
}

$reservas = $controller->listar();

require __DIR__ . '/views/lista.php';
