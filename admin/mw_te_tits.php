<?php

if(!stristr($_SERVER['PHP_SELF'], '/admin/mw_te_tits.php')) { } else { @exit(); } 

if(isset($_GET["add"])) {  $add=(int)$_GET["add"]; 	} else {  $add=0; } 
if(isset($_GET["edit"])){ $edit=(int)$_GET["edit"];	} else { $edit=0; } 

function project_tabs($tab=1, $project_id) 
{ 
	?><table cellpadding="0" cellspacing="0" align="center" class="mw_te_tabs_content">
		<tr>
			<td><table cellpadding="0" cellspacing="0" align="left">
				<tr>
					<td><a href="../admin/?p=website&t=projects&edit=<?php echo $project_id; ?>" title="<?php echo mw_te_htmlentities('Datos Generales'); ?>" class="<?php 
							if($tab==1) { echo 'mw_te_tab_selected'; } else { echo 'mw_te_tab'; } 
						?>"><?php echo mw_te_htmlentities('Datos Generales'); ?></a></td>
					<td><a href="../admin/?p=website&t=projects&project_id=<?php echo $project_id; ?>&s=images" title="<?php echo mw_te_htmlentities('Imágenes'); ?>" class="<?php 
							if($tab==2) { echo 'mw_te_tab_selected'; } else { echo 'mw_te_tab'; } 
						?>"><?php echo mw_te_htmlentities('Imágenes'); ?></a></td>
				</tr>
			</table></td>
		</tr>
	</table><?php 
}

switch($table)
{
	case mw_te_db_users_profiles:	 	echo mw_te_tit(mw_te_menu_cfg.' | '.mw_te_menu_security.' | '.mw_te_menu_profiles); 	break; 
	case mw_te_db_users: 				echo mw_te_tit(mw_te_menu_cfg.' | '.mw_te_menu_security.' | '.mw_te_menu_users); 		break; 
	case mw_te_db_access: 				echo mw_te_tit(mw_te_menu_cfg.' | '.mw_te_menu_security.' | '.mw_te_menu_log_access); 	break; 
	// CLIENTE 
	case 'mw_proyectos': 
	case 'mw_proyectos_imagenes': 			
		
		echo mw_te_tit(mw_te_menu_cfg.'Sitio Web | Proyectos'); 
		if(isset($_GET["project_id"])){ $project_id=(int)$_GET["project_id"];	} else { $project_id=0; } 
		if($edit>0 || $project_id>0) 
		{ 
			if($project_id>0) { $project_id=$project_id; } else { $project_id=$edit; } 
			if(isset($_GET["s"])){ $s=$_GET["s"];	} else { $s=''; } 
			if($s=='images') { $tab=2; } else { $tab=1; }
			project_tabs($tab, $project_id).''; 
		}
	break; 
	case 'mw_contacto_emails': 			echo mw_te_tit('Sitio Web | Lista de Emails para Contacto'); 					break; 
	default: 							echo mw_te_tit(mw_te_table_name($table)); 												break; 
}

?>