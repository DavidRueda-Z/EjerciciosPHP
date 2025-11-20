<?php

require_once __DIR__ . '/controllers/TareaController.php';

$controller = new TareaController();

if (isset($_POST['titulo'])) {
    $controller->agregar($_POST['titulo']);
    header("Location: index.php");
    exit;
}

if (isset($_GET['completar'])) {
    $controller->completar($_GET['completar']);
    header("Location: index.php");
    exit;
}

if (isset($_GET['eliminar'])) {
    $controller->eliminar($_GET['eliminar']);
    header("Location: index.php");
    exit;
}

$tareas = $controller->listar();
require_once __DIR__ . '/views/lista.php';
