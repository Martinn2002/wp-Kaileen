<section class="card-filtro">

    <div class="filtro-header">
        <span class="filtro-titulo">Filtros</span>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconos/filtrar.png" class="icono-filtro">
    </div>

    <div class="filtro-linea"></div>

    <div class="filtros-selects">

        <!-- MODELO -->
        <div class="select-container">
            <select id="filtro-modelo" class="select-custom">
                <option value="">Modelo</option>
                <?php
                $modelos = get_terms(['taxonomy'=>'pa_modelo','hide_empty'=>true]);
                foreach ($modelos as $m):
                ?>
                    <option value="<?= esc_attr($m->slug); ?>">
                        <?= esc_html($m->name); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <span class="flecha"></span>
        </div>

        <!-- LANA -->
        <div class="select-container">
            <select id="filtro-lana" class="select-custom">
                <option value="">Tipo de lana</option>
                <?php
                $lanas = get_terms(['taxonomy'=>'pa_tipo-de-lana','hide_empty'=>true]);
                foreach ($lanas as $l):
                ?>
                    <option value="<?= esc_attr($l->slug); ?>">
                        <?= esc_html($l->name); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <span class="flecha"></span>
        </div>

        <!-- TALLA -->
        <div class="select-container select-full">
            <select id="filtro-talla" class="select-custom">
                <option value="">Talla</option>
                <?php
                $tallas = get_terms(['taxonomy'=>'pa_talla','hide_empty'=>true]);
                foreach ($tallas as $t):
                ?>
                    <option value="<?= esc_attr($t->slug); ?>">
                        <?= esc_html($t->name); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <span class="flecha"></span>
        </div>

    </div>

    <!-- PRECIO -->
    <div class="filtro-precio">
        <h3>Precio</h3>

        <div class="precio-valores">
            <span id="precio-min-label">$1.000</span>
            <span id="precio-max-label">$120.000</span>
        </div>

        <div class="slider-precio">
            <input type="range" id="precio-min" min="1000" max="120000" step="1000" value="1000">
            <input type="range" id="precio-max" min="1000" max="120000" step="1000" value="120000">
        </div>
    </div>

</section>
