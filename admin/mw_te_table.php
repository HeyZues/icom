<?php 

if(isset($_GET["p"])) { $p=$_GET["p"]; } else { $p=''; } 
if(isset($_GET["t"])) { $t=$_GET["t"]; } else { $t=''; } 

switch($p)
{ 
	case 'security': 
		switch($t) 
		{
			case 'profiles': 
				if(mw_te_user_menu(5)) { $table=mw_te_db_users_profiles; } else { echo mw_te_print_error(mw_te_37707_t308); exit(); } 
			break; 
			case 'users': 		
				if(mw_te_user_menu(6)) { $table=mw_te_db_users; } else { echo mw_te_print_error(mw_te_37707_t308); exit(); } 
			break; 
			case 'access': 
				if(mw_te_user_menu(7)) { $table=mw_te_db_access; } else { echo mw_te_print_error(mw_te_37707_t308); exit(); } 
			break; 
		}
	break; 
	// CLIENTE
	case 'website': 
		switch($t) 
		{
			case 'projects': 
				if(mw_te_user_menu(8)) 	
				{ 
					if(isset($_GET["edit"])){ $edit=(int)$_GET["edit"];	} else { $edit=0; } 
					if(isset($_GET["project_id"])){ $project_id=(int)$_GET["project_id"];	} else { $project_id=0; } 
					if($edit>0 || $project_id>0) 
					{ 
						if(isset($_GET["s"])){ $s=$_GET["s"];	} else { $s=''; } 
						if($s=='images') { $table='mw_proyectos_imagenes'; } else { $table='mw_proyectos'; } 
					} 
					else { $table='mw_proyectos'; } 
				} 
				else { echo mw_te_print_error(mw_te_37707_t308); exit(); } 
			break; 
			case 'contactus_emails': 
				if(mw_te_user_menu(10)) { $table='mw_contacto_emails'; 	} else { echo mw_te_print_error(mw_te_37707_t308); exit(); } 
			break; 
		}
	break; 
} 

?>