<?php

if(!stristr($_SERVER['PHP_SELF'], '/TableEditor/inc/teditor/teditor_db_fields.php')) { } else { header('Location: ../../../'); @exit(); } 

$res = $this->dbGetAll("DESC {$table}"); 
$extra= 'unsigned|zerofill|binary|ascii|unicode| '; 
$basetypes = 'real|double|float|decimal|numeric|tinyint|smallint|mediumint|int|bigint|date|time|timestamp|datetime|char|varchar|tinytext|text|mediumtext|longtext|enum|set|tinyblob|blob|mediumblob|longblob';
$fields_search='$this->setSearchableFields('; 
$i_field=0; 
foreach($res as $row) 
{
	preg_match("#^($basetypes)(\([^)]+\))?($extra)*$#i", $row['Type'], $matches); 
	switch ($matches[1]) 
	{
		case 'enum': 
			$type=substr($row['Type'], 6, -2); 
			$values=array_flip(preg_split("#','#", $type)); 
			foreach($values as $k => $v) { $values[$k]=$k; } 
			$this->addField($row['Field'], 'select', $values); 
		break;
		case 'smalltext': case 'mediumtext': case 'text': case 'longtext': 	
			$this->addField($row['Field'], 'textarea'); 
			$this->setUpperFields($row['Field']); 
		break;
		case 'date': 
			if(($row['Null']=="YES")) { $this->addField($row['Field'], 'date', null, ''); } 
			else { $this->addField($row['Field'], 'date', null, date('Y-m-d')); } 
		break; 
		case 'time': 
			$this->addField($row['Field'], 'time', null, date('H:i:s')); 
		break;
		case 'datetime': 
			$this->addField($row['Field'], 'datetime', null, date('Y-m-d H:i:s')); 
		break;
		case 'int': case 'tinyint': case 'smallint': case 'mediumint': case 'bigint': 
			$this->addField($row['Field'], 'int'); 
		break;
		case 'double': case 'decimal': case 'float': 
			$this->addField($row['Field'], 'decimal'); 
		break; 
		default: 
			$this->addField($row['Field'], 'text'); 
			$this->setUpperFields($row['Field']); 
		break; 
	}
	if($usepk AND $row['Key'] == 'PRI') 
	{ 
		$this->pk = $row['Field']; 
		$this->setDefaultOrderby($row['Field']); 
		$this->noEdit($row['Field']); 
		$this->setDisplayNames(array($row['Field']=>'ID')); 
	}
	if($row['Null']=='NO') { $this->setRequiredFields($row['Field']); } 
	$values_email=array('email', 'correo'); 
	$values_pwd=array('password', 'pass', 'contrasena', 'contraseña'); 
	$values_file=array('imagen', 'fotografia', 'archivo', 'documento'); 
	foreach($values_email as $ve) { if(strstr(strtoupper($row['Field']), strtoupper($ve))) 	{ $this->setInputType($row['Field'], 'email'); $this->setNoUpperFields($row['Field']); } } 
	foreach($values_pwd as $vp)   { if(strstr(strtoupper($row['Field']), strtoupper($vp)))  { $this->setInputType($row['Field'], 'password'); $this->setNoUpperFields($row['Field']); } } 
	foreach($values_file as $vf)  { if(strstr(strtoupper($row['Field']), strtoupper($vf)))  { $this->setInputType($row['Field'], 'file'); $this->setNoUpperFields($row['Field']); } } 
	$fields_search.="'".$row['Field']."'"; 
	$i_field++; 
	if($i_field<count($res)) { $fields_search.=", "; } 
}
$fields_search.=');'; 
eval($fields_search); 

?>