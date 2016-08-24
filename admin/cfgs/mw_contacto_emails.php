<?php
/* 
-- Id: admin/cfgs/mw_contacto_emails.php 2014-11-19 
-- Copyright (c) 2014 MovimientoWeb
-- Created by: Raul Morales Ferrer
*/

$editor->setConfig('allowCopy', 0); 
$editor->setConfig('allowDelete', 1); 
$editor->setConfig('allowView', 0); 
$editor->setConfig('allowEdit', 1); 
$editor->setConfig('allowAdd', 1); 
$editor->setDefaultOrderby('EMAIL_ID DESC');

$editor->setDisplayNames(array('EMAIL' 		=> htmlentities('Correo electrónico')));
//$editor->setDisplayNames(array('NOMBRE' 	=> htmlentities('Nombre')));

?>