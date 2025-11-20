<?php

class Gasto
{
    public $id;
    public $descripcion;
    public $monto;
    public $categoria;
    public $fecha;

    public function __construct($id, $descripcion, $monto, $categoria, $fecha)
    {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->monto = $monto;
        $this->categoria = $categoria;
        $this->fecha = $fecha;
    }
}
