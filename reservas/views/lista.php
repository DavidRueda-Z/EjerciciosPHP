<?php include __DIR__ . '/../../partials/volver.php'; ?>
<?php include __DIR__ . '/header.php'; ?>

<h2>Sistema de Reservas</h2>

<form method="POST">
    <label>Nombre del cliente</label>
    <input type="text" name="nombre" required>

    <label>Servicio</label>
    <select name="servicio">
        <option>Consulta</option>
        <option>Corte de cabello</option>
        <option>Sesión de masaje</option>
        <option>Revisión técnica</option>
    </select>

    <label>Fecha</label>
    <input type="date" name="fecha" required>

    <label>Hora</label>
    <input type="time" name="hora" required>

    <button type="submit">Reservar</button>
</form>

<hr>

<h3>Reservas realizadas</h3>

<table>
    <tr>
        <th>Cliente</th>
        <th>Servicio</th>
        <th>Fecha</th>
        <th>Hora</th>
    </tr>

    <?php foreach ($reservas as $r): ?>
        <tr>
    <td><?= htmlspecialchars($r->nombre) ?></td>
    <td><?= $r->servicio ?></td>
    <td><?= $r->fecha ?></td>
    <td><?= $r->hora ?></td>

    <td>
        <a href="index.php?editar=<?= $r->id ?>" style="color: orange; font-weight:bold;">
            Editar
        </a>
        |
        <a href="index.php?eliminar=<?= $r->id ?>"
           onclick="return confirm('¿Seguro que deseas eliminar esta reserva?');"
           style="color:red; font-weight:bold;">
           Eliminar
        </a>
    </td>
</tr>

    <?php endforeach; ?>
</table>

<?php if (!empty($mensaje)): ?>
    <p><strong><?= $mensaje ?></strong></p>
<?php endif; ?>

<?php include __DIR__ . '/footer.php'; ?>
