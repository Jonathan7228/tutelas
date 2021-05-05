<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
 <?php wp_head(); ?>
</head>
<body >



<header class="header">
    <div class="container-fluid">
        <div class="row contenido_navbar justify-content-center align-items-center">
            <div class="col-md-2 mb-4 mb-md-0">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo  get_template_directory_uri(); ?>/img/logo.png" class="img-fluid">
                </a>
            </div>
            <div class="col-md-8">
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
            <!-- <div class=" col-1 col-md-1"> <button  class="boton_haz_tutela"><a href="https://tutelas.tmssas.com/test/?flujo=1&tutela=1" style="text-docoration: none; color: black;"> Haz tu tutela</a></button></div>
            
            
        </div> -->
    </div>
</header>

<?php the_content(); ?>