<?php
global $wpdb;

$result = $wpdb->get_results("SELECT tutelas.id, flujos_tutelas.nombre, tutelas.fecha, tutelas.usuario, flujos_tutelas.id as id_flujo FROM tutelas LEFT JOIN flujos_tutelas  on flujos_tutelas.id = tutelas.id_flujo");

?>




<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script>

    <div class="content">
    <h2 style="text-align: center;">Tutelas </h2>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <th>Id Tutela</th>
                <th>Nombre Flujo</th>
                <th>Usuario</th>
                <th>Fecha</th>
                <th>Documento</th>
            </thead>
            <tbody>
            <?php 
                for($i = 0; $i < count($result); $i++){ 
                    echo '<tr>
                    <td>'.$result[$i]->id.'</td>
                    <td>'.$result[$i]->nombre.'</td>
                    <td>'.$result[$i]->usuario.'</td>
                    <td>'.$result[$i]->fecha.'</td>
                    <td><a target="blank" href="https://tutelas.tmssas.com/wp-content/plugins/wizard-tutelas/shortcodes/pdfs/Tutela-'.$result[$i]->id_flujo.'-'.$result[$i]->id.'.pdf">Tutela-'.$result[$i]->id_flujo.'-'.$result[$i]->id.'.pdf</a></td>
                    </tr>';
                }
            ?>
            
            </tbody>
        </table>
    </div>

<style>

</style>
<script>
    $(document).ready(function() {
        $('.um-admin-notice').hide();

        $('#example').DataTable({
            "language": {
                "search":"Buscar",
                "paginate": {
                    "previous": "Anterior",
                    "next" : "Siguiente"
                },
                "lengthMenu": "Ver _MENU_ registros por pagina",
                "zeroRecords": "Nothing found - sorry",
                "info": "Página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros",
                "infoFiltered": "(Filtrado de _MAX_ registros)",
        }
        });
    });
</script>