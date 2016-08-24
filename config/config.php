<?php
/* 
-- Id: config/config.php 2014-11-14 
-- Copyright (c) 2014 MovimientoWeb
-- Created by: Raul Morales Ferrer
*/

putenv('TZ=America/Monterrey');
date_default_timezone_set('America/Monterrey'); 
@session_start(); 

if(file_exists('../config/vars.php')) 					{ @include("../config/vars.php"); 					} 

$connectMysql=@mysql_connect(DB_HOST, DB_USER, DB_PASS); 
$db_selected=@mysql_select_db(DB_NAME, $connectMysql); 

if(@file_exists('../functions/globals.php'))			{ @include("../functions/globals.php"); 			} 
if(@file_exists('../functions/app.php')) 				{ @include("../functions/app.php"); 				} 

?>