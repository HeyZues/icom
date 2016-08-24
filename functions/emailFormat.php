<?php
/* 
-- Id: portal/functions/emailformat.php 2011-06-08 
-- Copyright (c) 2011 MovimientoWeb
-- Created by: Raul Morales Ferrer
-- Email: raul.morales@movimientoweb.com 
*/

if(!defined("MAIL_BACKGROUND_COLOR")) 			{ define("MAIL_BACKGROUND_COLOR", 			'ffffff'); } 
if(!defined("MAIL_BACKGROUND_COLOR_CUADRO")) 	{ define("MAIL_BACKGROUND_COLOR_CUADRO", 	'ebebeb'); } 
if(!defined("MAIL_TITLES_BACKGROUND_COLOR")) 	{ define("MAIL_TITLES_BACKGROUND_COLOR", 	'ebebeb'); } 
if(!defined("MAIL_MAIN_BACKGROUND_COLOR")) 		{ define("MAIL_MAIN_BACKGROUND_COLOR", 		'ebebeb'); } 
if(!defined("MAIL_TITLES_TEXT_COLOR")) 			{ define("MAIL_TITLES_TEXT_COLOR", 			'000000'); } 
if(!defined("MAIL_MAIN_TITLES_TEXT_COLOR")) 	{ define("MAIL_MAIN_TITLES_TEXT_COLOR", 	'000000'); } 
if(!defined("MAIL_MAIN_FIELDS_TEXT_COLOR")) 	{ define("MAIL_MAIN_FIELDS_TEXT_COLOR", 	'000000'); } 
if(!defined("MAIL_FOOTER_TEXT_COLOR")) 			{ define("MAIL_FOOTER_TEXT_COLOR", 			'000000'); } 
if(!defined("MAIL_TITLES_TEXT_FONT")) 			{ define("MAIL_TITLES_TEXT_FONT", 			'Arial, Helvetica, sans-serif'); } 
if(!defined("MAIL_TITLES_TEXT_SIZE")) 			{ define("MAIL_TITLES_TEXT_SIZE", 			'16'); } 
if(!defined("MAIL_MAIN_TITLES_TEXT_FONT")) 		{ define("MAIL_MAIN_TITLES_TEXT_FONT", 		'Arial, Helvetica, sans-serif'); } 
if(!defined("MAIL_MAIN_TITLES_TEXT_SIZE")) 		{ define("MAIL_MAIN_TITLES_TEXT_SIZE", 		'12'); } 
if(!defined("MAIL_MAIN_FIELDS_TEXT_FONT")) 		{ define("MAIL_MAIN_FIELDS_TEXT_FONT", 		'Arial, Helvetica, sans-serif'); } 
if(!defined("MAIL_MAIN_FIELDS_TEXT_SIZE")) 		{ define("MAIL_MAIN_FIELDS_TEXT_SIZE", 		'12'); } 
if(!defined("MAIL_FOOTER_TEXT_FONT")) 			{ define("MAIL_FOOTER_TEXT_FONT", 			'Arial, Helvetica, sans-serif'); } 
if(!defined("MAIL_FOOTER_TEXT_SIZE")) 			{ define("MAIL_FOOTER_TEXT_SIZE", 			'11'); } 

$CUERPO='<style type="text/css">
	.background { background-color:#'.MAIL_BACKGROUND_COLOR.'; }
	.background_body { background-color:#'.MAIL_BACKGROUND_COLOR_CUADRO.'; }
	.titles { background-color:#'.MAIL_TITLES_BACKGROUND_COLOR.'; color:#'.MAIL_TITLES_TEXT_COLOR.'; font-family:'.MAIL_TITLES_TEXT_FONT.'; font-weight:bold; font-size:'.MAIL_TITLES_TEXT_SIZE.'px; }
	.main_background { background-color:#'.MAIL_MAIN_BACKGROUND_COLOR.'; }
	.main_titles { text-align:right; vertical-align:top; font-family:'.MAIL_MAIN_TITLES_TEXT_FONT.';font-size:'.MAIL_MAIN_TITLES_TEXT_SIZE.'px;font-weight:bold;color:#'.MAIL_MAIN_TITLES_TEXT_COLOR.'; }
	.main_txt { text-align:left; vertical-align:top; font-family:'.MAIL_MAIN_FIELDS_TEXT_FONT.';font-size:'.MAIL_MAIN_FIELDS_TEXT_SIZE.'px;font-weight:normal;color:#'.MAIL_MAIN_FIELDS_TEXT_COLOR.'; }
	.footer { font-family:'.MAIL_FOOTER_TEXT_FONT.';font-size:'.MAIL_FOOTER_TEXT_SIZE.'px;font-weight:bold;color:#'.MAIL_FOOTER_TEXT_COLOR.'; }
</style>
<table cellpadding=0 cellspacing=0 width=100% height=100% align=center class=background>
	<tr><td height=20></td></tr>
	<tr valign=top>
		<td>&nbsp;</td>
		<td width=500 align=center><table cellpadding=0 cellspacing=0 align=center width=100% class=background_body>
			<tr><td height=10></td></tr>
			<tr>
				<td><table cellpadding=0 cellspacing=0 align=center width=95%>
					<tr><td height=5 class=titles></td></tr>
					<tr><td align=center class=titles>'.$mail_str_header.'</td></tr>
					<tr><td height=5 class=titles></td></tr>
				</table></td>
			</tr>
			<tr><td height=10></td></tr>
			<tr>
				<td><table cellpadding=0 cellspacing=0 align=center width=95% class=main_background>
					<tr><td height=10></td></tr>';
					foreach($campos as $key => $val)
					{ 
						$txt=str_replace(chr(13), "", str_replace(chr(10), "<br />", $val));
						$txt=str_replace(chr(10),"<br>&nbsp;<br>", $txt);
						if(!$txt) { $txt="<span style=color:red; class=main_titles>Vac&iacute;o</span>"; }
						$CUERPO.='
						<tr>
							<td width=33% class=main_titles>&nbsp;'.$key.': </td>
							<td width=2%></td><td width=65% class=main_txt>'.$txt.'</td>
						</tr>';
					}
					$CUERPO.='
					<tr><td height=10></td></tr><tr>
				</table></td>
			</tr>
			<tr><td height=10></td></tr>
			<tr>
				<td><table cellpadding=0 cellspacing=0 align=center width=95%>
					<tr><td height=5 class=titles></td></tr>
					<tr>
						<td align=center class=titles>
							<span class=footer>
								<a href=http://'.$mail_str_footer_site_url.' target=_blank title='.$mail_str_footer_site_title.' class=footer>'.$mail_str_footer_site_url.'</a>
								<br>Copyright &copy; All Rights Reserved '.$ANIO.'<br>
								Powered by <a href=mailto:'.$mail_str_footer_powered_mail.' target=_blank title='.$mail_str_footer_powered_title.' class=footer>'.$mail_str_footer_powered_mail.'</a>
							</span>
						</td>
					</tr>
					<tr><td height=5 class=titles></td></tr>
				</table></td>
			</tr>
			<tr><td height=10></td></tr>
		</table></td>
		<td>&nbsp;</td>
	</tr>
	<tr><td height=20></td></tr>
</table>';

?>
