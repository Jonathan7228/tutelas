<?php


/*
Agregar CMB2
*/
require_once dirname(__FILE__) . '/cmb2.php';

/*Cargar campos personalizados*/

require_once dirname(__FILE__) . '/inc/custom-fields.php';

/*
* Funciones que se cargan al activar el Tema theme
 */

 function tut_setup(){
     // Menu de navegación 
     register_nav_menus(array(
    'menu_principal' => esc_html__('Menu Principal', 'tutelas'),
    'menu_footer' => esc_html__('Menu Footer', 'tutelas')

     ));
 }
 add_action('after_setup_theme', 'tut_setup');

/*
* Agrega la clase nav-link de bootstrap al menu principal  
*/

function tut_enlace_class($atts, $item, $args){
if($args->theme_location == 'menu_principal'){
 $atts['class'] = 'nav-link';
}else if($args->theme_location == 'menu_footer'){
    $atts['class'] = 'nav-link';
}

return $atts;

}
add_filter('nav_menu_link_attributes', 'tut_enlace_class', 10, 3);


if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );

/*
Aqui se cargan los Scripts y CSS del Tema
*/

function tut_scripts(){

wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css', false, '4.1.3');
wp_enqueue_style('style', get_stylesheet_uri(), array('bootstrap-css'));


/*Scripts*/
wp_enqueue_script('jquery');
wp_enqueue_script('popper', get_template_directory_uri() . '/js/popper.js', array('jquery'), '1.0', true);
wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('popper'),'1.0', true);
wp_enqueue_script('tutelas-js', get_template_directory_uri() . '/js/tutelas.js', array('bootstrap-js'),'1.0', true);

}
add_action('wp_enqueue_scripts', 'tut_scripts');

