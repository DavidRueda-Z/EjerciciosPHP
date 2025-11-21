<?php include __DIR__ . '/../../partials/volver.php'; ?>
<?php include __DIR__ . '/header.php'; ?>

<h2>Juego de Memoria</h2>

<div class="tablero" id="tablero">
    <?php foreach ($cartas as $c): ?>
        <div class="carta" data-id="<?= $c->id ?>" data-valor="<?= $c->valor ?>">?</div>
    <?php endforeach; ?>
</div>

<button onclick="location.reload()">Reiniciar</button>

<script>
let primera = null;
let segunda = null;
let bloqueo = false;

document.querySelectorAll('.carta').forEach(carta => {
    carta.addEventListener('click', () => {
        if (bloqueo || carta.classList.contains('encontrada') || carta === primera) return;

        // Revelar carta
        carta.textContent = carta.dataset.valor;
        carta.classList.add('revelada');

        if (!primera) {
            primera = carta;
        } else {
            segunda = carta;
            bloqueo = true;

            setTimeout(() => {
                if (primera.dataset.valor === segunda.dataset.valor) {
                    primera.classList.add('encontrada');
                    segunda.classList.add('encontrada');
                } else {
                    primera.textContent = "?";
                    segunda.textContent = "?";
                    primera.classList.remove('revelada');
                    segunda.classList.remove('revelada');
                }

                primera = null;
                segunda = null;
                bloqueo = false;
            }, 800);
        }
    });
});
</script>

<?php include __DIR__ . '/footer.php'; ?>
