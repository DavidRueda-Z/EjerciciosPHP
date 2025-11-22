<?php

require_once __DIR__ . '/controllers/ReservaController.php';

$controller = new ReservaController();

if (isset($_POST['id_edit'])) {
    $controller->editar(
        $_POST['id_edit'],
        $_POST['nombre'],
        $_POST['servicio'],
        $_POST['fecha'],
        $_POST['hora']
    );

    header("Location: index.php");
    exit;
}


if (isset($_GET['editar'])) {
    $reserva = $controller->obtenerPorId($_GET['editar']);
    require __DIR__ . '/views/editar.php';
    exit;
}


if (isset($_GET['eliminar'])) {
    $controller->eliminar($_GET['eliminar']);
    header("Location: index.php");
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->reservar(
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

