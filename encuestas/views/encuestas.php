<?php include __DIR__ . '/../../partials/volver.php'; ?>
<?php include __DIR__ . '/header.php'; ?>

<h2>Plataforma de Encuestas</h2>

<form method="POST">
    <label>Título de la encuesta</label>
    <input type="text" name="titulo" required>

    <label>Opciones (una por línea)</label>
    <textarea name="opciones" required></textarea>

    <button type="submit">Crear Encuesta</button>
</form>

<hr>

<h3>Encuestas disponibles</h3>

<?php foreach ($encuestas as $e): ?>
    <div style="border: 1px solid #ccc; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
        
        <h3><?= htmlspecialchars($e->titulo) ?></h3>

        <form method="GET">
            <input type="hidden" name="votar" value="<?= $e->id ?>">

            <?php foreach ($e->opciones as $i => $op): ?>
                <label>
                    <input type="radio" name="opcion" value="<?= $i ?>" required>
                    <?= htmlspecialchars($op) ?>
                </label><br>
            <?php endforeach; ?>

            <button type="submit">Votar</button>
        </form>

        
        <h4>Resultados:</h4>
        <?php
            $total = array_sum($e->votos);
            if ($total == 0) $total = 1; 
        ?>

        <?php foreach ($e->opciones as $i => $op): ?>
            <p><?= htmlspecialchars($op) ?> — <?= $e->votos[$i] ?> votos</p>
            <div class="resultado-bar" style="width: <?= ($e->votos[$i] / $total) * 100 ?>%;"></div>
        <?php endforeach; ?>

        <div style="margin-bottom: 10px;">
            <a href="index.php?eliminar=<?= $e->id ?>"
            onclick="return confirm('¿Seguro que deseas eliminar esta encuesta?');"
            style="color:red; font-weight:bold; font-size: 0.9rem;">
            <br>Eliminar encuesta<br>
            </a>
        </div>


    </div>
<?php endforeach; ?>

<?php include __DIR__ . '/footer.php'; ?>
