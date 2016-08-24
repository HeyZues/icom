<?php 
/* 
-- Id: functions/globals.php 2014-10-30 
-- Copyright (c) 2014 MovimientoWeb
-- Created by: Raul Morales Ferrer
*/

function mw_api_htmlentities($str) 	
{ 
	if(phpversion()<=5.2) { return htmlentities($str); } 
	elseif(phpversion()>5.2 && phpversion()<5.4) { return htmlentities($str); } 
	elseif(phpversion()>=5.4) { return htmlentities($str, ENT_HTML401, 'ISO8859-1'); } 
	else { return $str; } 
} 

function current_date() { $current_date = date ("Y-m-d",mktime (date ("H"), date ("i"), date ("s"), date("m"), date ("d"), date("Y")) ); return $current_date; }
function current_time() { $current_time= date ("H:i:s",mktime (date ("H"), date ("i"), date ("s"), date("m"), date ("d"), date("Y")) ); return $current_time; }
function current_date_time() { $current_date_time=''.current_date().' '.current_time().''; return $current_date_time; }

function mysql_to_date($date) { if (strstr($date,"-")) { $date=substr($date,8,2)."/".substr($date,5,2)."/".substr($date,0,4); } return $date; } 
function date_to_mysql($date) { $date=explode("/",strtolower($date)); $date=$date[2]."-".$date[1]."-".$date[0]; return $date; }
function mysql_to_datetime($d) { if(strstr($d,"-")) { $d=substr($d,8,2)."/".substr($d,5,2)."/".substr($d,0,4)." ".substr($d,10,9); } return $d; } 
function datetime_to_mysql($d) { if(strstr($d,"/")) { $d=substr($d,6,4)."-".substr($d,3,2)."-".substr($d,0,2)." ".substr($d,10,10); } return $d; }
function add_days_to_date($d, $days=1) { $new=date("Y-m-d",mktime (date ("H"), date ("i"), date ("s"), substr($d, 5, 2), substr($d, 8, 2) + $days, substr($d, 0, 4)) ); return $new; }
function month_last_day($month, $year) { $last=28; while(checkdate($month, $last + 1, $year)) { $last++; } return $last; } 
function date_validate($date) { $dia=(int)substr($date,0,2); $mes=(int)substr($date,3,2); $ano=(int)substr($date,6,4); if(checkdate($mes,$dia,$ano)) { return true; } else { return false; } }

function email_validate($email) { $regex = "/^([*+!.&#$|'\\%\/0-9a-z^_`{}=?~:-]+)@(([0-9a-z-]+\.)+[0-9a-z]{2,4})$/i"; if(!empty($email) && !preg_match($regex, $email)) { return false; } else { return true; } } 
function url_validate($url) { $id = @fopen($url,"r"); if($id) { $r = true; } else { $r = false; } return $r; fclose($Id); }

function format_currency($ammount, $pre='$ ') { return $pre.''.number_format($ammount, 2, '.', ','); }

function format_date($date, $format, $separator) 
{
	$s=$separator; 
	$month_small=array("", "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"); 
	$month_big=array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"); 
	switch((int)$format)
	{
		// Formato de salida: 9/Enero/2005 
		case 2: $i=(int)(substr($date,5,2)); $month=$month_big[$i]; $date=number_format(substr($date,8,2)).$s.$month.$s.substr($date,0,4); break; 
		// Formato de salida: 9/Enero
		case 3: $i=(int)(substr($date,5,2)); $month=$month_big[$i]; $date=number_format(substr($date,8,2)).$s.$month; break; 
		// Formato de salida: 9/Ene/2007 00:00:00
		case 4: $i=(int)(substr($date,5,2)); $month=$month_small[$i]; $hour=", ".substr($date,10,9).""; if($hour==', ') { $hour.='00:00:00'; } $date=number_format(substr($date,8,2)).$s.$month.$s.substr($date,0,4).$hour; break;
		// Formato de salida: 09/Ene/2005
		case 5: $i=(int)(substr($date,5,2)); $month=$month_small[$i]; $date=substr($date,8,2).$s.$month.$s.substr($date,0,4); break;
		// Formato de salida: 9/Ene/2005
		case 1: 
		default: $i=(int)(substr($date,5,2)); $month=$month_small[$i]; $date=number_format(substr($date,8,2)).$s.$month.$s.substr($date,0,4); break;
	}
	 return $date; 
} 
function document_type($file, $return)
{
	$ext=(strpos($file, '.') ? strtolower(substr(strrchr($file, '.'), 1)) : '');
	if(!$ext) { $type='unknown'; }
	else
	{
		$type='unknown';
		static $types = array(
			'binary' => array('bat', 'bin', 'com', 'dmg', 'dms', 'exe', 'msi', 'msp', 'pif', 'pyd', 'scr', 'so'), 
			'binhex' => array('hqx'), 
				'cd' => array('bwi', 'bws', 'bwt', 'ccd', 'cdi', 'cue', 'img', 'iso', 'mdf', 'mds', 'nrg', 'nri', 'sub', 'vcd'), 
			  'comp' => array('cfg', 'conf', 'inf', 'ini', 'log', 'nfo', 'reg'), 
		'compressed' => array('7z', 'a', 'ace', 'ain', 'alz', 'amg', 'arc', 'ari', 'arj', 'bh', 'bz', 'bz2', 'cab', 'deb', 'dz', 'gz', 'io', 'ish', 'lha', 'lzh', 'lzs', 'lzw', 'lzx', 'msx', 'pak', 'rar', 'rpm', 'sar', 'sea', 'sit', 'taz', 'tbz', 'tbz2', 'tgz', 'tz', 'tzb', 'uc2', 'xxe', 'yz', 'z', 'zip', 'zoo'), 
			   'dll' => array('386', 'db', 'dll', 'ocx', 'sdb', 'vxd'), 
			   'doc' => array('abw', 'ans', 'chm', 'cwk', 'dif', 'doc', 'docx', 'dot', 'mcw', 'msw', 'pdb', 'psw', 'rtf', 'rtx', 'sdw', 'stw', 'sxw', 'vor', 'wk4', 'wkb', 'wpd', 'wps', 'wpw', 'wri', 'wsd'), 
			 'image' => array('adc', 'art', 'bmp', 'cgm', 'dib', 'gif', 'ico', 'ief', 'jfif', 'jif', 'jp2', 'jpc', 'jpe', 'jpeg', 'jpg', 'jpx', 'mng', 'pcx', 'png', 'psd', 'psp', 'swc', 'sxd', 'tga', 'tif', 'tiff', 'wmf', 'wpg', 'xcf', 'xif', 'yuv'), 
			  'java' => array('class', 'jar', 'jav', 'java', 'jtk'), 
			    'js' => array('ebs', 'js', 'jse', 'vbe', 'vbs', 'wsc', 'wsf', 'wsh'), 
			   'key' => array('aex', 'asc', 'gpg', 'key', 'pgp', 'ppk'), 
			   'mov' => array('amc', 'dv', 'm4v', 'mac', 'mov', 'mp4v', 'mpg4', 'pct', 'pic', 'pict', 'pnt', 'pntg', 'qpx', 'qt', 'qti', 'qtif', 'qtl', 'qtp', 'qts', 'qtx'), 
			 'movie' => array('asf', 'asx', 'avi', 'div', 'divx', 'dvi', 'm1v', 'm2v', 'mkv', 'movie', 'mp2v', 'mpa', 'mpe', 'mpeg', 'mpg', 'mps', 'mpv', 'mpv2', 'ogm', 'ram', 'rmvb', 'rnx', 'rp', 'rv', 'vivo', 'vob', 'wmv', 'xvid'), 
			   'pdf' => array('edn', 'fdf', 'pdf', 'pdp', 'pdx'), 
			   'php' => array('inc', 'php', 'php3', 'php4', 'php5', 'phps', 'phtml'), 
			   'ppt' => array('emf', 'pot', 'ppa', 'pps', 'ppt', 'sda', 'sdd', 'shw', 'sti', 'sxi'), 
			    'ps' => array('ai', 'eps', 'ps'), 
			 'sound' => array('aac', 'ac3', 'aif', 'aifc', 'aiff', 'ape', 'apl', 'au', 'ay', 'bonk', 'cda', 'cdda', 'cpc', 'fla', 'flac', 'gbs', 'gym', 'hes', 'iff', 'it', 'itz', 'kar', 'kss', 'la', 'lpac', 'lqt', 'm4a', 'm4p', 'mdz', 'mid', 'midi', 'mka', 'mo3', 'mod', 'mp+', 'mp1', 'mp2', 'mp3', 'mp4', 'mpc', 'mpga', 'mpm', 'mpp', 'nsf', 'oda', 'ofr', 'ogg', 'pac', 'pce', 'pcm', 'psf', 'psf2', 'ra', 'rm', 'rmi', 'rmjb', 'rmm', 'sb', 'shn', 'sid', 'snd', 'spc', 'spx', 'svx', 'tfm', 'tfmx', 'voc', 'vox', 'vqf', 'wav', 'wave', 'wma', 'wv', 'wvx', 'xa', 'xm', 'xmz'), 
			   'tar' => array('gtar', 'tar'), 
			  'text' => array('c', 'cc', 'cp', 'cpp', 'cxx', 'diff', 'h', 'hpp', 'hxx', 'm3u', 'md5', 'patch', 'pls', 'py', 'sfv', 'sh', 'txt'), 
			    'uu' => array('uu', 'uud', 'uue'), 
			   'web' => array('asa', 'asp', 'aspx', 'cfm', 'cgi', 'css', 'dhtml', 'dtd', 'grxml', 'htc', 'htm', 'html', 'htt', 'htx', 'jsp', 'lnk', 'mathml', 'mht', 'mhtml', 'perl', 'pl', 'plg', 'rss', 'shtm', 'shtml', 'stm', 'swf', 'tpl', 'wbxml', 'xht', 'xhtml', 'xml', 'xsl', 'xslt', 'xul'), 
			   'xls' => array('csv', 'dbf', 'prn', 'pxl', 'sdc', 'slk', 'stc', 'sxc', 'xla', 'xlb', 'xlc', 'xld', 'xlr', 'xls', 'xlt', 'xlw')
		); 
		foreach($types as $types_value => $types_subvalue) { if(in_array($ext, $types_subvalue)) { $type=$types_value; break; } }
	}
	if($return==1) { return $ext; } elseif($return==2) { return $type; }
}
function spam_validate($str)
{
	$bad_heads = array("Content-Type:", "MIME-Version:", "Content-Transfer-Encoding:", "Return-path:", "Subject:", "From:", "Envelope-to:", "script", "href=", "referrer", "document.referrer", "location", "document.location", "/script", "url=http://"); 
	$count=0; foreach($bad_heads as $value) { if(@strpos(strtoupper($str), strtoupper($value))!==false) { $count++; } } 
	if($count>0) { return false; } else { return true; } 
} 
function ip_client()
{
	if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != '')
	{
		$ClientIp=( !empty($_SERVER['REMOTE_ADDR']) ) ? $_SERVER['REMOTE_ADDR'] : ( ( !empty($_ENV['REMOTE_ADDR']) ) ? $_ENV['REMOTE_ADDR'] : "unknown" );
		$Entries = explode('[, ]', $_SERVER['HTTP_X_FORWARDED_FOR']); reset($Entries);
		while(list(, $Entry) = each($Entries))
		{
			$Entry = trim($Entry);
			if( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $Entry, $IpList))
			{
				$PrivateIp = array('/^0\./', '/^127\.0\.0\.1/', '/^192\.168\..*/', '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/', '/^10\..*/');
				$FoundIp = preg_replace($PrivateIp, $ClientIp, $IpList[1]); if($ClientIp != $FoundIp) { $ClientIp = $FoundIp; break; } 
			}
		}
	}
	else { $ClientIp=( !empty($_SERVER['REMOTE_ADDR']) ) ? $_SERVER['REMOTE_ADDR'] : ( ( !empty($_ENV['REMOTE_ADDR']) ) ? $_ENV['REMOTE_ADDR'] : "unknown" ); }
	return $ClientIp;
}
function specialchars_to_normal($txt)
{
	//$txt=utf8_decode($txt);
	$txt=strtr($txt,"·ÈÌÛ˙¡…Õ”⁄‡ËÏÚ˘¿»Ã“ŸÒ—","aeiouAEIOUaeiouAEIOUnN");		
	$txt=str_replace("/", " ", $txt);
	$txt=str_replace("∞", "",  $txt);	$txt=str_replace("Æ", "",  $txt);	$txt=str_replace("*", " ", $txt);   $txt=str_replace("ì", "",  $txt);	
	$txt=str_replace("î", "",  $txt);	$txt=str_replace("\"","",  $txt);	$txt=str_replace("'", "",  $txt);	$txt=str_replace("í", "",  $txt);	
	$txt=str_replace("`", "",  $txt);	$txt=str_replace("ñ", "",  $txt); 	$txt=str_replace("(", " ", $txt);	$txt=str_replace(")", " ", $txt);	
	$txt=str_replace("ø", "",  $txt); 	$txt=str_replace("?", "",  $txt); 	$txt=str_replace("*", " ", $txt);   $txt=str_replace("_", " ", $txt); 	
	$txt=str_replace("$", " ", $txt); 	$txt=str_replace("%", " ", $txt);	$txt=str_replace("#", " ", $txt); 	$txt=str_replace("&", " ", $txt); 
	$txt=str_replace("=", " ", $txt); 	$txt=str_replace("}", " ", $txt);	$txt=str_replace("{", " ", $txt); 	$txt=str_replace("[", " ", $txt); 
	$txt=str_replace("]", " ", $txt); 	$txt=str_replace("|", " ", $txt);
	return $txt;
}
function txt_to_crypt($txt, $type=1) 
{ 
	switch((int)$type)
	{
		case 2: $txt=sha1($txt); break; // SHA1
		case 3: $password=''; for($i=0; $i<10; $i++) { $password.=mt_rand(); } $salt=substr(md5($password), 0, 2); $txt=md5($salt.$txt).':'.$salt; break; // Oscommerce(Beta)
		case 1: default: $txt=md5($txt); break; // MD5
	}
	return $txt; 
} 
function str_complete($str, $long, $char='0', $pos=1) 
{ 
	switch((int)$pos) { case 1: $pos=STR_PAD_LEFT; break; case 2: $pos=STR_PAD_RIGHT; break; case 3: $pos=STR_PAD_BOTH; break; default: $pos=STR_PAD_LEFT; break; }
	return str_pad($str, $long, $char, $pos); 
} 
function nombre_id($table, $id, $value, $name) 
{
	$sql="SELECT ".$name." FROM ".$table." WHERE ".$id."='".$value."' LIMIT 1 "; $result=@mysql_query($sql); 
	if(@mysql_num_rows($result)>0) { $row=@mysql_fetch_array($result); return $row[$name]; } 
}

?>