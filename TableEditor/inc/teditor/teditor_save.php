<?php

if(!stristr($_SERVER['PHP_SELF'], '/TableEditor/inc/teditor/teditor_save.php')) { } else { header('Location: ../../../'); @exit(); } 

if(!empty($_POST)) 
{
	$table=$this->table;
	$edit=$this->edit;
	$add=$this->add; 
	$useFunctions = $this->getConfig('useFunctions'); 
	foreach($this->fields as $field => $value) 
	{
		if((!empty($value['noEdit']) AND !isset($value['default'])) OR ($field == $this->pk AND !$this->getConfig('allowPKEditing'))) { continue; }
		if(!empty($value['noEdit']) AND isset($value['default'])) { $unQuoted[$field] = $value['default']; $quoted[$field]   = $this->dbQuote($value['default']); continue; } 
		if($useFunctions) { $function=$_POST['function'][$field]; if (!empty($function) AND !empty($this->config['functions'][$function])) { $_POST[$field]=call_user_func($this->config['functions'][$function], $_POST[$field]); } } 
		if(!empty($this->fields[$field]['required']) AND ($_POST[$field]==='' OR !isset($_POST[$field]))) 
		{ 
			if(!isset($_FILES[$field]['tmp_name']) && !isset($_FILES[$field.'_new']['tmp_name'])) 
			{ 
				switch($this->fields[$field]['input']) 
				{ 
					case 'time': break; 
					default: $this->setContextualError($field, mw_te_37707_t311); break; 
				} 
			} 
		}
		switch($this->fields[$field]['input']) 
		{
			case 'file': 
				$file_upload_name=''; 
				$file_upload_file='';
				if($this->add==1) 
				{ 
					if(isset($_FILES[$field]['tmp_name'])) { $file_upload_file=$_FILES[$field]['tmp_name']; $file_upload_name=$_FILES[$field]['name']; } 
				} 
				elseif($this->edit>0)
				{
					if(isset($_FILES[$field.'_new']['tmp_name'])) { $file_upload_file=$_FILES[$field.'_new']['tmp_name']; $file_upload_name=$_FILES[$field.'_new']['name']; } 
				}
				if($file_upload_name) 
				{ 
					$file_ext=mw_te_doctype($file_upload_name, 1); 
					$uploadExt=0; 
					$acceptExts=''; 
					if($this->fields[$field]['fileUploadExts']) 
					{ 
						foreach($this->fields[$field]['fileUploadExts'] as $exts) 
						{ 
							if($exts==$file_ext) { $uploadExt=1; break; } else { $acceptExts.=' .'.$exts.' '; } 
						} 
						if($uploadExt==0 && $this->fields[$field]['fileUploadExts']) { $this->setContextualError($field, mw_te_37707_t315.' '.$acceptExts.''); } 
					}
					else { $this->setContextualError($field, mw_te_37707_t316); } 

					$file_upload_path=$this->fields[$field]['fileUploadPath']; 
					if($file_upload_path) 
					{ 
						if(!@is_dir($file_upload_path)) { @mkdir($file_upload_path, 0777); } // Creamos directorio si no existe
					} 
					else { $this->setContextualError($field, mw_te_37707_t317); } 
				}
			break; 
			case 'email': if(($_POST[$field]) && !mw_te_email_validate($_POST[$field])) { $this->setContextualError($field, mw_te_37707_t314); } break; 
			case 'int': if(($_POST[$field]) && !mw_te_int_validate($_POST[$field])) { $this->setContextualError($field, mw_te_37707_t318); } break; 
			case 'date': if(($_POST[$field]) && !mw_te_date_validate($_POST[$field])) { $this->setContextualError($field, mw_te_37707_t320); } break; 
			case 'rfc': if(($_POST[$field]) && !mw_te_rfc_validate($_POST[$field])) { $this->setContextualError($field, mw_te_37707_t319); } break; 
			/*
			case 'bitmask': $v = 0; if (!empty($_POST[$field])) { foreach ($_POST[$field] as $bit) { $v |= $bit; } } $_POST[$field] = $v; 	break;
			*/
		} 
		if(!empty($this->validationCallbacks[$field])) 
		{ 
			foreach($this->validationCallbacks[$field] as $c) 
			{ 
				$resultCallbacks = @call_user_func($c, $_POST[$field]); 
				if($resultCallbacks != $_POST[$field]) 
				{
					$this->setContextualError($field, $resultCallbacks);
				}
			} 
		}
		$unQuoted[$field]=$_POST[$field]; $quoted[$field]=$this->dbQuote($_POST[$field]); $fields[]=$field;
	} 
	if (!empty($this->errors) OR !empty($this->contextErrors)) { $this->display_form_add_edit($id); } 
	else
	{ 
		foreach($fields as $f) 
		{
			if(($this->fields[$f]['fieldHidden'])) { $sets[]="$f = {$quoted[$f]}"; } 
			else
			{ 
				switch($this->fields[$f]['input']) 
				{
					case 'file': 
						$file_upload_path=$this->fields[$f]['fileUploadPath']; 
						$file_upload_name=''; 
						$file_upload_file='';
						if($this->add==1)
						{ 
							if(isset($_FILES[$f]['tmp_name'])) { $file_upload_file=$_FILES[$f]['tmp_name']; $file_upload_name=$_FILES[$f]['name']; } 
							if($file_upload_name)
							{ 
								$file_newname=strtolower(str_replace(' ', '', mw_te_table_name($table)).str_replace('-', '', str_replace(':', '', str_replace(' ', '', mw_te_current_datetime())))); 
								$file_upload="'".mw_te_upload($f, $file_upload_path, $file_newname)."'"; 
								if($file_upload) { $sets[] = "$f = $file_upload"; } 
							} 
						} 
						elseif($this->edit>0) 
						{ 
							if(isset($_FILES[$f.'_new']['tmp_name'])) { $file_upload_file=$_FILES[$f.'_new']['tmp_name']; $file_upload_name=$_FILES[$f.'_new']['name']; } 
							if($file_upload_name)
							{ 
								$file_newname=strtolower(str_replace(' ', '', mw_te_table_name($table)).str_replace('-', '', str_replace(':', '', str_replace(' ', '', mw_te_current_datetime())))); 
								$file_upload="'".mw_te_upload($f.'_new', $file_upload_path, $file_newname)."'"; 
								if($file_upload) 
								{ 
									$sets[] = "$f = $file_upload"; 
									if(isset($_POST[$f])) { $file_old=$_POST[$f]; } else { $file_old=''; } 
									if($file_old && @file_exists($file_upload_path.$file_old)) { @unlink($file_upload_path.$file_old); } 
								} 
							} 
						} 						
					break; 
					/*
					case 'wysiwyg': $Value="'".utf8_decode($_POST[$f])."'"; $sets[]="$f = $Value"; break; 
					case 'datetime': $DateTimeAux=str_replace ("'", "",$quoted[$f]); $DateTimeAux="'".TEDatetimeToMysql($DateTimeAux)."'"; $sets[] = "$f = $DateTimeAux"; break;
					*/
					case 'password': 
						if($add) { $sets[] = "$f = md5($quoted[$f])"; } 
						else 
						{ 
							if(isset($_POST[$f])) { $f_pwd=$_POST[$f]; } else { $f_pwd=''; } 
							if(isset($_POST[$f.'_change'])) { $f_pwd_change=$_POST[$f.'_change']; } else { $f_pwd_change=''; } 
							if($f_pwd_change) { $f_pwd_change_md5="'".md5($f_pwd_change)."'"; $sets[] = "$f = $f_pwd_change_md5"; } else { $sets[]="$f = {$quoted[$f]}"; }
						} 
					break;
					case 'email': 
						$sets[]="$f = LOWER({$quoted[$f]})"; 
					break;
					case 'date': $date_aux=str_replace("'", "",$quoted[$f]); $date_aux="'".mw_te_date_to_MySQL($date_aux)."'"; $sets[] = "$f = $date_aux"; break; 
					case 'time': 
						if(isset($_POST[$f.'_hour'])){ $f_time_hour=$_POST[$f.'_hour'];} else { $f_time_hour=0; } 
						if(isset($_POST[$f.'_min'])) {  $f_time_min=$_POST[$f.'_min']; } else { $f_time_min=0; } 
						if(isset($_POST[$f.'_sec'])) {  $f_time_sec=$_POST[$f.'_sec']; } else { $f_time_sec=0; } 
						$time_aux=mw_te_complete($f_time_hour, 2, '0', 1).':'.mw_te_complete($f_time_min, 2, '0', 1).':'.mw_te_complete($f_time_sec, 2, '0', 1); 
						$sets[] = "$f = '".$time_aux."'"; 
					break; 
					case 'currency': 
						$currency_aux=str_replace("'", "", str_replace(',', '', str_replace('$', '', $quoted[$f]))); 
						$sets[] = "$f = '".$currency_aux."'"; 
					break; 
					default: 
						if($this->fields[$f]['uppersave']==true) { $sets[]="$f = UPPER({$quoted[$f]})"; } else { $sets[]="$f = {$quoted[$f]}"; } 
					break;
				}
			}
		}
		$sets = implode(', ', $sets); 
		if($this->edit>0) 
		{
			$record_id=str_replace("'", "", $id); 
			if(!empty($this->dataFilters)) { $filters = implode(' AND ', $this->dataFilters); } else { $filters = 1; } 
			list($tables, $joinClause) = $this->getQueryTables(); $sql = "UPDATE $tables SET $sets WHERE $joinClause AND $filters AND {$this->pk} = $id"; 
			$res = $this->dbQuery($sql); 
			if($this->config['update_extends_file'] && @file_exists($this->config['update_extends_file'])) { @include($this->config['update_extends_file']); } 
			if(!$res) 
			{ 
				$this->addError('Error: '.$this->dbError()); $this->displayHeader(); $this->displayFooter(); exit();
			} 
			else { if(!empty($this->editCallbacks)) { foreach($this->editCallbacks as $c) { call_user_func($c, $unQuoted); } } }
		} 
		elseif($this->add==1) 
		{
			$sql = "INSERT INTO {$this->table} SET $sets"; 
			$res = $this->dbQuery($sql); 
			if(!$res) 
			{ 
				$this->addError('Error: '.$this->dbError()); $this->displayHeader(); $this->displayFooter(); exit();
			} 
			else 
			{
				$id = $this->dbGetOne("SELECT LAST_INSERT_ID()"); 
				$record_id=str_replace("'", "", $id); 
				if($this->config['insert_extends_file'] && @file_exists($this->config['insert_extends_file'])) { @include($this->config['insert_extends_file']); } 
				if($this->add==1) { if(!empty($this->addCallbacks)) { foreach($this->addCallbacks as $c) { call_user_func($c, $unQuoted); } } } 
			}
		} 
		
		$url = new TableEditor_URL(); $url->removeQueryString('edit'); $url->removeQueryString('add'); $location_url = $url->getURL(); 
		if(empty($this->errors)) 
		{ 
			if($this->config['redirect_extends_file'] && @file_exists($this->config['redirect_extends_file'])) { @include($this->config['redirect_extends_file']); } 
			echo mw_te_js_redirect($location_url); 
			@exit(); 
		}
	} 
}

?>