<?php

require_once __DIR__ . '/controllers/CronometroController.php';

$controller = new CronometroController();
$model = $controller->mostrar();

require __DIR__ . '/views/cronometro.php';
