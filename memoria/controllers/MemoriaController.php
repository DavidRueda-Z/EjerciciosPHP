<?php

require_once __DIR__ . '/../models/Carta.php';

class MemoriaController
{
    public function generarCartas()
    {
        // 6 pares (12 cartas)
        $pares = ["🍎", "🍌", "🍇", "🍒", "🍓", "🍍"];

        $cartas = [];
        $id = 1;

        foreach ($pares as $p) {
            $cartas[] = new Carta($id++, $p);
            $cartas[] = new Carta($id++, $p);
        }

        // Mezclar cartas
        shuffle($cartas);

        return $cartas;
    }
}
