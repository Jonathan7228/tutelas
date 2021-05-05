<?php
global $wpdb;

if (! current_user_can ('manage_options')) wp_die (__ ('No tienes suficientes permisos para acceder a esta página.'));

if( $_POST['actionForm'] != '' && $_POST['actionForm' ] =='save' ){
	$table = 'formularios_tutelas';
	$data = array('nombre' => $_POST['nombre'], 'detalle' => $_POST['descripcion']);
	$wpdb->insert($table,$data);
	$my_id = $wpdb->insert_id;
}

if( $_POST['actionForm'] != '' && $_POST['actionForm' ]= 'update' ){
	$wpdb->update( 'formularios_tutelas', 
    array( 
      'nombre' => $_POST['nombre'],
      'detalle' => $_POST['descripcion']
    ),
    array( 'id' => $_POST['FieldidForm'] )
  );
}


$result = $wpdb->get_results("SELECT * FROM formularios_tutelas");

?>

 	<div class="wrap">
		<h2 style="text-align: center;">Formularios </h2>
	
		<div class="wrap" id="contentGridForms">
			<div><button id="btnNew" type="button" class="btn btn-primary">Nuevo Formulario</button></div>
			
			<table class="table table-hover" style="width: 100%">
			<thead>
				<tr>
				<th scope="col">#</th>
				<th scope="col">Nombre</th>
				<th scopt="col">Componentes</th>
				<th scopt="col">Acción</th>
				</tr>
			</thead>
			<tbody>
			<?php for($i = 0; $i < count($result); $i++){ 
					echo '<tr>
					<th scope="row">'.$result[$i]->id.'</th>
					<td>'.$result[$i]->nombre.'</td>
					<td> <button id="'.$result[$i]->id.'" onclick="fnbtnDetalle(\''.$result[$i]->id.'\',\''.$result[$i]->nombre.'\',\'details\');"  class="btn btn-primary">Detalles</button></td>
					<td> <button id="'.$result[$i]->id.'" onclick="fnbtnDetalle(\''.$result[$i]->id.'\',\''.$result[$i]->nombre.'\',\'edit\');"  class="btn btn-primary">Editar</button></td>
					</tr>';
				
			}
				?>
				
			</tbody>
			</table>
		</div>

		<div class="container" id="contentForm" style="display:none">
		<div class="container">
				<div class="row">
					<form action="<?php get_the_permalink(); ?>" method="post" id="form_new_form">
						<div class="form-row">
						<div class="row">
						<div class="col-md-7">

							<div class="form-group col-md-10">
								<label for="nombre">Nombre</label>
								<input type="text" class="form-control" id="nombre" name="nombre" required>
							</div>
							<div class="form-group col-md-10">
								<label for="descripcion">Descripción</label>
								<textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
							</div>
						</div>
						<div class="col-md-5">
						<h5>Indicativos:</h5>
							<p><b>1.</b> Para palabras o textos en negrilla insertar dentro de las etiquetas (<b>&lt;b&gt; &lt;/b&gt;</b>)</p>
							<p><b>2.</b> Para tabular utilizar <b>"guión"</b> (------------).</p>
						</div>

						</div>

						</div>
						<div class="form-row" style="margin-top: 10px;">
							<input type="hidden" id="actionForm" name="actionForm">
							<input type="hidden" id="FieldidForm" name="FieldidForm">						
							<button type="submit" id="btn-submit-new-form" name="btn-submit-new-form" class="btn btn-primary">Guardar</button>
							<button  type="button" class="btn btn-primary btnHome">Regresar</button>
						</div>
					</form>
				</div>
				<div class="row" style="margin-top: 20px;">
					<div class="col-5">
						<div class="row" style="height:50px !important;">
							<p><b>Nota:</b> Si en el formulario se desea usar datos del usuario que inició sesión, utilice los datos de la siguiente tabla:</p>
						</div>
						<div class="row">
							<table class="table table-hover">
								<thead>
								<tr>
									<th>Nombre</th>
									<th>Variable</th>
								</tr>
								</thead>
								<tbody>
									<tr>
										<td>Nombre</td> 
										<td> @wp_nombres@</td> 
									</tr>
									<tr>
										<td> Apellidos</td> 
										<td> @wp_apellidos@</td> 
									</tr>
									<tr>
										<td> Edad</td> 
										<td> @wp_edad@</td> 
									</tr>
									<tr>
										<td> Fecha de nacimiento</td> 
										<td> @wp_fecha_nacimiento@</td> 
									</tr>
									<tr>
										<td> Profesión</td> 
										<td> @wp_profesion@</td> 
									</tr>
									<tr> 
										<td> Tipo de documento</td> 
										<td> @wp_tipo_documento@</td> 
									</tr>
									<tr> 
										<td> Documento</td> 
										<td> @wp_documento@</td> 
									</tr>
									<tr>
										<td> Teléfono</td> 
										<td> @wp_telefono@</td> 
									</tr>
									<tr> 
										<td> Nacionalidad</td> 
										<td> @wp_nacionalidad@</td> 
									</tr>
									<tr> 
										<td> Ciudad de residencia</td> 
										<td> @wp_ciudad_residencia@</td>
									</tr> 
									<tr>
										<td> Correo electrónico</td> 
										<td> @wp_correo@</td> 
									</tr>
								</tboby>
							</table>
						</div>
					</div>
					<div class="col-1">
					</div>
					<div class="col-5">
						<div class="row" style="height:50px !important; text-align: center;">
							<h4>Campos del formulario</h4>
						</div>
						<div class="row">
							<table class="table table-hover">
								<thead>
								<tr>
									<th>Nombre</th>
									<th>Variable</th>
								</tr>
								</thead>
								<tbody id="tbodyTableFields">
								</tboby>
							</table>
						</div>
					</div>


				</div>
			</div>
		</div>

		<div class="container" id="contentFormDetalle" style="display:none">
			<div class="container" id="containerDetalle">
				<p id="idForm" style="display:flex"><b> ID. Formulario: </b> </p>
				<p id="nameForm" style="display:flex"><b >Nombre Formulario: </b > </p>
				<button id="newComponent" type="button" class="btn btn-primary">Nuevo componente</button>
				<button type="button" class="btn btn-primary btnHome">Regresar</button>

				<hr id="hrForm" style="display:none">
				<form action="<?php get_the_permalink(); ?>" method="post" id="formComponents">
					<div class="row">
						<div class="col" id="contTipo" style="display:none">
							<label for="tipoComponente">Tipo de componente</label>
							<select class="form-control" id="tipoComponente" onchange="fnChangeTipo(this)"> 
							<option></option>
							<option value="1">Texto</option>
							<option value="2">Selección</option>
							</select>
						</div>
						<div class="col" id="contOrden" style="display:none">
							<label for="ordenComponente">Orden del componente</label>
							<select class="form-control" id="ordenComponente"> 
							</select>
						</div>
					</div>

  					<div class="row">
						<div class="col" id="contName" style="display:none">
							<label for="nameText">Nombre del campo</label>
							<input type="text" class="form-control" id="nameText">
						</div>
						<div class="col" id="contTitle" style="display:none">
							<label for="titleText">Titulo del campo</label>
							<input type="text" class="form-control" id="titleText">
						</div>
					</div>

					<div class="row">
						<div class="col" id="contTipoDato" style="display:none">
							<label for="tipo_dato">Tipo de dato</label>
							<select id="tipo_dato" class="form-control">
								<option></option>
								<option value="text">Texto</option>
								<option value="date">Fecha</option>
								<option value="number">Numérico</option>
								<option value="email">Correo</option>

							</select>
						</div>
						<div class="col" id="contRequerido" style="display:none">
							<label for="requerido">Requerido</label>
							<select id="requerido" class="form-control">
								<option></option>
								<option value="required">Si</option>
								<option value=" ">No</option>
							</select>
						</div>
					</div>
					
					<div class="form-group" id="contOptions" style="display:none">
						<label for="titleOptions">Opciones de selección</label>
						<div class="row">
						<div class="col">
							<a class="add-type pull-right" href="javascript: void(0)" tiitle="Click to add more"><i class="glyphicon glyphicon-plus-sign"></i>Agregar</a>
						</div>
					</div>




					<div class="container">
						<div class="col-sm-12" id="container2">
							<div id="type_container">
								<div class="row form-group" id="edit-0">
									<div class="col-md-2 control-label">
										<label class="control-label">
											Código :
										</label>
									</div>
									<div class="col-md-3">
									<input type="text" class="form-control" name="" />
									</div>
									<div class="col-md-3" style="width: 125px;">
										<label class="control-label">
											Descripción :
										</label>
									</div>
									<div class="col-md-4">
										<div class="row col-md-10">
											<input type="text" class="form-control" name="" style="margin-left: 10px; width: 100% !important;"/>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="type-container" style="display:none">
							<div class="row form-group type-row" id="">
								<div class="col-md-2 control-label">
									<label class="control-label">
										Código :
									</label>
								</div>
								<div class="col-md-3">
									<input type="text" class="form-control" name=""/>
								</div>
								<div class="col-md-3" style="width: 125px;">
									<label class="control-label">
										Descripción :
									</label>
								</div>
								<div class="col-md-4 ">
									<div class="row">
										<div class="col-md-10">
											<input type="text" class="form-control" name="" />
										</div>
										<div class="col-md-2">
											<a class="remove-type pull-right" targetDiv="" data-id="0" href="javascript: void(0);"><i class="glyphicon glyphicon-trash"></i>-</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
		


					<div class="form-row" style="margin-top: 10px;">
						<input type="hidden" id="jsonOptions" name="jsonOptions">
						<input type="hidden" id="idFormDetails" name="idFormDetails">						
						<button type="submit" name="btn-submit-new-component" id="btn-submit-new-component" class="btn btn-primary" style="display:none">Guardar</button>
					</div>
				</form>
			</div>	
		</div>
	</div>

 <script>
	$(document).ready(function() {
		$('.um-admin-notice').hide();
		$(document).on('click',"#btnNew",function(){
			$("#contentGridForms").hide();
			$("#contentForm").show();
			$('#actionForm').val('save');
		});

		$(".btnHome").on('click',function(){
			$("#contentGridForms").show();
			$("#contentForm").hide();
			$("#contentFormDetalle").hide();
			$('#tblDetailsForms').remove();
			$('#idFormp').remove();
			$('#nameFormp').remove();
			$('#hrTable').remove();

			$('#contTipo').hide();
			$('#contOrden').hide();
			$('#contName').hide();
			$('#contTipoDato').hide();
			$('#contRequerido').hide();
			$('#contTitle').hide();
			$('#contOptions').hide();
			$('#btn-submit-new-component').hide();
			$('#hrForm').hide();
			$('#tipoComponente').val('');
			$('#type_container input').val('');
			$('.type-row').remove();
			$('#ordenComponente option').remove();
			$('#type-container').append('<div class="row form-group type-row" id=""><div class="col-md-2 control-label"><label class="control-label">Código :</label></div><div class="col-md-3"><input type="text" class="form-control" name=""/></div><div class="col-md-3" style="width: 125px;"><label class="control-label">Descripción :</label></div><div class="col-md-4 "><div class="row"><div class="col-md-10"><input type="text" class="form-control" name="" /></div><div class="col-md-2"><a class="remove-type pull-right" targetDiv="" data-id="0" href="javascript: void(0);"><i class="glyphicon glyphicon-trash"></i>-</a></div></div></div></div>');
		});

		$('#newComponent').on('click',function(){
			$('#contTipo').show();
			$('#hrForm').show();
			$.ajax({
				type: 'POST',
				url: '../wp-content/plugins/wizard-tutelas/admin/query.php',
				data: "id=" + $('#idFormp').text()+ "&action=setOrden",
				success: function(data) {
					order = JSON.parse(data);
					for(o = 0; o < order.length; o++){
						$('#ordenComponente').append('<option value="' + order[o] + '">' + order[o] + '</option>');
					}
				}
			});
			
		});

		var doc = $(document);
                jQuery('a.add-type').on('click', function (e) {
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
                });



		$('#btn-submit-new-component').on('click', function(event){
			event.preventDefault();
			var val = 0;
			var ids = new Array();

			if($('#ordenComponente').val() == ''){
					val = 1;
					ids.push('#ordenComponente');
			}else{
				$('#ordenComponente').css('border','');
			}

			if($('#nameText').val() == ''){
					val = 1;
					ids.push('#nameText');
			}else{
				$('#nameText').css('border','');
			}

			if($('#titleText').val() == ''){
					val = 1;
					ids.push('#titleText');
			}else{
				$('#titleText').css('border','');
			}

			if($('#requerido').val() == ''){
					val = 1;
					ids.push('#requerido');
			}else{
				$('#requerido').css('border','');
			}

			if($('#tipoComponente').val() == 1){
				if($('#tipo_dato').val() == ''){
					val = 1;
					ids.push('#tipo_dato');
				}else{
					$('#tipo_dato').css('border','');
				}
			}

			if(val != 0){
					alert('Debe ingresar los campos obligatorios');
					for(i=0;i<ids.length;i++){
						$(ids[i]).css('border','1px solid #f00');
					}
					return false;
			}else{


				json = '[{';
				cont = 0;
				for(i=0;i<$('#type_container input[type=text]').length; i ++){
					cont++
					if(cont < 2){
						json += '"codigo":"'+$('#type_container input[type=text]')[i].value+'",';
					}else{
						cont = 0;
						if(i+1!=$('#type_container input[type=text]').length){
							json += '"descripcion":"'+$('#type_container input[type=text]')[i].value+'"},{';
						}else{
							json += '"descripcion":"'+$('#type_container input[type=text]')[i].value+'"}';
						}
						
					}

				}
				json += ']';
				if($('#tipoComponente').val() == 2){
					$('#jsonOptions').val(json);
				}else{
					$('#jsonOptions').val('');
				}
				

				$.ajax({
					type: 'POST',
					url: '../wp-content/plugins/wizard-tutelas/admin/query.php',
					data: "id=0&id_formulario=" + $('#idFormDetails').val() + "&orden=" + $('#ordenComponente').val() + "&componente=" + $('#tipoComponente').val() + "&nombre=" + $('#nameText').val() + "&titulo=" + $('#titleText').val() + "&detalle=" + $('#jsonOptions').val() + "&tipo_dato=" + $('#tipo_dato').val() + "&requerido=" + $('#requerido').val() + "&action=saveComponent",
					success: function(data) {
						id=$('#idFormp').text();
						name = $('#nameFormp').text();
						$('#idFormDetails').val('');
						$('#ordenComponente option').remove();
						$('#tipoComponente').val('');
						$('#nameText').val('');
						$('#titleText').val('');
						$('#jsonOptions').val('');
						$('#contTipoDato').val('');
						$('#contRequerido').val('');
						$('.type-row').remove();
						$('#idFormp').remove();
						$('#nameFormp').remove();
						$('#tblDetailsForms').remove();
						$('#hrTable').remove();
						$('#type_container input').val('');
						$('#contTipo').hide();
						$('#contOrden').hide();
						$('#contName').hide();
						$('#contTipoDato').hide();
						$('#contRequerido').hide();
						$('#contTitle').hide();
						$('#contOptions').hide();
						$('#btn-submit-new-component').hide();
						$('#hrForm').hide();
						$('#type-container').append('<div class="row form-group type-row" id=""><div class="col-md-2 control-label"><label class="control-label">Código :</label></div><div class="col-md-3"><input type="text" class="form-control" name=""/></div><div class="col-md-3" style="width: 125px;"><label class="control-label">Descripción :</label></div><div class="col-md-4 "><div class="row"><div class="col-md-10"><input type="text" class="form-control" name="" /></div><div class="col-md-2"><a class="remove-type pull-right" targetDiv="" data-id="0" href="javascript: void(0);"><i class="glyphicon glyphicon-trash"></i>-</a></div></div></div></div>');
						fnbtnDetalle(id,name,'details');

					}
				});
			}
		});


		
	});
	function fnbtnDetalle(id,name,action){
		console.log(id+' - '+name+' - '+action)
		if(action == 'details' ){
			$("#contentGridForms").hide();
			$("#contentFormDetalle").show();
			$('#idForm').append('<p id="idFormp"> '+id+'</p>');
			$('#nameForm').append('<p id="nameFormp"> '+name+'</p>');
			$('#idFormDetails').val($('#idFormp').text());
			$.ajax({
				type: 'POST',
				url: '../wp-content/plugins/wizard-tutelas/admin/query.php',
				data: "id=" + id+ "&action="+action,
				success: function(data) {
					$('#containerDetalle').append(data);
				}
			});
		}else{
			$("#contentGridForms").hide();
			$("#contentForm").show();
			$.ajax({
				type: 'POST',
				url: '../wp-content/plugins/wizard-tutelas/admin/query.php',
				data: "id=" + id + "&action="+action,
				success: function(data) {
					JData = JSON.parse(data);
					$('#nombre').val(JData['nombre']);
					$('#descripcion').val(JData['detalle']);
					$('#actionForm').val('update');
					$('#FieldidForm').val(JData['id']);
					$('#tbodyTableFields').append('<tr>')
					$.ajax({
						type: 'POST',
						url: '../wp-content/plugins/wizard-tutelas/admin/query.php',
						data: "id=" + id + "&action=getFieldsByForm",
						success: function(data) {
							var json = JSON.parse(data);

							for(i=0; i < json.length; i++){
								$('#tbodyTableFields').append('<tr><td>'+json[i]['nombre']+'</td><td>@'+json[i]['nombre']+'@</td></tr>');
							}
							

							
						}
					});
					
				}
			});
		}
	}

	function fnChangeTipo(obj){
		$('#btn-submit-new-component').show();
		if(obj.value==1){
			$("#contName").show();
			$("#contTitle").show();
			$("#contOrden").show();
			$('#contTipoDato').show();
			$('#contRequerido').show();
			$('#btn-submit-new-component').show();
			$("#contOptions").hide();
		}else if(obj.value==2){
			$("#contName").show();
			$("#contTitle").show();
			$("#contOrden").show();
			$("#contOptions").show();
			$('#contTipoDato').hide();
			$('#contRequerido').show();
			$('#btn-submit-new-component').show();
		}else{
			$("#contName").hide();
			$("#contTitle").hide();
			$("#contOrden").hide();
			$("#contOptions").hide();
			$('#contTipoDato').hide();
			$('#contRequerido').hide();
			$('#btn-submit-new-component').hide();
		}
	}

	function fnbtnDeleteField(id){
		var didConfirm = confirm("Esta segur(@) de eliminar este componente?");
        if (didConfirm == true) {
		$.ajax({
				type: 'POST',
				url: '../wp-content/plugins/wizard-tutelas/admin/query.php',
				data: "id=" + id + "&action=deleteComponent",
				success: function(data) {
					idForm=$('#idFormp').text();
					name = $('#nameFormp').text();
					$('#idFormp').remove();
					$('#nameFormp').remove();
					$('#tblDetailsForms').remove();
					fnbtnDetalle(idForm,name,'details');
				}
			});
		}
	}




	
 </script>

 