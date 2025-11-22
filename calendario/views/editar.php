<?php include __DIR__ . '/../../partials/volver.php'; ?>
<?php include __DIR__ . '/header.php'; ?>

<h2>Editar Evento</h2>

<form method="POST">

    <input type="hidden" name="id_edit" value="<?= $evento->id ?>">

    <label>Título</label>
    <input type="text" name="titulo" value="<?= htmlspecialchars($evento->titulo) ?>" required>

    <label>Descripción</label>
    <textarea name="descripcion" required><?= htmlspecialchars($evento->descripcion) ?></textarea>

    <label>Fecha</label>
    <input type="date" name="fecha" value="<?= $evento->fecha ?>" required>

    <button type="submit">Guardar Cambios</button>
</form>

<?php include __DIR__ . '/footer.php'; ?>
