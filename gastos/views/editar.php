<?php include __DIR__ . '/../../partials/volver.php'; ?>
<?php include __DIR__ . '/header.php'; ?>

<h2>Editar Gasto</h2>

<form method="POST">
    <input type="hidden" name="id_edit" value="<?= $gasto->id ?>">

    <label>Descripción</label>
    <input type="text" name="descripcion" value="<?= htmlspecialchars($gasto->descripcion) ?>" required>

    <label>Monto</label>
    <input type="number" step="0.01" name="monto" value="<?= $gasto->monto ?>" required>

    <label>Categoría</label>
    <select name="categoria">
        <option <?= $gasto->categoria == 'Comida' ? 'selected' : '' ?>>Comida</option>
        <option <?= $gasto->categoria == 'Transporte' ? 'selected' : '' ?>>Transporte</option>
        <option <?= $gasto->categoria == 'Servicios' ? 'selected' : '' ?>>Servicios</option>
        <option <?= $gasto->categoria == 'Compras' ? 'selected' : '' ?>>Compras</option>
        <option <?= $gasto->categoria == 'Otros' ? 'selected' : '' ?>>Otros</option>
    </select>

    <label>Fecha</label>
    <input type="date" name="fecha" value="<?= $gasto->fecha ?>" required>

    <button type="submit">Guardar Cambios</button>
</form>

<?php include __DIR__ . '/footer.php'; ?>
