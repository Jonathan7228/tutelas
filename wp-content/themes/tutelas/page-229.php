<?php get_header(); ?>

<?php while(have_posts()): the_post(); ?>




<div class="container quienes_conoce">
<?php echo get_post_meta(get_the_ID(),'tut_quienes_titulo_azul_quienes', true); ?>
    <h2>Sobre nosotros</h2>
    <div class="cuadroazul linea_azul_quienes"></div>
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
</div>




<!--INICIO COLLAGE -->

<div class="container-fluid quienes_collage" style="background-image:url(<?php echo get_post_meta(get_the_ID(),'tut_quienes_imagen_triangulo_izquierda', true); ?>);"> 
    <div class="row">
        <div class="col-md-6 ">
            <div class="row collage1 borde" style="background-image:url(<?php echo get_post_meta(get_the_ID(),'tut_quienes_imagen_collage_1', true); ?>);">

            </div>
            <div class="row collage1 borde">
                <div class="col-6" style="background-image:url(<?php echo get_post_meta(get_the_ID(),'tut_quienes_imagen_collage_2', true); ?>);">

                </div>
                <div class="col-6 borde" style="background-image:url(<?php echo get_post_meta(get_the_ID(),'tut_quienes_imagen_collage_3', true); ?>);">

                </div>

            </div>
        </div>
        <div class="col-md-6 p-0 m-0">
            <div class="row">
            <div class="col-6 borde" style="background-image:url(<?php echo get_post_meta(get_the_ID(),'tut_quienes_imagen_collage_4', true); ?>);">

            </div>

            <div class="col-6 p-0 m-0">
                <div class="row collage1 borde" style="background-image:url(<?php echo get_post_meta(get_the_ID(),'tut_quienes_imagen_collage_5', true); ?>);">

                </div>
                <div class="row collage1 borde" style="background-image:url(<?php echo get_post_meta(get_the_ID(),'tut_quienes_imagen_collage_6', true); ?>);">

                </div>

                </div>


            </div>



        </div>

    </div>

</div>


<!--FIN COLLAGE -->


<!--INICIO PROCESOS -->



<div class="container  text-center  justify-content-center">

    <p>Nuestros</p>
    <h2>Procesos</h2>
    <div class="row  justify-content-center">
     <div class="cuadroazul"></div>
    </div>

    <div class="row text-left div_texto_procesos">

        <div class="row linea">
                <div class="col-md-6">
                <img class="" src="<?php echo  get_template_directory_uri(); ?>/img/7.png" >
                <p>Hola La Acción de Tutela es la herramienta legal mediante la cual todas las personas que se encuentren dentro del territorio nacional pueden hacer valer sus Derechos fundamentales por si mismos o por medio de un tercero o por medio de un abogado. Siendo un proceso ágil toda vez que debe resolverse por el juez de tutela dentro de los 10 DÍAS HÁBILES siguientes alrecibo de la demanda de tutela por el despacho judicial.</p>
                </div>
                <div class="col-md-6">
                <img class="" src="<?php echo  get_template_directory_uri(); ?>/img/3.png" >
                <p>HOLA La Acción de Tutela es la herramienta legal mediante la cual todas las personas que se encuentren dentro del territorio nacional pueden hacer valer sus Derechos fundamentales por si mismos o por medio de un tercero o por medio de un abogado. Siendo un proceso ágil toda vez que debe resolverse por el juez de tutela dentro de los 10 DÍAS HÁBILES siguientes alrecibo de la demanda de tutela por el despacho judicial.</p>
                </div>
        </div>
      
     
        <div class="row">
                <div class="col-md-6">
                <img class="" src="<?php echo  get_template_directory_uri(); ?>/img/2.png" >
                <p>La Acción de Tutela es la herramienta legal mediante la cual todas las personas que se encuentren dentro del territorio nacional pueden hacer valer sus Derechos fundamentales por si mismos o por medio de un tercero o por medio de un abogado. Siendo un proceso ágil toda vez que debe resolverse por el juez de tutela dentro de los 10 DÍAS HÁBILES siguientes alrecibo de la demanda de tutela por el despacho judicial.</p>
                </div>
                <div class="col-md-6">
                <img class="" src="<?php echo  get_template_directory_uri(); ?>/img/8.png" >
                <p>La Acción de Tutela es la herramienta legal mediante la cual todas las personas que se encuentren dentro del territorio nacional pueden hacer valer sus Derechos fundamentales por si mismos o por medio de un tercero o por medio de un abogado. Siendo un proceso ágil toda vez que debe resolverse por el juez de tutela dentro de los 10 DÍAS HÁBILES siguientes alrecibo de la demanda de tutela por el despacho judicial.</p>
                </div>
        </div>

   
    </div>


</div>

<!--FIN PROCESOS -->

<!--INICIO CONSULTA -->

<div class="container-fluid div_quienes_consulta">
    <div class="container justify-content-center">
    <div class="row align-items-center justify-content-center">
    <div class="col-md-8 text-center">
        <h2>Consulta tu primera asesoría gratis</h2>
    </div>
    <div class="col-md-4 align-items-center justify-content-center">
        <a href="" class="btn btn_quienes_consulta"> ¡Consultar ahora!</a>
    </div>
</div>
    </div>



</div>

<!--FIN CONSULTA -->

<?php endwhile;?>

<div class="container  quienes_carousel">
    <div class="row">
    <div class="col-md-4 text-left">
        <p>Conoce</p>
        <h2>Nuestro equipo</h2>
        <div class="row ml-  justify-content-left">
        <div class="cuadroazul"></div>
    </div>
    </div>
    <div class="col-md-8">
    <?php echo do_shortcode('[sp_wpcarousel id="110"]'); ?>



    <!--  [sp_wpcarousel id="109"] -->
 
    </div>
    </div>
  
</div>





<?php get_footer(); ?>