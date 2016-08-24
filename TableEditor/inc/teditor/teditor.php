<?php
/**
* $Id: TableEditor.php,v 1.3 2005/04/19 21:54:45 richard Exp $
* Copyright (c) 2005 Richard Heyes (http://www.phpguru.org/) All rights reserved.
* This script is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or (at your option) any later version. 
* The GNU General Public License can be found at  http://www.gnu.org/copyleft/gpl.html.
* This script is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
*/

if(!stristr($_SERVER['PHP_SELF'], '/TableEditor/inc/teditor/teditor.php')) { } else { header('Location: ../../../'); @exit(); } 

class TableEditor
{
	var $db; 
	var $pk; 
	var $table; 
	var $fields; 
	var $errors; 
	var $contextErrors; 
	var $config; 
	var $orderby; 
	var $addCallbacks; 
	var $editCallbacks; 
	var $copyCallbacks; 
	var $deleteCallbacks; 
	var $validationCallbacks; 
	var $dataFilters; 
	var $joinTables;
	function TableEditor($db, $table)
	{ 
		if (!is_resource($db)) { die('<div class="mw_te_error">'.mw_te_htmlentities(mw_te_37707_t301).'</div>'); } 
		$this->db = $db; 
		$this->table = $table; 
		$this->search = null; 
		$this->joinTables = array(); 
		$this->config['perPage'] = 20; 
		$this->config['allowPKEditing'] = false; 
		$this->config['allowAdd'] = true; 
		$this->config['allowEdit'] = true; 
		$this->config['allowDelete'] = true; 
		$this->config['allowView'] = false; 
		$this->config['allowCopy'] = false; 
		$this->config['useFunctions'] = false; 
		$this->config['functions'] = array(	'Current Date' => create_function('', 'return date("Y-m-d");'), 
											'Current Time' => create_function('', 'return date("H:i:s");'), 
											'Current Date and Time' => create_function('', 'return date("Y-m-d H:i:s");'), 
											'MD5 Hash' => 'md5', 
											'Unix Timestamp'=> 'time'
										); 
		$this->config['searchableFields'] = array(); 
		$this->config['title'] = $this->table; 
		$this->config['headerfile'] = null;
		$this->config['footerfile'] = null; 
		$this->getStructure($table); 
		$this->tablesHiddenArray = array(); 
		if(isset($_GET["add"]))  {  $add=(int)$_GET["add"];  } else {  $add=0; } 
		if(isset($_GET["edit"])) { $edit=(int)$_GET["edit"]; } else { $edit=0; } 
		$this->add = $add; 
		$this->edit = $edit; 
		$this->config['del_validation_file'] = ''; 
		$this->config['frm_extends_file'] = ''; 
		$this->config['insert_extends_file'] = ''; 
		$this->config['update_extends_file'] = ''; 
		$this->config['redirect_extends_file'] = ''; 
		$this->config['id_in_list'] = true; 
	}
	function __construct() { $args = func_get_args(); call_user_func_array(array(&$this, 'TableEditor'), $args); }
	function getStructure($table, $usepk = true) { @include(mw_te_path.'inc/teditor/teditor_db_fields.php'); } 
	function addDisplayFilter($field, $callback) { if (is_callable($callback) AND isset($this->fields[$field])) { $this->fields[$field]['filters'][] = $callback; } else if (is_callable($callback)) { $this->errors[] = mw_te_37707_t304.": $field"; } else { $this->errors[] = mw_te_37707_t305; } } 
	function addError($error) { $this->errors[] = $error; }
	function addField($name, $inputType, $values = null, $default = null) { $this->fields[$name] = array('display' => $name, 'input' => $inputType, 'values' => $values, 'default' => $default); }
	function addDataFilter() { $args = func_get_args(); foreach ($args as $a) { $this->dataFilters[] = $a; } }
	function addValidationCallback($field, $callback) { if(!empty($this->fields[$field]) AND empty($this->fields[$field]['noEdit'])) { $this->validationCallbacks[$field][] = $callback; } } 
	function dbError() { return @mysql_error($this->db); }
	function dbGetAll($sql) { $results = array(); if ($res = $this->dbQuery($sql)) { while ($row = @mysql_fetch_array($res, MYSQL_ASSOC)) { $results[] = $row; } return $results; } return false; }
	function dbQuery($sql) { if (is_resource($this->db)) { return @mysql_query($sql, $this->db); } return false; }
	function dbQuote($str) { if (is_null($str)) { return 'NULL'; } if (ini_get('magic_quotes_gpc')) { $str = stripslashes($str); } return "'" . mysql_real_escape_string($str, $this->db) . "'"; }
	function dbGetAssoc($sql) { $results=array(); if ($res = $this->dbQuery($sql) AND @mysql_num_rows($res) > 0) { while ($row = @mysql_fetch_row($res)) { $results[$row[0]] = $row[1]; } return $results; } return false; }
	function dbGetOne($sql) { $result = false; if ($res = $this->dbQuery($sql) AND @mysql_num_rows($res) > 0) { $row = @mysql_fetch_row($res); if ($row) { return $row[0]; } } return false; }
	function dbGetRow($sql) { $result = array(); if ($res = $this->dbQuery($sql) AND @mysql_num_rows($res) > 0) { $row = @mysql_fetch_array($res, MYSQL_ASSOC); return $row; } return false; }
	function getConfig($name) { return $this->config[$name]; }
	function getQueryTables()
	{
		$tables[] = $this->table; $joinClause = array('1'); 
		if(!empty($this->joinTables)) { foreach ($this->joinTables as $jt) { $tables[] = $jt['table']; $joinClause[] = "{$jt['maincol']} = {$jt['foreigncol']}"; } } 
		return array(implode(', ', $tables), implode(' AND ', $joinClause));
	}
	function setDisplayNames($arr) { if (!empty($arr) AND is_array($arr)) { foreach ($arr as $k => $v) { if (!empty($this->fields[$k])) { $this->fields[$k]['display'] = $v; } } } } 
	function setInputType($field, $input) { if (!empty($this->fields[$field])) { $this->fields[$field]['input'] = $input; } }
	function setRequiredFields() { $args = func_get_args(); foreach ($args as $a) { if (!empty($this->fields[$a])) { $this->fields[$a]['required'] = true; } } } 
	function setNoRequiredFields() { $args = func_get_args(); foreach ($args as $a) { if (!empty($this->fields[$a])) { $this->fields[$a]['required'] = false; } } } 
	function setDefaultOrderby($field, $direction = 1) { $this->orderby = array('field' => $field, 'direction' => (int)$direction); }
	function setUpperFields() { $args = func_get_args(); foreach ($args as $a) { if (!empty($this->fields[$a])) { $this->fields[$a]['uppersave'] = true; } } } 
	function setNoUpperFields() { $args = func_get_args(); foreach ($args as $a) { if (!empty($this->fields[$a])) { $this->fields[$a]['uppersave'] = false; } } } 
	function setConfig($name,$value) { if(in_array($name,array('headerfile', 'footerfile')) AND !file_exists($value)){$this->errors[]="Not found $name: ".mw_te_htmlentities($value);return;}$this->config[$name]=$value; }
	function setConfigHiddenTables() { $args=func_get_args(); foreach($args as $a) { if(!isset($this->tablesHiddenArray)) { $this->tablesHiddenArray=array(); } $this->tablesHiddenArray[$a]=true; } }
	function setLeftShortcut($arr) { if (!empty($arr) AND is_array($arr)) { foreach ($arr as $k => $v) { if(!isset($this->shortcuts[$this->table]['left_shortcut'])) { $this->shortcuts[$this->table]['left_shortcut']=array(); } if(isset($this->shortcuts[$this->table]['left_shortcut'])) { $this->shortcuts[$this->table]['left_shortcut'][$k] = $v; } } } } 
	function setRightShortcut($arr) { if (!empty($arr) AND is_array($arr)) { foreach ($arr as $k => $v) { if(!isset($this->shortcuts[$this->table]['right_shortcut'])) { $this->shortcuts[$this->table]['right_shortcut']=array(); } if(isset($this->shortcuts[$this->table]['right_shortcut'])) { $this->shortcuts[$this->table]['right_shortcut'][$k] = $v; } } } } 
	function setValuesFromQuery($field, $sql) { if (!empty($this->fields[$field])) { $this->fields[$field]['values'] = $this->dbGetAssoc($sql); } } 
	function setDefaultValues($arr) { if (is_array($arr)) { foreach ($arr as $field => $v) { if (!empty($this->fields[$field])) { $this->fields[$field]['default'] = $v; } } } }
	function setHiddenField() { $args=func_get_args(); foreach ($args as $a) { if (isset($this->fields[$a])) { $this->fields[$a]['fieldHidden'] = true; } } }
	function setFieldsTits($field, $title) { if (!empty($this->fields[$field])) { $this->fields[$field]['fieldTitle'] = $title; } } 
	function setContextualError($field, $error) { $this->contextErrors[$field] = $error; }
	function setUploadPaths($arr) { if (!empty($arr) AND is_array($arr)) { foreach ($arr as $k => $v) { if (!empty($this->fields[$k])) { $this->fields[$k]['fileUploadPath'] = $v; } } } } 
	function setUploadExts($arr) { if(!empty($arr) AND is_array($arr)) { foreach($arr as $k => $v) { if(!empty($this->fields[$k])) { $this->fields[$k]['fileUploadExts'][strtolower($v)] = strtolower($v); } } } } 
	function setLoadListAjax($field1, $field2, $field2_name, $field2_table, $field1_tab_fId, $field2_tab_fId, $field2_js) 
	{ 
		if (!empty($this->fields[$field1])) 
		{ 
			$this->fields[$field1]['fieldAjax'] = true; 
			$this->fields[$field1]['fieldAjaxF2'] = $field2; 
			$this->fields[$field1]['fieldAjaxF2_name'] = $field2_name; 
			$this->fields[$field1]['fieldAjaxF2_table'] = $field2_table; 
			$this->fields[$field1]['fieldAjaxF1_tab_fId'] = $field1_tab_fId; 
			$this->fields[$field1]['fieldAjaxF2_tab_fId'] = $field2_tab_fId; 
			$this->fields[$field1]['fieldAjaxF2_js'] = $field2_js; 
		} 
	} 
	function setFieldJs($field, $js_event, $js_action) 
	{ 
		if (!empty($this->fields[$field])) 
		{ 
			$this->fields[$field]['fieldJs'] = true; 
			$this->fields[$field]['fieldJsEvent'] = $js_event; 
			$this->fields[$field]['fieldJsAction'] = $js_action; 
		} 
	} 
	function setDateRangeMinDate($field1, $field2) { if(!empty($this->fields[$field1])) { $this->fields[$field1]['fieldDateRangeMinDate'] = $field2; } } 
	function setDateRangeMaxDate($field1, $field2) { if(!empty($this->fields[$field1])) { $this->fields[$field1]['fieldDateRangeMaxDate'] = $field2; } } 
	function setDisplayFieldPosition($field, $position) { if (!empty($this->fields[$field])) { $this->fields[$field]['fieldDisplayPosition'] = ''.$position.''; } }
	function noDisplay() { $args = func_get_args(); foreach ($args as $a) { if (isset($this->fields[$a])) { $this->fields[$a]['noDisplay'] = true; } } }
	function noEdit() { $args = func_get_args(); foreach ($args as $a) { if (isset($this->fields[$a])) { $this->fields[$a]['noEdit'] = true; } } } 
	function onlyDisplay() { $args = func_get_args(); foreach ($this->fields as $field => $v) { $this->fields[$field]['noDisplay'] = !in_array($field, $args); } } 
	function searchDisplayFilter($input) { $searchTerm = preg_quote($this->search); return preg_replace("#($searchTerm)#i", "<span class=\"mw_te_list_row_search\">\$1</span>", $input); } 
	function parseResults(&$row) { foreach ($row as $field => $v) { if (!empty($this->fields[$field]['values'])) { $values = $this->fields[$field]['values']; if ($this->fields[$field]['input'] == 'bitmask') { $descs=array(); foreach($values as $bit => $desc) { if ($v & $bit) { $descs[]=$desc; } } $row[$field]=implode(', ', $descs); } if (isset($values[$v])) { $row[$field] = $values[$v]; } } } }
	function applyDisplayFilters(&$row) { foreach ($row as $field => $value) { if(!empty($this->fields[$field]['filters'])) { foreach($this->fields[$field]['filters'] as $f) { $value=call_user_func($f, $value); } $row[$field] = $value; } } }
	function displayFooter() { $footerfile = $this->getConfig('footerfile'); if($footerfile) { require($footerfile); return; } } 
	function displayHeader()
	{
		$headerfile=$this->getConfig('headerfile'); if($headerfile) { require($headerfile); return; } $table=$this->table; 
		if(@file_exists(mw_te_path."inc/teditor/teditor_errors.php")) { @include(mw_te_path."inc/teditor/teditor_errors.php"); } 
	}
	function displayActionButtons()
	{
		$btns=''; 
		$url_btns = new TableEditor_URL(); 
		$url_btns->removeQueryString('add'); $url_btns->addQueryString('add', '1'); $url_add=$url_btns->getURL(true); 
		if($this->getConfig('allowAdd'))	{ $btns.='<input type="button" id="mw_te_btn_add" name="mw_te_btn_add" class="mw_te_btn" onclick="document.location=\''.$url_add.'\';" value="'.mw_te_htmlentities(mw_te_btn_add).'" title="'.mw_te_htmlentities(mw_te_btn_add).'" alt="'.mw_te_htmlentities(mw_te_btn_add).'" />'; }
		$btns.='<input type="button" id="mw_te_btn_close" name="mw_te_btn_close" class="mw_te_btn" onclick="document.location=\''.mw_te_client_path.'\'" value="'.mw_te_htmlentities(mw_te_btn_close).'" title="'.mw_te_htmlentities(mw_te_btn_close).'" alt="'.mw_te_htmlentities(mw_te_btn_close).'" />'; 
		return $btns;
	}
	function deleteRow($ids) { @include(mw_te_path.'inc/teditor/teditor_del.php'); } 
	function display_form($id = null)
	{
		if(!is_null($id)) { $id = $this->dbQuote($id); } 
		if(!empty($_POST)) { @include(mw_te_path.'inc/teditor/teditor_save.php'); } else { $this->display_form_add_edit($id); } 
	}
	function display_form_add_edit($id) 
	{
		foreach(array_keys($this->fields) as $field) { if(empty($this->fields[$field]['noEdit'])) { $fields[] = $field; } } 
		if($this->edit) 
		{
			if(!empty($this->dataFilters)) { $filters = implode(' AND ', $this->dataFilters); } else { $filters = 1; } $fields = implode(', ', $fields);
			list($tables, $joinClause) = $this->getQueryTables(); 
			$query_edit="SELECT $fields FROM $tables WHERE $joinClause AND $filters AND {$this->pk} = $id"; 
			$row = $this->dbGetRow($query_edit); 
			if($row === false) { $this->errors[] = mw_te_37707_t310; return; } 
			$title = 'Edit';
		} 
		else { $row = array_flip($fields); foreach ($row as $k => $v) { $row[$k] = isset($this->fields[$k]['default']) ? $this->fields[$k]['default'] : null; } $title = 'Add'; } 
		if (!empty($this->errors) AND !empty($_POST)) { foreach ($row as $k => $v) { if (isset($_POST[$k])) { $row[$k] = $_POST[$k]; } } }
		@include(mw_te_path.'inc/teditor/teditor_frm.php'); 
		$this->displayFooter(); 
	}

	/*************************/ // REVISAR
	function setSearchableFields() { $args = func_get_args(); $this->setConfig('searchableFields', $args); }
	function setDisabledField() { $args = func_get_args(); foreach ($args as $a) { if (isset($this->fields[$a])) { $this->fields[$a]['FieldDisabled'] = true; } } }
	function setHtmlListField($field, $input) { if (!empty($this->fields[$field])) { $this->fields[$field]['field_display_html'] = $input; } }
	function setDisplayLinkTable($field, $LinkTable) { if(!empty($this->fields[$field])) { $this->fields[$field]['LinkTable'] = $LinkTable; } }
	function setDisplayHelpField($field, $HelpField) { if(!empty($this->fields[$field])) { $this->fields[$field]['HelpField'] = $HelpField; } }
	function setValuesFromArray($field, $arr) { if (!empty($this->fields[$field])) { $this->fields[$field]['values'] = $arr; } } 
	function addJoinTable($table, $mainCol, $foreignCol) { $this->joinTables[] = array('table' => $table, 'maincol' => $mainCol, 'foreigncol' => $foreignCol); $this->getStructure($table, false); $this->setConfig('allowAdd', false); $this->setConfig('allowCopy', false); $this->setConfig('allowDelete', false); }
	function onlyEdit() { $args = func_get_args(); foreach ($this->fields as $field => $v) { $this->fields[$field]['noEdit'] = !in_array($field, $args); } } 
	function addAdditionCallback($callback) { if (is_callable($callback)) { $this->addCallbacks[] = $callback; } else { $this->errors[] = TEErrorCallback; } }
	function addEditCallback($callback) { if (is_callable($callback)) { $this->editCallbacks[] = $callback; } else { $this->errors[] = TEErrorCallback; } } 
	function addCopyCallback($callback) { if (is_callable($callback)) { $this->copyCallbacks[] = $callback; } else { $this->errors[] = TEErrorCallback; } }
	function addDeleteCallback($callback) { if (is_callable($callback)) { $this->deleteCallbacks[] = $callback; } else { $this->errors[] = TEErrorCallback; } }
	function display()
	{
		if( $this->tablesHiddenArray[$this->table] ) { $this->addError(mw_te_37707_t302); $this->displayHeader(); $this->displayFooter(); exit(); } 
		elseif($this->add==1) // Agregado
		{ 
			if($this->getConfig('allowAdd')) { return $this->display_form(); } else { $this->addError(mw_te_37707_t308); $this->displayHeader(); $this->displayFooter(); } 
		} 
		elseif(isset($this->edit) && $this->edit>0) // Edicion
		{ 
			if($this->getConfig('allowEdit')) { $this->display_form($this->edit); } else { $this->addError(mw_te_37707_t308); $this->displayHeader(); $this->displayFooter(); } 
		} 
		elseif(isset($_GET['view'])) 		
		{ 
			// Consulta
			//if($this->getConfig('allowView')) { $this->handleView($_GET['view']); } else { $this->addError(mw_te_37707_t308); $this->displayHeader(); $this->displayFooter(); } 
		} 
		elseif(isset($_GET['delete'])) // Borrado
		{
			if($this->getConfig('allowDelete')) 
			{
				$result = $this->deleteRow($_GET['delete']); 
				if ($result || 1==1) 
				{ 
					$url_del = new TableEditor_URL(); $url_del->removeQueryString('delete'); $link_del=$url_del->getURL(true); echo mw_te_js_redirect($link_del); @exit(); 
				} 
				$this->errors[] = mw_te_37707_t309; 
			} 
			else { $this->errors[] = mw_te_37707_t308; } 
		} 
		else // Listado 
		{ 
			foreach($this->fields as $field => $v) 
			{ 
				if(empty($v['noDisplay'])) 
				{ 
					if(isset($this->fields[$field]['field_display_html']["html"])) { $this->addDisplayFilter($field, 'mw_te_fieldDisplayHTML'); }
					else { $this->addDisplayFilter($field, 'mw_te_htmlentities'); } 
				} 
			}
			if(count($this->getConfig('searchableFields')) > 0 AND isset($_GET['search']) AND $_GET['search'] !== '') 
			{
				$this->search = $_GET['search']; 
				$searchStr = $this->dbQuote('%' . $this->search . '%'); 
				$searchFields = $this->getConfig('searchableFields'); $searchClause = array(); 
				foreach ($searchFields as $sf) 
				{
					$this->addDisplayFilter($sf, array(&$this, 'searchDisplayFilter'));
					if (!empty($this->fields[$sf]['values'])) 
					{
						$in = array(); 
						foreach ($this->fields[$sf]['values'] as $k => $v) { if(strpos(strtolower($v), strtolower($this->search)) !== false) { $in[] = $this->dbQuote($k); } }
						if((!empty($in)) && (is_array($in)) ) { $in = implode(', ', $in); $searchClause[] = "$sf IN($in)"; } continue;
					}
					$searchClause[] = "$sf LIKE $searchStr";
				}
				if (!empty($searchClause)) { $searchClause = implode(' OR ', $searchClause); } else { $searchClause = '0'; } 
			} 
			else { $searchClause = '1'; } 
			if (!empty($_GET['orderby']) AND preg_match('#^([a-z0-9_]+)(:desc)?$#i', $_GET['orderby'], $matches)) { $this->orderby = array('field' => $matches[1], 'direction' => (int)empty($matches[2])); }
			$orderbyClause = "ORDER BY {$this->orderby['field']}" . (!$this->orderby['direction'] ? ' DESC' : ''); 
			if (count(explode('orderby', $_SERVER['QUERY_STRING'])) > 2) { $url = new TableEditor_URL(); echo mw_te_js_redirect($url->getURL()); @exit(); } 
			if (!empty($this->dataFilters)) { $filters = implode(' AND ', $this->dataFilters); } else { $filters = 1; }
			list($tables, $joinClause) = $this->getQueryTables();
			$sql_count="SELECT COUNT(*) FROM $tables WHERE $joinClause AND $filters AND ($searchClause)"; //echo $sql_count; 
			$total   = $this->dbGetOne($sql_count); 
			$perPage = $this->config['perPage'];
			$startOffset=mw_te_pager_list_start($total, $perPage); 
			
			foreach ($this->fields as $field => $f) { if(empty($f['noDisplay'])) { $fields[] = $field; } } $fields  = implode(', ', $fields);
			$query_list="SELECT $fields FROM $tables WHERE $joinClause AND $filters AND ($searchClause) $orderbyClause LIMIT $startOffset, $perPage"; 
			$results = $this->dbGetAll($s = $query_list); 
			if ($results === false) { $this->errors[] = mw_te_37707_t306.' ' . $this->dbError(); }
			if (!empty($results)) 
			{
				foreach ($results as $k => $row) { $this->parseResults($results[$k]); } unset($row); $nonFilteredData = $results;
				foreach ($results as $k => $row) { $this->applyDisplayFilters($results[$k]); } unset($row);
			}
			@include(mw_te_path.'inc/teditor/teditor_list.php'); 
		} 
	}
	function handleView($id)
	{
		$quotedId=$this->dbQuote($id);
		foreach($this->fields as $f => $v) { $fields[] = $f; }
		if (!empty($this->dataFilters)) { $filters = implode(' AND ', $this->dataFilters); } else { $filters = 1; }
		$fields=implode(', ', $fields);
		list($tables, $joinClause) = $this->getQueryTables();
		$row=$this->dbGetRow("SELECT $fields FROM $tables WHERE $joinClause AND $filters AND {$this->pk} = $quotedId");
		//echo "SELECT $fields FROM $tables WHERE $joinClause AND $filters AND {$this->pk} = $quotedId";
		if($row === false) { $this->errors[] = TEListZeroRecords.'...'; return; }
		$this->parseResults($row); $url = new TableEditor_URL(); $url->removeQueryString('view'); $okURL = $url->getURL(true); $url->addQueryString('edit', $id);
		$editURL = $url->getURL(true); $url->removeQueryString('edit'); $url->addQueryString('add', '1'); $AddURL = $url->getURL(true); $url->removeQueryString('add');
		$Copy="&#99;&#111;&#112;&#121;"; $url->addQueryString($Copy, $id); $CopyURL = $url->getURL(true); $url->removeQueryString($Copy); 
		$url->addQueryString('delete[]', $id); $DelURL = $url->getURL(true); $this->displayHeader(); 
		if(@file_exists("".mw_te_client_path."TEview_".$table.".php")) { @include("".mw_te_client_path."TEview_".$table.".php"); } else { include(''.TEFunctionsPath.'ClassTableEditorView.php'); }
		$this->displayFooter(); @exit(); 
	}
}
class TableEditor_URL extends Net_URL
{
	function getURL($convertAmpersands = false)
	{
		$querystring = $this->getQueryString();
		$this->url = $this->protocol . '://' . $this->user . (!empty($this->pass) ? ':' : '') . $this->pass . (!empty($this->user) ? '@' : '')
			. $this->host . ($this->port == $this->getStandardPort($this->protocol) ? '' : ':' . $this->port) . $this->path 
			. (!empty($querystring) ? '?' . $querystring : '') . (!empty($this->anchor) ? '#' . $this->anchor : '');
		return $this->url;
	}
}

?>