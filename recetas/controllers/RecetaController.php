<?php

require_once __DIR__ . '/../models/Receta.php';

class RecetaController
{
    private $rutaArchivo;

    public function __construct()
    {
        $this->rutaArchivo = __DIR__ . '/../data/recetas.json';
    }

    private function cargar()
    {
        $json = file_get_contents($this->rutaArchivo);
        $data = json_decode($json, true);

        $lista = [];
        foreach ($data as $item) {
            $lista[] = new Receta(
                $item['id'],
                $item['titulo'],
                $item['categoria'],
                $item['ingredientes'],
                $item['preparacion']
            );
        }
        return $lista;
    }

    private function guardar($lista)
    {
        $data = [];
        foreach ($lista as $r) {
            $data[] = [
                'id'           => $r->id,
                'titulo'       => $r->titulo,
                'categoria'    => $r->categoria,
                'ingredientes' => $r->ingredientes,
                'preparacion'  => $r->preparacion
            ];
        }

        file_put_contents($this->rutaArchivo, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function listar()
    {
        return $this->cargar();
    }

    public function agregar($titulo, $categoria, $ingredientes, $preparacion)
    {
        $lista = $this->cargar();

        $id = time();

        $lista[] = new Receta($id, $titulo, $categoria, $ingredientes, $preparacion);

        $this->guardar($lista);
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
public function editar($id, $titulo, $categoria, $ingredientes, $preparacion)
{
    $lista = $this->cargar();

    foreach ($lista as $r) {
        if ($r->id == $id) {
            $r->titulo = $titulo;
            $r->categoria = $categoria;
            $r->ingredientes = $ingredientes;
            $r->preparacion = $preparacion;
        }
    }

    $this->guardar($lista);
}

public function eliminar($id)
{
    $lista = $this->cargar();

    $lista = array_filter($lista, function($r) use ($id) {
        return $r->id != $id;
    });

    $this->guardar($lista);
}


}
