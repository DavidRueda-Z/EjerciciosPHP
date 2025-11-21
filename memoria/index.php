<?php

require_once __DIR__ . '/controllers/MemoriaController.php';

$controller = new MemoriaController();

$cartas = $controller->generarCartas();

require __DIR__ . '/views/juego.php';
