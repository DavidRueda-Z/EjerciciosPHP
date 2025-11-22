<?php include __DIR__ . '/../../partials/volver.php'; ?>
<?php include __DIR__ . '/header.php'; ?>

<h2>Editar Nota</h2>

<form method="POST">

    <input type="hidden" name="id_edit" value="<?= $nota->id ?>">

    <label>Título</label>
    <input type="text" name="titulo" value="<?= htmlspecialchars($nota->titulo) ?>" required>

    <label>Contenido</label>
    <textarea name="contenido" required><?= htmlspecialchars($nota->contenido) ?></textarea>

    <label>Categoría</label>
    <select name="categoria">
        <option <?= $nota->categoria == 'Personal' ? 'selected' : '' ?>>Personal</option>
        <option <?= $nota->categoria == 'Trabajo' ? 'selected' : '' ?>>Trabajo</option>
        <option <?= $nota->categoria == 'Estudios' ? 'selected' : '' ?>>Estudios</option>
        <option <?= $nota->categoria == 'Ideas' ? 'selected' : '' ?>>Ideas</option>
        <option <?= $nota->categoria == 'Otros' ? 'selected' : '' ?>>Otros</option>
    </select>

    <button type="submit">Guardar Cambios</button>
</form>

<?php include __DIR__ . '/footer.php'; ?>
