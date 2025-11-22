<?php include __DIR__ . '/../../partials/volver.php'; ?>
<?php include __DIR__ . '/header.php'; ?>

<h2>Editar Receta</h2>

<form method="POST">

    <input type="hidden" name="id_edit" value="<?= $receta->id ?>">

    <label>Título</label>
    <input type="text" name="titulo" value="<?= htmlspecialchars($receta->titulo) ?>" required>

    <label>Categoría</label>
    <select name="categoria">
        <option <?= $receta->categoria == 'Postre' ? 'selected' : '' ?>>Postre</option>
        <option <?= $receta->categoria == 'Plato fuerte' ? 'selected' : '' ?>>Plato fuerte</option>
        <option <?= $receta->categoria == 'Bebida' ? 'selected' : '' ?>>Bebida</option>
        <option <?= $receta->categoria == 'Entrada' ? 'selected' : '' ?>>Entrada</option>
        <option <?= $receta->categoria == 'Ensalada' ? 'selected' : '' ?>>Ensalada</option>
    </select>

    <label>Ingredientes</label>
    <textarea name="ingredientes" required><?= htmlspecialchars($receta->ingredientes) ?></textarea>

    <label>Preparación</label>
    <textarea name="preparacion" required><?= htmlspecialchars($receta->preparacion) ?></textarea>

    <button type="submit">Guardar Cambios</button>
</form>

<?php include __DIR__ . '/footer.php'; ?>
