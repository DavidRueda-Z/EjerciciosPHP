<?php

class Propina
{
    public $monto;
    public $porcentaje;
    public $propina;
    public $total;

    public function __construct($monto, $porcentaje)
    {
        $this->monto = $monto;
        $this->porcentaje = $porcentaje;
        $this->propina = $monto * ($porcentaje / 100);
        $this->total = $monto + $this->propina;
    }
}
