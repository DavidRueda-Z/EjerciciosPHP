<?php

require_once __DIR__ . '/../models/Evento.php';

class EventoController
{
    private $rutaArchivo;

    public function __construct()
    {
        $this->rutaArchivo = __DIR__ . '/../data/eventos.json';
    }

    private function cargar()
    {
        $json = file_get_contents($this->rutaArchivo);
        $data = json_decode($json, true);

        $lista = [];
        foreach ($data as $item) {
            $lista[] = new Evento(
                $item['id'],
                $item['titulo'],
                $item['descripcion'],
                $item['fecha']
            );
        }
        return $lista;
    }

    private function guardar($lista)
    {
        $data = [];
        foreach ($lista as $e) {
            $data[] = [
                'id' => $e->id,
                'titulo' => $e->titulo,
                'descripcion' => $e->descripcion,
                'fecha' => $e->fecha
            ];
        }

        file_put_contents($this->rutaArchivo, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function listar()
    {
        return $this->cargar();
    }

    public function agregar($titulo, $descripcion, $fecha)
    {
        $lista = $this->cargar();

        $id = time(); // único
        $lista[] = new Evento($id, $titulo, $descripcion, $fecha);

        $this->guardar($lista);
    }
}
