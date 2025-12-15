const slider = document.querySelector(".cat-tabs");

if (slider) {
    let isDown = false;
    let startX;
    let scrollLeft;

    slider.addEventListener("mousedown", (e) => {
        isDown = true;
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
    });

    slider.addEventListener("mouseleave", () => {
        isDown = false;
    });

    slider.addEventListener("mouseup", () => {
        isDown = false;
    });

    slider.addEventListener("mousemove", (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - slider.offsetLeft;
        slider.scrollLeft = scrollLeft - (x - startX);
    });

    // TOUCH
    slider.addEventListener("touchstart", (e) => {
        isDown = true;
        startX = e.touches[0].pageX;
        scrollLeft = slider.scrollLeft;
    });

    slider.addEventListener("touchend", () => {
        isDown = false;
    });

    slider.addEventListener("touchmove", (e) => {
        if (!isDown) return;
        const x = e.touches[0].pageX;
        slider.scrollLeft = scrollLeft - (x - startX);
    });
}


// cambio de estado de active para los botones de categoria
const buttons = document.querySelectorAll(".cat-btn");
const cards = document.querySelectorAll(".tarjeta-producto");

if (buttons.length > 0) {
    buttons.forEach((button) => {
        button.addEventListener("click", () => {

            // Cambiar botón activo
            buttons.forEach((btn) => btn.classList.remove("active"));
            button.classList.add("active");

            // Tomar categoría desde el botón
            const categoria = button.getAttribute("data-target");

            // Filtrar tarjetas
            cards.forEach((card) => {
                const column = card.closest(".col-md-4"); 
                if (categoria === "todos") {
    column.style.display = "";
} else if (card.classList.contains(`cat-${categoria}`)) {
    column.style.display = "";
} else {
    column.style.display = "none";
}

            });
        });
    });
}







document.addEventListener("DOMContentLoaded", () => {

    const btnInfo = document.getElementById("boton-info-producto");
    const btnPers = document.getElementById("boton-personalizacion-producto");
    const btnMedidas = document.getElementById("boton-medidas-producto");

    const info = document.getElementById("contenido-info");
    const pers = document.getElementById("contenido-personalizacion");
    const medidas = document.getElementById("contenido-medidas");

    function ocultarTodo() {
        info?.classList.add("d-none");
        pers?.classList.add("d-none");
        medidas?.classList.add("d-none");

        btnInfo?.classList.remove("active");
        btnPers?.classList.remove("active");
        btnMedidas?.classList.remove("active");
    }

    btnInfo?.addEventListener("click", () => {
        ocultarTodo();
        btnInfo.classList.add("active");
        info.classList.remove("d-none");
    });

    btnPers?.addEventListener("click", () => {
        ocultarTodo();
        btnPers.classList.add("active");
        pers.classList.remove("d-none");
    });

    btnMedidas?.addEventListener("click", () => {
        ocultarTodo();
        btnMedidas.classList.add("active");
        medidas.classList.remove("d-none");
    });

});



document.addEventListener("DOMContentLoaded", function () {
    // Seleccionar el botón por atributo name
    const btn = document.querySelector('button[name="add-to-cart"]');

    if (btn) {
        // Quitar todas las clases actuales
        btn.className = "";

        // Agregar las nuevas clases
        btn.classList.add("btn", "btn-principal", "mt-2", "p-grande");
    }
});


document.addEventListener("DOMContentLoaded", function () {
    const tabla = document.getElementById("wapo-total-price-table");

    if (tabla) {
        tabla.style.display = "grid";
        tabla.style.textAlign = "end"
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const selects = document.querySelectorAll("select");

    selects.forEach(sel => {
        sel.classList.add("p-mediano");
    });
});

document.querySelectorAll('imagen-wrap').forEach(img => {
    img.removeAttribute('width');
    img.removeAttribute('height');
});

document.addEventListener("DOMContentLoaded", () => {
    const boton = getElementById("#place_order");

    if (boton) {
        boton.className = ""; // Borra todas sus clases
        boton.classList.add("btn", "btn-principal"); // Asigna las nuevas
    }
});
