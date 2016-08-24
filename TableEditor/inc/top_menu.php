<?php 

function me_te_top_submenu($link, $target=0, $img='_blank.png', $tit) 
{ 
	$html='<a'; if($link) { $html.=' href="'.$link.'" '; } if($target==1) { $html.=' target="_blank" '; } 
	$html.='><img src="'.mw_te_path_css.'images/menu/'.$img.'" border="0" alt="" title="" /> '.mw_te_htmlentities($tit).'</a>'; return $html; 
} 

?><script language="javascript" type="text/javascript"> 
	var menu_down_img="<?php echo mw_te_path_css; ?>images/menu/_arrow_down.gif"; 
	var menu_down_w=7; 
	var menu_down_h=6; 
	var menu_right_img="<?php echo mw_te_path_css; ?>images/menu/_arrow_right.gif"; 
	var menu_right_w=6; 
	var menu_right_h=7; 
</script>
<script type="text/javascript" src="<?php echo mw_te_path; ?>js/top_menu.js"></script>
<script type="text/javascript" src="<?php echo mw_te_path; ?>js/top_menu_mobile.js"></script><?php 

	if(mw_te_session_type()==mw_te_sys_type) { $menu_user_id=0; 		 			} 
elseif(mw_te_session_type()==mw_te_adm_type) { $menu_user_id=mw_te_session_id(); 	} 

$menu_where=""; 
if($menu_user_id>0) { $menu_where=" AND (SELECT MENU_ID FROM ".mw_te_db_menus_users." WHERE USUARIO_ID='".$menu_user_id."' AND MENU_ID=".mw_te_db_menus.".MENU_ID LIMIT 1)=MENU_ID "; } 

$sql_menus_0="SELECT * FROM ".mw_te_db_menus." WHERE MENU_ID_PADRE=0 AND ESTATUS_ID=1 ".$menu_where." ORDER BY ORDEN ASC "; 
$result_menus_0=@mysql_query($sql_menus_0); 
if(@mysql_num_rows($result_menus_0)>0) 
{ 
	$row_menus_0_count=0; 
	?><div id="mw_te_div_top_menu" name="mw_te_div_top_menu" class="mw_te_top_menu">
		<ul><?php 
			while($row_menus_0=@mysql_fetch_array($result_menus_0)) 
			{
				$menuId=(int)$row_menus_0["MENU_ID"]; 
				$menuTit=$row_menus_0["TITULO"]; 
				$menuLink=$row_menus_0["URL"]; 
				$sql_menus_1="SELECT * FROM ".mw_te_db_menus." WHERE ESTATUS_ID=1 AND MENU_ID_PADRE='".$menuId."' ".$menu_where." ORDER BY ORDEN ASC "; 
				$result_menus_1=@mysql_query($sql_menus_1); 
				if(@mysql_num_rows($result_menus_1)>0) 
				{ 
					$row_menus_0_count++; 
					$menu_txt_eval = "\$subMenuArray".$row_menus_0_count."=array(); "; 
					eval($menu_txt_eval); 
					while($row_menus_1=@mysql_fetch_array($result_menus_1)) 
					{ 
						$menuId1=(int)$row_menus_1["MENU_ID"]; 
						$menuTit1=$row_menus_1["TITULO"]; 
						$menuLink1=$row_menus_1["URL"]; 
						$menuImg1=$row_menus_1["IMAGEN"]; 
						$subMenus1=array((int)$menuId1, "".$menuTit1."", "".$menuLink1."", "".$menuImg1.""); 
						$menu_txt_eval = "\$subMenuArray".$row_menus_0_count."[]=\$subMenus1; "; 
						eval($menu_txt_eval); 
					} 
					?><li><a rel="ddsubmenu<?php echo $row_menus_0_count; ?>" <?php if($menuLink) { ?>href="<?php echo $menuLink; ?>"<?php } ?>><?php echo mw_te_htmlentities($menuTit); ?></a></li><?php 
				} 
				else { ?><li><a <?php if($menuLink) { ?>href="<?php echo $menuLink; ?>"<?php } ?>><?php echo mw_te_htmlentities($menuTit); ?></a></li><?php } 
			} 
		?></ul>
	</div><?php 
	
	if($row_menus_0_count>0) 
	{ 
		?><script type="text/javascript"> ddlevelsmenu.setup("mw_te_div_top_menu", "topbar"); </script><?php 
		for ($i = 1; $i <= $row_menus_0_count; $i++) 
		{
			$subMenuArray=array(); 
			$menu_txt_eval = "\$subMenuArray=\$subMenuArray".$i."; "; 
			eval($menu_txt_eval); 
			?><ul id="ddsubmenu<?php echo $i; ?>" name="ddsubmenu<?php echo $i; ?>" class="mw_te_top_submenu"><?php 
			foreach($subMenuArray as $id=>$value)
			{
				if(!$value[3]) { $menuImg1='_blank.png'; } else { $menuImg1=$value[3]; } 
				?><li><?php echo me_te_top_submenu($value[2], 0, $menuImg1, $value[1]); 
					$sql_menus_2="SELECT * FROM ".mw_te_db_menus." WHERE ESTATUS_ID=1 AND MENU_ID_PADRE='".$value[0]."' ".$menu_where." ORDER BY ORDEN ASC "; 
					$result_menus_2=@mysql_query($sql_menus_2); 
					if(@mysql_num_rows($result_menus_2)>0) 
					{
						?><ul><?php 
						while($row_menus_2=@mysql_fetch_array($result_menus_2)) 
						{
							$menuId2=(int)$row_menus_2["MENU_ID"]; 
							$menuTit2=$row_menus_2["TITULO"]; 
							$menuLink2=$row_menus_2["URL"]; 
							$menuImg2=$row_menus_2["IMAGEN"]; 
							if(!$menuImg2) { $menuImg2='_blank.png'; } 
							?><li><?php echo me_te_top_submenu($menuLink2, 0, $menuImg2, $menuTit2); ?></li><?php 
						} 
						?></ul><?php 
					} 
				?></li><?php 
			} 
			?></ul><?php 
		} 
	}
} 

?>
<script type="text/javascript">
	$(function() {
		$('nav#menu_mobile').mmenu();
	});
</script>
<div class="mw_te_top_menu_mobile"><a href="../admin/"><?php echo mw_te_htmlentities(mw_te_menu_home); ?></a><a href="#menu_mobile"><?php echo mw_te_htmlentities(mw_te_menu_mobile); ?></a><a href="../admin/?logout=1"><?php echo mw_te_htmlentities(mw_te_menu_exit); ?></a></div>
<nav id="menu_mobile">
	<ul>
		<?php 
		$sql_menus_0="SELECT * FROM ".mw_te_db_menus." WHERE MENU_ID_PADRE=0 AND ESTATUS_ID=1 ".$menu_where." ORDER BY ORDEN ASC "; 
		$result_menus_0=@mysql_query($sql_menus_0); 
		if(@mysql_num_rows($result_menus_0)>0) 
		{ 
			$row_menus_0_count=0; 
			while($row_menus_0=@mysql_fetch_array($result_menus_0)) 
			{
				$menuId=(int)$row_menus_0["MENU_ID"]; 
				$menuTit=$row_menus_0["TITULO"]; 
				$menuLink=$row_menus_0["URL"]; 
				?><li><a <?php if($menuLink) { ?>href="<?php echo $menuLink; ?>"<?php } ?>><?php echo mw_te_htmlentities($menuTit); ?></a><?php 

					$sql_menus_1="SELECT * FROM ".mw_te_db_menus." WHERE ESTATUS_ID=1 AND MENU_ID_PADRE='".$menuId."' ".$menu_where." ORDER BY ORDEN ASC "; 
					$result_menus_1=@mysql_query($sql_menus_1); 
					if(@mysql_num_rows($result_menus_1)>0) 
					{ 
						$row_menus_0_count++; 
						?><ul><?php 
						while($row_menus_1=@mysql_fetch_array($result_menus_1)) 
						{ 
							$menuId1=(int)$row_menus_1["MENU_ID"]; 
							$menuTit1=$row_menus_1["TITULO"]; 
							$menuLink1=$row_menus_1["URL"]; 
							?><li><a <?php if($menuLink1) { ?>href="<?php echo $menuLink1; ?>"<?php } ?>><?php echo mw_te_htmlentities($menuTit1); ?></a><?php 

								$sql_menus_2="SELECT * FROM ".mw_te_db_menus." WHERE ESTATUS_ID=1 AND MENU_ID_PADRE='".$menuId1."' ".$menu_where." ORDER BY ORDEN ASC "; 
								$result_menus_2=@mysql_query($sql_menus_2); 
								if(@mysql_num_rows($result_menus_2)>0) 
								{
									?><ul><?php 
									while($row_menus_2=@mysql_fetch_array($result_menus_2)) 
									{
										$menuId2=(int)$row_menus_2["MENU_ID"]; 
										$menuTit2=$row_menus_2["TITULO"]; 
										$menuLink2=$row_menus_2["URL"]; 
										?><li><a <?php if($menuLink2) { ?>href="<?php echo $menuLink2; ?>"<?php } ?>><?php echo mw_te_htmlentities($menuTit2); ?></a></li><?php 
									} 
									?></ul><?php 
								} 
							?></li><?php 
						} 
						?></ul><?php 
					} 
				?></li><?php 
			} 
		} 
		?>
	</ul>
</nav>
