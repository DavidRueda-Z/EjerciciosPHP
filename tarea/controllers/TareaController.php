<?php

require_once __DIR__ . '/../models/Tarea.php';

class TareaController
{
    private $rutaArchivo;

    public function __construct()
    {
        $this->rutaArchivo = __DIR__ . '/../data/tareas.json';
    }

    private function cargarTareas()
    {
        $json = file_get_contents($this->rutaArchivo);
        $data = json_decode($json, true);

        $tareas = [];
        foreach ($data as $item) {
            $tareas[] = new Tarea($item['id'], $item['titulo'], $item['completada']);
        }
        return $tareas;
    }

    private function guardarTareas($tareas)
    {
        $data = [];
        foreach ($tareas as $t) {
            $data[] = [
                'id' => $t->id,
                'titulo' => $t->titulo,
                'completada' => $t->completada
            ];
        }

        file_put_contents($this->rutaArchivo, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function listar()
    {
        return $this->cargarTareas();
    }

    public function agregar($titulo)
    {
        $tareas = $this->cargarTareas();
        $id = time(); // ID único

        $tareas[] = new Tarea($id, $titulo);
        $this->guardarTareas($tareas);
    }

    public function completar($id)
    {
        $tareas = $this->cargarTareas();

        foreach ($tareas as $t) {
            if ($t->id == $id) {
                $t->completada = true;
            }
        }
        $this->guardarTareas($tareas);
    }

    public function eliminar($id)
    {
        $tareas = $this->cargarTareas();

        $tareas = array_filter($tareas, function ($t) use ($id) {
            return $t->id != $id;
        });

        $this->guardarTareas($tareas);
    }
}
