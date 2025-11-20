<?php

class Nota
{
    public $id;
    public $titulo;
    public $contenido;
    public $categoria;
    public $fecha;

    public function __construct($id, $titulo, $contenido, $categoria, $fecha)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->contenido = $contenido;
        $this->categoria = $categoria;
        $this->fecha = $fecha;
    }
}
