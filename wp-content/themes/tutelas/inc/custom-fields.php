<?php 
add_action( 'cmb2_admin_init', 'tut_campos_homepage');
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
 /*
  *  PAGINA DE INICIO
   */
function tut_campos_homepage() {
$prefix = 'tut_homepage_';
$id_home = get_option('page_on_front');
	/**
	 * Metabox to be displayed on a single page ID
	 */
	$tut_campos_homepage = new_cmb2_box( array(
		'id'           => $prefix . 'homepage',
		'title'        => esc_html__( 'Campos Homepage', 'cmb2' ),
		'object_types' => array( 'page' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array(
			'id' => array( $id_home ),
		), // Specific post IDs to display this metabox
	) );
	

	$tut_campos_homepage->add_field( array(
		'name'    => esc_html__( 'titulo azul consulta', 'cmb2' ),
		'desc'    => esc_html__( 'titulo azul para consulta', 'cmb2' ),
		'id'      => $prefix . 'titulo_azul_consulta',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
	) );
	
	$tut_campos_homepage->add_field( array(
		'name'    => esc_html__( 'texto consulta', 'cmb2' ),
		'desc'    => esc_html__( 'texto para consulta', 'cmb2' ),
		'id'      => $prefix . 'texto_consulta',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 2,
		),
    ) );



    $tut_campos_homepage->add_field( array(
		'name' => esc_html__( 'imagen q', 'cmb2' ),
		'desc' => esc_html__( 'Imagen para la seccion quiénes somos', 'cmb2' ),
		'id'   => $prefix . 'imagen',
		'type' => 'file',
    ) );
    
    $tut_campos_homepage->add_field( array(
		'name' => esc_html__( 'triangulo azul', 'cmb2' ),
		'desc' => esc_html__( 'Imagen azul para la seccion quiénes somos', 'cmb2' ),
		'id'   => $prefix . 'imagen_triangulo_izquierda',
		'type' => 'file',
	) );


    $tut_campos_homepage->add_field( array(
		'name'    => esc_html__( 'titulo azul', 'cmb2' ),
		'desc'    => esc_html__( 'titulo azul para el quienes somos', 'cmb2' ),
		'id'      => $prefix . 'titulo_azul',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
    ) );
    
    $tut_campos_homepage->add_field( array(
		'name'    => esc_html__( 'titulo negro', 'cmb2' ),
		'desc'    => esc_html__( 'titulo negro para el quienes somos', 'cmb2' ),
		'id'      => $prefix . 'titulo_negro',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
    ) );
    
    $tut_campos_homepage->add_field( array(
		'name'    => esc_html__( 'texto quienes somos', 'cmb2' ),
		'desc'    => esc_html__( 'texto para el quienes somos', 'cmb2' ),
		'id'      => $prefix . 'texto_quienes_somos',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );
	
	
	    $tut_campos_homepage->add_field( array(
		'name'    => esc_html__( 'titulo azul tarjetas', 'cmb2' ),
		'desc'    => esc_html__( 'titulo azul tarjetas', 'cmb2' ),
		'id'      => $prefix . 'titulo_azul_tarjetas',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
    ) );
    
    
    	    $tut_campos_homepage->add_field( array(
		'name'    => esc_html__( 'titulo blanco tarjetas', 'cmb2' ),
		'desc'    => esc_html__( 'titulo blanco tarjetas', 'cmb2' ),
		'id'      => $prefix . 'titulo_blanco_tarjetas',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
    ) );
    
    
        	    $tut_campos_homepage->add_field( array(
		'name'    => esc_html__( 'titulo tarjeta 1', 'cmb2' ),
		'desc'    => esc_html__( 'titulo tarjeta 1', 'cmb2' ),
		'id'      => $prefix . 'titulo_tarjeta1',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
    ) );
    
        	    $tut_campos_homepage->add_field( array(
		'name'    => esc_html__( 'texto tarjeta 1', 'cmb2' ),
		'desc'    => esc_html__( 'texto tarjeta 1', 'cmb2' ),
		'id'      => $prefix . 'texto_tarjeta1',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
    ) );
    
          	    $tut_campos_homepage->add_field( array(
		'name'    => esc_html__( 'titulo tarjeta 2', 'cmb2' ),
		'desc'    => esc_html__( 'titulo tarjeta 2', 'cmb2' ),
		'id'      => $prefix . 'titulo_tarjeta2',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
    ) );
    
        	    $tut_campos_homepage->add_field( array(
		'name'    => esc_html__( 'texto tarjeta 2', 'cmb2' ),
		'desc'    => esc_html__( 'texto tarjeta 2', 'cmb2' ),
		'id'      => $prefix . 'texto_tarjeta2',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
    ) );
    
        
          	    $tut_campos_homepage->add_field( array(
		'name'    => esc_html__( 'titulo tarjeta 3', 'cmb2' ),
		'desc'    => esc_html__( 'titulo tarjeta 3', 'cmb2' ),
		'id'      => $prefix . 'titulo_tarjeta3',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
    ) );
    
        	    $tut_campos_homepage->add_field( array(
		'name'    => esc_html__( 'texto tarjeta 3', 'cmb2' ),
		'desc'    => esc_html__( 'texto tarjeta 3', 'cmb2' ),
		'id'      => $prefix . 'texto_tarjeta3',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
    ) );
    


	$tut_campos_homepage->add_field( array(
		'name'    => esc_html__( 'titulo conoce', 'cmb2' ),
		'desc'    => esc_html__( 'Titulo azul conoce', 'cmb2' ),
		'id'      => $prefix . 'titulo_azul_conoce',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
	) );

	$tut_campos_homepage->add_field( array(
		'name'    => esc_html__( 'titulo conoce', 'cmb2' ),
		'desc'    => esc_html__( 'Titulo azul conoce', 'cmb2' ),
		'id'      => $prefix . 'titulo_azul_conoce',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
	) );

	$tut_campos_homepage->add_field( array(
		'name'    => esc_html__( 'titulo negro conoce', 'cmb2' ),
		'desc'    => esc_html__( 'Titulo azul conoce', 'cmb2' ),
		'id'      => $prefix . 'titulo_negro_conoce',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
	) );


	$tut_campos_homepage->add_field( array(
		'name'    => esc_html__( 'texto negro conoce', 'cmb2' ),
		'desc'    => esc_html__( 'texto negro de la seccion conoce', 'cmb2' ),
		'id'      => $prefix . 'texto_negro_conoce',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 6,
		),
	) );

	$tut_campos_homepage->add_field( array(
		'name'    => esc_html__( 'item 1 conoce', 'cmb2' ),
		'desc'    => esc_html__( 'items', 'cmb2' ),
		'id'      => $prefix . 'item_1_conoce',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
	) );



	$tut_campos_homepage->add_field( array(
		'name'    => esc_html__( 'item 2 conoce', 'cmb2' ),
		'desc'    => esc_html__( 'items', 'cmb2' ),
		'id'      => $prefix . 'item_2_conoce',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
	) );


	$tut_campos_homepage->add_field( array(
		'name'    => esc_html__( 'item 3 conoce', 'cmb2' ),
		'desc'    => esc_html__( 'items', 'cmb2' ),
		'id'      => $prefix . 'item_3_conoce',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
	) );



	$tut_campos_homepage->add_field( array(
		'name'    => esc_html__( 'item 4 conoce', 'cmb2' ),
		'desc'    => esc_html__( 'items', 'cmb2' ),
		'id'      => $prefix . 'item_4_conoce',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
	) );

	$tut_campos_homepage->add_field( array(
		'name' => esc_html__( 'triangulo azul derecha', 'cmb2' ),
		'desc' => esc_html__( 'Imagen azul para la seccion de conoce', 'cmb2' ),
		'id'   => $prefix . 'imagen_triangulo_derecha',
		'type' => 'file',
	) );

	$tut_campos_homepage->add_field( array(
		'name' => esc_html__( 'imagen conoce', 'cmb2' ),
		'desc' => esc_html__( 'Imagen para la seccion de conoce', 'cmb2' ),
		'id'   => $prefix . 'imagen_conoce',
		'type' => 'file',
	) );




	$tut_campos_homepage->add_field( array(
		'name' => esc_html__( 'imagen pasos', 'cmb2' ),
		'desc' => esc_html__( 'Imagen para la seccion pasos', 'cmb2' ),
		'id'   => $prefix . 'imagen_pasos',
		'type' => 'file',
	) );

	$tut_campos_homepage->add_field( array(
		'name'    => esc_html__( 'paso 1', 'cmb2' ),
		'desc'    => esc_html__( 'paso 1', 'cmb2' ),
		'id'      => $prefix . 'paso1',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
	) );

	$tut_campos_homepage->add_field( array(
		'name'    => esc_html__( 'paso 2', 'cmb2' ),
		'desc'    => esc_html__( 'paso 2', 'cmb2' ),
		'id'      => $prefix . 'paso2',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
	) );

	$tut_campos_homepage->add_field( array(
		'name'    => esc_html__( 'paso 3', 'cmb2' ),
		'desc'    => esc_html__( 'paso 3', 'cmb2' ),
		'id'      => $prefix . 'paso3',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
	) );   
    }
?>

<?php 
add_action( 'cmb2_admin_init', 'tut_campos_quienes');
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */

 /*
  *  PAGINA QUIENES SOMOS
   */
function tut_campos_quienes() {
$prefix = 'tut_quienes_';

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$tut_campos_quienes = new_cmb2_box( array(
		'id'           => $prefix . 'quienes',
		'title'        => esc_html__( 'Campos quienes somos', 'cmb2' ),
		'object_types' => array( 'page' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array(
			'id' => array( 229 ),
		), // Specific post IDs to display this metabox
	) );
	

	$tut_campos_quienes->add_field( array(
		'name'    => esc_html__( 'titulo azul consulta', 'cmb2' ),
		'desc'    => esc_html__( 'titulo azul para consulta', 'cmb2' ),
		'id'      => $prefix . 'titulo_azul_quienes',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
	) );

	$tut_campos_quienes->add_field( array(
		'name' => esc_html__( 'triangulo azul', 'cmb2' ),
		'desc' => esc_html__( 'Imagen azul para la seccion quiénes somos', 'cmb2' ),
		'id'   => $prefix . 'imagen_triangulo_izquierda',
		'type' => 'file',
	) );

	$tut_campos_quienes->add_field( array(
		'name' => esc_html__( 'imagen collage 1', 'cmb2' ),
		'desc' => esc_html__( 'Imagen para collage', 'cmb2' ),
		'id'   => $prefix . 'imagen_collage_1',
		'type' => 'file',
	) );

	$tut_campos_quienes->add_field( array(
		'name' => esc_html__( 'imagen collage 2', 'cmb2' ),
		'desc' => esc_html__( 'Imagen para collage', 'cmb2' ),
		'id'   => $prefix . 'imagen_collage_2',
		'type' => 'file',
	) );

	$tut_campos_quienes->add_field( array(
		'name' => esc_html__( 'imagen collage 3', 'cmb2' ),
		'desc' => esc_html__( 'Imagen para collage', 'cmb2' ),
		'id'   => $prefix . 'imagen_collage_3',
		'type' => 'file',
	) );

	$tut_campos_quienes->add_field( array(
		'name' => esc_html__( 'imagen collage 4', 'cmb2' ),
		'desc' => esc_html__( 'Imagen para collage', 'cmb2' ),
		'id'   => $prefix . 'imagen_collage_4',
		'type' => 'file',
	) );

	$tut_campos_quienes->add_field( array(
		'name' => esc_html__( 'imagen collage 5', 'cmb2' ),
		'desc' => esc_html__( 'Imagen para collage', 'cmb2' ),
		'id'   => $prefix . 'imagen_collage_5',
		'type' => 'file',
	) );

	$tut_campos_quienes->add_field( array(
		'name' => esc_html__( 'imagen collage 6', 'cmb2' ),
		'desc' => esc_html__( 'Imagen para collage', 'cmb2' ),
		'id'   => $prefix . 'imagen_collage_6',
		'type' => 'file',
	) );   
    }
?>

<?php 
add_action( 'cmb2_admin_init', 'tut_campos_servicios');
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */

 /*
  *  PAGINA Servicios
   */
function tut_campos_servicios() {
$prefix = 'tut_servicios_';

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$tut_campos_servicios = new_cmb2_box( array(
		'id'           => $prefix . 'servicios',
		'title'        => esc_html__( 'Campos servicios', 'cmb2' ),
		'object_types' => array( 'page' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array(
			'id' => array( 26 ),
		), // Specific post IDs to display this metabox
	) );	

	$tut_campos_servicios->add_field( array(
		'name'    => esc_html__( 'titulo azul', 'cmb2' ),
		'desc'    => esc_html__( 'titulo azul', 'cmb2' ),
		'id'      => $prefix . 'titulo_azul_conoce',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
	) );

	$tut_campos_servicios->add_field( array(
		'name'    => esc_html__( 'titulo negro', 'cmb2' ),
		'desc'    => esc_html__( 'titulo negro', 'cmb2' ),
		'id'      => $prefix . 'titulo_negro_conoce',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
	) );

	$tut_campos_servicios->add_field( array(
		'name'    => esc_html__( 'titulo azul servicio1', 'cmb2' ),
		'desc'    => esc_html__( 'titulo azul servicio 1', 'cmb2' ),
		'id'      => $prefix . 'titulo_azul_servicio1',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
	) );

	$tut_campos_servicios->add_field( array(
		'name'    => esc_html__( 'titulo negro servicio1 ', 'cmb2' ),
		'desc'    => esc_html__( 'titulo negro servicio 1', 'cmb2' ),
		'id'      => $prefix . 'titulo_negro_servicio1',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
	) );

	$tut_campos_servicios->add_field( array(
		'name'    => esc_html__( 'texto servicio1 ', 'cmb2' ),
		'desc'    => esc_html__( 'texto servicio 1', 'cmb2' ),
		'id'      => $prefix . 'texto_servicio1',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 8,
		),
	) );

	$tut_campos_servicios->add_field( array(
		'name' => esc_html__( 'imagen servicio 1', 'cmb2' ),
		'desc' => esc_html__( 'Imagen servicio1', 'cmb2' ),
		'id'   => $prefix . 'imagen_servicio_1',
		'type' => 'file',
	) );

	$tut_campos_servicios->add_field( array(
		'name'    => esc_html__( 'titulo azul servicio2', 'cmb2' ),
		'desc'    => esc_html__( 'titulo azul servicio 2', 'cmb2' ),
		'id'      => $prefix . 'titulo_azul_servicio2',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
	) );

	$tut_campos_servicios->add_field( array(
		'name'    => esc_html__( 'titulo negro servicio2 ', 'cmb2' ),
		'desc'    => esc_html__( 'titulo negro servicio 2', 'cmb2' ),
		'id'      => $prefix . 'titulo_negro_servicio2',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
	) );


	$tut_campos_servicios->add_field( array(
		'name'    => esc_html__( 'texto servicio2 ', 'cmb2' ),
		'desc'    => esc_html__( 'texto servicio 2', 'cmb2' ),
		'id'      => $prefix . 'texto_servicio2',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 8,
		),
	) );

	$tut_campos_servicios->add_field( array(
		'name' => esc_html__( 'imagen servicio 2', 'cmb2' ),
		'desc' => esc_html__( 'Imagen servicio2', 'cmb2' ),
		'id'   => $prefix . 'imagen_servicio_2',
		'type' => 'file',
	) );  
    }
?>


<?php
add_action( 'cmb2_admin_init', 'tut_campos_iniciosesion');

function tut_campos_iniciosesion() {
$prefix = 'tut_iniciosesion_';

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$tut_campos_iniciosesion = new_cmb2_box( array(
		'id'           => $prefix . 'iniciosesion',
		'title'        => esc_html__( 'Campos inicio de sesión', 'cmb2' ),
		'object_types' => array( 'page' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array(
			'id' => array( 30 ),
		), // Specific post IDs to display this metabox
	) );	

	$tut_campos_iniciosesion->add_field( array(
		'name'    => esc_html__( 'titulo azul', 'cmb2' ),
		'desc'    => esc_html__( 'titulo azul', 'cmb2' ),
		'id'      => $prefix . 'titulo_azul_iniciosesion',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
	) );

	$tut_campos_iniciosesion->add_field( array(
		'name'    => esc_html__( 'titulo negro', 'cmb2' ),
		'desc'    => esc_html__( 'titulo negro', 'cmb2' ),
		'id'      => $prefix . 'titulo_negro_iniciosesion',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
	) );

	

	$tut_campos_iniciosesion->add_field( array(
		'name' => esc_html__( 'imagen inicio de sesión', 'cmb2' ),
		'desc' => esc_html__( 'Imagen para la pantalla inicio de sesión', 'cmb2' ),
		'id'   => $prefix . 'imagen_iniciosesion',
		'type' => 'file',
	) );  
    }
?>


<?php 
add_action( 'cmb2_admin_init', 'tut_campos_registro');
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
 /*
  *  PAGINA DE INICIO
   */
function tut_campos_registro() {
$prefix = 'tut_registro_';
$id_home = get_option('page_on_front');
	/**
	 * Metabox to be displayed on a single page ID
	 */
	$tut_campos_registro = new_cmb2_box( array(
		'id'           => $prefix . 'registro',
		'title'        => esc_html__( 'Campos registro', 'cmb2' ),
		'object_types' => array( 'page' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array(
			'id' => array( 203 ),
		), // Specific post IDs to display this metabox
	) );
	

	$tut_campos_registro->add_field( array(
		'name'    => esc_html__( 'titulo imagen', 'cmb2' ),
		'desc'    => esc_html__( 'yitulo registro', 'cmb2' ),
		'id'      => $prefix . 'titulo_imagen',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 4,
		),
	) );
	
	$tut_campos_registro->add_field( array(
		'name'    => esc_html__( 'texto', 'cmb2' ),
		'desc'    => esc_html__( 'texto imagen', 'cmb2' ),
		'id'      => $prefix . 'texto_imagen',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 2,
		),
    ) );
    
    $tut_campos_registro->add_field( array(
		'name' => esc_html__( 'imagen registro', 'cmb2' ),
		'desc' => esc_html__( 'Imagen para la pantalla de registro', 'cmb2' ),
		'id'   => $prefix . 'imagen_registro',
		'type' => 'file',
	) );   
	
	
	
		$tut_campos_registro->add_field( array(
		'name'    => esc_html__( 'titulo formularion', 'cmb2' ),
		'desc'    => esc_html__( 'titulo formulario', 'cmb2' ),
		'id'      => $prefix . 'titulo_formulario',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
	) );
	
	$tut_campos_registro->add_field( array(
		'name'    => esc_html__( 'texto', 'cmb2' ),
		'desc'    => esc_html__( 'texto formulario', 'cmb2' ),
		'id'      => $prefix . 'texto_formulario',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 1,
		),
    ) );
    
    }
    
     /*
  *  PAGINA ASESORIA VIRTUAL
   */
   


    ?>
    
    <?php
    
    add_action( 'cmb2_admin_init', 'tut_asesoria_virtual');
    
       
   function tut_asesoria_virtual() {
$prefix = 'tut_asesoria_virtual_';


	$tut_asesoria_virtual = new_cmb2_box( array(
		'id'           => $prefix . 'asesoria_virtual',
		'title'        => esc_html__( 'Campos asesoria virtual', 'cmb2' ),
		'object_types' => array( 'page' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array(
			'id' => array( 266 ),
		), // Specific post IDs to display this metabox
	) );	
   
   
   $tut_asesoria_virtual->add_field( array(
		'name' => esc_html__( 'imagen asesoria', 'cmb2' ),
		'desc' => esc_html__( 'Imagen para la pantalla asesoria', 'cmb2' ),
		'id'   => $prefix . 'imagen_asesoriaVirtual',
			'type' => 'file',
	) );   
    
}   
    
    ?>
    
    
    
    