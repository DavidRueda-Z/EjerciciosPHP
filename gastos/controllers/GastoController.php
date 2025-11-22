<?php

require_once __DIR__ . '/../models/Gasto.php';

class GastoController
{
    private $rutaArchivo;

    public function __construct()
    {
        $this->rutaArchivo = __DIR__ . '/../data/gastos.json';
    }

    private function cargar()
    {
        $json = file_get_contents($this->rutaArchivo);
        $data = json_decode($json, true);

        $lista = [];
        foreach ($data as $item) {
            $lista[] = new Gasto(
                $item['id'],
                $item['descripcion'],
                $item['monto'],
                $item['categoria'],
                $item['fecha']
            );
        }
        return $lista;
    }

    private function guardar($lista)
    {
        $data = [];
        foreach ($lista as $g) {
            $data[] = [
                'id' => $g->id,
                'descripcion' => $g->descripcion,
                'monto' => $g->monto,
                'categoria' => $g->categoria,
                'fecha' => $g->fecha
            ];
        }

        file_put_contents($this->rutaArchivo, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function listar()
    {
        return $this->cargar();
    }

    public function agregar($descripcion, $monto, $categoria, $fecha)
    {
        $lista = $this->cargar();

        $id = time(); // único

        $lista[] = new Gasto($id, $descripcion, $monto, $categoria, $fecha);

        $this->guardar($lista);
    }

    public function eliminar($id)
{
    $lista = $this->cargar();

    // Filtrar el gasto a eliminar
    $lista = array_filter($lista, function ($g) use ($id) {
        return $g->id != $id;
    });

    // Guardar cambios
    $this->guardar($lista);
}

public function obtenerPorId($id)
{
    $lista = $this->cargar();

    foreach ($lista as $g) {
        if ($g->id == $id) {
            return $g;
        }
    }
    return null;
}

public function editar($id, $descripcion, $monto, $categoria, $fecha)
{
    $lista = $this->cargar();

    foreach ($lista as $g) {
        if ($g->id == $id) {
            $g->descripcion = $descripcion;
            $g->monto = $monto;
            $g->categoria = $categoria;
            $g->fecha = $fecha;
        }
    }

    $this->guardar($lista);
}


}
