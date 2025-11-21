<?php

class Evento
{
    public $id;
    public $titulo;
    public $descripcion;
    public $fecha;

    public function __construct($id, $titulo, $descripcion, $fecha)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
    }
}
