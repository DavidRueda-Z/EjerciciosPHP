<?php

require_once __DIR__ . '/controllers/NotaController.php';

$controller = new NotaController();


if (isset($_POST['id_edit'])) {

    $controller->editar(
        $_POST['id_edit'],
        $_POST['titulo'],
        $_POST['contenido'],
        $_POST['categoria']
    );

    header("Location: index.php");
    exit;
}


if (isset($_GET['editar'])) {

    $nota = $controller->obtenerPorId($_GET['editar']);
    require __DIR__ . '/views/editar.php';
    exit;
}

if (isset($_GET['eliminar'])) {

    $controller->eliminar($_GET['eliminar']);
    header("Location: index.php");
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $controller->agregar(
        $_POST['titulo'],
        $_POST['contenido'],
        $_POST['categoria']
    );

    header("Location: index.php");
    exit;
}


$notas = $controller->listar();

require __DIR__ . '/views/lista.php';

