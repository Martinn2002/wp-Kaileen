    <!-- FOOTER -->
    <footer class="footer-movil">
        <div class="main-footer">
            <!-- enlaces -->
            <div class="footer-enlaces">
                <a href="<?php echo site_url('/personalizar'); ?>" class="enlace">Modelos a personalizar</a>
                <a href="<?php echo site_url('/disponibles'); ?>" class="enlace">Disponibles</a>
            </div>
            <!-- faq -->
            <div class="footer-faq">
                <div class="p-frecuentes">
                    <a class="collapsed"
                        data-bs-toggle="collapse"
                        href="#collapsePREGUNTAS"
                        role="button"
                        aria-expanded="false"
                        aria-controls="collapsePREGUNTAS">Preguntas Frecuentes <span class="faq-icono">+</span>
                    </a>
                </div>
                <div class="collapse" id="collapsePREGUNTAS">
                    <div class="faq-item">
                        <a class="p-f" data-bs-toggle="collapse" href="#pregunta1">¿Cuánto demora la confección de un pedido personalizado?</a>
                        <div class="collapse" id="pregunta1">
                            <div class="card card-body">Se estima entre 15 a 30 días.</div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <a class="p-f" data-bs-toggle="collapse" href="#pregunta2">¿Puedo devolver o cambiar un producto?</a>
                        <div class="collapse" id="pregunta2">
                            <div class="card card-body">Pedidos personalizados sí, dentro de los 10 días posteriores a la entrega, siempre que el producto esté en perfecto estado. Productos disponibles no, ya que son reutilizados y se busca darles una segunda vida.</div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <a class="p-f" data-bs-toggle="collapse" href="#pregunta3">¿Se puede comprar en tienda física?</a>
                        <div class="collapse" id="pregunta3">
                            <div class="card card-body">Sí, en ferias. Fecha y ubicación disponibles en la página de Inicio.</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- logo + rrss -->
            <div class="footer-inferior">
                <a href="<?php echo home_url(); ?>" class="footer-logo-link">
                    <?php the_custom_logo(); ?>
                </a>

                <a href="https://www.instagram.com/tejidoskaileen/"
                class="redsocial"
                target="_blank"
                rel="noopener">
                    <i class="bi bi-instagram"></i>
                </a>
            </div>
        </div>
        <p class="footer-copyright">© <?php echo date('Y'); ?> Sprint Web.</p>
    </footer>

<?php wp_footer(); ?>
</body>
</html>

