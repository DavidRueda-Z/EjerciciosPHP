<?php

class Contrasena
{
    public $longitud;
    public $mayus;
    public $minus;
    public $numeros;
    public $simbolos;
    public $resultado;

    public function __construct($longitud, $mayus, $minus, $numeros, $simbolos)
    {
        $this->longitud = $longitud;
        $this->mayus = $mayus;
        $this->minus = $minus;
        $this->numeros = $numeros;
        $this->simbolos = $simbolos;

        $this->resultado = $this->generar();
    }

    private function generar()
    {
        $caracteres = '';

        if ($this->mayus) $caracteres .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if ($this->minus) $caracteres .= 'abcdefghijklmnopqrstuvwxyz';
        if ($this->numeros) $caracteres .= '0123456789';
        if ($this->simbolos) $caracteres .= '!@#$%^&*()_+-={}[]<>?';

        if ($caracteres === '') {
            return 'Debe seleccionar al menos una opción';
        }

        $password = '';
        for ($i = 0; $i < $this->longitud; $i++) {
            $password .= $caracteres[random_int(0, strlen($caracteres) - 1)];
        }

        return $password;
    }
}
