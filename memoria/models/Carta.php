<?php

class Carta
{
    public $id;
    public $valor;
    public $estado;

    public function __construct($id, $valor, $estado = "oculta")
    {
        $this->id = $id;
        $this->valor = $valor;
        $this->estado = $estado;
    }
}
