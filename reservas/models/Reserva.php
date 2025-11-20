<?php

class Reserva
{
    public $id;
    public $nombre;
    public $servicio;
    public $fecha;
    public $hora;

    public function __construct($id, $nombre, $servicio, $fecha, $hora)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->servicio = $servicio;
        $this->fecha = $fecha;
        $this->hora = $hora;
    }
}