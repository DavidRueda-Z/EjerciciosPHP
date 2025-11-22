<?php

require_once __DIR__ . '/controllers/RecetaController.php';

$controller = new RecetaController();

if (isset($_POST['id_edit'])) {

    $controller->editar(
        $_POST['id_edit'],
        $_POST['titulo'],
        $_POST['categoria'],
        $_POST['ingredientes'],
        $_POST['preparacion']
    );

    header("Location: index.php");
    exit;
}

if (isset($_GET['editar'])) {

    $receta = $controller->obtenerPorId($_GET['editar']);
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
        $_POST['categoria'],
        $_POST['ingredientes'],
        $_POST['preparacion']
    );

    header("Location: index.php");
    exit;
}

$recetas = $controller->listar();

require __DIR__ . '/views/recetas.php';

