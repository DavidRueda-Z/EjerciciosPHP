<?php include __DIR__ . '/../../partials/volver.php'; ?>
<?php include __DIR__ . '/header.php'; ?>

<h2>Gestor de Notas</h2>

<form method="POST">
    <label>Título</label>
    <input type="text" name="titulo" required>

    <label>Contenido</label>
    <textarea name="contenido" required></textarea>

    <label>Categoría</label>
    <select name="categoria">
        <option>Personal</option>
        <option>Trabajo</option>
        <option>Estudios</option>
        <option>Ideas</option>
        <option>Otros</option>
    </select>

    <button type="submit">Guardar Nota</button>
</form>

<hr>

<h3>Notas guardadas</h3>

<table>
    <tr>
        <th>Título</th>
        <th>Categoría</th>
        <th>Fecha</th>
        <th>Contenido</th>
    </tr>

    <?php foreach ($notas as $n): ?>
        <tr>
            <td><?= htmlspecialchars($n->titulo) ?></td>
            <td><?= $n->categoria ?></td>
            <td><?= $n->fecha ?></td>
            <td><?= nl2br(htmlspecialchars($n->contenido)) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include __DIR__ . '/footer.php'; ?>
