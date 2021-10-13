<?php
//Include database configuration file
include('dbConfig.php');

    $response = array();
    $posts = array();

if(isset($_POST["id_actividad"]) && !empty($_POST["id_actividad"])){
    //Get all state data
    $query = $db->query("SELECT * FROM accion WHERE id_actividad = ".$_POST['id_actividad']." ORDER BY nomb_accion ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
	
    //Display states list
    if($rowCount > 0){
        echo '<option value="">Elige accion</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['id_accion'].'">'.$row['nomb_accion'].'</option>';
			
			$fp = fopen('results2.json', 'w');
			fwrite($fp, json_encode($row['nomb_accion']));
			fclose($fp);
        }
    }else{
        echo '<option value="">Accion not available</option>';
    }
}

if(isset($_POST["id_accion"]) && !empty($_POST["id_accion"])){
    //Get all city data
    $query = $db->query("SELECT * FROM objeto WHERE id_accion = ".$_POST['id_accion']." ORDER BY nomb_objeto ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display cities list
    if($rowCount > 0){
        echo '<option value="">Elige objeto</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['id_objeto'].'">'.$row['nomb_objeto'].'</option>';
			
			$fp = fopen('results3.json', 'w');
			fwrite($fp, json_encode($row['nomb_objeto']));
			fclose($fp);
        }
    }else{
        echo '<option value="">Objeto not available</option>';
    }
}


?>