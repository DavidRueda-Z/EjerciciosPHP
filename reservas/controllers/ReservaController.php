<?php

require_once __DIR__ . '/../models/Reserva.php';

class ReservaController
{
    private $rutaArchivo;

    public function __construct()
    {
        $this->rutaArchivo = __DIR__ . '/../data/reservas.json';
    }

    private function cargar()
    {
        $json = file_get_contents($this->rutaArchivo);
        $data = json_decode($json, true);

        $lista = [];
        foreach ($data as $item) {
            $lista[] = new Reserva(
                $item['id'],
                $item['nombre'],
                $item['servicio'],
                $item['fecha'],
                $item['hora']
            );
        }
        return $lista;
    }

    private function guardar($lista)
    {
        $data = [];
        foreach ($lista as $r) {
            $data[] = [
                'id'       => $r->id,
                'nombre'   => $r->nombre,
                'servicio' => $r->servicio,
                'fecha'    => $r->fecha,
                'hora'     => $r->hora
            ];
        }

        file_put_contents($this->rutaArchivo, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function listar()
    {
        return $this->cargar();
    }

    public function reservar($nombre, $servicio, $fecha, $hora)
    {
        $lista = $this->cargar();

        // Validación opcional: evitar reservas duplicadas en mismo horario
        foreach ($lista as $r) {
            if ($r->fecha == $fecha && $r->hora == $hora) {
                return "Ya existe una reserva para esa fecha y hora.";
            }
        }

        $id = time();
        $lista[] = new Reserva($id, $nombre, $servicio, $fecha, $hora);

        $this->guardar($lista);

        return "Reserva creada correctamente.";
    }

    public function obtenerPorId($id)
{
    $lista = $this->cargar();

    foreach ($lista as $r) {
        if ($r->id == $id) {
            return $r;
        }
    }
    return null;
}

public function editar($id, $nombre, $servicio, $fecha, $hora)
{
    $lista = $this->cargar();

    foreach ($lista as $r) {
        if ($r->id == $id) {
            $r->nombre = $nombre;
            $r->servicio = $servicio;
            $r->fecha = $fecha;
            $r->hora = $hora;
        }
    }

    $this->guardar($lista);
}

public function eliminar($id)
{
    $lista = $this->cargar();

    $lista = array_filter($lista, function ($r) use ($id) {
        return $r->id != $id;
    });

    $this->guardar($lista);
}


}
