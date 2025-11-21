<?php

class Encuesta
{
    public $id;
    public $titulo;
    public $opciones;
    public $votos;

    public function __construct($id, $titulo, $opciones, $votos)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->opciones = $opciones;
        $this->votos = $votos;
    }
}
