<?php include __DIR__ . '/../../partials/volver.php'; ?>
<?php include __DIR__ . '/header.php'; ?>

<h2>Gestor de Gastos</h2>

<form method="POST">
    <label>Descripción</label>
    <input type="text" name="descripcion" required>

    <label>Monto</label>
    <input type="number" step="0.01" name="monto" required>

    <label>Categoría</label>
    <select name="categoria">
        <option>Comida</option>
        <option>Transporte</option>
        <option>Servicios</option>
        <option>Compras</option>
        <option>Otros</option>
    </select>

    <label>Fecha</label>
    <input type="date" name="fecha" required>

    <button type="submit">Agregar Gasto</button>
</form>

<hr>

<h3>Lista de Gastos</h3>

<table>
    <tr>
        <th>Descripción</th>
        <th>Monto</th>
        <th>Categoría</th>
        <th>Fecha</th>
    </tr>

    <?php 
        $total = 0;
        foreach ($gastos as $g):
            $total += $g->monto;
    ?>
        <tr>
            <td><?= htmlspecialchars($g->descripcion) ?></td>
            <td>$<?= number_format($g->monto, 2) ?></td>
            <td><?= $g->categoria ?></td>
            <td><?= $g->fecha ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<h3>Total gastado: $<?= number_format($total, 2) ?></h3>

<?php include __DIR__ . '/footer.php'; ?>
