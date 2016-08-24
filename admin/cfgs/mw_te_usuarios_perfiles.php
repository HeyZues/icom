<?php

$editor->onlyDisplay('PERFIL_ID', 'PERFIL_NOMBRE', 'PERMISOS_AGREGAR', 'PERMISOS_EDITAR', 'PERMISOS_ELIMINAR'); 
$editor->setDefaultOrderby('PERFIL_NOMBRE'); 

$editor->setDisplayNames(array('PERFIL_NOMBRE'		=> mw_te_htmlentities(mw_te_profiles_cfg_name) ));
$editor->setDisplayNames(array('PERMISOS_AGREGAR'	=> mw_te_htmlentities(mw_te_profiles_cfg_add) ));
$editor->setDisplayNames(array('PERMISOS_EDITAR'	=> mw_te_htmlentities(mw_te_profiles_cfg_edit) ));
$editor->setDisplayNames(array('PERMISOS_ELIMINAR'	=> mw_te_htmlentities(mw_te_profiles_cfg_del) ));

$editor->setInputType('PERMISOS_AGREGAR', 'select');
$editor->setValuesFromQuery('PERMISOS_AGREGAR', "SELECT BOOL_ID, UPPER(BOOL_NOMBRE) FROM ".mw_te_db_cfg_bool." ORDER BY BOOL_ID ASC"); 
$editor->setDefaultValues(array('PERMISOS_AGREGAR' => "1"));

$editor->setInputType('PERMISOS_EDITAR', 'select');
$editor->setValuesFromQuery('PERMISOS_EDITAR', "SELECT BOOL_ID, UPPER(BOOL_NOMBRE) FROM ".mw_te_db_cfg_bool." ORDER BY BOOL_ID ASC"); 
$editor->setDefaultValues(array('PERMISOS_EDITAR' => "1"));

$editor->setInputType('PERMISOS_ELIMINAR', 'select');
$editor->setValuesFromQuery('PERMISOS_ELIMINAR', "SELECT BOOL_ID, UPPER(BOOL_NOMBRE) FROM ".mw_te_db_cfg_bool." ORDER BY BOOL_ID ASC"); 
$editor->setDefaultValues(array('PERMISOS_ELIMINAR' => "1"));

$editor->setFieldsTits('PERMISOS_AGREGAR', mw_te_profiles_cfg_actions); 

$editor->setConfig('frm_extends_file', 		'../admin/frm/mw_te_usuarios_perfiles.php'); 
$editor->setConfig('insert_extends_file', 	'../admin/add/mw_te_usuarios_perfiles.php'); 
$editor->setConfig('update_extends_file', 	'../admin/edit/mw_te_usuarios_perfiles.php'); 

?>