<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Notas</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 30px;
        }
        .card {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.2);
            position: relative;
        }
        textarea {
            width: 100%;
            height: 100px;
            padding: 8px;
        }
        input, select {
            width: 100%;
            padding: 8px;
        }
        button {
            padding: 10px 20px;
            margin-top: 10px;
            background: royalblue;
            color: white;
            border: none;
            border-radius: 6px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 18px;
        }
        table, th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        th {
            background: #eee;
        }
    </style>
</head>
<body>
<div class="card">
