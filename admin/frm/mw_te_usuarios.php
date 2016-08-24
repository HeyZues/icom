<?php 

$user_old_profile=mw_te_table_id_value(mw_te_db_users, 'USUARIO_ID', $this->edit, 'PERFIL_ID'); 

?><input type="hidden" name="user_old_profile" id="user_old_profile" value="<?php echo $user_old_profile; ?>" />