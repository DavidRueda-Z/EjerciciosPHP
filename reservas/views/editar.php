<?php include __DIR__ . '/../../partials/volver.php'; ?>
<?php include __DIR__ . '/header.php'; ?>

<h2>Editar Reserva</h2>

<form method="POST">
    <input type="hidden" name="id_edit" value="<?= $reserva->id ?>">

    <label>Nombre del cliente</label>
    <input type="text" name="nombre" value="<?= htmlspecialchars($reserva->nombre) ?>" required>

    <label>Servicio</label>
    <select name="servicio">
        <option <?= $reserva->servicio == 'Consulta' ? 'selected' : '' ?>>Consulta</option>
        <option <?= $reserva->servicio == 'Corte de cabello' ? 'selected' : '' ?>>Corte de cabello</option>
        <option <?= $reserva->servicio == 'Sesión de masaje' ? 'selected' : '' ?>>Sesión de masaje</option>
        <option <?= $reserva->servicio == 'Revisión técnica' ? 'selected' : '' ?>>Revisión técnica</option>
    </select>

    <label>Fecha</label>
    <input type="date" name="fecha" value="<?= $reserva->fecha ?>" required>

    <label>Hora</label>
    <input type="time" name="hora" value="<?= $reserva->hora ?>" required>

    <button type="submit">Guardar Cambios</button>
</form>

<?php include __DIR__ . '/footer.php'; ?>
