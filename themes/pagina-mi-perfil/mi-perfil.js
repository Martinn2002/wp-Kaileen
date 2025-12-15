// assets/js/mi-perfil.js
(function () {
  // Esperar a que el DOM esté listo
  document.addEventListener('DOMContentLoaded', function () {
    console.log('[mi-perfil] DOM listo — arrancando script.');

    const acordiones = document.querySelectorAll('.perfil-usuario-acordeon');
    console.log('[mi-perfil] Nº de acordeones encontrados:', acordiones.length);

    if (!acordiones || acordiones.length === 0) {
      console.warn('[mi-perfil] No se encontraron elementos .perfil-usuario-acordeon. Verifica el HTML y las clases.');
      return;
    }

    acordiones.forEach(acc => {
      const encabezado = acc.querySelector('.perfil-usuario-acordeon-encabezado');
      const contenido = acc.querySelector('.perfil-usuario-contenido');

      if (!encabezado || !contenido) {
        console.warn('[mi-perfil] Falta encabezado o contenido en un acordeón:', acc);
        return;
      }

      contenido.style.maxHeight = '0px';
      acc.classList.remove('abierto');
      encabezado.setAttribute('aria-expanded','false');

      function abrir() {
        acc.classList.add('abierto');
        encabezado.setAttribute('aria-expanded','true');
        contenido.style.maxHeight = contenido.scrollHeight + 'px';
      }
      function cerrar() {
        acc.classList.remove('abierto');
        encabezado.setAttribute('aria-expanded','false');
        contenido.style.maxHeight = '0px';
      }

      encabezado.addEventListener('click', () => {
        const abierto = acc.classList.contains('abierto');

        // cerrar los demás
        acordiones.forEach(o => {
          if (o !== acc) {
            o.classList.remove('abierto');
            const c = o.querySelector('.perfil-usuario-contenido');
            if (c) c.style.maxHeight = '0px';
            const h = o.querySelector('.perfil-usuario-acordeon-encabezado');
            if (h) h.setAttribute('aria-expanded','false');
          }
        });

        if (abierto) cerrar(); else abrir();
      });

      
      encabezado.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          encabezado.click();
        }
      });
    });

    const btnFoto = document.getElementById('perfil-usuario-cambiar-foto');
    if (btnFoto) {
      btnFoto.addEventListener('click', () => {
        alert('Aquí abrirías el selector de medios de WordPress.');
      });
      console.log('[mi-perfil] Botón cambiar foto enlazado.');
    } else {
      console.log('[mi-perfil] Botón cambiar foto NO encontrado (id=perfil-usuario-cambiar-foto).');
    }

    console.log('[mi-perfil] Script finalizado.');
  });
})();
