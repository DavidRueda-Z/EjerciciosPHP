<?php include __DIR__ . '/../../partials/volver.php'; ?>
<?php include __DIR__ . '/header.php'; ?>

<h2>Generador de Contraseñas Seguras</h2>

<form method="POST">

    <label>Longitud:</label>
    <input type="number" name="longitud" min="4" max="50" required>

    <label><input type="checkbox" name="mayus" checked> Incluir mayúsculas</label><br>
    <label><input type="checkbox" name="minus" checked> Incluir minúsculas</label><br>
    <label><input type="checkbox" name="numeros" checked> Incluir números</label><br>
    <label><input type="checkbox" name="simbolos" checked> Incluir símbolos</label><br>

    <button type="submit">Generar</button>
</form>

<hr>

<?php if (!empty($resultado)): ?>
    <h3>Contraseña generada:</h3>
    <p style="font-size:18px; font-weight:bold; background:#eee; padding:10px; border-radius:6px;">
        <?= htmlspecialchars($resultado->resultado) ?>
    </p>
<?php endif; ?>

<?php include __DIR__ . '/footer.php'; ?>
