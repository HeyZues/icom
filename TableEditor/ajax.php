<?php 

if(@file_exists("../config/config.php")) { @include("../config/config.php"); } 

// ruta de la clase table editor
if(!@defined('mw_te_path')) { @define("mw_te_path",	"../TableEditor/"); } 

// configuracion general
if(@file_exists(mw_te_path."inc/_cfg.php")) { @include(mw_te_path."inc/_cfg.php"); } 

// funciones globales
if(@file_exists(mw_te_path."inc/_fnc.php")) { @include(mw_te_path."inc/_fnc.php"); } 

if(!mw_te_session_validate()) { @exit(); } 

if(isset($_POST["id_value"])) { $id_value=(int)$_POST["id_value"]; } else { $id_value=0; } 
if(isset($_POST["field1"])) { $field1=$_POST["field1"]; } else { $field1=''; } 
if(isset($_POST["field2"])) { $field2=$_POST["field2"]; } else { $field2=''; } 
if(isset($_POST["field2_css_class"])) { $field2_css_class=$_POST["field2_css_class"]; } else { $field2_css_class=''; } 
if(isset($_POST["field2_name"])) { $field2_name=$_POST["field2_name"]; } else { $field2_name=''; } 
if(isset($_POST["field2_table"])) { $field2_table=$_POST["field2_table"]; } else { $field2_table=''; } 
if(isset($_POST["field2_table_fieldId"])) { $field2_table_fieldId=$_POST["field2_table_fieldId"]; } else { $field2_table_fieldId=''; } 
if(isset($_POST["field1_table_fieldId"])) { $field1_table_fieldId=$_POST["field1_table_fieldId"]; } else { $field1_table_fieldId=''; } 
if(isset($_POST["field2_js"])) { $field2_js=$_POST["field2_js"]; } else { $field2_js=''; } 

echo '*&*'; 
?><select name="<?php echo $field2; ?>" id="<?php echo $field2; ?>" class="<?php echo $field2_css_class ?>" <?php if($field2_js) { echo ' onchange="'.$field2_js.'" '; } ?>>
	<option value=""><?php echo mw_te_htmlentities(mw_te_frm_select_tit); ?></option><?php 
	$sql="SELECT ".$field2_table_fieldId.", UPPER(".$field2_name.") FROM ".$field2_table." WHERE ".$field1_table_fieldId." IN('".$id_value."') ORDER BY ".$field2_name." ASC"; $result=@mysql_query($sql); 
	if(@mysql_num_rows($result)>0) 
	{ 
		while($row=@mysql_fetch_array($result)) { echo '<option value="'.$row[0].'">'.mw_te_htmlentities($row[1]).'</option>'; } 
	}
?></select>