<?php

if(!stristr($_SERVER['PHP_SELF'], '/TableEditor/inc/teditor/teditor_del.php')) { } else { header('Location: ../../../'); @exit(); } 

foreach($ids as $del_key => $del_value) { $ids_del[]=$del_value; } 
if(count($ids_del)>0) { $ids=$ids_del; $ids_del = array(); } else { $this->errors[]=mw_te_37707_t309; return false; } 
$ids=array_map(array(&$this, 'dbQuote'), $ids); $ids=implode(', ', $ids); $callbacks=!empty($this->deleteCallbacks); 
if(!empty($this->dataFilters)) { $filters = implode(' AND ', $this->dataFilters); } else { $filters = 1; } 

if($callbacks) { $data = $this->dbGetAll("SELECT * FROM {$this->table} WHERE $filters AND {$this->pk} IN($ids)"); } 
if($this->config['del_validation_file'] && @file_exists($this->config['del_validation_file'])) 
{ 
	$ids_del=explode(",", $ids); 
	foreach($ids_del as $record_id) 
	{ 
		$record_id=str_replace("'", "", $record_id); 
		
		// file fields identified
		$del_res = $this->dbGetAll("DESC {$this->table}"); 
		$del_field_key=''; 
		foreach($del_res as $del_row) 
		{ 
			$del_field=$del_row['Field']; 
			if($del_row['Key'] == 'PRI') { $del_field_key=$del_field; } 
			
			if($this->fields[$del_field]['input']=='file') 
			{ 
				$del_file_path=$this->fields[$del_field]['fileUploadPath']; 
				$del_old_file=mw_te_table_id_value($this->table, $del_field_key, $record_id, $del_field); 
				if($del_old_file && @file_exists($del_file_path.$del_old_file)) { @unlink($del_file_path.$del_old_file); } 
			} 
		} 
		// end

		@include($this->config['del_validation_file']); 
		$result = (bool)$this->dbQuery("DELETE FROM {$this->table} WHERE $filters AND {$this->pk} IN($ids)"); 
	} 
	if($result) { return $result; } 
} 
else
{ 
	$result = (bool)$this->dbQuery("DELETE FROM {$this->table} WHERE $filters AND {$this->pk} IN($ids)"); 
	if($result AND $callbacks) { foreach($data as $row) { foreach ($this->deleteCallbacks as $c) { call_user_func($c, $row); } } } 
	return $result; 
} 

?>