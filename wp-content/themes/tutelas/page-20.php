<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <?php wp_head(); ?>
 
     <style>
        .div_contacto{
            border: 1px solid black!important;
        }
    </style>
</head>
<body >



<header class="header">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-3 col-8 mb-4 mb-md-0">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo  get_template_directory_uri(); ?>/img/logo.png" class="img-fluid">
                </a>
            </div>
            <div class="col-12 col-md-8">
               <nav class="navbar navbar-expand-md navbar-light  justify-content-center ">
                  <button  class="navbar-toggler mb-4" type="button" data-toggle="collapse"
                  data-target="#nav_principal" aria-expanded="false" type="button">
                          <span class="navbar-toggler-icon"></span>
                  </button>
                

                    <?php 
                        $args = array(
                            'menu_class' => 'nav nav-justified flex-column flex-md-row text-center justify-content-lg-end',
                            'container_id' => 'nav_principal',
                            'container_class' =>  'collapse navbar-collapse justify-content-center justify-content-lg-end text-uppercase',
                            'theme_location' => 'menu_principal'
                        );
                                wp_nav_menu($args);
                        ?>
         
                </nav>
                
                
            </div>
            <div class=" col-1 col-md-1"> <button  class="boton_haz_tutela"><a href="https://tutelas.tmssas.com/test/?flujo=1&tutela=1" style="text-docoration: none; color: black;"> Haz tu tutela</a></button></div>
            
            
        </div>
    </div>

</header>




<div class="container-fluid contacto_contacto"> 
<div class="row ">
    <div class="col-md-6 alinear1 left">
        <p style="color: #5cdaed; " >Te ayudamos</p>
<h2 > Contáctanos ahora mismo</h2>
 <div class="cuadroazul"></div>
 <br>
 <br>
<p><img class="logos_contacto" src="<?php echo  get_template_directory_uri(); ?>/img/telefonoblanco.svg" > 45067758</p>
<br>

<p><img class="logos_contacto"  src="<?php echo  get_template_directory_uri(); ?>/img/location.svg" > Medellin</p>

<br>


<p><img class="logos_contacto"  src="<?php echo  get_template_directory_uri(); ?>/img/email.svg" > info@tutelas.com</p>
<br>
<br>



<div class="redes_contacto">
   <img  class="redes_contacto_youtube" src="<?php echo  get_template_directory_uri(); ?>/img/youtube.png" > 
      <img  src="<?php echo  get_template_directory_uri(); ?>/img/fb.svg" > 
    
</div>





    </div>
    <div class="col-md-6 formulario_servicios">
        <div class="div_contacto shadow">
            <h5 style="color: black">Llena la siguiente información</h5>

        
        <?php echo do_shortcode('[contact-form-7 id="245" title="Formulario de contacto 1"]'); ?>
        </div>
        
    </div>
</div>

</div>




<?php the_content(); ?>

<script type="text/javascript">
    document.getElementsByName('your-message')[0].placeholder = "Mensaje";
    document.getElementsByName('your-message')[0].classList.add("input_formulario_servicios");
    document.getElementsByName('your-message')[0].classList.add("input_mensaje");
    
     document.getElementsByName('your-subject')[0].placeholder = "Asunto";
    document.getElementsByName('your-subject')[0].classList.add("input_formulario_servicios");
    
    

       document.getElementsByName('your-email')[0].placeholder = "Correo electrónico";
       document.getElementsByName('your-email')[0].classList.add("input_formulario_servicios");
 
  
</script>


<script>
    
    var contenedor_test = document.querySelector('#content-full-result');
    contenedor_test.classList.add('text-center');
   
   
      var boton = document.querySelector('#btn2');
            boton.style.backgroundColor = "#5cdaed";
       
 
     
     
     
 
    
    
</script>


<footer class="footer">
        <div class="container imagen-footer">   
     
          
             
            <div class="row justify-content-between ">
                <div class="col-md-4">

                    <img class="logo_footer" src="<?php echo  get_template_directory_uri(); ?>/img/logo@2x.png" >
                    <p class="text-left texto_footer">
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly believable. 
                    </p>
                </div>
                <div class="col-md-4">

                    <h6 class="text-left titulo_menu">Menu</h6>
                   

                        <?php
                        $args = array(
                            'menu_class' => 'nav nav-footer  text-left',                            
                            'theme_location' => 'menu_footer'
                        );
                        wp_nav_menu($args);
                        ?> 
                </div>
                <div class="col-md-4">
                   
                   
                </div>
            </div>
        </div>
       
</footer>
<div class="container-fluid linea_footer text-center">
            <h6 class="copyright">Copyright &#169 <?php echo date('Y')?> Branch</h6>
</div>



</body>
</html>



