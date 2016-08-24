<?php

$record_id=str_replace("'", "", $id);

$SqlMenus0="SELECT * FROM ".mw_te_db_menus." WHERE MENU_ID_PADRE=0 AND ESTATUS_ID=1 ORDER BY ORDEN ASC "; 
$ResultMenus0=@mysql_query($SqlMenus0); 
if(@mysql_num_rows($ResultMenus0)>0) 
{ 
	while($RowMenus0=@mysql_fetch_array($ResultMenus0)) 
	{
		$MenuId=(int)$RowMenus0["MENU_ID"]; 
		$TxtEval = "if(isset(\$_POST['MenuId".$MenuId."'])) { \$CurrentMenuId=\$_POST['MenuId".$MenuId."']; } else { \$CurrentMenuId=0; } "; 
		eval($TxtEval); 

		if($CurrentMenuId>0) 
		{ 
			$SqlInsertMenu="INSERT INTO ".mw_te_db_menus_profiles." SET RELACION_ID='0', MENU_ID='".$MenuId."', PERFIL_ID='".$record_id."' "; 
			$ResultInsertMenu=@mysql_query($SqlInsertMenu); 
		} 
		
		$SqlMenus1="SELECT * FROM ".mw_te_db_menus." WHERE ESTATUS_ID=1 AND MENU_ID_PADRE='".$MenuId."' ORDER BY ORDEN ASC "; 
		$ResultMenus1=@mysql_query($SqlMenus1); 
		if(@mysql_num_rows($ResultMenus1)>0) 
		{ 
			while($RowMenus1=@mysql_fetch_array($ResultMenus1)) 
			{
				$MenuId1=(int)$RowMenus1["MENU_ID"]; 
				$TxtEval1 = "if(isset(\$_POST['MenuId".$MenuId1."'])) { \$CurrentMenu1Id=\$_POST['MenuId".$MenuId1."']; } else { \$CurrentMenu1Id=0; } "; 
				eval($TxtEval1); 
				
				if($CurrentMenu1Id>0) 
				{ 
					$SqlInsertMenu="INSERT INTO ".mw_te_db_menus_profiles." SET RELACION_ID='0', MENU_ID='".$MenuId1."', PERFIL_ID='".$record_id."' "; 
					$ResultInsertMenu=@mysql_query($SqlInsertMenu);
				} 
				
				$SqlMenus2="SELECT * FROM ".mw_te_db_menus." WHERE ESTATUS_ID=1 AND MENU_ID_PADRE='".$MenuId1."' ORDER BY ORDEN ASC "; 
				$ResultMenus2=@mysql_query($SqlMenus2); 
				if(@mysql_num_rows($ResultMenus2)>0) 
				{
					while($RowMenus2=@mysql_fetch_array($ResultMenus2)) 
					{
						$MenuId2=(int)$RowMenus2["MENU_ID"]; 
						$TxtEval2 = "if(isset(\$_POST['MenuId".$MenuId2."'])) { \$CurrentMenu2Id=\$_POST['MenuId".$MenuId2."']; } else { \$CurrentMenu2Id=0; } "; 
						eval($TxtEval2); 
						
						if($CurrentMenu2Id>0) 
						{ 
							$SqlInsertMenu="INSERT INTO ".mw_te_db_menus_profiles." SET RELACION_ID='0', MENU_ID='".$MenuId2."', PERFIL_ID='".$record_id."' "; 
							$ResultInsertMenu=@mysql_query($SqlInsertMenu); 
						} 
					} 
				} 
			}
		} 
	} 
} 

//exit();

?>