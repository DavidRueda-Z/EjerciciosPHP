<?php

require_once __DIR__ . '/../models/Propina.php';

class PropinaController
{
    public function calcular($monto, $porcentaje)
    {
        if (!is_numeric($monto) || $monto <= 0) {
            return null;
        }

        return new Propina($monto, $porcentaje);
    }
}

