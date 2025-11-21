<?php

require_once __DIR__ . '/../models/Cronometro.php';

class CronometroController
{
    public function mostrar()
    {
        return new Cronometro();
    }
}
