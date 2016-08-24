<?php

if(!stristr($_SERVER['PHP_SELF'], '/TableEditor/inc/teditor/teditor_errors.php')) { } else { header('Location: ../../../'); @exit(); } 

if($this->errors):
	foreach($this->errors as $e):
		$error_array=explode(":", $e);
		if(strpos($error_array[1], "Duplicate entry"))
		{
			$error_duplicate_array=explode(" ", trim($error_array[1])); 
			$error_duplicate_count=count($error_duplicate_array); 
			$error_duplicate_str=str_replace("'", "", $error_duplicate_array[2]); 
			$error_duplicate_field=str_replace("'", "", $error_duplicate_array[5]); 
			$table_fields_list=mw_te_getPrimaryKeyOf($this->table); 
			$error_duplicate_primaryKey=$table_fields_list[1]; 
			$error_duplicate_id=mw_te_table_id_value($this->table, $error_duplicate_field, $error_duplicate_str, $error_duplicate_primaryKey); 
			$error_duplicate_msg_js=sprintf(mw_te_37707_t303, $error_duplicate_str, $this->fields[$error_duplicate_field]['display']); 
			$error_duplicate_msg_html=mw_te_htmlentities(sprintf(mw_te_37707_t303, $error_duplicate_str, $this->fields[$error_duplicate_field]['display'])); 
			
			$error_duplicate_url = new TableEditor_URL(); $error_duplicate_url->removeQueryString('edit'); $error_duplicate_url->removeQueryString('add'); 
			if($this->getConfig('allowEdit')) 
			{ 
				$error_duplicate_url->addQueryString('edit', $error_duplicate_id); 
				$error_duplicate_link=$error_duplicate_url->getURL(true);
				$error_duplicate_msg_html.=' <a href="'.$error_duplicate_link.'" title="'.mw_te_htmlentities(mw_te_class_001).'">'.mw_te_htmlentities(mw_te_class_001).'</a>'; 
			} 
			
			?><script language="javascript"> alert('<?php echo $error_duplicate_msg_js; ?>'); </script>
			<div class="mw_te_error"><?php echo $error_duplicate_msg_html; ?></div><?php 
		}
		else 
		{ 
			?><script language="javascript"> alert('<?php echo $e; ?>'); </script>
			<div class="mw_te_error"><?php echo mw_te_htmlentities($e); ?></div><?php 
		} 
	endforeach;
endif;

?>