<?php 
    require_once '../../../../wp-includes/pluggable.php';
    require_once '../../../../wp-load.php';

    

    function funcDetails($id){
        global $wpdb;
        $result = $wpdb->get_results("SELECT * FROM detalle_formularios WHERE id_formulario = ".$id." ORDER BY orden ");
        $table ='<hr id="hrTable"> <table id="tblDetailsForms" class="table table-hover" style="width: 100%">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scopt="col">Titulo</th>
            <th scopt="col">Tipo Componente</th>
            <th scopt="col">Orden</th>
            <th scopt="col">Tipo dato</th>
            <th scopt="col">Requerido</th>
            <th scopt="col">Accion</th>

            </tr>
        </thead>
        <tbody>';


        for($x = 0; $x < count($result); $x++){ 
            $tipo = ($result[$x]->componente == 1) ? 'Texto' : 'Selección';
            $requerido = ($result[$x]->requerido == 'required') ? 'Si' : 'No';
            $tipo_dato = ($result[$x]->tipo_dato != '' || $result[$x]->tipo_dato != NULL ) ? $result[$x]->tipo_dato : 'Selección';
            $table .= '<tr>
            <th scope="row">'.$result[$x]->id.'</th>
            <td>'.$result[$x]->nombre.'</td>
            <td>'.$result[$x]->titulo.'</td>
            <td>'.$tipo.'</td>
            <td>'.$result[$x]->orden.'</td>
            <td>'.$tipo_dato.'</td>
            <td>'.$requerido.'</td>
            <td> <button  onclick="fnbtnDeleteField(\''.$result[$x]->id.'\');"  class="btn btn-primary">Eliminar</button></td>
            </tr>';
        
        }
        $table .= '</tbody></table>';
        return $table;
        
    }

    function funcHeadForm($id){
        global $wpdb;
        $result = $wpdb->get_results("SELECT * FROM formularios_tutelas WHERE id = ".$id."");
        $array = [
            "id"=> $id,
            "nombre" => $result[0]->nombre,
            "detalle" => $result[0]->detalle,
        ];
        return json_encode($array); 
    }

    function funcOrdenComponents($id){
        global $wpdb;
        $result = $wpdb->get_results("SELECT * FROM detalle_formularios WHERE id_formulario = ".$id." ORDER BY orden ASC");
        $con = count($result);
        $orderDB = array();
        $order = array();
        $val = 0;
        for($i = 0 ; $i <  $con; $i++){
            array_push($orderDB,$result[$i]->orden);   
        }
        if(count($orderDB)>0){
            $arrayRange = range(1,max($orderDB));
            $missingValues = array_diff($arrayRange,$orderDB);
            array_push($missingValues,$result[$con-1]->orden+1);
    
            foreach($missingValues as $valor ){
                array_push($order,$valor);
            }
        }else{
            array_push($order,1);
        }
        return json_encode($order); 
    }

    function funcSaveComponent($id_formulario,$orden,$componente,$nombre,$titulo,$detalle,$tipo_dato,$requerido){
        global $wpdb;
        $table = 'detalle_formularios';
        $data = array('id_formulario' => $id_formulario, 
                        'orden' => $orden,
                        'componente' => $componente,
                        'nombre' => $nombre,
                        'titulo' => $titulo,
                        'detalle' => $detalle,
                        'tipo_dato' => $tipo_dato,
                        'requerido' => $requerido );
        $wpdb->insert($table,$data);
        $my_id = $wpdb->insert_id;
        return $my_id;
    }


    function funcDeleteComponent($id){
        global $wpdb;
        $table = 'detalle_formularios';
        $wpdb->delete( $table, array( 'id' => $id ) );
        return true;
    }

    function funcEditFlujo($id){
        global $wpdb;
        $result = $wpdb->get_results("SELECT * FROM flujos_tutelas WHERE id = ".$id."");
        $array = [
            "id"=> $id,
            "nombre" => $result[0]->nombre,
            "detalle" => $result[0]->detalle,
            "palabras_clave" => $result[0]->palabras_clave
        ];
        return json_encode($array); 
    }

    function funcDetailsFlujo($id){
        global $wpdb;
        $result = $wpdb->get_results("SELECT * FROM detalle_flujos WHERE id_flujo = ".$id." ORDER BY id ASC ");
        $table ='<hr id="hrTable"> <table id="tblDetailsFlujos" class="table table-hover" style="width: 100%">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Componente</th>
            <th scopt="col">Titulo</th>
            <th scopt="col">Descripción</th>
            <th scopt="col">Inicial</th>
            <th scopt="col">Siguiente</th>
            <th scopt="col">Anterior</th>
            <th scopt="col">Formulario</th>
            <th scopt="col">Relacionar</th>

            </tr>
        </thead>
        <tbody>';


        for($x = 0; $x < count($result); $x++){ 
            $componente = ($result[$x]->componente == 2) ? 'Decisión' : 'Formulario';
            $inicial = ($result[$x]->inicial == 0) ? 'Si' : 'No';
            $formulario = ($result[$x]->formulario == 0) ? 'No aplica' : $result[$x]->formulario;
           
            $resultado = json_decode($result[$x]->detalle);
            $next =  end($resultado); 
            $table .= '<tr id="tr_'.$result[$x]->id.'" ">
            <th scope="row" onclick="fnbtnEditTableComponent('.$result[$x]->id.',event)">'.$result[$x]->id.' </th>
            <td onclick="fnbtnEditTableComponent('.$result[$x]->id.',event)">'.$componente.'</td>
            <td onclick="fnbtnEditTableComponent('.$result[$x]->id.',event)">'.$result[$x]->titulo.'</td>
            <td onclick="fnbtnEditTableComponent('.$result[$x]->id.',event)">'.$result[$x]->titulo1.'</td>
            <td onclick="fnbtnEditTableComponent('.$result[$x]->id.',event)">'.$inicial.'</td>
            <td onclick="fnbtnEditTableComponent('.$result[$x]->id.',event)">'.$result[$x]->used.'</td>
            <td onclick="fnbtnEditTableComponent('.$result[$x]->id.',event)">'.$result[$x]->atras.'</td>
            <td onclick="fnbtnEditTableComponent('.$result[$x]->id.',event)">'.$formulario.'</td>
            <td> <button  onclick="fnbtnRelacionar(\''.$result[$x]->id.'\',\''.$result[$x]->componente.'\',\''.$result[$x]->atras.'\',\''.$result[$x]->inicial.'\');"  class="btn btn-primary">Relacionar</button></td>
            </tr>';
        
        }
        $table .= '</tbody></table>';
        return $table;
    }

    function funcOrdenFlujo($id){
        global $wpdb;
        $result = $wpdb->get_results("SELECT * FROM detalle_flujos WHERE id_flujo = ".$id." ORDER BY orden ASC");
        $con = count($result);
        $orderDB = array();
        $order = array();
        $val = 0;
        for($i = 0 ; $i <  $con; $i++){
            array_push($orderDB,$result[$i]->orden);   
        }

        if(count($orderDB)>0){
            $arrayRange = range(1,max($orderDB));
            $missingValues = array_diff($arrayRange,$orderDB);
            array_push($missingValues,$result[$con-1]->orden+1);

            foreach($missingValues as $valor ){
                array_push($order,$valor);
            }
        }else{
            array_push($order,1);
        }
        
  
        return json_encode($order); 
    }

    function funcFormsFlujo($id){
        global $wpdb;
        $result = $wpdb->get_results("SELECT * FROM formularios_tutelas a WHERE a.id NOT IN (SELECT DISTINCT formulario FROM detalle_flujos) ORDER BY id");
        return json_encode($result);
    }

    function funcComponentInitialFlujo($id){
        global $wpdb;
        $result = $wpdb->get_results("SELECT * FROM `detalle_flujos` WHERE inicial = 0 and id_flujo = ".$id."");
        return count($result);
    }

    function funcSaveHeadDetalleTutela($id,$id_flujo,$componente,$inicial,$titulo,$titulo1,$formulario){
        global $wpdb;
        $table = 'detalle_flujos';
        $data = array(  'id_flujo' => $id_flujo, 
                        'inicial' => $inicial,
                        'componente' => $componente,
                        'titulo' => $titulo,
                        'titulo1' => $titulo1,
                        'formulario' => $formulario);
        $wpdb->insert($table,$data);
        $my_id = $wpdb->insert_id;
        //return $id.' - '.$id_flujo.' - '.$componente.' - '.$inicial.' - '.$titulo.' - '.$titulo1.' - '.$formulario;
        return $my_id;
    }

    function funcRelStep($id,$id_flujo){
       global $wpdb;
       $result = $wpdb->get_results("select * from detalle_flujos where id not in(
        select substring_index( substring_index(used, ',', n), ',', -1 ) as usados from detalle_flujos join numbers on char_length(used) - char_length(replace(used, ',', '')) >= n - 1  where detalle_flujos.componente=3  ) and id_flujo = ".$id_flujo." and id <> ".$id."");
       return json_encode($result);
    }

    function funcgetRelaciones($id){
        global $wpdb;
        $result = $wpdb->get_results("select * from detalle_flujos where id = ".$id."");
           return json_encode($result);
    }

    function funcSaveOptionRelMul($id,$detalle,$used,$atras){
        global $wpdb;
        

        $wpdb->update( 'detalle_flujos', 
        array( 
          'detalle' => $detalle,
          'used' => $used,
          'atras' => $atras
        ),
        array( 'id' => $id )
      );

      return true;

    }

    function funcRelStepBack($id,$id_flujo){
        global $wpdb;
        $result = $wpdb->get_results("select id from detalle_flujos where id_flujo = ".$id_flujo." and id <> ".$id."");
        return json_encode($result);
    }

    function funcSaveOptionForm($id,$next,$back){
        global $wpdb;
        $wpdb->update( 'detalle_flujos', 
            array( 
            'detalle' => $next,
            'used' => $next,
            'atras' => $back
            ),
            array( 'id' => $id )
        );

      return true;

    }

    function funcGetFieldsByForm($id){
        global $wpdb;
        $result = $wpdb->get_results("select nombre from detalle_formularios where id_formulario = ".$id."");
        return json_encode($result);
    }

    function funcUpdateHeadDetalleTutela($id,$id_flujo,$componente,$inicial,$titulo,$titulo1,$formulario){
        global $wpdb;
        $wpdb->update( 'detalle_flujos', 
            array( 
            'titulo' => $titulo,
            'titulo1' => $titulo1,
            'formulario' => $formulario,
            'inicial' => $inicial
            ),
            array( 'id' => $id )
        );

      return true;
    }

    function funcDeleteComponentPrincipal($id){
        global $wpdb;
        $table = 'detalle_flujos';
        $wpdb->delete( $table, array( 'id' => $id ) );
        return true;
    }

    if (isset($_POST['id']) && isset($_POST['action']) ) {

        switch ($_POST['action']) {
            case 'edit':
                print_r(funcHeadForm($_POST['id']));
                break;
            case 'details':
                echo funcDetails($_POST['id']);
                break;
            case 'setOrden':
                echo funcOrdenComponents($_POST['id']);
                break;
            case 'saveComponent':
                echo funcSaveComponent($_POST['id_formulario'],$_POST['orden'],$_POST['componente'],$_POST['nombre'],$_POST['titulo'],$_POST['detalle'],$_POST['tipo_dato'],$_POST['requerido']);
                break;
            case 'deleteComponent':
                echo funcDeleteComponent($_POST['id']);
                break;
            case 'editFlujo':
                echo funcEditFlujo($_POST['id']);
                break;
            case 'detailsFlujo':
                echo funcDetailsFlujo($_POST['id']);
                break;
            case 'setOrdenFlujo':
                echo funcOrdenFlujo($_POST['id']);
                break;
            case 'setForms':
                echo funcFormsFlujo($_POST['id']);
                break;
            case 'setComponentInitialFlujo':
                echo funcComponentInitialFlujo($_POST['id']);
                break;
            case 'saveHeadDetalleTutela':
                echo funcSaveHeadDetalleTutela($_POST['id'],$_POST['id_flujo'],$_POST['componente'],$_POST['inicial'],$_POST['titulo'],$_POST['titulo1'],$_POST['formulario']);
                break;
            case 'valRelStep':
                print_r( funcRelStep($_POST['id'],$_POST['flujo']));
                break;
            case 'valRelStepBack':
                print_r( funcRelStepBack($_POST['id'],$_POST['flujo']));
                break;
            case 'getRelaciones':
                print_r( funcgetRelaciones($_POST['id']));
                break;
            case 'saveOptionRelMul':
                echo ( funcSaveOptionRelMul($_POST['id'],$_POST['detalle'],$_POST['used'],$_POST['atras']));
                break;
            case 'saveOptionForm':
                echo ( funcSaveOptionForm($_POST['id'],$_POST['next'],$_POST['back']));
                break;
            case 'getFieldsByForm':
                echo ( funcGetFieldsByForm($_POST['id']));
                break;
            case 'updateHeadDetalleTutela':
                echo (funcUpdateHeadDetalleTutela($_POST['id'],$_POST['id_flujo'],$_POST['componente'],$_POST['inicial'],$_POST['titulo'],$_POST['titulo1'],$_POST['formulario']));
                break;
            case 'deleteComponentPrincipal':
                echo (funcDeleteComponentPrincipal($_POST['id']));
                break;
        }
    }


?>