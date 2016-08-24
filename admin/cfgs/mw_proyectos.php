<?php

$editor->setConfig('allowDelete', 1); $editor->setConfig('allowCopy', 0); $editor->setConfig('allowView', 0); 

$editor->onlyDisplay('PROYECTO_ID', 'ORDEN', 'PROYECTO_NOMBRE', 'ESTATUS_ID'); 
$editor->setDefaultOrderby('ORDEN');

$editor->setDisplayNames(array('PROYECTO_ID'		=> 'ID')); 
$editor->setDisplayNames(array('ORDEN'				=> 'Orden')); 
$editor->setDisplayNames(array('PROYECTO_NOMBRE'	=> 'Proyecto')); 
$editor->setDisplayNames(array('PROYECTO_DESCRIPCION' => 'Descripcion')); 
$editor->setDisplayNames(array('ESTATUS_ID'			=> 'Estatus')); 

$editor->setInputType('ESTATUS_ID', 'select');
$editor->setValuesFromQuery('ESTATUS_ID', "SELECT ESTATUS_ID, UPPER(ESTATUS_NOMBRE) FROM ".mw_te_db_cfg_status." ORDER BY ESTATUS_NOMBRE ASC"); 
$editor->setDefaultValues(array('ESTATUS_ID' => "1"));

$editor->setNoUpperFields('PROYECTO_NOMBRE', 'PROYECTO_DESCRIPCION', 'ORDEN'); 

$editor->setFieldsTits('ORDEN', 		  	'Orden en que serán mostrados los proyectos en el sitio web'); 
$editor->setFieldsTits('PROYECTO_NOMBRE', 	'Nombre corto del proyecto'); 
$editor->setFieldsTits('ESTATUS_ID', 		'Proyectos con estatus Inactivo no se mostrarán en el sitio web'); 
$editor->setFieldsTits('PROYECTO_DESCRIPCION', 'Solo se mostrará la descripción de los últimos 2 proyectos<br />en la página de inicio del sitio web.'); 

?>