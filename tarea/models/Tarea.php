<?php

class Tarea
{
    public $id;
    public $titulo;
    public $completada;

    public function __construct($id, $titulo, $completada = false)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->completada = $completada;
    }
}
