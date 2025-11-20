<?php

require_once __DIR__ . '/controllers/NotaController.php';

$controller = new NotaController();

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
