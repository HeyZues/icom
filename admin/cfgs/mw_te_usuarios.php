<?php

$editor->setConfig('allowDelete', 1); $editor->setConfig('allowCopy', 0); $editor->setConfig('allowView', 0); 
$editor->onlyDisplay('USUARIO_ID', 'PERFIL_ID', 'NOMBRE', 'USUARIO', 'ESTATUS_ID'); 
$editor->setDefaultOrderby('NOMBRE ASC, AP_PATERNO ASC, AP_MATERNO ASC ');

$editor->setDisplayNames(array('PERFIL_ID'			=> ''.mw_te_htmlentities(mw_te_profiles_cfg_name).'')); 
$editor->setDisplayNames(array('NOMBRE'				=> ''.mw_te_htmlentities(mw_te_users_cfg_name).'')); 
$editor->setDisplayNames(array('AP_PATERNO'			=> ''.mw_te_htmlentities(mw_te_users_cfg_lastname).'')); 
$editor->setDisplayNames(array('AP_MATERNO'			=> ''.mw_te_htmlentities(mw_te_users_cfg_mmname).'')); 

$editor->setDisplayNames(array('USUARIO'			=> ''.mw_te_htmlentities(mw_te_login_txt_usr).'')); 
$editor->setDisplayNames(array('PASSWORD'			=> ''.mw_te_htmlentities(mw_te_login_txt_pwd).'')); 

$editor->setDisplayNames(array('EMAIL'				=> ''.mw_te_htmlentities(mw_te_users_email).'')); 
$editor->setDisplayNames(array('MOVIL'				=> ''.mw_te_htmlentities(mw_te_users_mobile).'')); 
$editor->setDisplayNames(array('FOTOGRAFIA'			=> ''.mw_te_htmlentities(mw_te_users_photo).'')); 
$editor->setDisplayNames(array('ESTATUS_ID'			=> ''.mw_te_htmlentities(mw_te_field_status).'')); 

$editor->setInputType('PERFIL_ID', 'select');
$editor->setValuesFromQuery('PERFIL_ID', "SELECT PERFIL_ID, UPPER(PERFIL_NOMBRE) FROM ".mw_te_db_users_profiles." ORDER BY PERFIL_NOMBRE ASC");
$editor->setDefaultValues(array('PERFIL_ID' => ""));

$editor->setInputType('ESTATUS_ID', 'select');
$editor->setValuesFromQuery('ESTATUS_ID', "SELECT ESTATUS_ID, UPPER(ESTATUS_NOMBRE) FROM ".mw_te_db_cfg_status." ORDER BY ESTATUS_NOMBRE ASC"); 
$editor->setDefaultValues(array('ESTATUS_ID' => "1"));

$editor->setFieldsTits('USUARIO', mw_te_users_cfg_login); 
$editor->setNoUpperFields('USUARIO', 'PASSWORD'); 
$editor->setInputType('MOVIL', 'phone'); 

$editor->setFieldsTits('EMAIL', mw_te_users_cfg_contact); 
$editor->setFieldsTits('FOTOGRAFIA', mw_te_users_photo_tit); 
$editor->setFieldsTits('ESTATUS_ID', mw_te_users_status_tit); 

$editor->setConfig('insert_extends_file', 	'../admin/add/mw_te_usuarios.php'); 
$editor->setConfig('update_extends_file', 	'../admin/edit/mw_te_usuarios.php'); 
$editor->setConfig('frm_extends_file', 		'../admin/frm/mw_te_usuarios.php'); 

$editor->setInputType('FOTOGRAFIA', 'file');
$editor->setUploadPaths(array('FOTOGRAFIA' => '../_client/images/users/')); 
$editor->setUploadExts(array('FOTOGRAFIA' => 'jpg'));


/*
function mw_valida_usuario($data)
{
	$mw_user=$data; 
	return $data;
	//return 'mw_te_error_vc'; 
}
$editor->addValidationCallback('USUARIO', 'mw_valida_usuario', 'Error que vamos a poner en caso de producirse!'); 
*/

?>