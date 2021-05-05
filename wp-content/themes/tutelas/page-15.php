
<?php get_header();?>

<?php the_content(); ?>
<!--Quienes somos-->

<div class="container">
<div class="row cuadro_consulta shadow">
  <div class="col-md-8">
<!-- <p class="titulo_q">Consulta tu primera asesoría gratis</p> -->
<?php echo get_post_meta(get_the_ID(),'tut_homepage_titulo_azul_consulta', true); ?>
<?php echo get_post_meta(get_the_ID(),'tut_homepage_texto_consulta', true); ?>
<!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p> -->

  </div>
  <div class="col-md-4 items-justified-center justify-content-center">
  <button class="btn btn_consulta">¡Ir ahora!</button> 
  </div>  
</div>
</div>

<div class="container">
    
    <div class="row div_q" style=" background-image:url(<?php echo get_post_meta(get_the_ID(),'tut_homepage_imagen_triangulo_izquierda', true); ?>);">
    <div class="col-md-5 div_imagen_q" style="background-image:url(<?php echo get_post_meta(get_the_ID(),'tut_homepage_imagen', true); ?>);">
  
        </div>
        <div class="col-md-7" >   
          <br>                
                    <!-- <p class="titulo_q">Bienvenido a</p> -->
                    <?php echo get_post_meta(get_the_ID(),'tut_homepage_titulo_azul', true); ?>
                    <br>
                    <?php echo get_post_meta(get_the_ID(),'tut_homepage_titulo_negro', true); ?>
                    
                    <div>
                        <div class="cuadroazul"></div>
                    </div>
                    <?php echo get_post_meta(get_the_ID(),'tut_homepage_texto_quienes_somos', true); ?> 
                    <br>
                   <div class="separador_q_2">
                   <img class="separador_q" src="<?php echo  get_template_directory_uri(); ?>/img/1.png" >
                   <img class="separador_q" src="<?php echo  get_template_directory_uri(); ?>/img/2.png" >
                   <img class="separador_q" src="<?php echo  get_template_directory_uri(); ?>/img/3.png" >
                   </div>

                   <?php $quienes_somos = get_page_by_title('Quiénes somos'); ?>
                   <a href="<?php echo get_permalink($quienes_somos->ID); ?>" class="btn btn-dark">Ver más</a>           
        </div>
    </div>
</div>

<!-- FIN Quienes somos-->
<!--Nuestros servicios-->

<div class="container-fluid p-0 m-0 contenedorNuestrosServicios text-center  justify-content-center">

    <p class="titulo_ns">Acerca de</p>
    <h2 class="titulo2_ns">Nuestros Servicios</h2>
    <div class="row  justify-content-center">
                            <div class="cuadroazul"></div>
    </div>

    <div class="row justify-content-center text-center ">
    <div class="card">
      <div class="card-body justify-content-center text-center ">
      <img class="" src="<?php echo  get_template_directory_uri(); ?>/img/1.png" >
        <h6 >Asesorías virtuales</h6>
        <p class="texto_ns">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
    
      </div>
    </div>


    <div class="card">
      <div class="card-body justify-content-center text-center">
      <img  src="<?php echo  get_template_directory_uri(); ?>/img/4.png" >   
        <h6 >Elaboración de documentos legales</h6>  
        <p class="texto_ns">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
    
      </div>
    </div>

    <div class="card">
      <div class="card-body justify-content-center text-center">
      <img  src="<?php echo  get_template_directory_uri(); ?>/img/1.png" > 
        <h6 >Ingreso de información y respuestas</h6>  
        <p class="texto_ns">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p> 
      </div>
    </div>


</div>



    
    </div>

<!-- FIN Nuestros servicios-->

<!-- ............................. -->

<div class="container">
    
    <div class="row d-flex flex-md-row-reverse  div_conoce" style="background-image:url(<?php echo get_post_meta(get_the_ID(),'tut_homepage_imagen_triangulo_derecha', true); ?>);">
        
    <div class="col-md-5 div_imagen_conoce" style="background-image:url(<?php echo get_post_meta(get_the_ID(),'tut_homepage_imagen_conoce', true); ?>);">   
      
                            
        </div>
    
    <div class="col-md-7 ">
        <!-- <p class="titulo_q">Conoce</p> -->
        <?php echo get_post_meta(get_the_ID(),'tut_homepage_titulo_azul_conoce', true); ?>
          <br> <br>
        <?php echo get_post_meta(get_the_ID(),'tut_homepage_titulo_negro_conoce', true); ?>
                    <!-- <h2>El ABC de la acción de tutela</h2> -->
                    <div>
                        <div class="cuadroazul"></div>
                    </div>

                   

                    <?php echo get_post_meta(get_the_ID(),'tut_homepage_texto_negro_conoce', true); ?>
                    <!-- <p class="texto_q"> La accion de Tutela es la herramienta legal mediante la cual todas las personas que se encuentran dentro del territorio nacional pueden hacer valer sus derechosfundamentales por si mismos o por medio de un tercero o por medio de un abogado. Siendo un proceso ágil toda vez que debe resolverse por el juez de tutela dentro de los 10 DIAS HABILES siguientes alrecibo de la demanda de tutela por el despacho judicial.</p> -->
                   <div class="row separador_item">
                   <div>
                     <img class=" chulo" src="<?php echo  get_template_directory_uri(); ?>/img/6.png" >
                     </div>
                     <?php echo get_post_meta(get_the_ID(),'tut_homepage_item_1_conoce', true); ?>
                  <!-- <p>Derecho de petición</p> -->
                   </div>
                   <div class="row separador_item">
                     <div>
                     <img class="chulo" src="<?php echo  get_template_directory_uri(); ?>/img/6.png" >
                     </div>
                     <?php echo get_post_meta(get_the_ID(),'tut_homepage_item_2_conoce', true); ?>
                  <!-- <p>Derecho a la salud</p> -->
                   </div>
                   <div class="row separador_item">
                   <div>
                     <img class=" chulo" src="<?php echo  get_template_directory_uri(); ?>/img/6.png" >
                     </div>
                     <?php echo get_post_meta(get_the_ID(),'tut_homepage_item_3_conoce', true); ?>
                  <!-- <p>Mínimo vital</p> -->
                   </div>
                   <div class="row separador_item">
                   <div>
                     <img class=" chulo" src="<?php echo  get_template_directory_uri(); ?>/img/6.png" >
                     </div>
                     <?php echo get_post_meta(get_the_ID(),'tut_homepage_item_4_conoce', true); ?>
                  <!-- <p>Derecho al debido proceso</p> -->
                   </div>                
                  
                   <button class="btn ">Ver más</button>         
        </div>  
    </div>
</div>

<!-- ............................. -->

<!-- INICIO SECCION TRES PASOS -->


<div class="container-fluid">

<div class="row div_pasos">
  <div class="col-md-6 imagen_pasos" style="background-image:url(<?php echo get_post_meta(get_the_ID(),'tut_homepage_imagen_pasos', true); ?>);">

  </div>

  <div class="col-md-6 texto_pasos ">
    <div class="row">
    <div class="col-2 circulo text-center "><p>1</p></div> <div class="col-8 p_pasos">Registra los datos personales del denunciante.</div>
    </div>
    <div class="row">
    <div class="col-2  circulo text-center "><p>2</p></div>  <div class="col-8 p_pasos">Llena los datos del denunciado.</div>
    </div>
    <div class="row">
    <div class="col-2 circulo text-center "><p>3</p></div> <div class="col-8 p_pasos">Anexa la información pendiente sobre la razón de la solicitud. </div>
    </div>
  </div>
</div>



</div>

</div>


<!-- FIN SECCION TRES PASOS -->    

    <?php get_footer(); ?>