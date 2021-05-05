<?php 
	
	function tutelas_usuario(){
		global $wpdb;
		$us = wp_get_current_user();
		$url_actual="http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        $result = $wpdb->get_results("SELECT tutelas.id, flujos_tutelas.nombre, tutelas.fecha, tutelas.usuario, flujos_tutelas.id as id_flujo FROM tutelas LEFT JOIN flujos_tutelas  on flujos_tutelas.id = tutelas.id_flujo WHERE tutelas.usuario = '".$us->user_login."'");

        ob_start();

        
		?>



            <div class="content">
                <h2 style="text-align: center;">Tutelas </h2>
                    <table id="table_tutelas" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <th>Id Tutela</th>
                            <th>Nombre Flujo</th>
                            <th>Fecha</th>
                        </thead>
                        <tbody>
                        <?php 
                            for($i = 0; $i < count($result); $i++){ 
                                echo '<tr>
                                <td>'.$result[$i]->id.'</td>
                                <td>'.$result[$i]->nombre.'</td>
                                <td>'.$result[$i]->fecha.'</td>
                                </tr>';
                            }
                        ?>
                        
                        </tbody>
                    </table>
                </div>

		<?php
		$return = ob_get_contents();
		ob_end_clean();
		return $return; 
	}

	add_shortcode('tutelas_usuario','tutelas_usuario');
?>