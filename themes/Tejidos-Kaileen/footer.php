<footer class="footer-movil mt-5">

    <div class="main-footer">

        <div class="footer-enlaces">

            
            <a href="<?php echo site_url('/personalizar'); ?>" class="enlace">Modelos a personalizar</a>
            <a href="<?php echo site_url('/disponibles'); ?>" class="enlace">Disponibles</a>

          
            <div class="p-frecuentes">
                <a data-bs-toggle="collapse" href="#collapsePREGUNTAS" class="p-f" aria-expanded="false" aria-controls="collapsePREGUNTAS">
                    Preguntas Frecuentes <span class="faq-icono">+</span>
                </a>
            </div>

            <div class="collapse" id="collapsePREGUNTAS">

               
                <div class="enlace">
                    <a class="p-f" data-bs-toggle="collapse" href="#pregunta1" aria-expanded="false" aria-controls="pregunta1">
                        ¿Cuánto demora la confección de un pedido personalizado?
                    </a>

                    <div class="collapse" id="pregunta1">
                        <div class="card card-body">
                            Se estima entre 15 a 30 días.
                        </div>
                    </div>
                </div>

               
                <div class="enlace">
                    <a class="p-f" data-bs-toggle="collapse" href="#pregunta2" aria-expanded="false" aria-controls="pregunta2">
                        ¿Puedo devolver o cambiar un producto?
                    </a>

                    <div class="collapse" id="pregunta2">
                        <div class="card card-body">
                            Pedidos personalizados sí, dentro de los 10 días posteriores a la entrega, siempre que el producto esté en perfecto estado.<br>
                            Productos disponibles no ya que son reutilizados.
                        </div>
                    </div>
                </div>

                <div class="enlace">
                    <a class="p-f" data-bs-toggle="collapse" href="#pregunta3" aria-expanded="false" aria-controls="pregunta3">
                        ¿Se puede comprar en tienda física?
                    </a>

                    <div class="collapse" id="pregunta3">
                        <div class="card card-body">
                            Sí, en ferias. Fecha y ubicación en página de Inicio.
                        </div>
                    </div>
                </div>

            </div> 

        </div> 

    </div> 

    <div class="footer-inferior">

  
        <div class="footer-marca">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-kaileen 1.png" alt="Logo Tejidos Kaileen" class="footer-logo">
            </a>
        </div>

      
        <a href="https://www.instagram.com/tejidoskaileen/" class="redsocial" target="_blank" rel="noopener">
            <i class="bi bi-instagram"></i>
        </a>

    </div>

    <p class="footer-copyright">
        © <?php echo date('Y'); ?> Sprint Web.
    </p>

</footer>

<?php wp_footer(); ?>
</body>
</html>
