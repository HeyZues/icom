<?php 

if(!stristr($_SERVER['PHP_SELF'], '/TableEditor/main.php')) { } else { @exit(); } 

// ruta de la clase table editor
if(!@defined('mw_te_path')) { @define("mw_te_path",	"../TableEditor/"); } 

// configuracion general
if(@file_exists(mw_te_path."inc/_cfg.php")) { @include(mw_te_path."inc/_cfg.php"); } 

// funciones globales
if(@file_exists(mw_te_path."inc/_fnc.php")) { @include(mw_te_path."inc/_fnc.php"); } 

// agrega sesión con un usuario y contraseña enviados
if(isset($_GET["login"]) && ($_GET["login"]==1)) 
{ 
	if(@file_exists(mw_te_path."login.php")) { @include(mw_te_path."login.php"); @exit(); } else { @exit(); } 
} 

// cierra sesión 
if(@isset($_GET["logout"]) && ($_GET["logout"]==1)) 
{ 
	@session_destroy(); 
	?><script language="javascript"> document.location='<?php echo mw_te_client_path; ?>'; </script><?php 
	@exit(); 
} 

if(isset($_GET["export"]) && ($_GET["export"]==1)) 
{ 
	if(@file_exists(mw_te_client_path.'mw_te_export.php')) { @include("".mw_te_client_path."mw_te_export.php"); } 
} 
else
{ 
	?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
		<head>
			<title><?php echo mw_te_htmlentities(mw_te_head_title); ?></title>
			<meta name="robots" content="NOINDEX,NOFOLLOW,NOARCHIVE,NOODP,NOSNIPPET" />
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
			<meta name="viewport" content="width=device-width, initial-scale=1" />
			<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />
			<meta name="format-detection" content="telephone=no" />
			<link rel="Shortcut Icon" href="../images/favicon.ico" />
			<script language="javascript" type="text/javascript" src="<?php echo mw_te_path; ?>js/jquery.min.js"></script>
			<link rel="stylesheet" href="<?php echo mw_te_path; ?>js/jqueryui/themes/base/jquery.ui.all.css">
			<script language="javascript" type="text/javascript" src="<?php echo mw_te_path; ?>js/jqueryui/ui/jquery.ui.core.js"></script>
			<script language="javascript" type="text/javascript" src="<?php echo mw_te_path; ?>js/jqueryui/ui/jquery.ui.widget.js"></script>
			<script language="javascript" type="text/javascript" src="<?php echo mw_te_path; ?>js/te_functions.js"></script>
			<link href="<?php echo mw_te_path_css; ?>style.css" rel="stylesheet" type="text/css" />
		</head>
		<body><?php 
			
			// archivo "top" del cliente
			if(@file_exists(mw_te_client_path.'mw_te_file_top.php')) 	{ @include(mw_te_client_path.'mw_te_file_top.php'); } 
	
			// Si no hay sesión ingresa al login
			if(!mw_te_session_validate() && mw_te_session_required==true) { if(@file_exists(mw_te_path."inc/login.php")) { @include(mw_te_path."inc/login.php"); } else { @exit(); } } 
			elseif(mw_te_session_validate() || (mw_te_session_required==false)) 
			{
				?><div class="mw_te_content"><?php 
				
					// barra y menu desplegable arriba
					if(mw_te_show_menu==true) 
					{ 
						@include(mw_te_path.'inc/top_banner.php'); 
						@include(mw_te_path.'inc/top_menu.php'); 
					} 
					
					?><table cellpadding="0" cellspacing="0" align="center" class="mw_te_main">
						<tr valign="top" style="vertical-align:top;">
							<td><?php 
								
								// Definir "table" manualmente
								$table=''; 
								if(@file_exists(mw_te_client_path.'mw_te_table.php')) { @include("".mw_te_client_path."mw_te_table.php"); } 
								
								// Definir "table" por método GET (Url) 
								//if( empty($table) && isset($_GET["table"]) ) { $table=$_GET["table"]; } 
								
								if($table) 
								{ 
									if(mw_te_show_tit==true && @file_exists(mw_te_client_path.'mw_te_tits.php')) { @include(mw_te_client_path.'mw_te_tits.php'); } 
									
									@require_once(''.mw_te_path.'inc/teditor/teditor_upload.php');
									@require_once(''.mw_te_path.'inc/pager/sliding.php');
									@require_once(''.mw_te_path.'inc/url/url.php');
									@require_once(mw_te_path.'inc/teditor/teditor.php');
									$editor = new TableEditor($connectMysql, $table); 
									
									if(@file_exists(mw_te_client_path.'mw_te_tables_hidden.php')) { @include(mw_te_client_path.'mw_te_tables_hidden.php'); } 
									else { $editor->setConfigHiddenTables(mw_te_db_cfg_bool, mw_te_db_cfg_status, mw_te_db_menus, mw_te_db_menus_profiles, mw_te_db_menus_users); } 
	
									if(mw_te_user_has_privileges(1)) { $editor->setConfig('allowAdd', 1); } else { $editor->setConfig('allowAdd', 0); } 
									if(mw_te_user_has_privileges(2)) { $editor->setConfig('allowEdit', 1);} else { $editor->setConfig('allowEdit', 0); } 
									if(mw_te_user_has_privileges(3)) { $editor->setConfig('allowDelete',1); } else { $editor->setConfig('allowDelete', 0); } 
									
									if(@file_exists(mw_te_client_path.'cfgs/'.$table.'.php')) { @include(mw_te_client_path.'cfgs/'.$table.'.php'); } 
									
									if($editor->getConfig('allowEdit')==1) 
									{ 
										$url_edit = new TableEditor_URL(); $url_edit->removeQueryString('edit'); $url_edit->addQueryString('edit', 'mw_te_id_ico'); 
										$link_edit=$url_edit->getURL(true); 
										$btn_edit='<input type="button" id="mw_te_btn_edit" name="mw_te_btn_edit" class="mw_te_btn" onclick="document.location=\''.$link_edit.'\';" value="'.mw_te_htmlentities(mw_te_btn_edit).'" title="'.mw_te_htmlentities(mw_te_btn_edit).'" alt="'.mw_te_htmlentities(mw_te_btn_edit).'" />'; 
										$editor->setLeftShortcut(array('mw_te_btn_edit' => $btn_edit)); 
									} 
									if($editor->getConfig('allowDelete')==1) 
									{ 
										$url_del = new TableEditor_URL(); $url_del->removeQueryString('delete[]'); $url_del->addQueryString('delete[]', 'mw_te_id_ico'); 
										$link_del=$url_del->getURL(true); 
										$btn_del='<input type="button" id="mw_te_btn_del" name="mw_te_btn_del" class="mw_te_btn" onclick="if(confirm(\''.mw_te_btn_del_confirm.'\')) { document.location=\''.$link_del.'\'; }" value="'.mw_te_htmlentities(mw_te_btn_del).'" title="'.mw_te_htmlentities(mw_te_btn_del).'" alt="'.mw_te_htmlentities(mw_te_btn_del).'" />'; 
										$editor->setLeftShortcut(array('mw_te_btn_del' => $btn_del)); 
									} 
									
									$editor->display();
								} 
								elseif(@file_exists(mw_te_client_path.'mw_te_home.php')) { @include("".mw_te_client_path."mw_te_home.php"); } 
								
							?></td>
						</tr>
					</table>
				</div><?php  
			} 
			
			// archivo "foot" del cliente
			if(@file_exists(mw_te_client_path.'mw_te_file_foot.php')) 	{ @include(mw_te_client_path.'mw_te_file_foot.php'); } 
			
		?></body>
	</html><?php 
} 

?>