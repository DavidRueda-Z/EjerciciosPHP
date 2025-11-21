<?php

require_once __DIR__ . '/controllers/RecetaController.php';

$controller = new RecetaController();

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
