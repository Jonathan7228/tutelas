<?php 
/*
 *  Bootstrap Styles and scripts
 */
wp_register_style( 'bootstrap.min', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css' );
wp_enqueue_style('bootstrap.min');
//Bootstrap Scripts
wp_register_script( 'bootstrap.min', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js' );
wp_enqueue_script('bootstrap.min');
//Google Jquery
wp_register_script( 'jquery.min', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js');
wp_enqueue_script('jquery.min');

function wizard_menu_administrador_top()
{
 add_menu_page('Flujos','Flujos','manage_options',WIZARD_RUTA . '/admin/adminflujo.php');
}

function wizard_menu_administrador_sub()
{
 
 add_submenu_page(WIZARD_RUTA. '/admin/adminflujo.php','Formularios','Formularios','manage_options', WIZARD_RUTA . '/admin/adminforms.php');
 add_submenu_page(WIZARD_RUTA. '/admin/adminflujo.php','Tutelas','Tutelas','manage_options', WIZARD_RUTA . '/admin/viewtutelas.php');


}

add_action( 'admin_menu', 'wizard_menu_administrador_top' );
add_action( 'admin_menu', 'wizard_menu_administrador_sub' );

?>