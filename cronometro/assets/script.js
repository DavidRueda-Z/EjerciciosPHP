let milisegundos = 0;
let segundos = 0;
let minutos = 0;
let horas = 0;

let intervalo = null;
let corriendo = false;

function actualizarPantalla() {
    document.getElementById('tiempo').textContent =
        `${String(horas).padStart(2, '0')}:` +
        `${String(minutos).padStart(2, '0')}:` +
        `${String(segundos).padStart(2, '0')}:` +
        `${String(milisegundos).padStart(2, '0')}`;
}

function iniciar() {
    if (corriendo) return;
    corriendo = true;

    intervalo = setInterval(() => {
        milisegundos += 1; // cada tick vale 10 ms

        if (milisegundos >= 100) {
            milisegundos = 0;
            segundos++;
        }
        if (segundos >= 60) {
            segundos = 0;
            minutos++;
        }
        if (minutos >= 60) {
            minutos = 0;
            horas++;
        }

        actualizarPantalla();
    }, 10); // 10 ms por actualización
}

function pausar() {
    corriendo = false;
    clearInterval(intervalo);
}

function reiniciar() {
    milisegundos = 0;
    segundos = 0;
    minutos = 0;
    horas = 0;
    actualizarPantalla();
    pausar();
}

