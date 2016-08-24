<?php

$record_id=str_replace("'", "", $id);

if(isset($_POST["PORTADA"])) { $PORTADA=$_POST["PORTADA"]; } else { $PORTADA=''; } 
if(isset($_GET["project_id"])){ $project_id=(int)$_GET["project_id"];	} else { $project_id=0; } 

if($PORTADA==1)
{ 
	$sql_update_homepage="UPDATE mw_proyectos_imagenes SET PORTADA='0' WHERE IMAGEN_ID!='".$record_id."' AND PROYECTO_ID='".$project_id."' "; 
	$result_update_homepage = @mysql_query($sql_update_homepage); 
} 
//exit();

?>