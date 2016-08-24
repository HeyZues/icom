<?php

if(!stristr($_SERVER['PHP_SELF'], '/admin/dels/mw_te_accesos.php')) { } else { @exit(); } 

if(isset($record_id) && $record_id>0) { $record_id=$record_id; } else { $record_id=0; } 

//$this->addError("Error al borrar el Registro ID: ".$record_id); $this->displayHeader(); $this->displayFooter(); exit(); 

?>