<script language="javascript" type="text/javascript"> 
	function mw_te_login_frm_valida() 
	{
		var frm_submit=1; 
		var usr=document.getElementById('mw_te_frm_usr').value; 
		var pwd=document.getElementById('mw_te_frm_pwd').value; 
		if(!usr) { alert("<?php echo mw_te_37707_l001; ?>"); return false; document.getElementById('mw_te_frm_usr').focus(); var frm_submit=0; } 
		if(!pwd && frm_submit==1)  { alert("<?php echo mw_te_37707_l002; ?>"); return false; document.getElementById('mw_te_frm_pwd').focus(); var frm_submit=0; } 
		if(frm_submit==1) { return true; } else { return false; } 
	}
</script>
<div class="mw_te_login_topbar"></div>
<div class="mw_te_login_logo"><img src="<?php echo mw_te_path_css; ?>images/client_logo.png" width="250" border="0" alt="" title="" /></div>
<form action="<?php echo mw_te_client_path.'?login=1'; ?>" method="post" enctype="multipart/form-data" name="login_frm" id="login_frm" onsubmit="return mw_te_login_frm_valida();">
<table cellpadding="0" cellspacing="0" align="center" width="100%" style="width:100%;" class="mw_te_login_bg0">
	<tr>
		<td><table cellpadding="0" cellspacing="0" align="center">
			<tr>
				<td align="center" style="text-align:center;">
					<div class="mw_te_login_bg1">
						<div class="mw_te_login_bg2">
							<div class="mw_te_login_top"><?php echo mw_te_htmlentities(mw_te_login_title); ?></div>
							<div class="mw_te_login_frm">
								<div class="mw_te_login_usr">
									<input type="text" 		id="mw_te_frm_usr" name="mw_te_frm_usr" tabindex="1" maxlength="255" placeholder="<?php echo mw_te_htmlentities(mw_te_login_txt_usr); ?>" 	value=""   autofocus="autofocus"/>
								</div>
								<div class="mw_te_login_pwd">
									<input type="password" 	id="mw_te_frm_pwd" name="mw_te_frm_pwd" tabindex="2" maxlength="255" placeholder="<?php echo mw_te_htmlentities(mw_te_login_txt_pwd); ?>" 	value="" />
								</div>
								<input type="submit" 		id="mw_te_frm_send" name="mw_te_frm_send" tabindex="3" value="<?php echo mw_te_htmlentities(mw_te_login_txt_submit); ?>" />
							</div>
						</div>
					</div>
				</td>
			</tr>
		</table></td>
	</tr>
</table>	
</form>