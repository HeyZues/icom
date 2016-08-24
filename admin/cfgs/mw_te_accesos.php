<?php

$editor->setConfig('allowAdd', 0); 		// No se pueden agregar accesos manualmente
$editor->setConfig('allowEdit', 0); 	// No se pueden editar accesos
$editor->setConfig('allowDelete', 0); 	// No se pueden borrar los accesos

$editor->onlyDisplay('ACCESO_ID', 'FECHA_HORA', 'IP', 'SESION_ID'); 
$editor->setDefaultOrderby('FECHA_HORA DESC'); 

$editor->setDisplayNames(array('FECHA_HORA'		=> mw_te_htmlentities(mw_te_access_cfg_date) ));
$editor->setDisplayNames(array('IP'				=> mw_te_htmlentities(mw_te_access_cfg_ip) ));
$editor->setDisplayNames(array('SESION_ID'		=> mw_te_htmlentities(mw_te_access_cfg_user) )); 

$editor->setInputType('SESION_ID', 'select');
$editor->setValuesFromQuery('SESION_ID', "SELECT USUARIO_ID, UPPER(USUARIO) FROM ".mw_te_db_users." ORDER BY USUARIO_ID ASC"); 
$editor->setDefaultValues(array('SESION_ID' => "0")); 

$editor->addDataFilter(' SESION_TIPO='.mw_te_adm_type.' '); // Usuarios de base de datos

$editor->setConfig('del_validation_file', '../admin/dels/mw_te_accesos.php'); 
$editor->setConfig('id_in_list', false); 

?>