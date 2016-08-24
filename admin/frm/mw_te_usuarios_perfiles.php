<?php 

if(!isset($edit)) { $edit=0; } 

//if($edit>0) 
{ 
	?><br />
	<script language="javascript" type="text/javascript">
		function menuCheckAll(menuId)
		{
			var action=document.getElementById('MenuId' + menuId).checked; var FormName=document.getElementById('mw_te_frm'); var Elements=FormName.length; 
			if(Elements>0) { for(var i=0; i<Elements; i++) { var Class=FormName.elements[i].className; if(Class==menuId) { FormName.elements[i].checked=action; } } }  
		}
		function submenuCheckAll(menuId)
		{
			var action=document.getElementById('MenuId' + menuId).checked; var FormName=document.getElementById('mw_te_frm'); var Elements=FormName.length; 
			if(Elements>0) { for(var i=0; i<Elements; i++) { var value=FormName.elements[i].value; if(value==menuId) { FormName.elements[i].checked=action; } } }  
		}
	</script>
	<?php 
	$SqlMenus0="SELECT * FROM ".mw_te_db_menus." WHERE MENU_ID_PADRE=0 AND ESTATUS_ID=1 ORDER BY ORDEN ASC "; $ResultMenus0=@mysql_query($SqlMenus0); 
	if(@mysql_num_rows($ResultMenus0)>0) 
	{ 
		?><table cellpadding="0" cellspacing="0" align="center" style="text-align:center;" class="mw_te_profile_menus_table">
			<tr><td class="mw_te_list_tit"><?php echo mw_te_htmlentities(mw_te_profiles_cfg_menus); ?></td></tr><?php 
		while($RowMenus0=@mysql_fetch_array($ResultMenus0)) 
		{
			$MenuId=(int)$RowMenus0["MENU_ID"]; 
			$Nombre=mw_te_htmlentities($RowMenus0["TITULO"]); 
			
			$activoId=0; 
			$sql="SELECT RELACION_ID FROM ".mw_te_db_menus_profiles." WHERE PERFIL_ID='".$edit."' AND MENU_ID='".$MenuId."' LIMIT 1 "; $result=@mysql_query($sql); 
			if(@mysql_num_rows($result)>0) { $activoId=1; } 
			
			$SqlMenus1="SELECT * FROM ".mw_te_db_menus." WHERE ESTATUS_ID=1 AND MENU_ID_PADRE='".$MenuId."' ORDER BY ORDEN ASC "; $ResultMenus1=@mysql_query($SqlMenus1); 
			if(@mysql_num_rows($ResultMenus1)>0) 
			{ 
				?><tr><td class="mw_te_list_tit mw_te_profile_list_tit"><input type="checkbox" name="MenuId<?php echo $MenuId; ?>" id="MenuId<?php echo $MenuId; ?>" onclick="menuCheckAll('<?php echo $MenuId; ?>');" value="1" <?php if($activoId>0) { ?>checked="true"<?php } ?> /> <?php echo $Nombre; ?><div name="formMenuId<?php echo $MenuId; ?>" id="formMenuId<?php echo $MenuId; ?>"><?php 
				while($RowMenus1=@mysql_fetch_array($ResultMenus1)) 
				{ 
					$MenuId1=(int)$RowMenus1["MENU_ID"]; 
					$Nombre1=mw_te_htmlentities($RowMenus1["TITULO"]); 
					
					$activoId=0; 
					$sql="SELECT RELACION_ID FROM ".mw_te_db_menus_profiles." WHERE PERFIL_ID='".$edit."' AND MENU_ID='".$MenuId1."' LIMIT 1 "; $result=@mysql_query($sql); 
					if(@mysql_num_rows($result)>0) { $activoId=1; } 
					
					?><div class="mw_te_profile_menus_list1" name="subMenuId<?php echo $MenuId1;?>" id="subMenuId<?php echo $MenuId1; ?>"><input type="checkbox" class="<?php echo $MenuId;?>" name="MenuId<?php echo $MenuId1; ?>" id="MenuId<?php echo $MenuId1; ?>" onclick="submenuCheckAll('<?php echo $MenuId1; ?>');" value="1" <?php if($activoId>0) { ?>checked="true"<?php } ?> /> <?php echo $Nombre1; ?></div><?php 
					$SqlMenus2="SELECT * FROM ".mw_te_db_menus." WHERE ESTATUS_ID=1 AND MENU_ID_PADRE='".$MenuId1."' ORDER BY ORDEN ASC "; $ResultMenus2=@mysql_query($SqlMenus2); 
					if(@mysql_num_rows($ResultMenus2)>0) 
					{
						while($RowMenus2=@mysql_fetch_array($ResultMenus2)) 
						{
							$MenuId2=(int)$RowMenus2["MENU_ID"]; 
							$Nombre2=mw_te_htmlentities($RowMenus2["TITULO"]); 
							
							$activoId=0; 
							$sql="SELECT RELACION_ID FROM ".mw_te_db_menus_profiles." WHERE PERFIL_ID='".$edit."' AND MENU_ID='".$MenuId2."' LIMIT 1 "; $result=@mysql_query($sql); 
							if(@mysql_num_rows($result)>0) { $activoId=1; } 
	
							?><div class="mw_te_profile_menus_list2" name="subMenuId<?php echo $MenuId2; ?>" id="subMenuId<?php echo $MenuId2; ?>"><input type="checkbox" class="<?php echo $MenuId; ?>" name="MenuId<?php echo $MenuId2; ?>" id="MenuId<?php echo $MenuId2; ?>" value="<?php echo $MenuId1; ?>" <?php if($activoId>0) { ?>checked="true"<?php } ?> /> <?php echo $Nombre2; ?></div><?php 
						}
					}  
				} 
				?></div></td></tr><?php 
			} 
			else { ?><tr><td style="text-align:left;" class="mw_te_list_tit mw_te_profile_list_tit"><input type="checkbox" name="MenuId<?php echo $MenuId; ?>" id="MenuId<?php echo $MenuId; ?>" value="1" <?php if($activoId>0) { ?>checked="true"<?php } ?> /> <?php echo $Nombre; ?></td></tr><?php }
		} 
		?></table><?php 
	} 
} 

?>