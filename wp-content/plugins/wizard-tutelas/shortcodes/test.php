<?php 
	function test_constructor(){
		global $wpdb;
		$sql = "SELECT * FROM flujos_tutelas";
		$result = $wpdb->get_results($sql);
		//echo um_user('last_name');
		ob_start();


		//$tabla='<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>';

		$tabla.='<div id="content-full-result" class="container"> <br/>
			<input type="text" id="filtro" placeholder="Digite el tipo de tutela que desea buscar" style="width: 100%;"/>
			<table class="table table-hover"><tr><td>Id</td><td>Flujo</td><td>Detalle</td><td></td></tr>';

		foreach ($result as $key => $value) {
			$tabla.='<tr><td>'.$result[$key]->id.'</td><td>'.$result[$key]->nombre.'</td><td>'.$result[$key]->detalle.'<div style="display: none;">'.$result[$key]->palabras_clave.'</div></td><td><button id="btnSel'.$result[$key]->id.'" type="button" flujo="'.$result[$key]->id.'" class="btn btn-primary btn-grid">Seleccionar</button></td></tr>';
			//print_r($result[$key]->nombre);
		}
		$tabla.='</table></div>';
		print_r($tabla);

		$return = ob_get_contents();
		ob_end_clean();
		return $return; 

	}


	function test_constructor_Org(){
		global $wpdb;
		$us = wp_get_current_user();
		$url_actual="http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

		//$us->data->user_login
$paramFlujo = $_GET["flujo"];
$paramTutela = $_GET["tutela"];
//print_r($_GET["flujo"].' '.$_GET["tutela"]);
		//$visitor = $wpdb->get_results("SELECT * FROM wp_visitors_register WHERE email = '".$_GET['mail']."'");
		//$visitorResults = $wpdb->get_results("SELECT * FROM wp_visitors_results WHERE idVisitor = ".$visitor[0]->intId."");
		$result = $wpdb->get_results("SELECT a.id,a.nombre,b.* FROM 
flujos_tutelas a
join detalle_flujos b on a.id=b.id_flujo
left join formularios_tutelas c on b.formulario=c.id where a.id=$paramFlujo order by b.inicial");

		ob_start();
		?>

		<div id="content-full-result" class="container"> 
			
			<br/>
			<?php
				//print_r($result);
				constructorWizard($result);

			?>
			<div id="step0" style="display: none;">
				<div class="titulos">
					<div class="titulo">Tutela Finalizada</div>
				</div>
				<div class="componente0">
					<div id="btn-pago"><h3>Pay</h3></div>
				</div>
			</div>
			<br/>
		</div>
		<?php
		$return = ob_get_contents();
		ob_end_clean();
		return $return; 
	}

	function getFormWizard($form, $titulo, $titulo1,$flujo,$step,$atras,$sgt,$tutela){
		global $wpdb;
		//$sql = "SELECT a.nombre,a.detalle as prosa,b.* FROM formularios_tutelas a left join detalle_formularios b on a.id=b.id_formulario where a.id=$form order by b.orden";
		$sql = "SELECT a.nombre,REPLACE(REPLACE(REPLACE (a.detalle, CHAR(10) + CHAR(13), '<br>'), '\n', '<br>'), ' ', '&nbsp;') as prosa, b.id,COALESCE(b.id_formulario,a.id) as id_formulario,b.orden,b.componente,b.nombre,b.titulo,REPLACE(b.detalle, '','') as detalle, b.tipo_dato, b.requerido FROM formularios_tutelas a left join detalle_formularios b on a.id=b.id_formulario where a.id=$form order by b.orden";
		$result = $wpdb->get_results($sql);
		$rpta = constructorFormDinamic($result, $titulo, $titulo1,$flujo,$step,$atras,$sgt,$tutela);
		//print_r($result);
		return $rpta;
	}


	function constructorWizard($arreglo,$tutela,$flujo){

		//$step ='<div id="content-full-result" class="container"> <br/>';
		//print_r(json_decode(str_replace('\\','',$arreglo[1]->detalle)));

		//json_decode(str_replace('\\','',$arreglo[$key]->detalle))

		//exit();
		
		$step.='<form id="wizard"><input type="hidden" id="wp_nombres" nombre="wp_nombres" class="wp" value="'.um_user('first_name').'"/><input type="hidden" id="wp_apellidos" nombre="wp_apellidos" class="wp" value="'.um_user('last_name').'"/>';
		$step.='<input type="hidden" id="idflujoh" value="'.$flujo.'"/><input type="hidden" id="idtutelah" value="'.$tutela.'"/>';

		foreach ($arreglo as $key => $value) {
			if($key>0){
		    	$style = ' style="display: none;" ';
		    }else{
		    	$style = ' style="display: block;" ';
		    }
			switch ($arreglo[$key]->componente) {
			    case 2:
			    	
			        $step .= '<div id="step'.$arreglo[$key]->id.'" '.$style.'><div class="titulos">';
					$step .= '<div class="titulo1">'.$arreglo[$key]->titulo1.'</div>';
					$step .= '<div class="titulo">'.$arreglo[$key]->titulo.'</div></div>';
					$step .= '<div class="componente2">';
					foreach (json_decode(str_replace('\\','',$arreglo[$key]->detalle)) as $clave => $valor) {
						$step .='<div step="'.$arreglo[$key]->id.'" id="btn'.$arreglo[$key]->id.'" next="'.json_decode(str_replace('\\','',$arreglo[$key]->detalle))[$clave]->next.'" class="btn-next"><div><img src="'.json_decode(str_replace('\\','',$arreglo[$key]->detalle))[$clave]->img.'" alt="Imagen step"/></div><div>'.json_decode(str_replace('\\','',$arreglo[$key]->detalle))[$clave]->value.'</div></div>';
					}

					$step .='</div><div class="botones">';
					if(strlen($arreglo[$key]->atras)>0 && $arreglo[$key]->atras!=0){
						$step .='<div step="'.$arreglo[$key]->id.'" id="btn'.$arreglo[$key]->id.'" back="'.$arreglo[$key]->atras.'" class="btn-back">Regresar</div>';
					}
					$step .='</div></div>';
					//print_r($step);
			        break;
			    case 3:

			    	$rpta = getFormWizard($arreglo[$key]->formulario, $arreglo[$key]->titulo, $arreglo[$key]->titulo1,$arreglo[$key]->id_flujo,$arreglo[$key]->id,$arreglo[$key]->atras,$arreglo[$key]->detalle,$tutela);
			    	$step .= '<div id="step'.$arreglo[$key]->id.'" '.$style.'>';
			    	//$step .= '<div class="titulo1">'.$arreglo[$key]->titulo.'</div>';
			    	//$step .= '<div class="componente2">';
			    	//print_r($rpta);
			    	$step .= $rpta;
			    	$step .= '<div class="botones">';
			    	if(strlen($arreglo[$key]->atras)>0 && $arreglo[$key]->atras!=0){					
						$step .= '<div step="'.$arreglo[$key]->id.'" id="btn'.$arreglo[$key]->id.'" back="'.$arreglo[$key]->atras.'" idform="'.$arreglo[$key]->formulario.'" class="btn-back">Regresar</div>';
					}
					if(strlen($arreglo[$key]->detalle)>0){
						$step .= '<div step="'.$arreglo[$key]->id.'" id="btn'.$arreglo[$key]->id.'" next="'.$arreglo[$key]->detalle.'"  idform="'.$arreglo[$key]->formulario.'" class="btn-next">Continuar</div>';
					}
			    	$step .= '</div></div>';
			    	//print_r($step);
			        break;
			    }
			    
			//print_r(json_decode($arreglo[$key]));
			//echo "<br/>";
			    //print_r($step);
			
		}
		$path = $_SERVER['DOCUMENT_ROOT'];
		$step .='<div id="step0" style="display: none;">
				<div class="titulos">
					<div class="titulo">Proceso Finalizado</div>
				</div>
				<div class="componente0">
					<p><h5>Esta es una vista previa, el documento completo estará disponible una vez se confirme el pago.</h5></p>
					<p><button id="btn-pago" name="btn-pago" type="button" class="btn btn-primary">Proceder con el pago</button></p>
						<!--<div id="btn-pago"><h3>Proceder con el pago</h3></div>-->
					<div id="visor">'.do_shortcode('[pdfviewer]https://tutelas.tmssas.com/wp-content/plugins/wizard-tutelas/shortcodes/previews/visor-'.$flujo.'-'.$tutela.'.pdf[/pdfviewer]').'</div>
				</div>
			</div>
			<br/>
		</div></form>';
			    print_r($step);
		//print_r($arreglo);exit();
/*print_r('<script>$( window ).on( "load", function() {jQuery(document).on("click",".btn-next#btn2[next=1]", function(){
setTimeout(jQuery(".btn-next#btn1").click(),1000);
});});</script>');*/
	}

	function constructorFormDinamic($arreglo, $titulo, $titulo1,$flujo,$paso,$atras,$sgt,$tutela){

		$step = '<div class="titulos"><div class="titulo1">'.$titulo1.'</div>';
		//$step = '<div class="titulo">'.$arreglo[0]->nombre.'</div>';
		$step .= '<div class="titulo">'.$titulo.'</div></div>';
		$step .= '<div class="componente3">';
		//return $step;die();

		foreach ($arreglo as $key => $value) {
			
					/*$step .= '<div class="componente2">';
					foreach (json_decode($arreglo[$key]->detalle) as $clave => $valor) {
						$step .='<div step="'.$arreglo[$key]->id.'" id="btn" next="'.json_decode($arreglo[$key]->detalle)[$clave]->next.'" class="btn-next">'.json_decode($arreglo[$key]->detalle)[$clave]->value.'</div>';
					}

					$step .='</div>';
					if(strlen($arreglo[$key]->atras)>0){
						$step .='<div step="'.$arreglo[$key]->id.'" id="btn" back="'.$arreglo[$key]->atras.'" class="btn-back">Regresar</div>';
					}
					$step .='</div>';*/
			
			switch ($arreglo[$key]->componente) {
			    case 1:
			    	
  
			        //'|'.$arreglo[$key]->nombre.
					$step .= '<!--<label for="'.$arreglo[$key]->id.'">'.$arreglo[$key]->titulo.'</label>--><input type="'.$arreglo[$key]->tipo_dato.'" id="'.$arreglo[$key]->id.'" name="'.$arreglo[$key]->id.'" placeholder="'.$arreglo[$key]->titulo.'" idform="'.$arreglo[$key]->id_formulario.'" '.$arreglo[$key]->requerido.' nombre="'.$arreglo[$key]->nombre.'"><br>';
			        break;
			    case 2:
			    	
			        $step .= '<!--<label for="sel'.$arreglo[$key]->id.'">'.$arreglo[$key]->titulo.'</label>--><select id="sel'.$arreglo[$key]->id.'" name="sel'.$arreglo[$key]->id.'" idform="'.$arreglo[$key]->id_formulario.'" nombre="'.$arreglo[$key]->nombre.'" '.$arreglo[$key]->requerido.'>';
			        $step .='<option value="" selected>'.$arreglo[$key]->titulo.'</option>';
					$tt = stripslashes($arreglo[$key]->detalle);
					//print_r($tt);
			        /*foreach (json_decode($arreglo[$key]->detalle) as $clave => $valor) {
						$step .='<option value="'.json_decode($arreglo[$key]->detalle)[$clave]->codigo.'">'.json_decode($arreglo[$key]->detalle)[$clave]->descripcion.'</option>';
					}*/
					foreach (json_decode($tt) as $clave => $valor) {
						$step .='<option value="'.json_decode($tt)[$clave]->codigo.'">'.json_decode($tt)[$clave]->descripcion.'</option>';
					}

					$step .='</select><br>';
					if(strlen($arreglo[$key]->atras)>0){
						$step .='<div step="'.$arreglo[$key]->id.'" id="btn" back="'.$arreglo[$key]->atras.'" class="btn-back">Regresar</div>';
					}
					//$step .='</div>';
					
			        break;
			    case 3:
			    	$step = '<div id="step'.$arreglo[$key]->id.'" '.$style.'>';
			    	$step .= '<div class="titulo1">'.$arreglo[$key]->detalle.'<p>es formulario funcion form</p></div>';
			    	if(strlen($arreglo[$key]->atras)>0){
						$step .='<div step="'.$arreglo[$key]->id.'" id="btn" back="'.$arreglo[$key]->atras.'" class="btn-back">Regresar</div>';
					}
			    	$step .='</div>';
			    	print_r($step);
			        break;
			    }
			    
			//print_r(json_decode($arreglo[$key]));
			//echo "<br/>";

			
		}
		$step .= '<input type="hidden" id="text-detalle'.$arreglo[$key]->id_formulario.'" value="'.$arreglo[$key]->prosa.'"  idform="'.$arreglo[$key]->id_formulario.'" />';
		$step .= '<input type="hidden" id="val-detalle'.$arreglo[$key]->id_formulario.'" value="'.$arreglo[$key]->prosa.'"  idform="'.$arreglo[$key]->id_formulario.'" idstep="'.$paso.'" idtutela="'.$tutela.'" idflujo="'.$flujo.'" />';
		$step .= '<div id="div-detalle'.$arreglo[$key]->id_formulario.'"  idform="'.$arreglo[$key]->id_formulario.'" class="prosa">'.$arreglo[$key]->prosa.'</div>';
		$step .= '</div>';

		if ($arreglo[0]->id.length<=0) {

			/*$step .= '<script>$( window ).on( "load", function() {jQuery(document).on("click",".btn-next#btn'.$atras.'[next='.$paso.']", function(){setTimeout(jQuery(".btn-next#btn'.$paso.'").click(),200)});';
			$step .= 'jQuery(document).on("click",".btn-back#btn'.$sgt.'[back='.$paso.']", function(){setTimeout(jQuery(".btn-back#btn'.$paso.'").click(),200)});});</script>';*/
			$step .= '<script>jQuery(document).on("click",".btn-next#btn'.$atras.'[next='.$paso.']", function(){setTimeout(jQuery(".btn-next#btn'.$paso.'").click(),200)});';
			$step .= 'jQuery(document).on("click",".btn-back#btn'.$sgt.'[back='.$paso.']", function(){setTimeout(jQuery(".btn-back#btn'.$paso.'").click(),200)});</script>';
		}
		//print_r($arreglo);
		return $step;
	}

	/*function clickDinamic($arreglo, $titulo, $titulo1,$flujo,$paso,$atras){

		$step = '<script>$( window ).on( "load", function() {';
		if ($arreglo[0]->id.length<=0) {

			$step .= 'jQuery(document).on("click",".btn-next#btn'.$atras.'[next='.$paso.']", function(){setTimeout(jQuery(".btn-next#btn'.$paso.'").click(),200)});';
		}
		$step .= '});</script>'
		//print_r($arreglo);
		return $step;
	}*/

	add_shortcode('test_constructor','test_constructor');


// Hook para usuarios no logueados
add_action('wp_ajax_nopriv_grabarTutela', 'grabarTutela');
// Hook para usuarios logueados
add_action('wp_ajax_grabarTutela', 'grabarTutela');
// Función que procesa la llamada AJAX

function grabarTutela(){   
	global $wpdb;

	$wpdb->insert('datos_tutelas',
					array(
						'id_flujo'=>$_POST['id_flujo'],
						'id_step'=>$_POST['id_step'],
						'id_form'=>$_POST['id_form'],
						'id_tutela'=>$_POST['id_tutela'],
						'valor'=>$_POST['valor']
					)
				);
	
   wp_die();
   echo 'ok';
}
// Hook para usuarios no logueados
add_action('wp_ajax_nopriv_backBorrarTutela', 'backBorrarTutela');
// Hook para usuarios logueados
add_action('wp_ajax_backBorrarTutela', 'backBorrarTutela');
// Función que procesa la llamada AJAX

function backBorrarTutela(){   
	global $wpdb;
	//.' valor='.$_POST['valor']
	$wpdb->query('delete from datos_tutelas where id_flujo='.$_POST['id_flujo'].' and id_step='.$_POST['id_step'].' and id_tutela='.$_POST['id_tutela'].' and id_form='.$_POST['id_form']);
	
   wp_die();
   echo 'ok';
}


add_action('wp_ajax_nopriv_test_constructor2', 'test_constructor2');
add_action('wp_ajax_test_constructor2', 'test_constructor2');
function test_constructor2(){
		global $wpdb;
		$us = wp_get_current_user();
		$url_actual="http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$paramFlujo = $_POST["flujo"];
$paramTutela = $_POST["tutela"];
		$result = $wpdb->get_results("SELECT a.id,a.nombre,b.* FROM 
flujos_tutelas a
join detalle_flujos b on a.id=b.id_flujo
left join formularios_tutelas c on b.formulario=c.id where a.id=$paramFlujo order by b.inicial");
				$return=constructorWizard($result,$paramTutela,$paramFlujo);
		print_r($return); 
		die();
	}

add_action('wp_ajax_nopriv_generaPdf', 'generaPdf');
add_action('wp_ajax_generaPdf', 'generaPdf');
function generaPdf(){
	global $wpdb;
	$result = $wpdb->get_results("SELECT DISTINCT id_tutela,id_flujo,valor FROM `datos_tutelas` WHERE id_tutela=".$_POST['id_tutela']." and id_flujo=".$_POST['id_flujo']." order by id");
	$html="";
	$visor="";
	foreach ($result as $key => $value) {
		$html .='<p>'.$result[$key]->valor.'</p>';
		if($key<2){
			$visor.='<p>'.$result[$key]->valor.'</p>';
		}
	}
	$visor.='<p><h3>Esta es una vista previa, el documento completo estará disponible una vez se confirme el pago.</h3></p>';
//print_r($result);

	$path = $_SERVER['DOCUMENT_ROOT'];
	include_once $path . '/wp-content/plugins/wizard-tutelas/includes/html2pdf/html2pdf.class.php';

		//Full pdf
		$html2pdf = new HTML2PDF('P','A4','es',true,'UTF-8');
		$html2pdf->WriteHTML($html);
		$html2pdf->Output($path . '/wp-content/plugins/wizard-tutelas/shortcodes/pdfs/Tutela-'.$_POST['id_flujo'].'-'.$_POST['id_tutela'].'.pdf','F');
		//Visor pdf
		$html2pdf = new HTML2PDF('P','A4','es',true,'UTF-8');
		$html2pdf->WriteHTML($visor);
		$html2pdf->Output($path . '/wp-content/plugins/wizard-tutelas/shortcodes/previews/visor-'.$_POST['id_flujo'].'-'.$_POST['id_tutela'].'.pdf','F');
}

add_action('wp_ajax_nopriv_iniciarTutela', 'iniciarTutela');
add_action('wp_ajax_iniciarTutela', 'iniciarTutela');

function iniciarTutela(){   
	global $wpdb;
$us = wp_get_current_user();

	$wpdb->insert('tutelas',
					array(
						'id_flujo'=>$_POST['id_flujo'],
						'usuario'=>$us->user_login
					)
				);
	$idtutela = $wpdb->insert_id;
	echo $idtutela;
   wp_die();
   
}
?>