<?php

require_once __DIR__ . '/controllers/GastoController.php';

$controller = new GastoController();

// --------------------------
// 1. PROCESAR EDICIÓN
// --------------------------
if (isset($_POST['id_edit'])) {
    $controller->editar(
        $_POST['id_edit'],
        $_POST['descripcion'],
        $_POST['monto'],
        $_POST['categoria'],
        $_POST['fecha']
    );
    header("Location: index.php");
    exit;
}

// --------------------------
// 2. MOSTRAR FORMULARIO EDITAR
// --------------------------
if (isset($_GET['editar'])) {
    $gasto = $controller->obtenerPorId($_GET['editar']);
    require __DIR__ . '/views/editar.php';
    exit;
}

// --------------------------
// 3. ELIMINAR GASTO
// --------------------------
if (isset($_GET['eliminar'])) {
    $controller->eliminar($_GET['eliminar']);
    header("Location: index.php");
    exit;
}

// --------------------------
// 4. AGREGAR GASTO NUEVO
// --------------------------
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

// --------------------------
// 5. LISTAR
// --------------------------
$gastos = $controller->listar();

require __DIR__ . '/views/lista.php';

