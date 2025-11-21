<?php

require_once __DIR__ . '/../models/Encuesta.php';

class EncuestaController
{
    private $rutaArchivo;

    public function __construct()
    {
        $this->rutaArchivo = __DIR__ . '/../data/encuestas.json';
    }

    private function cargar()
    {
        $json = file_get_contents($this->rutaArchivo);
        $data = json_decode($json, true);

        $lista = [];
        foreach ($data as $e) {
            $lista[] = new Encuesta(
                $e['id'],
                $e['titulo'],
                $e['opciones'],
                $e['votos']
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
                'opciones' => $e->opciones,
                'votos' => $e->votos
            ];
        }

        file_put_contents($this->rutaArchivo, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function listar()
    {
        return $this->cargar();
    }

    public function crear($titulo, $opcionesTexto)
    {
        $lista = $this->cargar();

        $id = time();
        $opciones = array_filter(array_map('trim', explode("\n", $opcionesTexto)));
        $votos = array_fill(0, count($opciones), 0);

        $lista[] = new Encuesta($id, $titulo, $opciones, $votos);

        $this->guardar($lista);
    }

    public function votar($idEncuesta, $indice)
    {
        $lista = $this->cargar();

        foreach ($lista as $encuesta) {
            if ($encuesta->id == $idEncuesta) {
                $encuesta->votos[$indice]++;
            }
        }

        $this->guardar($lista);
    }
}
