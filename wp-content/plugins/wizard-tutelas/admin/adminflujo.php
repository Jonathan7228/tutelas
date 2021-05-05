<?php
global $wpdb;

if (! current_user_can ('manage_options')) wp_die (__ ('No tienes suficientes permisos para acceder a esta página.'));
    
    if( $_POST['actionFormFlujo'] != '' && $_POST['actionFormFlujo' ] =='save' ){
        $table = 'flujos_tutelas';
        $data = array('nombre' => $_POST['nombre'], 'detalle' => $_POST['descripcion'], 'palabras_clave' => $_POST['palabras_clave']);
        $wpdb->insert($table,$data);
        $my_id = $wpdb->insert_id;
    }

    if( $_POST['actionFormFlujo'] != '' && $_POST['actionFormFlujo' ]= 'update' ){
        $wpdb->update( 'flujos_tutelas', 
        array( 
          'nombre' => $_POST['nombre'],
          'detalle' => $_POST['descripcion'],
		  'palabras_clave' => $_POST['palabras_clave']
        ),
        array( 'id' => $_POST['FieldidForm'] )
      );
    }
    
    $result = $wpdb->get_results("SELECT * FROM flujos_tutelas");
?>
<style>
#id_confrmdiv
{
    display: none;
    background-color: #eee;
    border-radius: 5px;
    border: 1px solid #aaa;
    position: fixed;
    width: 300px;
    left: 50%;
    margin-left: -150px;
    padding: 6px 8px 8px;
    box-sizing: border-box;
    text-align: center;
}
#id_confrmdiv button {
    background-color: #ccc;
    display: inline-block;
    border-radius: 3px;
    border: 1px solid #aaa;
    padding: 2px;
    text-align: center;
    width: 80px;
    cursor: pointer;
}
#id_confrmdiv button:hover
{
    background-color: #ddd;
}
#confirmBox .message
{
    text-align: left;
    margin-bottom: 8px;
}
</style>
<div class="wrap">
<div id="id_confrmdiv">Que deseas hacer? <br>
							<button id="id_truebtn">Editar</button>
							<button id="id_falsebtn">Eliminar</button>
							<button id="id_cancelbtn">Cancelar</button>
						</div>
		<h2 style="text-align: center;">Flujos </h2>

        <div class="wrap" id="contentGridFlujos">
			<div><button id="btnNew" type="button" class="btn btn-primary">Nuevo Flujo</button></div>
			
			<table class="table table-hover" style="width: 100%">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scopt="col">Pasos de flujo</th>
                    <th scopt="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                <?php for($i = 0; $i < count($result); $i++){ 
                        echo '<tr>
                        <th scope="row">'.$result[$i]->id.'</th>
                        <td>'.$result[$i]->nombre.'</td>
                        <td> <button id="'.$result[$i]->id.'" onclick="fnbtnDetalle(\''.$result[$i]->id.'\',\''.$result[$i]->nombre.'\',\'detailsFlujo\');"  class="btn btn-primary">Detalles</button></td>
                        <td> <button id="'.$result[$i]->id.'" onclick="fnbtnDetalle(\''.$result[$i]->id.'\',\''.$result[$i]->nombre.'\',\'editFlujo\');"  class="btn btn-primary">Editar</button></td>
                        </tr>';
                }
                ?>
                </tbody>
			</table>
		</div>

        <div class="container" id="contentFlujo" style="display:none">
			<div class="container">
				<form action="<?php get_the_permalink(); ?>" method="post" id="form_new_flujo">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="nombre">Nombre</label>
							<input type="text" class="form-control" id="nombre" name="nombre" required>
						</div>
						<div class="form-group col-md-6">
							<label for="descripcion">Descripción</label>
							<textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
						</div>
						<div class="form-group col-md-6">
							<label for="palabras_clave">Palabras Clave</label>
							<textarea class="form-control" id="palabras_clave" name="palabras_clave" required></textarea>
						</div>
					</div>
					<div class="form-row" style="margin-top: 10px;">
						<input type="hidden" id="actionFormFlujo" name="actionFormFlujo">
						<input type="hidden" id="FieldidForm" name="FieldidForm">						
						<button type="submit" id="btn-submit-new-flujo" name="btn-submit-new-flujo" class="btn btn-primary">Guardar</button>
						<button  type="button" class="btn btn-primary btnHome">Regresar</button>
					</div>
				</form>
			</div>
		</div>




        <div class="container" id="contentFormDetalle" style="display:none">
			<div class="container" id="containerDetalle">
				<p id="idFlujo" style="display:flex"><b> ID. Flujo: </b> </p>
				<p id="nameFlujo" style="display:flex"><b >Nombre Flujo: </b > </p>
				<button id="newComponent" type="button" class="btn btn-primary">Nuevo componente</button>
				<button type="button" class="btn btn-primary btnHome">Regresar</button>

                <hr id="hrForm" style="display:none">
				<form action="<?php get_the_permalink(); ?>" method="post" id="formHeadComponents">
					<div class="row">
						<div class="col" id="contTipo" style="display:none">
							<label for="tipoComponente">Tipo de componente</label>
							<select class="form-control" id="tipoComponente" onchange="fnChangeTipoComponente(this)"> 
							<option></option>
							<option value="3">Formulario</option>
							<option value="2">Decisión</option>
							</select>
						</div>
						<div class="col" id="contInicial" style="display:none">
							<label for="initialComponente">Componente inicial</label>
							<select class="form-control" id="initialComponente"> 
								<option></option>
								<option value="0">Si</option>
								<option value="1">No</option>
							</select>
						</div>
					</div>

  					<div class="row">
						<div class="col" id="contTitle1" style="display:none">
							<label for="nameText">Titulo</label>
							<input type="text" class="form-control" id="titulo1" name="titulo2">
						</div>
						<div class="col" id="contTitle2" style="display:none">
							<label for="titleText">Descripción</label>
							<input type="text" class="form-control" id="titulo2" name="titulo2">
						</div>
					</div>
                    <div class="row">
						<div class="col" id="contSelForm" style="display:none">
							<label for="formulario">Formulario</label>
							<select class="form-control" id="formulario"> 
							<option></option>
							</select>
						</div>
					</div>

					<div class="form-group" id="contRelForm" style="display:none">
						<hr>
						<p id="idStepComp3" style="display:flex"><b> ID. Paso: </b> </p>
						<div class="row">
							<div class="col" id="contTitle1">
								<label for="nextForm">Siguiente</label>
								<select class="form-control" id="nextForm" name="nextForm"> 
									<option></option>
								</select>
							</div>
							<div class="col" id="contTitle2">
								<label for="backForm">Atras</label>
								<select class="form-control" id="backForm" name="backForm"> 
									<option></option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col" style="margin-top: 10px;">
								<button type="submit" name="btn-submit-new-component-option-rel-form" id="btn-submit-new-component-option-rel-form" class="btn btn-primary pull-right">Guardar</button>
							</div>
						</div>
					</div>
					
					<div class="form-group" id="contOptions" style="display:none">
						<hr>
						<p id="idStepComp2" style="display:flex"><b> ID. Paso: </b> </p>
						
						<label for="titleOptions">Opciones de decisión</label>
						<div class="row">
                            <div class="col">
								<button type="submit" name="btn-submit-new-component-option-rel-mul" id="btn-submit-new-component-option-rel-mul" class="btn btn-primary pull-right">Guardar</button>
								<input type="hidden" id="is_firts" name="is_firts" value="0">
							</div>
					    </div>

                        <div class="container">
                            <div class="col-sm-12" id="container2">
                                <div id="type_container">
									<div class="row form-group" id="edit-0">
										<div class="col-md-4">
												<label class="control-label">
														Atras
													</label>
													<select class="form-control" name="optionBack" id="optionBack" > 
														<option></option>
													</select>                                       
										</div>
										<div class="row form-group" id="edit-0">
										
											<div class="col-md-4">
												<label class="control-label">
													Valor
												</label>
												<input type="text" class="form-control" name="optionvalor" id="optionvalor" />
											</div>
											
											<div class="col-md-4">
											
												<label class="control-label">
													Siguiente
												</label>
												<select class="form-control" name="optionNext" id="optionNext" > 
													<option></option>
												</select>
											</div>
										
											<div class="col-md-4">
												<label class="control-label">
													Imagen
												</label>
													<input type="file" class="form-control" name="optionImg" id="optionImg" style="width: 100% !important;" />
													<input type="hidden" name="optionImgHidden" id="optionImgHidden">
													<input type="hidden" name="optionComponenteHidden" id="optionComponenteHidden">
											</div>
											
										</div>
									</div>
                            	</div>
								<div id="table_rel" style="display:none">
									<div class="row form-group type-row" id="">
										<table class="table table-hover" style="width: 100%">
											<thead>
												<tr>
												<th scope="col">Valor</th>
												<th scopt="col">Siguiente</th>
												<th scopt="col">Imagen</th>
												</tr>
											</thead>
											<tbody>
										
											</tbody>
										</table>
										
									</div>
								</div>
                        	</div>
		            	</div>
					</div>

					<div class="form-row" style="margin-top: 10px;">
						<input type="hidden" id="jsonOptions" name="jsonOptions">
						<input type="hidden" id="idFormDetails" name="idFormDetails">
						<input type="hidden" id="idComponent" name="idComponent" value="0">
						<button type="submit" name="btn-submit-new-component" id="btn-submit-new-component" class="btn btn-primary" style="display:none">Guardar</button>						
					</div>
				</form>

            </div>
        </div>

</div>

<script>
	$(document).ready(function() {
		$('.um-admin-notice').hide();

		$('#btn-submit-new-component-option-rel-form').on('click', function (e) {
			e.preventDefault();
			$('#tblDetailsFlujos').remove();
			$('#hrTable').remove();
			
			var ids = new Array();
			var val = 0;
			if($('#nextForm').val() == ''){
				val = 1;
				ids.push('#nextForm');
			}else{
				$('#nextForm').css('border','');
			}

			if($('#backForm').val() == ''){
				val = 1;
				ids.push('#backForm');
			}else{
				$('#backForm').css('border','');
			}
			if(val != 0){
				alert('Debe ingresar los campos obligatorios');
				for(i=0;i<ids.length;i++){
					$(ids[i]).css('border','1px solid #f00');
				}
				return false;
			}else{
				$.ajax({
					type: 'POST',
					url: '../wp-content/plugins/wizard-tutelas/admin/query.php',
					data: "id=" + $('#idComp3').text() + "&next="+$("#nextForm").val()+"&back="+$("#backForm").val()+"&action=saveOptionForm",
					success: function(data) {
						$('#backForm option').remove();
						$('#backForm').append('<option></option>');
						$('#backForm').append('<option>0</option>');
						$('#nextForm option').remove();
						$('#nextForm').append('<option></option>');
						$('#contRelForm').hide();
						fnbtnDetalle($('#idFlujop').text(),$('#nameFlujop').text(),'detailsFlujo');
					}
				});
			}

		});


		$('#btn-submit-new-component-option-rel-mul').on('click', function (e) {
			e.preventDefault();

			

			if($('#optionImgHidden').val() == '' && $('#optionImg').val() != '' ){
				var archivo = $('#optionImg').val();
				var extensiones = archivo.substring(archivo.lastIndexOf("."));
				if(extensiones != ".jpg" && extensiones != ".png" &&  extensiones != ".jpeg"){
					alert('Debe seleccionar una imagen tipo jpg, jpeg o png');
					$('#optionImg').css('border','1px solid #f00');
					$('#optionImg').val('');
					return false;
				}
			}
			

				var cont = 0;
				var json = "[";
				var used = "";
				var val = 0;
				var ids = new Array();

				if($('#optionvalor').val() == ''){
					val = 1;
					ids.push('#optionvalor');
				}else{
					$('#optionvalor').css('border','');
				}

				if($('#optionNext').val() == ''){
					val = 1;
					ids.push('#optionNext');
				}else{
					$('#optionNext').css('border','');
				}

				if($('#optionImgHidden').val() == '' ){
					if($('#optionImg').val() == ''){
						val = 1;
						ids.push('#optionImg');
					}else{
						$('#optionImg').css('border','');
					}
				}
				
				if($('#is_firts').val() != 1 )
				{
					if($('#optionBack').val() == ''){
						val = 1;
						ids.push('#optionBack');
					}else{
						$('#optionBack').css('border','');
					}
				}
				

				if(val != 0){
					alert('Debe ingresar los campos obligatorios');
					for(i=0;i<ids.length;i++){
						$(ids[i]).css('border','1px solid #f00');
					}
					return false;
				}else{
					for(i=0; i<$(".table_value").parent("tr").find("td").length; i++){
						cont++;
						if(cont <=3){
							if(cont == 1){
								json += '{"value":"' + $(".table_value").parent("tr").find("td").eq(i).text()+'"';
							}else{
								if(cont == 2){
									json += '"next":"' +$(".table_value").parent("tr").find("td").eq(i).text()+'"';
									used += $(".table_value").parent("tr").find("td").eq(i).text()+',';
								}else{
									json += '"img":"' +$(".table_value").parent("tr").find("td").eq(i).text()+'"';
								}
							}
							if(cont < 3){
								json += ','
							}else{
								json +='},'
								cont = 0;
							}
						}
					}
					if($('#optionImg').val() != '' ){
						json += '{"value":"'+$('#optionvalor').val()+'","next":"'+$('#optionNext').val()+'","img":"'+window.location.origin+"/wp-content/plugins/wizard-tutelas/admin/images/"+$('#optionImg')[0].files[0].name+'"}';
					}else{
						json += '{"value":"'+$('#optionvalor').val()+'","next":"'+$('#optionNext').val()+'","img":"'+$('#optionImgHidden').val()+'"}';
					}
					json += ']';
					used += $('#optionNext').val();
					$.ajax({
						type: 'POST',
						enctype: 'multipart/form-data',
						url: '../wp-content/plugins/wizard-tutelas/admin/query.php',
						data: "id=" + $('#idComp2').text()+ "&detalle=" + json+ "&used=" + used+ "&atras=" + $("#optionBack").val()+ "&action=saveOptionRelMul",
						success: function(data) {
							file_data = $('#optionImg')[0].files[0];
							form_data = new FormData();
							form_data.append('file', file_data);
							form_data.append('action', 'upload');
							$.ajax({
								type: 'POST',
								enctype: 'multipart/form-data',
								contentType: false,
								processData: false,
								url: '../wp-content/plugins/wizard-tutelas/admin/upload.php',
								data: form_data,
								success: function(data) {
									$('#optionImgHidden').val('');
									$('#optionBack option').remove();
									$('#optionBack').append('<option></option>');
									$('#optionNext option').remove();
									$('#optionNext').append('<option></option>');
									$('#optionImg').val('');
									$('#optionvalor').val('');
									fnbtnRelacionar($('#idComp2').text(),$('#optionComponenteHidden').val(),$('#optionBack').val(),$('#is_firts').val());
								}
							});
						}
					});
					
				}
			

			
			
		});

		$('#btn-submit-new-component').on('click', function (e) {
			e.preventDefault();
			var val = 0;
			var ids = new Array();
			if($('#initialComponente').val() == ''){
				val = 1;
				ids.push('#initialComponente');
			}else{
				$('#initialComponente').css('border','');
			}

			if($('#titulo1').val() == ''){
				val = 1;
				ids.push('#titulo1');
			}else{
				$('#titulo1').css('border','');
			}

			if($('#titulo2').val() == ''){
				val = 1;
				ids.push('#titulo2');
			}else{
				$('#titulo2').css('border','');
			}

			if($('#tipoComponente').val() == 3){
				if($('#formulario').val() == ''){
					val = 1;
					ids.push('#formulario');
				}else{
					$('#formulario').css('border','');
				}
			}

			if(val != 0){
				alert('Debe ingresar los campos obligatorios');
				for(i=0;i<ids.length;i++){
					$(ids[i]).css('border','1px solid #f00');
				}
				return false;
			}else{
				//Guardado del encabezado de los detalles del flujo detalles_tutelas
				if($('#idComponent').val() == "0"){
					$.ajax({
						type: 'POST',
						url: '../wp-content/plugins/wizard-tutelas/admin/query.php',
						data: "id=N&id_flujo="+$('#idFlujop').text()+"&componente="+$('#tipoComponente').val()+"&inicial="+$('#initialComponente').val()+"&titulo="+$('#titulo1').val()+"&titulo1="+$('#titulo2').val()+"&formulario="+$('#formulario').val()+"&action=saveHeadDetalleTutela",
						success: function(data) {
							idF = $('#idFlujop').text();
							nameF = $('#nameFlujop').text();
							$('#tipoComponente').val('');
							$('#initialComponente').val('');
							$('#titulo1').val('');
							$('#titulo2').val('');
							$('#formulario').val('');
							$('#formulario option').remove();
							$("#contTitle1").hide();
							$("#contTitle2").hide();
							$("#contTipo").hide();
							$("#contSelForm").hide();
							$('#btn-submit-new-flujo').hide();
							$('#tblDetailsFlujos').remove();
							$('#idFlujop').remove();
							$('#nameFlujop').remove();
							$('#hrTable').remove();
							$('#hrForm').hide();
							$('#btn-submit-new-component').hide();
							$('#contInicial').hide();
							$('#contentFormDetalle').hide();
							$('#idComp2').remove();
							$('#idComp3').remove();
							fnbtnDetalle(idF,nameF,'detailsFlujo');


						}
					});
				}else{
					$.ajax({
						type: 'POST',
						url: '../wp-content/plugins/wizard-tutelas/admin/query.php',
						data: "id="+$('#idComponent').val()+"&id_flujo="+$('#idFlujop').text()+"&componente="+$('#tipoComponente').val()+"&inicial="+$('#initialComponente').val()+"&titulo="+$('#titulo1').val()+"&titulo1="+$('#titulo2').val()+"&formulario="+$('#formulario').val()+"&action=updateHeadDetalleTutela",
						success: function(data) {
							idF = $('#idFlujop').text();
							nameF = $('#nameFlujop').text();
							$('#tipoComponente').val('');
							$('#initialComponente').val('');
							$('#titulo1').val('');
							$('#titulo2').val('');
							$('#formulario').val('');
							$('#formulario option').remove();
							$("#contTitle1").hide();
							$("#contTitle2").hide();
							$("#contTipo").hide();
							$("#contSelForm").hide();
							$('#btn-submit-new-flujo').hide();
							$('#tblDetailsFlujos').remove();
							$('#idFlujop').remove();
							$('#nameFlujop').remove();
							$('#hrTable').remove();
							$('#hrForm').hide();
							$('#btn-submit-new-component').hide();
							$('#contInicial').hide();
							$('#contentFormDetalle').hide();
							$('#idComp2').remove();
							$('#idComp3').remove();
							fnbtnDetalle(idF,nameF,'detailsFlujo');


						}
					});
				}
			}
		});

		/*jQuery('a.add-type').on('click', function (e) {
                    e.preventDefault();
                    var content = jQuery('#type-container .type-row'),
                        element = null;
                    for (var i = 0; i < 1; i++) {
                        element = content.clone();
                        var type_div = 'teams_' + jQuery.now();
                        element.attr('id', type_div);
                        element.find('.remove-type').attr('targetDiv', type_div);
                        element.appendTo('#type_container');

                    }
                });

                jQuery('#container2').on('click','.remove-type', function (e) {
					console.log('eliminar');
                    var didConfirm = confirm("Esta segur(@) de eliminar esta opción?");
                    if (didConfirm == true) {
						//console.log(jQuery(this).attr('targetDiv'));
                        //var id = jQuery(this).attr('data-id');
                        var targetDiv = jQuery(this).attr('targetDiv');
                        //if (id == 0) {
                        //var trID = jQuery(this).parents("tr").attr('id');
                        jQuery('#' + targetDiv).remove();
                        // }
                        return true;
                    } else {
                        return false;
                    }
                });*/

		$(document).on('click',"#btnNew",function(){
			$("#contentGridFlujos").hide();
			$("#contentFlujo").show();
			$('#actionFormFlujo').val('save');
		});

        $(".btnHome").on('click',function(){
			$('#optionBack option').remove();
			$('#optionBack').append('<option></option>');
			$('#optionNext option').remove();
			$('#optionNext').append('<option></option>');
			$('#nextForm option').remove();
			$('#nextForm').append('<option></option>');
			$('#backForm option').remove();
			$('#backForm').append('<option></option>');
			$('#backForm').append('<option>0</option>');
			$('#contRelForm').hide();
            $('#optionImgHidden').val('');
			$('#optionBack option').remove();
			$('#optionBack').append('<option></option>');
			$('#optionNext option').remove();
			$('#optionNext').append('<option></option>');
			$('#optionImg').val('');
			$('#optionvalor').val('');
			$("#contentFlujo").hide();
			$('#tipoComponente').val('');
            $('#initialComponente').val('');
            $('#btn-submit-new-component').hide();
            $('#contInicial').hide();
            $('#titulo1').val('');
            $('#titulo2').val('');
            $('#formulario').val('');
            $('#formulario option').remove();
            $("#contTitle1").hide();
			$("#contTitle2").hide();
			$("#contTipo").hide();
			$("#contSelForm").hide();
			$('#btn-submit-new-flujo').hide();
			$('#tblDetailsFlujos').remove();
			$('#contentFormDetalle').hide();
			$('#hrTable').remove();
			$('#idFlujop').remove();
			$('#nameFlujop').remove();
			$('#hrForm').hide();
			$("#contentGridFlujos").show();
			$('#contOptions').hide();
			$('#idComp2').remove();
			$('#idComp3').remove();
			$('#optionvalor').val('');
			$('#edit-0 select option').remove();
		});

        $('#newComponent').on('click',function(){
			$('#tipoComponente').removeAttr('disabled');
			$('#idComponent').val(0);
			$('#contTipo').show();
			$('#hrForm').show();
			$('#contOptions').hide();
			$('#contRelForm').hide();
			$('#btn-submit-new-component').hide();

			$.ajax({
				type: 'POST',
				url: '../wp-content/plugins/wizard-tutelas/admin/query.php',
				data: "id=" + $('#idFlujop').text()+ "&action=setComponentInitialFlujo",
				success: function(data) {
					if(data != 0){
						$('#initialComponente').val(1);
						$('#initialComponente').prop('disabled', 'disabled');
					}else{
						$('#initialComponente').removeAttr('disabled');
						$('#initialComponente').val('');	
					}
				}
			});

            $.ajax({
				type: 'POST',
				url: '../wp-content/plugins/wizard-tutelas/admin/query.php',
				data: "id=" + $('#idFlujop').text()+ "&action=setForms",
				success: function(data) {
					form = JSON.parse(data);
					for(o = 0; o < form.length; o++){
						$('#formulario').append('<option value="' + form[o]['id'] + '">' + form[o]['id'] +' - '+ form[o]['nombre']  + '</option>');
                        
                    }
				}
			});
			
		});

    });

    function fnbtnDetalle(id,name,action){
		$('#nameFlujop').remove();
		$('#idFlujop').remove();
		if(action == 'detailsFlujo' ){
			$("#contentGridFlujos").hide();
			$("#contentFormDetalle").show();
			$('#idFlujo').append('<p id="idFlujop"> '+id+'</p>');
			$('#nameFlujo').append('<p id="nameFlujop"> '+name+'</p>');
			//$('#idFlujoDetails').val($('#idFlujop').text());
			$.ajax({
				type: 'POST',
				url: '../wp-content/plugins/wizard-tutelas/admin/query.php',
				data: "id=" + id+ "&action="+action,
				success: function(data) {
					$('#containerDetalle').append(data);
				}
			});
		}else{
			$("#contentGridFlujos").hide();
			$("#contentFlujo").show();
			$.ajax({
				type: 'POST',
				url: '../wp-content/plugins/wizard-tutelas/admin/query.php',
				data: "id=" + id + "&action="+action,
				success: function(data) {
					JData = JSON.parse(data);
					$('#nombre').val(JData['nombre']);
					$('#descripcion').val(JData['detalle']);
					$('#actionFormFlujo').val('update');
					$('#FieldidForm').val(JData['id']);
					$('#palabras_clave').val(JData['palabras_clave']);
					
				}
			});
		}
	}


    function fnChangeTipoComponente(obj){
		$('#btn-submit-new-component').show();
		if(obj.value==3){
			$("#contTitle1").show();
			$("#contTitle2").show();
			$("#contInicial").show();
            $("#contSelForm").show();
			$('#btn-submit-new-flujo').show();
			$('#idComp2').remove();
			$('#idComp3').remove();
	
		}else if(obj.value==2){
			$("#contTitle1").show();
			$("#contTitle2").show();
			$("#contInicial").show();
            $("#contSelForm").hide();
			$('#btn-submit-new-flujo').show();
			$('#idComp2').remove();
			$('#idComp3').remove();
		}else{
			$("#contTitle1").hide();
			$("#contTitle2").hide();
			$("#contInicial").hide();
			$("#contOptions").hide();
            $("#contSelForm").hide();
			$('#btn-submit-new-flujo').hide();
			$('#idComp2').remove();
			$('#idComp3').remove();
		}
	}


	function fnbtnRelacionar(id,componente,back,is_firts){
		if(is_firts == 0){
			$('#is_firts').val(0);
			$('#optionBack').attr('disabled','true');
		}else{
			$('#is_firts').val(1);
			$('#optionBack').removeAttr('disabled');
		}

		$('#optionBack option').remove();
		$('#optionBack').append('<option></option>');
		$('#optionNext option').remove();
		$('#optionNext').append('<option></option>');

		$('#nextForm option').remove();
		$('#nextForm').append('<option></option>');
		$('#nextForm').append('<option value="0">0</option>');
		$('#backForm option').remove();
		$('#backForm').append('<option></option>');
		$('#backForm').append('<option>0</option>');
		$('#idComp2').remove();
		$('#idComp3').remove();
		$("#table_rel table tbody tr").remove();
		$('#optionComponenteHidden').val(componente);
		if(componente == 3){
			
			$('#idStepComp3').append('<p id="idComp3"> '+id+'</p>');
			$('#contOptions').hide();		
			$("#contTitle1").hide();
			$("#contTitle2").hide();
			$("#contInicial").hide();
            $("#contSelForm").hide();
            $("#contTipo").hide();
            $('#hrForm').hide();
			$('#btn-submit-new-component').show();
			$('#contRelForm').show();
			$("#btn-submit-new-component").hide();
			$("#backForm option").remove();


			$.ajax({
				type: 'POST',
				url: '../wp-content/plugins/wizard-tutelas/admin/query.php',
				data: "id=" + id + "&flujo="+$("#idFlujop").text().trim()+"&action=valRelStep",
				success: function(data) {
					var t = JSON.parse(data);
					for(i=0; i < t.length; i++){
						$('#nextForm').append('<option value="'+t[i]['id']+'">'+t[i]['id']+'</option>');
					}
					$('#nextForm').append('<option value="'+id+'">'+id+'</option>');	
				}
			});

			$.ajax({
				type: 'POST',
				url: '../wp-content/plugins/wizard-tutelas/admin/query.php',
				data: "id=" + id + "&flujo="+$("#idFlujop").text().trim()+"&action=valRelStepBack",
				success: function(data) {
					var t = JSON.parse(data);
					$('#backForm').append('<option value="0">0</option>');
					for(i=0; i < t.length; i++){
						if(t[i]['id'] == back){
							$('#backForm').append('<option value="'+t[i]['id']+'" selected>'+t[i]['id']+'</option>');	
						}else{
							$('#backForm').append('<option value="'+t[i]['id']+'">'+t[i]['id']+'</option>');
						}
						
					}	
				}
			});


		}else if(componente == 2){
			$('#optionNext').append('<option value="0">0</option>');
			$('#idStepComp2').append('<p id="idComp2"> '+id+'</p>');
			$('#contRelForm').hide();
			$("#contTitle1").hide();
			$("#contTitle2").hide();
			$("#contInicial").hide();
            $("#contSelForm").hide();
            $("#contTipo").hide();
            $('#hrForm').hide();
			$('#table_rel').show();
			$('#btn-submit-new-component').show();
			$('#contOptions').show();
			$("#btn-submit-new-component").hide();
			$.ajax({
				type: 'POST',
				url: '../wp-content/plugins/wizard-tutelas/admin/query.php',
				data: "id=" + id + "&flujo="+$("#idFlujop").text().trim()+"&action=valRelStep",
				success: function(data) {
					var t = JSON.parse(data);
					for(i=0; i < t.length; i++){
						$('#optionNext').append('<option value="'+t[i]['id']+'">'+t[i]['id']+'</option>');
					}	
				}
			});

			$.ajax({
				type: 'POST',
				url: '../wp-content/plugins/wizard-tutelas/admin/query.php',
				data: "id=" + id + "&flujo="+$("#idFlujop").text().trim()+"&action=valRelStepBack",
				success: function(data) {
					var t = JSON.parse(data);
					for(i=0; i < t.length; i++){
						if(t[i]['id'] == back){
							$('#optionBack').append('<option value="'+t[i]['id']+'" selected>'+t[i]['id']+'</option>');	
						}else{
							$('#optionBack').append('<option value="'+t[i]['id']+'">'+t[i]['id']+'</option>');
						}
						
					}	
				}
			});

			$.ajax({
				type: 'POST',
				url: '../wp-content/plugins/wizard-tutelas/admin/query.php',
				data: "id=" + id + "&action=getRelaciones",
				success: function(data) {
					
						var t = JSON.parse(data)[0]['detalle'];
						var json = JSON.parse(t.replace(/\\/g, ''));
						for(i=0; i < json.length; i++){
							$("#table_rel table").append("<tr id='tr_"+i+"' onclick='fnbtnEditOption("+i+",event)'><td class='table_value'>"+json[i]['value']+"</td><td class='table_next'>"+json[i]['next']+"</td><td class='table_img'>"+json[i]['img']+"</td></td></tr>");					
						}
					
				}
			});
		}
	}

	function fnbtnEditTableComponent(id_tr,e){
		e.preventDefault();
		document.getElementById('id_confrmdiv').style.display="block";

		document.getElementById('id_cancelbtn').onclick = function(e){
			document.getElementById('id_confrmdiv').style.display="none";
			return false;
		}

		document.getElementById('id_truebtn').onclick = function(e){
			e.preventDefault();
			$('#contRelForm').hide();

			if($('#tr_'+id_tr+' td')[0].innerText == 'Decisión'){
				$("#contTitle1").show();
				$("#contTitle2").show();
				$("#contInicial").show();
				$("#contSelForm").hide();
				$('#btn-submit-new-flujo').show();
				$('#idComp2').remove();
				$('#idComp3').remove();
				$('#tipoComponente').val(2);
				$('#tipoComponente').attr('disabled','disabled');
				$('#titulo1').val($('#tr_'+id_tr+' td')[1].innerText);
				$('#titulo2').val($('#tr_'+id_tr+' td')[2].innerText);
				$('#idComponent').val($('#tr_'+id_tr+' th')[0].innerText);
				$('#btn-submit-new-component').show();

				var valIni = 0;
				for(u=0; u < $('#tblDetailsFlujos tbody tr').length; u++){
					if($('#tblDetailsFlujos tbody tr:eq('+u+') td')[3].innerText == 'Si'){
						valIni = 1;
					}
				}


				if($('#tr_'+id_tr+' td')[3].innerText == 'Si'){
					$('#initialComponente').removeAttr('disabled');
					$('#initialComponente').val(0);
				}else{
					if(valIni == 1){
						$('#initialComponente').attr('disabled','disabled');
						$('#initialComponente').val(1);
					}else{
						$('#initialComponente').removeAttr('disabled');
						$('#initialComponente').val(1);
					}
					
				}
			}

			if($('#tr_'+id_tr+' td')[0].innerText == 'Formulario'){
				$('#formulario option').remove();
				$("#contTitle1").show();
				$("#contTitle2").show();
				$("#contInicial").show();
				$("#contSelForm").show();
				$('#btn-submit-new-flujo').show();
				$('#idComp2').remove();
				$('#idComp3').remove();
				$('#titulo1').val($('#tr_'+id_tr+' td')[1].innerText);
				$('#titulo2').val($('#tr_'+id_tr+' td')[2].innerText);
				$('#idComponent').val($('#tr_'+id_tr+' th')[0].innerText);
				$('#btn-submit-new-component').show();
				var valIni = 0;
				for(u=0; u < $('#tblDetailsFlujos tbody tr').length; u++){
					if($('#tblDetailsFlujos tbody tr:eq('+u+') td')[3].innerText == 'Si'){
						valIni = 1;
					}
				}


				if($('#tr_'+id_tr+' td')[3].innerText == 'Si'){
					$('#initialComponente').removeAttr('disabled');
					$('#initialComponente').val(0);
				}else{
					if(valIni == 1){
						$('#initialComponente').attr('disabled','disabled');
						$('#initialComponente').val(1);
					}else{
						$('#initialComponente').removeAttr('disabled');
						$('#initialComponente').val(1);
					}
					
				}
				$.ajax({
					type: 'POST',
					url: '../wp-content/plugins/wizard-tutelas/admin/query.php',
					data: "id=" + $('#idFlujop').text()+ "&action=setForms",
					success: function(data) {
						form = JSON.parse(data);
						for(o = 0; o < form.length; o++){
							$('#formulario').append('<option value="' + form[o]['id'] + '">' + form[o]['id'] +' - '+ form[o]['nombre']  + '</option>');
							
						}
						$('#formulario').append('<option selected value="' + $('#tr_'+id_tr+' td')[6].innerText + '">' + $('#tr_'+id_tr+' td')[6].innerText  + '</option>');
					}
				});
				
				
			}
			document.getElementById('id_confrmdiv').style.display="none";
			return false;
		};	

		document.getElementById('id_falsebtn').onclick = function(e){
			e.preventDefault();
			idF = $('#idFlujop').text();
			nameF = $('#nameFlujop').text();
			$.ajax({
					type: 'POST',
					url: '../wp-content/plugins/wizard-tutelas/admin/query.php',
					data: "id=" + $('#tr_'+id_tr+' th')[0].innerText + "&action=deleteComponentPrincipal",
					success: function(data) {
						document.getElementById('id_confrmdiv').style.display="none";
						$('#tblDetailsFlujos').remove();
						$('#hrForm').remove();
						fnbtnDetalle(idF,nameF,'detailsFlujo');
					}
				});

		}


	}

	function fnbtnEditOption(id_tr,e){
		e.preventDefault();

		document.getElementById('id_confrmdiv').style.display="block";

		
		document.getElementById('id_cancelbtn').onclick = function(e){
			document.getElementById('id_confrmdiv').style.display="none";
			return false;
		}

		document.getElementById('id_truebtn').onclick = function(e){
			e.preventDefault();
			$("#optionvalor").val($('#tr_'+id_tr+' td')[0].innerText);
			$('#optionNext').append('<option value="'+$('#tr_'+id_tr+' td')[1].innerText+'">'+$('#tr_'+id_tr+' td')[1].innerText+'</option>');
			$('#optionImgHidden').val($('#tr_'+id_tr+' td')[2].innerText);
			$('#tr_'+id_tr).remove();
			document.getElementById('id_confrmdiv').style.display="none";
			return false;
		};

		document.getElementById('id_falsebtn').onclick = function(e){
			e.preventDefault();
			$('#tr_'+id_tr).remove();
			var json = "[";
			var used = "";
			cont = 0;
			if($(".table_value").parent("tr").find("td").length != 0){
				for(i=0; i<$(".table_value").parent("tr").find("td").length; i++){
					cont++;
					if(cont <=3){
						if(cont == 1){
							json += '{"value":"' + $(".table_value").parent("tr").find("td").eq(i).text()+'"';

						}else{
							if(cont == 2){
								json += '"next":"' +$(".table_value").parent("tr").find("td").eq(i).text()+'"';
								used += $(".table_value").parent("tr").find("td").eq(i).text()+',';
							}else{
								json += '"img":"' +$(".table_value").parent("tr").find("td").eq(i).text()+'"';
							}
						}
						if(cont < 3){
							json += ','
						}else{
							if(cont+1 == $(".table_value").parent("tr").find("td").length ){
								json +='}';
							}else{
								json +='},'
							}
							
							cont = 0;
						}
					}
				}
				json += ']';
			}else{
				json = '';
				used = '';
			}

			json = json.replace(',]',']');
			if(used.length > 0){
				used = used.substring(0, used.length - 1);
			}
		
			$.ajax({
				type: 'POST',
				enctype: 'multipart/form-data',
				url: '../wp-content/plugins/wizard-tutelas/admin/query.php',
				data: "id=" + $('#idComp2').text()+ "&detalle=" + json+ "&used=" + used+ "&atras=" + $("#optionBack").val()+ "&action=saveOptionRelMul",
				success: function(data) {
					file_data = $('#optionImg')[0].files[0];
					form_data = new FormData();
					form_data.append('file', file_data);
					form_data.append('action', 'upload');
					$.ajax({
						type: 'POST',
						enctype: 'multipart/form-data',
						contentType: false,
						processData: false,
						url: '../wp-content/plugins/wizard-tutelas/admin/upload.php',
						data: form_data,
						success: function(data) {
							document.getElementById('id_confrmdiv').style.display="none";
							$('#optionImgHidden').val('');
							$('#optionBack option').remove();
							$('#optionBack').append('<option></option>');
							$('#optionNext option').remove();
							$('#optionNext').append('<option></option>');
							$('#optionImg').val('');
							$('#optionvalor').val('');
							fnbtnRelacionar($('#idComp2').text(),$('#optionComponenteHidden').val(),$('#optionBack').val(),$('#is_firts').val());							
						}
					});
				}
			});
		};
	}

</script>
