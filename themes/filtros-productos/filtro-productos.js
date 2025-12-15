document.addEventListener("DOMContentLoaded", () => {

    /* =========================
       ELEMENTOS
    ========================= */

    const productos = document.querySelectorAll(".producto-item");

    const selectModelo = document.getElementById("filtro-modelo");
    const selectLana   = document.getElementById("filtro-lana");
    const selectTalla  = document.getElementById("filtro-talla");

    const minRange = document.getElementById("precio-min");
    const maxRange = document.getElementById("precio-max");

    const minLabel = document.getElementById("precio-min-label");
    const maxLabel = document.getElementById("precio-max-label");


    /* =========================
       ACTUALIZAR LABELS
    ========================= */

    function actualizarLabels() {
        let min = parseInt(minRange.value, 10);
        let max = parseInt(maxRange.value, 10);

        // Evitar cruce de sliders
        if (min > max) {
            [min, max] = [max, min];
            minRange.value = min;
            maxRange.value = max;
        }

        minLabel.textContent = `$${min.toLocaleString()}`;
        maxLabel.textContent = `$${max.toLocaleString()}`;

        filtrarProductos();
    }


    /* =========================
       FILTRAR PRODUCTOS
    ========================= */

    function filtrarProductos() {

        const modelo = selectModelo.value;
        const lana   = selectLana.value;
        const talla  = selectTalla.value;

        const minPrecio = parseInt(minRange.value, 10);
        const maxPrecio = parseInt(maxRange.value, 10);

        productos.forEach(producto => {

            let visible = true;
            const precio = parseInt(producto.dataset.precio, 10);

            if (precio < minPrecio || precio > maxPrecio) visible = false;
            if (modelo && !producto.classList.contains(`pa_modelo-${modelo}`)) visible = false;
            if (lana && !producto.classList.contains(`pa_tipo-de-lana-${lana}`)) visible = false;
            if (talla && !producto.classList.contains(`pa_talla-${talla}`)) visible = false;

            producto.style.display = visible ? "" : "none";
        });
    }


    /* =========================
       EVENTOS
    ========================= */

    selectModelo.addEventListener("change", filtrarProductos);
    selectLana.addEventListener("change", filtrarProductos);
    selectTalla.addEventListener("change", filtrarProductos);

    minRange.addEventListener("input", actualizarLabels);
    maxRange.addEventListener("input", actualizarLabels);


    /* =========================
       INIT
    ========================= */

    actualizarLabels();

});
