<?php 
    require_once '../../../../wp-includes/pluggable.php';
    require_once '../../../../wp-load.php';
    
    $fichero_subido =  "images/".$_FILES['file']['name'];
    move_uploaded_file($_FILES['file']["tmp_name"], $fichero_subido);
    print_r( $fichero_subido);



?>