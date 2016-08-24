<?php 
/* 
-- Id: contacto.php 2014-11-14 
-- Copyright (c) 2014 MovimientoWeb
-- Created by: Raul Morales Ferrer
*/

if(@file_exists("../config/config.php")) { @include("../config/config.php"); } 

$arrayDate=getdate(time()); 
$curYear=$arrayDate['year']; 
if(isset($_POST["nombre"]))			{ 		$nombre=$_POST["nombre"];			} else { $nombre='';  		} 
if(isset($_POST["email"])) 			{ 		 $email=$_POST["email"]; 			} else { $email=''; 		} 
if(isset($_POST["telefono"]))		{ 	  $telefono=$_POST["telefono"];			} else { $telefono='';  	} 
if(isset($_POST["comentarios"]))	{  $comentarios=$_POST["comentarios"];		} else { $comentarios='';  	} 

/*$nombre=utf8_decode($nombre);
$email=utf8_decode($email);
$telefono=utf8_decode($telefono);
$comentarios=utf8_decode($comentarios);*/

$mail_str_header='Contacto desde www.iicom.mx'; 
$mail_str_footer_site_url='www.iicom.mx'; 
$mail_str_footer_site_title='ICOM Ingenieria y Construccion'; 
$mail_host=DB_MAIL; 

$contactResult=2;
$curDate=current_date_time(); 

if( $nombre && $email && email_validate($email) && $telefono && spam_validate($nombre) && spam_validate($email) && spam_validate($telefono) && spam_validate($comentarios) ) 
{
	$sqlInsert="INSERT INTO mw_contacto SET CONTACTO_ID='0', FECHA_HORA='".$curDate."', NOMBRE='".strtoupper($nombre)."', EMAIL='".strtolower($email)."', 
					TELEFONO='".strtoupper($telefono)."', MENSAJE='".strtoupper($comentarios)."' "; 
	$resultInsert=@mysql_query($sqlInsert); 
		
	if(@file_exists('functions/phpmailer/phpmailer.php')) { @include("functions/phpmailer/phpmailer.php"); } 
	elseif(@file_exists('../functions/phpmailer/phpmailer.php')) { @include("../functions/phpmailer/phpmailer.php"); } 

	$ANIO = $curYear; 
	$mail_str_footer_powered_mail='contacto@movimientoweb.com'; 
	$mail_str_footer_powered_title='MovimientoWeb'; 
	$campos = array(
	"".mw_api_htmlentities('Fecha Registro').""		=>format_date($curDate, 4, ' de '), 
	"".mw_api_htmlentities('Nombre').""				=>mw_api_htmlentities(strtoupper($nombre)), 
	"".mw_api_htmlentities('Email').""				=>mw_api_htmlentities(strtolower($email)), 
	"".mw_api_htmlentities('Tel').""				=>mw_api_htmlentities(strtoupper($telefono)), 
	"".mw_api_htmlentities('Comentarios').""		=>mw_api_htmlentities(strtoupper($comentarios)) ); 

	if(@file_exists('functions/emailFormat.php')) { @include("functions/emailFormat.php"); } 
	elseif(@file_exists('../functions/emailFormat.php')) { @include("../functions/emailFormat.php"); } 
	$cuerpo = $CUERPO; 
	
	$mail = new PHPMailer();
	$mail->Host = "".$mail_host."";
	 
	$mail->From = "".strtolower($email)."";
	$mail->FromName = "".specialchars_to_normal($nombre)."";
	$mail->Subject = "".specialchars_to_normal($mail_str_header)."";
	
	// Obtenemos los emails: 
	$emails=0; 
	$sqlEmails="SELECT * FROM mw_contacto_emails ORDER BY EMAIL_ID DESC "; $resultEmails=@mysql_query($sqlEmails); 
	if(@mysql_num_rows($resultEmails)>0) 
	{ 
		while($rowEmails=mysql_fetch_array($resultEmails)) 
		{ 
			//echo "consulta ok\n";
			if(email_validate($rowEmails["EMAIL"])) 
			{ 
				$emails++; 
				$mail->AddAddress("".strtolower($rowEmails["EMAIL"])."","".strtoupper(specialchars_to_normal($rowEmails["EMAIL"])).""); 
			} 
		} 
	} 
	$mail->AddBCC("contacto_a_clientes@movimientoweb.com", "MovimientoWeb");
	
	$mail->Body = $cuerpo; 
	$altBody=''; 
	$altBody.=specialchars_to_normal($mail_str_header)."\n";
	$altBody.=specialchars_to_normal('Nombre').": ".specialchars_to_normal($nombre)."\n";
	$altBody.=specialchars_to_normal('Email').": ".specialchars_to_normal($email)."\n";
	$altBody.=specialchars_to_normal('Tel').": ".specialchars_to_normal($telefono)."\n";
	$altBody.=specialchars_to_normal('Comentarios').": ".specialchars_to_normal($comentarios)."\n/ "; 
	$mail->AltBody = $altBody; 
	
	if($emails>0) { $mail->Send(); $contactResult=1; } else { $contactResult=2; } 
} 

if($contactResult==1) { @header('Location: ../contacto_ok/'); } else { @header('Location: ../contacto_error/'); } 

?>