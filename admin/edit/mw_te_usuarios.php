<?php

$record_id=str_replace("'", "", $id);

if(isset($_POST["PERFIL_ID"])) { $PERFIL_ID=$_POST["PERFIL_ID"]; } else { $PERFIL_ID=0; } 
if(isset($_POST["user_old_profile"])) { $user_old_profile=$_POST["user_old_profile"]; } else { $user_old_profile=0; } 
if($user_old_profile>0 && $user_old_profile!=$PERFIL_ID) 
{ 
	$SqlDelMenus="DELETE FROM ".mw_te_db_menus_users." WHERE USUARIO_ID='".$record_id."' "; $ResultDelMenus=@mysql_query($SqlDelMenus); 
	$SqlMenus="SELECT * FROM ".mw_te_db_menus_profiles." WHERE PERFIL_ID='".$PERFIL_ID."' ORDER BY MENU_ID ASC "; $ResultMenus=@mysql_query($SqlMenus); 
	if(@mysql_num_rows($ResultMenus)>0) 
	{ 
		while($RowMenus=@mysql_fetch_array($ResultMenus)) 
		{ 
			$MenuId=$RowMenus["MENU_ID"];
			$SqlInsertMenu="INSERT INTO ".mw_te_db_menus_users." SET RELACION_ID='0', MENU_ID='".$MenuId."', USUARIO_ID='".$record_id."' "; 
			$ResultInsertMenu=@mysql_query($SqlInsertMenu);
		} 
	}  
} 

//exit();

?>