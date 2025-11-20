<?php

require_once __DIR__ . '/../models/Nota.php';

class NotaController
{
    private $rutaArchivo;

    public function __construct()
    {
        $this->rutaArchivo = __DIR__ . '/../data/notas.json';
    }

    private function cargar()
    {
        $json = file_get_contents($this->rutaArchivo);
        $data = json_decode($json, true);

        $lista = [];
        foreach ($data as $item) {
            $lista[] = new Nota(
                $item['id'],
                $item['titulo'],
                $item['contenido'],
                $item['categoria'],
                $item['fecha']
            );
        }
        return $lista;
    }

    private function guardar($lista)
    {
        $data = [];
        foreach ($lista as $n) {
            $data[] = [
                'id' => $n->id,
                'titulo' => $n->titulo,
                'contenido' => $n->contenido,
                'categoria' => $n->categoria,
                'fecha' => $n->fecha
            ];
        }

        file_put_contents($this->rutaArchivo, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function listar()
    {
        return $cargar = $this->cargar();
    }

    public function agregar($titulo, $contenido, $categoria)
    {
        $lista = $this->cargar();

        $id = time();
        $fecha = date("Y-m-d H:i:s");

        $lista[] = new Nota($id, $titulo, $contenido, $categoria, $fecha);

        $this->guardar($lista);
    }
}
