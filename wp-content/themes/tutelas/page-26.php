<?php get_header(); ?>

<div class="container">
    <div class="row servicios_conoce">
        <div class="col-md-6">
            <?php echo get_post_meta(get_the_ID(),'tut_servicios_titulo_azul_conoce', true); ?>
            <br>
            <?php echo get_post_meta(get_the_ID(),'tut_servicios_titulo_negro_conoce', true); ?>
            <br>
            <div class="cuadroazul"></div>
        </div>

    
        <div class="col-md-6 text-left servicio_conoce_negro">

            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type </p>

        </div>
    </div>

    <div class="row servicios_cuadriculas">
        <div class="col-md-6" style="background-image:url(<?php echo get_post_meta(get_the_ID(),'tut_servicios_imagen_servicio_1', true); ?>);">

        </div>
        <div class="col-md-6">
            <?php echo get_post_meta(get_the_ID(),'tut_servicios_titulo_azul_servicio1', true); ?>
            <br>
            <?php echo get_post_meta(get_the_ID(),'tut_servicios_titulo_negro_servicio1', true); ?>
            <br>
            <?php echo get_post_meta(get_the_ID(),'tut_servicios_texto_servicio1', true); ?>
            <br>
            <a href="<?php echo get_permalink($quienes_somos->ID); ?>" class="btn btn-dark">Elabora tu tutela</a>  
        </div>

    </div>

    <div class="row servicios_cuadriculas">
        <div class="col-md-6 ">

            <?php echo get_post_meta(get_the_ID(),'tut_servicios_titulo_azul_servicio2', true); ?>
            <br>
            <?php echo get_post_meta(get_the_ID(),'tut_servicios_titulo_negro_servicio2', true); ?>
            <br>
            <?php echo get_post_meta(get_the_ID(),'tut_servicios_texto_servicio2', true); ?>
            <br>
            <a href="<?php echo get_permalink($quienes_somos->ID); ?>" class="btn btn-dark">Elabora tu tutela</a>              

        </div>
        <div class="col-md-6" style="background-image:url(<?php echo get_post_meta(get_the_ID(),'tut_servicios_imagen_servicio_2', true); ?>);">

        </div>
    </div>


</div>


<div class="container-fluid text-center" style="backgroud-color: black">
<?php echo do_shortcode('[carousel_slide id="125"]'); ?>
</div>


<div class="container contacto_servicios"> 
<div class="row ">
    <div class="col-md-6 alinear">
        <p style="color: blue; " >Solicita</p>
<h2>Informacion</h2>
 <div class="cuadroazul"></div>
<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
    </div>
    <div class="col-md-6 formulario_servicios">
        <div class="div_contacto shadow">
            <h5>Estamos para ayudarte</h5>
        
        <?php echo do_shortcode('[contact-form-7 id="245" title="Formulario de contacto 1"]'); ?>
        </div>
        
    </div>
</div>

</div>

<script type="text/javascript">
    document.getElementsByName('your-message')[0].placeholder = "Mensaje";
    document.getElementsByName('your-message')[0].classList.add("input_formulario_servicios");
    document.getElementsByName('your-message')[0].classList.add("input_mensaje");
    
     document.getElementsByName('your-subject')[0].placeholder = "Asunto";
    document.getElementsByName('your-subject')[0].classList.add("input_formulario_servicios");
    
    

       document.getElementsByName('your-email')[0].placeholder = "Correo electrónico";
       document.getElementsByName('your-email')[0].classList.add("input_formulario_servicios");
  
</script>



<?php get_footer(); ?>