<?php

if(isset($_GET["project_id"])){ $project_id=(int)$_GET["project_id"];	} else { $project_id=0; } 
if($project_id<=0) { exit(); }

$editor->addDataFilter(" PROYECTO_ID='".$project_id."' "); 
$editor->setDefaultValues(array('PROYECTO_ID' => "".$project_id.""));
$editor->setNoRequiredFields('PROYECTO_ID');
$editor->setHiddenField('PROYECTO_ID');

$editor->onlyDisplay('IMAGEN_ID', 'PORTADA', 'DESCRIPCION', 'ESTATUS_ID');
$editor->setDefaultOrderby('IMAGEN_ID');

$editor->setDisplayNames(array('IMAGEN_ID'	=> 'ID'));
$editor->setDisplayNames(array('PORTADA'	=> mw_te_htmlentities('Foto de portada')));
$editor->setDisplayNames(array('IMAGEN'		=> mw_te_htmlentities('Imagen')));
$editor->setDisplayNames(array('DESCRIPCION'=> mw_te_htmlentities('Descripción')));
$editor->setDisplayNames(array('ESTATUS_ID'	=> mw_te_htmlentities('Estatus')));

$editor->setInputType('PORTADA', 'select');
$editor->setValuesFromQuery('PORTADA', "SELECT BOOL_ID, UPPER(BOOL_NOMBRE) FROM mw_te_cfg_bool ORDER BY BOOL_NOMBRE ASC"); 
$editor->setDefaultValues(array('PORTADA' => "0"));

$editor->setInputType('ESTATUS_ID', 'select');
$editor->setValuesFromQuery('ESTATUS_ID', "SELECT ESTATUS_ID, UPPER(ESTATUS_NOMBRE) FROM ".mw_te_db_cfg_status." ORDER BY ESTATUS_NOMBRE ASC"); 
$editor->setDefaultValues(array('ESTATUS_ID' => "1"));

$editor->setNoUpperFields('DESCRIPCION', 'IMAGEN'); 

$editor->setFieldsTits('PORTADA', 'Hacer que esta imagen sea la portada del proyecto'); 
$editor->setFieldsTits('IMAGEN', 'Solo puede seleccionar imágenes con formato JPG<br />La imagen debe pesar menos de 500Kb para que sea mostrada<br />Medidas requeridas 640px de ancho por 480 px de alto.'); 

$editor->setFieldsTits('DESCRIPCION', 'Descripción corta de la imagen'); 
$editor->setFieldsTits('ESTATUS_ID', 'Fotografías inactivas no se mostrarán en el sitio web'); 

$editor->setConfig('insert_extends_file', 	'../admin/add/mw_proyectos_imagenes.php'); 
$editor->setConfig('update_extends_file', 	'../admin/edit/mw_proyectos_imagenes.php'); 
//$editor->setConfig('frm_extends_file', 	'../admin/frm/mw_proyectos_imagenes.php'); 

$editor->setInputType('IMAGEN', 'file');
$editor->setUploadPaths(array('IMAGEN' => '../images/proyectos/')); 
$editor->setUploadExts(array('IMAGEN' => 'jpg'));

?>