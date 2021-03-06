<!DOCTYPE html>
<html>
<title>SmartMirror</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css.css">
<link type="text/css" rel="stylesheet" href="style.css"/>    
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
    <script src="jquery.min.js"></script>
    
<style>
h1,h2,h3,h4,h5,h6 {font-family: "Oswald"}
body {font-family: "Open Sans"}
    
    
.select-boxes{width: 280px;text-align: center;}
select {
    background-color: #F5F5F5;
    border: 1px double #15a6c7;
    color: #1d93d1;
    font-family: Georgia;
    font-weight: bold;
    font-size: 14px;
    height: 39px;
    padding: 7px 8px;
    width: 250px;
    outline: none;
    margin: 10px 0 10px 0;
}
select option{
    font-family: Georgia;
    font-size: 14px;
}

</style>
    <script type="text/javascript">
$(document).ready(function(){
    $('#actividad').on('change',function(){
        var actividadID = $(this).val();
        if(actividadID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'id_actividad='+actividadID,
                success:function(html){
                    $('#accion').html(html);
                    $('#objeto').html('<option value="">Elige una accion primero</option>'); 
                }
            }); 
        }else{
            $('#accion').html('<option value="">Elige una actividad primero</option>');
            $('#objeto').html('<option value="">Elige un objeto primero</option>'); 
        }
    });
    
    $('#accion').on('change',function(){
        var accionID = $(this).val();
        if(accionID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'id_accion='+accionID,
                success:function(html){
                    $('#objeto').html(html);
                }
            }); 
        }else{
            $('#objeto').html('<option value="">Elige una objeto primero</option>'); 
        }
    });
});
</script>
  
    
<body class="w3-light-grey">

<!-- Navigation bar with social media icons -->
 <div class="w3-bar w3-black w3-hide-small">
  <!--
  <a href="https://www.facebook.com/lisenme/" class="w3-bar-item w3-button"><i class="fa fa-facebook-official"></i></a>
  <a href="https://twitter.com/LisenMee" class="w3-bar-item w3-button"><i class="fa fa-twitter"></i></a>
  <a href="https://www.youtube.com/channel/UCEdC6Qk_DZ9fX_gUYFJ1tsA" class="w3-bar-item w3-button"><i class="fa fa-youtube"></i></a>
  <a href="https://plus.google.com/115714479889692934329" class="w3-bar-item w3-button"><i class="fa fa-google"></i></a>
  <a href="https://www.linkedin.com/in/lisen-me-b017a8137/" class="w3-bar-item w3-button"><i class="fa fa-linkedin"></i></a>
  //-->
</div>
<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1600px">

  <!-- Header -->
  <header class="w3-container w3-center w3-padding-48 w3-white">
    <h1 class="w3-xxxlarge"><a href="https://alud.deusto.es"><img src="img/deusto.png" alt="UDeusto" style="width:20%" class="w3-padding-16"></a></h1>
    <h6>Pagina donde elegir <span class="w3-tag">combinaciones</span></h6>
      
  </header>
  
  <!-- Image header -->
 

  <!-- Grid -->
  <div class="w3-row w3-padding w3-border">

    <!-- Blog entries -->
    <div class="w3-col l12 s12">
    
      <!-- Blog entry -->
      <div class="w3-container w3-white w3-margin w3-padding-large">
        
          <h2 style="text-align: center";>Escoge la actividad que quieras monitorizar</h2>
          <br>
          <div class="select-boxes">
    <?php
    //Include database configuration file
    include('dbConfig.php');
    
    //Get all actividad data
    $query = $db->query("SELECT * FROM actividad ORDER BY nomb_actividad ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    ?>
    <select name="actividad" id="actividad" >
        <option value="">Elige Actividad</option>
        <?php
        if($rowCount > 0){
            while($row = $query->fetch_assoc()){ 
                echo '<option value="'.$row['id_actividad'].'">'.$row['nomb_actividad'].'</option>';
			$fp = fopen('results.json', 'w');
			fwrite($fp, json_encode($row['nomb_actividad']));
			fclose($fp);
            }
        }else{
            echo '<option value="">Actividad not available</option>';
        }
        ?>
    </select>
    
    <select name="accion" id="accion">
        <option value="">Elige Accion</option>
    </select>
    
    <select name="objeto" id="objeto">
        <option value="">Elige Objeto</option>
    </select>
    </div>

          <button type="button" onclick="window.open('', '_self', ''); window.close();">Aceptar</button>
      </div>
      
    </div>

  </div>
		
</div>

</body>
</html>
















 
