const slider = document.querySelector(".categorias-slider");

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
        const walk = (x - startX) * 2;
        slider.scrollLeft = scrollLeft - walk;
    });

    // TOUCH
    slider.addEventListener("touchstart", (e) => {
        startX = e.touches[0].pageX;
        scrollLeft = slider.scrollLeft;
    });

    slider.addEventListener("touchmove", (e) => {
        const x = e.touches[0].pageX;
        const walk = (x - startX) * 2;
        slider.scrollLeft = scrollLeft - walk;
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









const btnInfo = document.getElementById("boton-info-producto");
const btnPers = document.getElementById("boton-personalizacion-producto");

const info = document.getElementById("contenido-info");
const pers = document.getElementById("contenido-personalizacion");

btnInfo.addEventListener("click", () => {
    btnInfo.classList.add("active");
    btnPers.classList.remove("active");

    info.classList.remove("d-none");
    info.classList.add("contenido-activo");

    pers.classList.add("d-none");
});

btnPers.addEventListener("click", () => {
    btnPers.classList.add("active");
    btnInfo.classList.remove("active");

    pers.classList.remove("d-none");
    pers.classList.add("contenido-activo");

    info.classList.add("d-none");
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