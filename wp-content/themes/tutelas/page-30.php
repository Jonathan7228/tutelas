<?php get_header(); ?>
<div class="container-fluid">
    <div class="row formulario_iniciosesion">
        <div class="col-md-6">
            <div class="row encabezado_inicio_sesion">
                
                <div class="col-12">
                        <?php echo get_post_meta(get_the_ID(),'tut_iniciosesion_titulo_azul_iniciosesion', true); ?>
                 </div>
                
                <div class="col-12">
                      <?php echo get_post_meta(get_the_ID(),'tut_iniciosesion_titulo_negro_iniciosesion', true); ?>
                </div>
                    
                    <div class="cuadroazul"></div>
            </div>
            
              <div class="row">
                <?php echo do_shortcode('[ultimatemember form_id="160"]'); ?>
            </div>
            
           
            
            
        </div>
        <div class="col-md-6 imagen_iniciosesion" style="background-image:url(<?php echo get_post_meta(get_the_ID(),'tut_iniciosesion_imagen_iniciosesion', true); ?>);">
        </div>
    </div>

</div>
<?php get_footer(); ?>