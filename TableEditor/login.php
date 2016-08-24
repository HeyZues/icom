<?php 

if(isset($_POST["mw_te_frm_usr"])) { $mw_te_frm_usr=$_POST["mw_te_frm_usr"]; } else { $mw_te_frm_usr=''; }
if(isset($_POST["mw_te_frm_pwd"])) { $mw_te_frm_pwd=$_POST["mw_te_frm_pwd"]; } else { $mw_te_frm_pwd=''; }

if(!$mw_te_frm_usr && !$mw_te_frm_pwd) 
{ 
	?><script language="javascript" type="text/javascript"> 
		alert('<?php echo mw_te_37707_l003; ?>'); 
		document.location="<?php echo mw_te_client_path; ?>"; 
	</script><?php 
	@exit(); 
} 
elseif( @md5($mw_te_frm_usr) == mw_te_sys_usr  &&  @md5($mw_te_frm_pwd) == mw_te_sys_pwd ) 
{
	$_SESSION[mw_te_session_name]=mw_te_sys_name; 
	$_SESSION[mw_te_session_id]=mw_te_sys_id; 
	$_SESSION[mw_te_session_type]=mw_te_sys_type; 
	$_SESSION[mw_te_session_subtype]=mw_te_sys_subtype; 
	mw_te_save_access(); 
	?><script language="javascript" type="text/javascript"> 
		document.location="<?php echo mw_te_client_path; ?>"; 
	</script><?php 
	@exit(); 
} 
elseif( $mw_te_frm_usr && $mw_te_frm_pwd ) 
{
	$mw_te_frm_usr=str_replace("'", "", $mw_te_frm_usr); // Evitamos comillas simples
	$sql_user="SELECT * FROM ".mw_te_db_users." WHERE USUARIO='".addslashes($mw_te_frm_usr)."' AND PASSWORD='".md5($mw_te_frm_pwd)."' AND ESTATUS_ID='1' LIMIT 0, 1 "; 
	$result_user = @mysql_query($sql_user);
	if(@mysql_num_rows($result_user)>0)
	{
		$row_user=@mysql_fetch_array($result_user); 
		$_SESSION[mw_te_session_name]=$row_user["USUARIO"]; 
		$_SESSION[mw_te_session_id]=$row_user["USUARIO_ID"]; 
		$_SESSION[mw_te_session_type]=mw_te_adm_type; 
		$_SESSION[mw_te_session_subtype]=$row_user["PERFIL_ID"]; 
		mw_te_save_access(); 
		?><script language="javascript" type="text/javascript"> 
			document.location="<?php echo mw_te_client_path; ?>"; 
		</script><?php 
		@exit(); 
	}
	else 
	{ 
		?><script language="javascript" type="text/javascript"> 
			alert('<?php echo mw_te_37707_l004; ?>'); 
			document.location="<?php echo mw_te_client_path; ?>"; 
		</script><?php 
		@exit(); 
	} 
}
else 
{ 
	?><script language="javascript" type="text/javascript"> 
		alert('<?php echo mw_te_37707_l005; ?>'); 
		document.location="<?php echo mw_te_client_path; ?>"; 
	</script><?php 
	@exit(); 
} 

?>