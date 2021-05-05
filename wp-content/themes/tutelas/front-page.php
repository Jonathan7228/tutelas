
<?php get_header();?>


<!--Quienes somos-->

<div class="container">
<div class="row cuadro_consulta shadow">
  <div class="col-md-8">
<!-- <p class="titulo_q">Consulta tu primera asesoría gratis</p> -->
<?php echo get_post_meta(get_the_ID(),'tut_homepage_titulo_azul_consulta', true); ?>
<br><br>
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
<br>
    <?php echo get_post_meta(get_the_ID(),'tut_homepage_titulo_azul_tarjetas', true); ?>
    <br>
    <?php echo get_post_meta(get_the_ID(),'tut_homepage_titulo_blanco_tarjetas', true); ?>
    <div class="row  justify-content-center">
                            <div class="cuadroazul"></div>
    </div>

    <div class="row justify-content-center text-center ">
    <div class="card">
      <div class="card-body justify-content-center text-center ">
      <img class="" src="<?php echo  get_template_directory_uri(); ?>/img/1.png" >
  <h6 >  <?php echo get_post_meta(get_the_ID(),'tut_homepage_titulo_tarjeta1', true); ?></h6>
        <p class="texto_ns">  <?php echo get_post_meta(get_the_ID(),'tut_homepage_texto_tarjeta1', true); ?></p>
    
      </div>
    </div>


    <div class="card">
      <div class="card-body justify-content-center text-center">
      <img  src="<?php echo  get_template_directory_uri(); ?>/img/4.png" >   
   <h6 >  <?php echo get_post_meta(get_the_ID(),'tut_homepage_titulo_tarjeta2', true); ?></h6>
        <p class="texto_ns">  <?php echo get_post_meta(get_the_ID(),'tut_homepage_texto_tarjeta2', true); ?></p>
    
      </div>
    </div>

    <div class="card">
      <div class="card-body justify-content-center text-center">
      <img  src="<?php echo  get_template_directory_uri(); ?>/img/1.png" > 
        <h6 >  <?php echo get_post_meta(get_the_ID(),'tut_homepage_titulo_tarjeta3', true); ?></h6>
        <p class="texto_ns">  <?php echo get_post_meta(get_the_ID(),'tut_homepage_texto_tarjeta3', true); ?></p>
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
                        <?php echo get_post_meta(get_the_ID(),'tut_homepage_item_1_conoce', true); ?>
                     </div>
                  
                  <!-- <p>Derecho de petición</p> -->
                   </div>
                   <div class="row separador_item">
                     <div>
                     <img class="chulo" src="<?php echo  get_template_directory_uri(); ?>/img/6.png" >
                     <?php echo get_post_meta(get_the_ID(),'tut_homepage_item_2_conoce', true); ?>
                     </div>
                     
                  <!-- <p>Derecho a la salud</p> -->
                   </div>
                   <div class="row separador_item">
                   <div>
                     <img class=" chulo" src="<?php echo  get_template_directory_uri(); ?>/img/6.png" >
                      <?php echo get_post_meta(get_the_ID(),'tut_homepage_item_3_conoce', true); ?>
                     </div>
                    
                  <!-- <p>Mínimo vital</p> -->
                   </div>
                   <div class="row separador_item">
                   <div>
                     <img class=" chulo" src="<?php echo  get_template_directory_uri(); ?>/img/6.png" >
                       <?php echo get_post_meta(get_the_ID(),'tut_homepage_item_4_conoce', true); ?>
                     </div>
                   
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
    document.getElementsByName('your-message')[0].placeholder = "Escribe tu queja";
    document.getElementsByName('your-message')[0].classList.add("input_formulario_servicios");
    document.getElementsByName('your-message')[0].classList.add("input_mensaje");
    
     document.getElementsByName('your-subject')[0].placeholder = "Asunto";
    document.getElementsByName('your-subject')[0].classList.add("input_formulario_servicios");
    
    

       document.getElementsByName('your-email')[0].placeholder = "Correo electrónico";
       document.getElementsByName('your-email')[0].classList.add("input_formulario_servicios");
  
</script>

    <?php get_footer(); ?>