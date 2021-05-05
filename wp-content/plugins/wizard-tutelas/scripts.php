<?php 
function  wpb_scripts_wizard_tutelas(){
	

		
	wp_register_script('validator', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js', '', '5', true );
	wp_enqueue_script('validator');

	wp_register_script('scripts', plugin_dir_url( __FILE__ ).'assets/js/scripts.js', '', '5', true );
	wp_enqueue_script('scripts');

	





	
	/*wp_localize_script( 'general', 'ajax_var', array(

        'ajaxurl'=> admin_url( 'admin-ajax.php' )
    ) );*/


	/* wp_register_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css' );

	
	wp_register_script('html2canvas', 'https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.0/html2canvas.min.js', '', '5', true );


	wp_localize_script( 'general', 'ajax_var', array(
        'url'    => plugin_dir_url( __FILE__ ).'shortcodes/save.php',
        'urlpdf'    => plugin_dir_url( __FILE__ ).'shortcodes/pdf.php',
        'ajaxurl'=> admin_url( 'admin-ajax.php' ),
        'results'=> plugin_dir_url( __FILE__ ).'shortcodes/marketing_grader_result.php'
    ) );

	
	wp_enqueue_style( 'load-fa' );
	
	wp_enqueue_script('chart');
	wp_enqueue_script('html2canvas');

	*/
	
}
add_action( 'wp_enqueue_scripts', 'wpb_scripts_wizard_tutelas' );
?>