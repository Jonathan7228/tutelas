<?php 
	
	function test_constructor(){
		global $wpdb;
		$us = wp_get_current_user();
		$url_actual="http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

		//$visitor = $wpdb->get_results("SELECT * FROM wp_visitors_register WHERE email = '".$_GET['mail']."'");
		//$visitorResults = $wpdb->get_results("SELECT * FROM wp_visitors_results WHERE idVisitor = ".$visitor[0]->intId."");
		$result = $wpdb->get_results("SELECT a.id,a.nombre,b.* FROM 
flujos_tutelas a
join detalle_flujos b on a.id=b.id_flujo
left join formularios_tutelas c on b.formulario=c.id where a.id=1 order by b.orden");

		ob_start();
		?>

		<div id="content-full-result" class="container"> 
			
			<br/>
			<?php
				//print_r($result);
				constructorWizard($result);



			?>
			<br/>
		</div>
		<?php
		$return = ob_get_contents();
		ob_end_clean();
		return $return; 
	}

	function getFormWizard($form, $titulo, $titulo1){
		global $wpdb;
		$sql = "SELECT a.id,a.nombre,b.* FROM formularios_tutelas a join detalle_formularios b on a.id=b.id_formulario where a.id=$form order by b.orden";
		$result = $wpdb->get_results($sql);
		$rpta = constructorFormDinamic($result, $titulo, $titulo1);
		return $rpta;
	}

	function constructorWizard($arreglo){
		foreach ($arreglo as $key => $value) {
			if($key>0){
		    	$style = ' style="display: none;" ';
		    }else{
		    	$style = ' style="display: block;" ';
		    }
			switch ($arreglo[$key]->componente) {
			    case 2:
			    	
			        $step = '<div id="step'.$arreglo[$key]->id.'" '.$style.'>';
					$step .= '<div class="titulo1">'.$arreglo[$key]->titulo1.'</div>';
					$step .= '<div class="titulo">'.$arreglo[$key]->titulo.'</div>';
					$step .= '<div class="componente2">';
					foreach (json_decode($arreglo[$key]->detalle) as $clave => $valor) {
						$step .='<div step="'.$arreglo[$key]->id.'" id="btn" next="'.json_decode($arreglo[$key]->detalle)[$clave]->next.'" class="btn-next">'.json_decode($arreglo[$key]->detalle)[$clave]->value.'</div>';
					}

					$step .='</div>';
					if(strlen($arreglo[$key]->atras)>0){
						$step .='<div step="'.$arreglo[$key]->id.'" id="btn" back="'.$arreglo[$key]->atras.'" class="btn-back">Regresar</div>';
					}
					$step .='</div>';
					print_r($step);
			        break;
			    case 3:

			    	$rpta = getFormWizard($arreglo[$key]->formulario, $arreglo[$key]->titulo, $arreglo[$key]->titulo1);
			    	$step = '<div id="step'.$arreglo[$key]->id.'" '.$style.'>';
			    	//$step .= '<div class="titulo1">'.$arreglo[$key]->titulo.'</div>';
			    	//$step .= '<div class="componente2">';
			    	//print_r($rpta);
			    	$step .= $rpta;
			    	//$step .= '</div>';
			    	if(strlen($arreglo[$key]->atras)>0){						
						$step .= '<div step="'.$arreglo[$key]->id.'" id="btn" back="'.$arreglo[$key]->atras.'" class="btn-back">Regresar</div>';
						$step .= '<div step="'.$arreglo[$key]->id.'" id="btn" next="'.$arreglo[$key]->detalle.'" class="btn-next">Continuar</div>';
					}
			    	$step .= '</div>';
			    	print_r($step);
			        break;
			    }
			//print_r(json_decode($arreglo[$key]));
			//echo "<br/>";

			
		}
		//print_r($arreglo);

	}

	function constructorFormDinamic($arreglo, $titulo, $titulo1){

		$step = '<div class="titulo1">'.$titulo1.'</div>';
		//$step = '<div class="titulo">'.$arreglo[0]->nombre.'</div>';
		$step .= '<div class="titulo">'.$titulo.'</div>';
		$step .= '<div class="componente2">';
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
					$step .= '<!--<label for="'.$arreglo[$key]->id.'">'.$arreglo[$key]->titulo.'</label>--><input type="text" id="'.$arreglo[$key]->id.'" name="'.$arreglo[$key]->id.'" placeholder="'.$arreglo[$key]->titulo.'" idform="'.$arreglo[$key]->id_formulario.'" nombre="'.$arreglo[$key]->nombre.'"><br>';
			        break;
			    case 2:
			    	
			        $step .= '<!--<label for="sel'.$arreglo[$key]->id.'">'.$arreglo[$key]->titulo.'</label>--><select id="sel'.$arreglo[$key]->id.'" name="sel'.$arreglo[$key]->id.'">';
			        $step .='<option value="" selected>'.$arreglo[$key]->titulo.'</option>';
					foreach (json_decode($arreglo[$key]->detalle) as $clave => $valor) {
						$step .='<option value="'.json_decode($arreglo[$key]->detalle)[$clave]->codigo.'">'.json_decode($arreglo[$key]->detalle)[$clave]->descripcion.'</option>';
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
		$step .= '</div>';
		//print_r($arreglo);
		return $step;
	}

	add_shortcode('test_constructor','test_constructor');
?>