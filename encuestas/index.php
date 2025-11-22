<?php

require_once __DIR__ . '/controllers/EncuestaController.php';

$controller = new EncuestaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->crear($_POST['titulo'], $_POST['opciones']);
    header("Location: index.php");
    exit;
}

if (isset($_GET['votar']) && isset($_GET['opcion'])) {
    $controller->votar($_GET['votar'], $_GET['opcion']);
    header("Location: index.php");
    exit;
}

if (isset($_GET['eliminar'])) {
    $controller->eliminar($_GET['eliminar']);
    header("Location: index.php");
    exit;
}
$encuestas = $controller->listar();

require __DIR__ . '/views/encuestas.php';
