<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juego de Memoria</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 30px;
            text-align: center;
        }
        .card {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.2);
            position: relative;
        }
        .tablero {
            display: grid;
            grid-template-columns: repeat(4, 100px);
            gap: 10px;
            margin: auto;
            justify-content: center;
        }
        .carta {
            width: 100px;
            height: 100px;
            background: royalblue;
            color: white;
            font-size: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            cursor: pointer;
            user-select: none;
        }
        .revelada {
            background: dodgerblue;
        }
        .encontrada {
            background: limegreen;
            cursor: default;
        }
        button {
            padding: 10px 20px;
            margin-top: 20px;
            background: royalblue;
            color: white;
            border: none;
            border-radius: 6px;
        }
    </style>
</head>
<body>
<div class="card">
