<?php

class Receta
{
    public $id;
    public $titulo;
    public $categoria;
    public $ingredientes;
    public $preparacion;

    public function __construct($id, $titulo, $categoria, $ingredientes, $preparacion)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->categoria = $categoria;
        $this->ingredientes = $ingredientes;
        $this->preparacion = $preparacion;
    }
}
