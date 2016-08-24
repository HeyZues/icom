<?php
/* 
-- Id: config/vars.php 2014-11-14 
-- Copyright (c) 2014 MovimientoWeb
-- Created by: Raul Morales Ferrer
*/

@session_start();
@define("DB_HOST",'localhost'); 
@define("DB_NAME",'iicom_mwsite');   
@define("DB_USER",'iicom_mwusr');
@define("DB_PASS",'IiC0mmWU5R2014'); 
@define("DB_MAIL",'mail.iicom.mx'); 

// aplicacion
@define("mw_project_name",			'ICOM - Administrador de Contenido'); 
@define("mw_project_version",		'1.0'); 

// clase table editor
@define("mw_te_path",				'../TableEditor/'); 
@define("mw_te_client_path",		'../admin/'); 
@define("mw_te_head_title",			''.mw_project_name.' '.mw_project_version.''); 
@define("mw_te_session_name",		'icom_session_user'); 
@define("mw_te_session_id",			'icom_session_id'); 
@define("mw_te_session_type",		'icom_session_type'); 
@define("mw_te_session_subtype",	'icom_session_subtype'); 

?>