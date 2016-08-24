<?php
/* 
-- Id: site/index.php 2014-11-19 
-- Copyright (c) 2014 MovimientoWeb.com
-- Created by: Raul Morales Ferrer
*/

if(@file_exists("../config/config.php")) { @include("../config/config.php"); } 
if(isset($_GET["p"])) { $p=$_GET["p"]; } else { $p=''; } 
if(isset($_GET["t"])) { $t=$_GET["t"]; } else { $t=''; } 

$curDateArray=getdate(time()); 
$curYear=$curDateArray['year']; 
$curY=(int)$curDateArray['year']; 
$curM=(int)$curDateArray['mon']; 
$curD=(int)$curDateArray['mday']; 

switch($p)
{
	case 'nosotros': 
		$html_tit='Nosotros - ICOM Ingenier&iacute;a y Construcci&oacute;n'; 
		$html_description='Somos una empresa mexicana con amplia experiencia en el giro de construcci&oacute;n tanto industrial como civil.'; 
		$html_keywords='construcci&oacute;n industrial, construcci&oacute;n civil, construcci&oacute;n en monterrey, construcci&oacute;n industrial en monterrey, construcci&oacute;n civil en monterrey, excavaciones en monterrey, nivelaciones en monterrey, edificaciones comerciales en monterrey, estructuras met&aacute;licas en monterrey, remodelaciones en monterrey, acabados especiales de construcci&oacute;n en monterrey, pintura residencial e industrial en monterrey, plafones y muros falsos, impermeabilizantes, dise&ntilde;o estructural de acero y concreto, evaluaci&oacute;n de proyectos de construcci&oacute;n, administraci&oacute;n de proyectos de construcci&oacute;n'; 
		$html_url='http://www.iicom.mx/nosotros/'; 
		$html_img='http://www.iicom.mx/images/social_logo.png'; 
	break; 
	case 'servicios': 
		switch((int)$t)
		{ 
			case 1: // cimentacion
				$html_tit='Cimentaciones - Servicios - ICOM Ingenier&iacute;a y Construcci&oacute;n'; 
				$html_description='Somos una empresa mexicana con amplia experiencia en el giro de construcci&oacute;n tanto industrial como civil.'; 
				$html_keywords='construcci&oacute;n industrial, construcci&oacute;n civil, construcci&oacute;n en monterrey, construcci&oacute;n industrial en monterrey, construcci&oacute;n civil en monterrey, excavaciones en monterrey, nivelaciones en monterrey, edificaciones comerciales en monterrey, estructuras met&aacute;licas en monterrey, remodelaciones en monterrey, acabados especiales de construcci&oacute;n en monterrey, pintura residencial e industrial en monterrey, plafones y muros falsos, impermeabilizantes, dise&ntilde;o estructural de acero y concreto, evaluaci&oacute;n de proyectos de construcci&oacute;n, administraci&oacute;n de proyectos de construcci&oacute;n'; 
				$html_url='http://www.iicom.mx/servicios-cimentacion/'; 
				$html_img='http://www.iicom.mx/images/social_logo.png'; 
			break;  
			case 2: // construccion
				$html_tit='Construcci&oacute;n y Dise&ntilde;o - Servicios - ICOM Ingenier&iacute;a y Construcci&oacute;n'; 
				$html_description='Somos una empresa mexicana con amplia experiencia en el giro de construcci&oacute;n tanto industrial como civil.'; 
				$html_keywords='construcci&oacute;n industrial, construcci&oacute;n civil, construcci&oacute;n en monterrey, construcci&oacute;n industrial en monterrey, construcci&oacute;n civil en monterrey, excavaciones en monterrey, nivelaciones en monterrey, edificaciones comerciales en monterrey, estructuras met&aacute;licas en monterrey, remodelaciones en monterrey, acabados especiales de construcci&oacute;n en monterrey, pintura residencial e industrial en monterrey, plafones y muros falsos, impermeabilizantes, dise&ntilde;o estructural de acero y concreto, evaluaci&oacute;n de proyectos de construcci&oacute;n, administraci&oacute;n de proyectos de construcci&oacute;n'; 
				$html_url='http://www.iicom.mx/servicios-construccion/'; 
				$html_img='http://www.iicom.mx/images/social_logo.png'; 
			break;  
			case 3: // ingenieria
				$html_tit='Ingenier&iacute;a y Desarrollo - Servicios - ICOM Ingenier&iacute;a y Construcci&oacute;n'; 
				$html_description='Somos una empresa mexicana con amplia experiencia en el giro de construcci&oacute;n tanto industrial como civil.'; 
				$html_keywords='construcci&oacute;n industrial, construcci&oacute;n civil, construcci&oacute;n en monterrey, construcci&oacute;n industrial en monterrey, construcci&oacute;n civil en monterrey, excavaciones en monterrey, nivelaciones en monterrey, edificaciones comerciales en monterrey, estructuras met&aacute;licas en monterrey, remodelaciones en monterrey, acabados especiales de construcci&oacute;n en monterrey, pintura residencial e industrial en monterrey, plafones y muros falsos, impermeabilizantes, dise&ntilde;o estructural de acero y concreto, evaluaci&oacute;n de proyectos de construcci&oacute;n, administraci&oacute;n de proyectos de construcci&oacute;n'; 
				$html_url='http://www.iicom.mx/servicios-ingenieria/'; 
				$html_img='http://www.iicom.mx/images/social_logo.png'; 
			break;  
			case 4: // contra-incendios
				$html_tit='Sistemas Contra Incendios - Servicios - ICOM Ingenier&iacute;a y Construcci&oacute;n'; 
				$html_description='Somos una empresa mexicana con amplia experiencia en el giro de construcci&oacute;n tanto industrial como civil.'; 
				$html_keywords='construcci&oacute;n industrial, construcci&oacute;n civil, construcci&oacute;n en monterrey, construcci&oacute;n industrial en monterrey, construcci&oacute;n civil en monterrey, excavaciones en monterrey, nivelaciones en monterrey, edificaciones comerciales en monterrey, estructuras met&aacute;licas en monterrey, remodelaciones en monterrey, acabados especiales de construcci&oacute;n en monterrey, pintura residencial e industrial en monterrey, plafones y muros falsos, impermeabilizantes, dise&ntilde;o estructural de acero y concreto, evaluaci&oacute;n de proyectos de construcci&oacute;n, administraci&oacute;n de proyectos de construcci&oacute;n'; 
				$html_url='http://www.iicom.mx/servicios-contra-incendios/'; 
				$html_img='http://www.iicom.mx/images/social_logo.png'; 
			break;  
			case 5: // areas-verdes
				$html_tit='&Aacute;reas Verdes y Deportivas - Servicios - ICOM Ingenier&iacute;a y Construcci&oacute;n'; 
				$html_description='Somos una empresa mexicana con amplia experiencia en el giro de construcci&oacute;n tanto industrial como civil.'; 
				$html_keywords='construcci&oacute;n industrial, construcci&oacute;n civil, construcci&oacute;n en monterrey, construcci&oacute;n industrial en monterrey, construcci&oacute;n civil en monterrey, excavaciones en monterrey, nivelaciones en monterrey, edificaciones comerciales en monterrey, estructuras met&aacute;licas en monterrey, remodelaciones en monterrey, acabados especiales de construcci&oacute;n en monterrey, pintura residencial e industrial en monterrey, plafones y muros falsos, impermeabilizantes, dise&ntilde;o estructural de acero y concreto, evaluaci&oacute;n de proyectos de construcci&oacute;n, administraci&oacute;n de proyectos de construcci&oacute;n'; 
				$html_url='http://www.iicom.mx/servicios-areas-verdes/'; 
				$html_img='http://www.iicom.mx/images/social_logo.png'; 
			break;  
			case 6: // superficies
				$html_tit='Recubrimientos y Superficies - Servicios - ICOM Ingenier&iacute;a y Construcci&oacute;n'; 
				$html_description='Somos una empresa mexicana con amplia experiencia en el giro de construcci&oacute;n tanto industrial como civil.'; 
				$html_keywords='construcci&oacute;n industrial, construcci&oacute;n civil, construcci&oacute;n en monterrey, construcci&oacute;n industrial en monterrey, construcci&oacute;n civil en monterrey, excavaciones en monterrey, nivelaciones en monterrey, edificaciones comerciales en monterrey, estructuras met&aacute;licas en monterrey, remodelaciones en monterrey, acabados especiales de construcci&oacute;n en monterrey, pintura residencial e industrial en monterrey, plafones y muros falsos, impermeabilizantes, dise&ntilde;o estructural de acero y concreto, evaluaci&oacute;n de proyectos de construcci&oacute;n, administraci&oacute;n de proyectos de construcci&oacute;n'; 
				$html_url='http://www.iicom.mx/servicios-superficies/'; 
				$html_img='http://www.iicom.mx/images/social_logo.png'; 
			break;  
			case 7: // plataformas
				$html_tit='Plataformas de elevaci&oacute;n - Servicios - ICOM Ingenier&iacute;a y Construcci&oacute;n'; 
				$html_description='Somos una empresa mexicana con amplia experiencia en el giro de construcci&oacute;n tanto industrial como civil.'; 
				$html_keywords='construcci&oacute;n industrial, construcci&oacute;n civil, construcci&oacute;n en monterrey, construcci&oacute;n industrial en monterrey, construcci&oacute;n civil en monterrey, excavaciones en monterrey, nivelaciones en monterrey, edificaciones comerciales en monterrey, estructuras met&aacute;licas en monterrey, remodelaciones en monterrey, acabados especiales de construcci&oacute;n en monterrey, pintura residencial e industrial en monterrey, plafones y muros falsos, impermeabilizantes, dise&ntilde;o estructural de acero y concreto, evaluaci&oacute;n de proyectos de construcci&oacute;n, administraci&oacute;n de proyectos de construcci&oacute;n'; 
				$html_url='http://www.iicom.mx/servicios-plataformas/'; 
				$html_img='http://www.iicom.mx/images/social_logo.png'; 
			break;  
			case 8: // carpinteria
				$html_tit='Carpinter&iacute;a - Servicios - ICOM Ingenier&iacute;a y Construcci&oacute;n'; 
				$html_description='Somos una empresa mexicana con amplia experiencia en el giro de construcci&oacute;n tanto industrial como civil.'; 
				$html_keywords='construcci&oacute;n industrial, construcci&oacute;n civil, construcci&oacute;n en monterrey, construcci&oacute;n industrial en monterrey, construcci&oacute;n civil en monterrey, excavaciones en monterrey, nivelaciones en monterrey, edificaciones comerciales en monterrey, estructuras met&aacute;licas en monterrey, remodelaciones en monterrey, acabados especiales de construcci&oacute;n en monterrey, pintura residencial e industrial en monterrey, plafones y muros falsos, impermeabilizantes, dise&ntilde;o estructural de acero y concreto, evaluaci&oacute;n de proyectos de construcci&oacute;n, administraci&oacute;n de proyectos de construcci&oacute;n'; 
				$html_url='http://www.iicom.mx/servicios-carpinteria/'; 
				$html_img='http://www.iicom.mx/images/social_logo.png'; 
			break;  
			default: 
				$html_tit='Servicios - ICOM Ingenier&iacute;a y Construcci&oacute;n'; 
				$html_description='Somos una empresa mexicana con amplia experiencia en el giro de construcci&oacute;n tanto industrial como civil.'; 
				$html_keywords='construcci&oacute;n industrial, construcci&oacute;n civil, construcci&oacute;n en monterrey, construcci&oacute;n industrial en monterrey, construcci&oacute;n civil en monterrey, excavaciones en monterrey, nivelaciones en monterrey, edificaciones comerciales en monterrey, estructuras met&aacute;licas en monterrey, remodelaciones en monterrey, acabados especiales de construcci&oacute;n en monterrey, pintura residencial e industrial en monterrey, plafones y muros falsos, impermeabilizantes, dise&ntilde;o estructural de acero y concreto, evaluaci&oacute;n de proyectos de construcci&oacute;n, administraci&oacute;n de proyectos de construcci&oacute;n'; 
				$html_url='http://www.iicom.mx/servicios/'; 
				$html_img='http://www.iicom.mx/images/social_logo.png'; 
			break; 
		} 
	break; 
	case 'proyectos': 
		$html_tit='Proyectos - ICOM Ingenier&iacute;a y Construcci&oacute;n'; 
		$html_description='Somos una empresa mexicana con amplia experiencia en el giro de construcci&oacute;n tanto industrial como civil.'; 
		$html_keywords='construcci&oacute;n industrial, construcci&oacute;n civil, construcci&oacute;n en monterrey, construcci&oacute;n industrial en monterrey, construcci&oacute;n civil en monterrey, excavaciones en monterrey, nivelaciones en monterrey, edificaciones comerciales en monterrey, estructuras met&aacute;licas en monterrey, remodelaciones en monterrey, acabados especiales de construcci&oacute;n en monterrey, pintura residencial e industrial en monterrey, plafones y muros falsos, impermeabilizantes, dise&ntilde;o estructural de acero y concreto, evaluaci&oacute;n de proyectos de construcci&oacute;n, administraci&oacute;n de proyectos de construcci&oacute;n'; 
		$html_url='http://www.iicom.mx/proyectos/'; 
		$html_img='http://www.iicom.mx/images/social_logo.png'; 
	break; 
	case 'contacto': 
		$html_tit='Contacto - ICOM Ingenier&iacute;a y Construcci&oacute;n'; 
		$html_description='Somos una empresa mexicana con amplia experiencia en el giro de construcci&oacute;n tanto industrial como civil.'; 
		$html_keywords='construcci&oacute;n industrial, construcci&oacute;n civil, construcci&oacute;n en monterrey, construcci&oacute;n industrial en monterrey, construcci&oacute;n civil en monterrey, excavaciones en monterrey, nivelaciones en monterrey, edificaciones comerciales en monterrey, estructuras met&aacute;licas en monterrey, remodelaciones en monterrey, acabados especiales de construcci&oacute;n en monterrey, pintura residencial e industrial en monterrey, plafones y muros falsos, impermeabilizantes, dise&ntilde;o estructural de acero y concreto, evaluaci&oacute;n de proyectos de construcci&oacute;n, administraci&oacute;n de proyectos de construcci&oacute;n'; 
		$html_url='http://www.iicom.mx/contacto/'; 
		$html_img='http://www.iicom.mx/images/social_logo.png'; 
	break; 
	default: 
		$p=''; 
		$html_tit='Bienvenido a ICOM Ingenier&iacute;a y Construcci&oacute;n'; 
		$html_description='Somos una empresa mexicana con amplia experiencia en el giro de construcci&oacute;n tanto industrial como civil.'; 
		$html_keywords='construcci&oacute;n industrial, construcci&oacute;n civil, construcci&oacute;n en monterrey, construcci&oacute;n industrial en monterrey, construcci&oacute;n civil en monterrey, excavaciones en monterrey, nivelaciones en monterrey, edificaciones comerciales en monterrey, estructuras met&aacute;licas en monterrey, remodelaciones en monterrey, acabados especiales de construcci&oacute;n en monterrey, pintura residencial e industrial en monterrey, plafones y muros falsos, impermeabilizantes, dise&ntilde;o estructural de acero y concreto, evaluaci&oacute;n de proyectos de construcci&oacute;n, administraci&oacute;n de proyectos de construcci&oacute;n'; 
		$html_url='http://www.iicom.mx/inicio/'; 
		$html_img='http://www.iicom.mx/images/social_logo.png'; 
	break; 
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title><?php echo $html_tit; ?></title>
		<meta name="keywords" 	 content="<?php echo $html_keywords; ?>" />
		<meta name="description" content="<?php echo $html_description; ?>" />
		<meta name="searchtitle" content="<?php echo $html_keywords; ?>" />
		<meta name="title" 		 content="<?php echo $html_description; ?>" />
		<meta name="copyright" content="MovimientoWeb 2008-<?php echo $curYear; ?>" />
		<meta name="rating" content="GENERAL" />
		<meta name="distribution" content="GLOBAL" />
		<meta name="robots" content="ALL,INDEX,FOLLOW" />
		<meta name="creator" content="MovimientoWeb" />
		<meta http-equiv="content-language" content="es-mx" />

		<meta name="author" content="ICOM Ingenier&iacute;a y Construcci&oacute;n" />
		<meta property="og:type" content="blog" />
		<meta property="og:title" content="<?php echo $html_tit; ?>" />
		<meta property="og:description" content="<?php echo $html_description; ?>" />
		<meta property="og:url" content="<?php echo $html_url; ?>" />
		<meta property="og:image" content="<?php echo $html_img; ?>" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />
		<meta name="format-detection" content="telephone=no" />
		
		<link rel="Shortcut Icon" href="../images/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/top.css" />
		<link rel="stylesheet" type="text/css" href="../css/foot.css" />
		<script type="text/javascript" src="../js/jquery_1_8_3.js"></script>
		<?php if(!$p) { ?>
		<!--Adobe Edge Runtime-->
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<script type="text/javascript" charset="utf-8" src="../js/banner_principal_edgePreload.js"></script>
		<style>
			.edgeLoad-EDGE-5077574 { visibility:hidden; }
		</style>
		<!--Adobe Edge Runtime End-->
		<?php } elseif($p=='proyectos') { ?>
		<script type="text/javascript" src="../js/lightbox/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../js/lightbox/jquery_lightbox.css" />
		<script type="text/javascript" src="../js/lightbox/jquery_lightbox_min.js"></script>
		<script language="javascript" type="text/javascript"> 
			jQuery(document).ready(function($) {
				$('.lightbox').lightbox();
			});
		</script>
		<?php } ?>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-56933144-1', 'auto');
			ga('send', 'pageview');
		</script>
	</head>
	<body><?php 
	
		@include('../includes/top.php'); 
		
		switch($p)
		{ 
			case 'nosotros': 
				@include('../includes/02_nosotros.php'); 
			break; 
			case 'servicios': 
				@include('../includes/03_servicios.php'); 
			break; 
			case 'proyectos': 
				@include('../includes/04_proyectos.php'); 
			break; 
			case 'contacto': 
				@include('../includes/05_contacto.php'); 
			break; 
			default: 
				@include('../includes/01_inicio.php'); 
			break; 
		} 
	
		@include('../includes/foot.php'); 
		
	?></body>
</html>