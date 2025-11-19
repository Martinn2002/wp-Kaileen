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


// cambio de estado de active

const buttons = document.querySelectorAll(".cat-btn");

if (buttons.length > 0) {
    buttons.forEach((button) => {
        button.addEventListener("click", () => {
            buttons.forEach((btn) => btn.classList.remove("active"));
            button.classList.add("active");
        });
    });
}


const botones_producto = document.querySelectorAll('.boton-producto-info');
const botonInfo = document.getElementById('boton-info-producto');
const infoProducto = document.getElementById('info-producto');

if (botones_producto.length > 0){

    if (botonInfo.classList.contains('active')) {
            infoProducto.innerHTML = '<p class="p-pequeno mt-1">Chaleco tejido a mano en lana de oveja, elaborado con punto espiga que aporta textura y calidez. Una prenda única, suave y naturalmente elegante.</p>';
        } 

    


botones_producto.forEach((boton) => {
    boton.addEventListener('click', () => {
        botones_producto.forEach((btn) => btn.classList.remove('active'));
        boton.classList.add('active');
        if (botonInfo.classList.contains('active')) {
            infoProducto.innerHTML = '<p class="p-pequeno">Chaleco tejido a mano en lana de oveja, elaborado con punto espiga que aporta textura y calidez. Una prenda única, suave y naturalmente elegante.</p>';
        } else if (document.getElementById('boton-personalizacion-producto').classList.contains('active')) {
            infoProducto.innerHTML =`                        <div class="col-5">
                            <label for="Material">Material</label>
                            <input class="w-100" name="Material" id="id-material" data-bs-toggle="modal" data-bs-target="#exampleModal"></input>
                        </div>
                        <div class="col-5">
                            <label for="Talla">Talla</label>
                            <input class="w-100" name="Talla" id="id-talla"></input>
                        </div>
                        <div class="col-2">
                            <p class="p-mediano"></p>
                        </div>`;
        }
    });
});
}



// modal formulario:
const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})


