<?php include __DIR__ . '/../../partials/volver.php'; ?>
<?php include __DIR__ . '/header.php'; ?>

<h2>Calendario de Eventos</h2>

<form method="POST">
    <label>Título del evento</label>
    <input type="text" name="titulo" required>

    <label>Descripción</label>
    <textarea name="descripcion" required></textarea>

    <label>Fecha</label>
    <input type="date" name="fecha" required>

    <button type="submit">Agregar Evento</button>
</form>

<hr>

<h3>Eventos Registrados</h3>

<table>
    <tr>
        <th>Título</th>
        <th>Descripción</th>
        <th>Fecha</th>
        <th>Acciones</th>

    </tr>

    <?php foreach ($eventos as $e): ?>
        <tr>
    <td><?= htmlspecialchars($e->titulo) ?></td>
    <td><?= nl2br(htmlspecialchars($e->descripcion)) ?></td>
    <td><?= $e->fecha ?></td>

    <td>
        <a href="index.php?editar=<?= $e->id ?>" 
           style="color: orange; font-weight:bold;">
           Editar
        </a> |
        <a href="index.php?eliminar=<?= $e->id ?>"
           onclick="return confirm('¿Seguro que deseas eliminar este evento?');"
           style="color:red; font-weight:bold;">
           Eliminar
        </a>
    </td>
</tr>
    <?php endforeach; ?>
</table>

<?php include __DIR__ . '/footer.php'; ?>
