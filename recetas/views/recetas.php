<?php include __DIR__ . '/../../partials/volver.php'; ?>
<?php include __DIR__ . '/header.php'; ?>

<h2>Plataforma de Recetas</h2>

<form method="POST">
    <label>Título</label>
    <input type="text" name="titulo" required>

    <label>Categoría</label>
    <select name="categoria">
        <option>Postre</option>
        <option>Plato fuerte</option>
        <option>Bebida</option>
        <option>Entrada</option>
        <option>Ensalada</option>
    </select>

    <label>Ingredientes (uno por línea)</label>
    <textarea name="ingredientes" required></textarea>

    <label>Preparación</label>
    <textarea name="preparacion" required></textarea>

    <button type="submit">Guardar Receta</button>
</form>

<hr>

<h3>Recetas Registradas</h3>

<table>
    <tr>
        <th>Título</th>
        <th>Categoría</th>
        <th>Ingredientes</th>
        <th>Preparación</th>
    </tr>

    <?php foreach ($recetas as $r): ?>
        <tr>
            <td><?= htmlspecialchars($r->titulo) ?></td>
            <td><?= $r->categoria ?></td>
            <td><?= nl2br(htmlspecialchars($r->ingredientes)) ?></td>
            <td><?= nl2br(htmlspecialchars($r->preparacion)) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include __DIR__ . '/footer.php'; ?>
