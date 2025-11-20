<?php include __DIR__ . '/header.php'; ?>
<?php include __DIR__ . '/../../partials/volver.php'; ?>
<h2>Calculadora de Propinas</h2>



<form method="POST">
    <label>Monto de la cuenta:</label>
    <input type="number" step="0.01" name="monto" required>

    <label>Porcentaje de propina:</label>
    <select name="porcentaje">
        <option value="5">5%</option>
        <option value="10">10%</option>
        <option value="15">15%</option>
        <option value="20">20%</option>
        <option value="25">25%</option>
    </select>

    <button type="submit">Calcular</button>
</form>

<hr>

<?php if (!empty($resultado)): ?>
    <h3>Resultado:</h3>
    <p>Propina: <strong>$<?= number_format($resultado->propina, 2) ?></strong></p>
    <p>Total a pagar: <strong>$<?= number_format($resultado->total, 2) ?></strong></p>
<?php endif; ?>

<?php include __DIR__ . '/footer.php'; ?>
