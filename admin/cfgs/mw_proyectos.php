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

$editor->setFieldsTits('ORDEN', 		  	'Orden en que ser�n mostrados los proyectos en el sitio web'); 
$editor->setFieldsTits('PROYECTO_NOMBRE', 	'Nombre corto del proyecto'); 
$editor->setFieldsTits('ESTATUS_ID', 		'Proyectos con estatus Inactivo no se mostrar�n en el sitio web'); 
$editor->setFieldsTits('PROYECTO_DESCRIPCION', 'Solo se mostrar� la descripci�n de los �ltimos 2 proyectos<br />en la p�gina de inicio del sitio web.'); 

?>