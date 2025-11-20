<?php include 'header.php'; ?>

<h2>Lista de Tareas</h2>

<?php include __DIR__ . '/../../partials/volver.php'; ?>

<form action="index.php" method="POST">
    <input type="text" name="titulo" placeholder="Nueva tarea" required>
    <button type="submit">Agregar</button>
</form>

<hr>

<?php foreach ($tareas as $t): ?>
    <div class="tarea <?= $t->completada ? 'completada' : '' ?>">
        <?= htmlspecialchars($t->titulo) ?>

        <?php if (!$t->completada): ?>
            <a href="index.php?completar=<?= $t->id ?>">✔</a>
        <?php endif; ?>

        <a href="index.php?eliminar=<?= $t->id ?>" style="color:red;">✖</a>
    </div>
<?php endforeach; ?>

<?php include 'footer.php'; ?>
