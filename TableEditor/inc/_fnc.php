<?php 

function mw_te_session_validate() 	{ if(mw_te_session_id()>0 && mw_te_session_type()>0 && mw_te_session_name()) { return true; } else { return false; } } 
function mw_te_session_id() 	 	{ $session_id=0; if(isset($_SESSION[mw_te_session_id])) 	{ return $_SESSION[mw_te_session_id]; 		   } else { return $session_id; } } 
function mw_te_session_type() 	 	{ $session_id=0; if(isset($_SESSION[mw_te_session_type]))   { return (int)$_SESSION[mw_te_session_type];   } else { return $session_id; } } 
function mw_te_session_name() 	 	{ $session='';   if(isset($_SESSION[mw_te_session_name]))   { return $_SESSION[mw_te_session_name];   	   } else { return $session;    } } 
function mw_te_session_subtype()	{ $session_id=0; if(isset($_SESSION[mw_te_session_subtype])){ return (int)$_SESSION[mw_te_session_subtype];} else { return $session_id; } } 

function mw_te_htmlentities($str) 	
{ 
	if(phpversion()<=5.2) { return htmlentities($str); } 
	elseif(phpversion()>5.2 && phpversion()<5.4) { return htmlentities($str); } 
	elseif(phpversion()>=5.4) { return htmlentities($str, ENT_HTML401, 'ISO8859-1'); } 
	else { return $str; } 
} 
function mw_te_js_redirect($url) 	{ return '<script language="javascript" type="text/javascript"> document.location=\''.$url.'\'; </script>'; } 

function mw_te_current_date() { $cur = date ("Y-m-d",mktime (date ("H"), date ("i"), date ("s"), date("m"), date ("d"), date("Y")) ); return $cur; } 
function mw_te_current_time() { $cur = date ("H:i:s",mktime (date ("H"), date ("i"), date ("s"), date("m"), date ("d"), date("Y")) );  return $cur; } 
function mw_te_current_datetime() { $cur = mw_te_current_date().' '.mw_te_current_time(); return $cur; } 

function mw_te_save_access() 
{
	$sql="INSERT INTO ".mw_te_db_access." SET ACCESO_ID='0', FECHA_HORA='".mw_te_current_datetime()."', IP='".mw_te_ip()."', SESION_TIPO='".mw_te_session_type()."', 
			SESION_SUBTIPO='".mw_te_session_subtype()."', SESION_ID='".mw_te_session_id()."' "; 
	$result = @mysql_query($sql); 
}
function mw_te_ip()
{
	if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR']!='') 
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
function mw_te_user_has_privileges($t) 
{
	switch($t)
	{
		case 1: $f='PERMISOS_AGREGAR'; break; 
		case 2: $f='PERMISOS_EDITAR'; break; 
		case 3: $f='PERMISOS_ELIMINAR'; break; 
	} 
	if(mw_te_session_type()==mw_te_sys_type) { return true; } 
	elseif(mw_te_session_type()==mw_te_adm_type) 
	{ 
		$mw_te_session_subtype=mw_te_session_subtype(); 
		$sql="SELECT ".$f." FROM ". mw_te_db_users_profiles ." WHERE PERFIL_ID='".$mw_te_session_subtype."' AND ".$f."='1' LIMIT 1 "; $result=@mysql_query($sql); 
		if(@mysql_num_rows($result)>0) { return true; } else { return false;  } 
	}
	else { return false; }
}

function mw_te_user_menu($menu_id) 
{
	if(mw_te_session_validate()) 
	{
		if(mw_te_session_type()==mw_te_sys_type) { return true; } 
		elseif(mw_te_session_type()==mw_te_adm_type) 
		{ 
			$mw_te_user_id=mw_te_session_id(); 
			$sql="SELECT RELACION_ID FROM ". mw_te_db_menus_users ." WHERE USUARIO_ID='".$mw_te_user_id."' AND MENU_ID='".$menu_id."' LIMIT 1 "; $result=@mysql_query($sql); 
			if(@mysql_num_rows($result)>0) { return true; } else { return false;  } 
		}
		else { return false; }
	}
	else { return false; }
}

function mw_te_print_error($error) { $html='<div class="mw_te_error">'. mw_te_htmlentities($error) .'</div>'; return $html; } 

function mw_te_getPrimaryKeyOf($table) 
{ 
	$keys=Array(); $query=sprintf("SHOW KEYS FROM `%s`", $table); $result=@mysql_query($query) or die(@mysql_error()); $count=1; 
	while($row = @mysql_fetch_assoc($result)) { $keys[$count]=$row['Column_name']; $count++; } return $keys; 
}

function mw_te_fieldDisplayHTML($value) { return $value; } 

function mw_te_table_id_value($table, $id, $value, $field) 
{
	$sql="SELECT ".$field." FROM ".$table." WHERE ".$id."='".$value."' LIMIT 1 "; $result=@mysql_query($sql); 
	if(@mysql_num_rows($result)>0) { $row=@mysql_fetch_array($result); return $row[0]; } 
}

function mw_te_image($img, $path=mw_te_path_css, $w=0, $h=0, $alt='', $id='') 
{ 
	$i=''; 
	if($img && file_exists($path.$img)) 
	{ 
		$iSize=getimagesize($path.$img); $IW=$iSize[0]; $IH=$iSize[1]; if((int)$w>0) { $IW=(int)$w; } if((int)$h>0) { $IH=(int)$h; } 
		$i.='<img src="'.$path.$img.'" width="'.$IW.'" height="'.$IH.'" border="0" alt="'.mw_te_htmlentities($alt).'" title="'.mw_te_htmlentities($alt).'" '; 
		if($id) { $i.='name="'.$id.'" id="'.$id.'" '; }
		$i.='/>'; 
	} 
	return $i; 
} 

function mw_te_pager_list_start($total, $perPage)
{
	if(!$perPage) { $perPage = 20; } $pager = new Pager_Sliding(array('totalItems' => $total, 'perPage' => $perPage)); 
	list($startOffset, $endOffset) = $pager->getOffsetByPageId();
	$startOffset--; return $startOffset; 
} 

function mw_te_pager_list($total, $perPage)
{
	if(!$perPage) { $perPage = 20; } 
	$pager = new Pager_Sliding(array(
			   'totalItems'	=> $total, 
					'delta' => 5, 
				  'prevImg' => ''.mw_te_image('prev.png', ''.mw_te_path_css.'images/pager/', 0, 0, ''.mw_te_pager_prev.'', 'mw_te_pager_prev').'',
				  'nextImg' => ''.mw_te_image('next.png', ''.mw_te_path_css.'images/pager/', 0, 0, ''.mw_te_pager_next.'', 'mw_te_pager_next').'',
			'firstPageText' => ''.mw_te_image('first.png',''.mw_te_path_css.'images/pager/', 0, 0, ''.mw_te_pager_first.'', 'mw_te_pager_first').'',
			'lastPageText' 	=> ''.mw_te_image('last.png', ''.mw_te_path_css.'images/pager/', 0, 0, ''.mw_te_pager_last.'', 'mw_te_pager_last').'',
				  'altPrev'	=> ''.mw_te_htmlentities(mw_te_pager_prev).'',  
				  'altNext'	=> ''.mw_te_htmlentities(mw_te_pager_next).'', 
				  'altPage' => ''.mw_te_htmlentities(mw_te_pager_page).'', 
				'linkClass'	=> 'mw_te_pager_link', 
	'spacesBeforeSeparator' => '0', 
	 'spacesAfterSeparator' => '0', 
	 'curPageLinkClassName' => 'mw_te_pager_link_cur', 
	 			  'perPage' => $perPage));
	list($startOffset, $endOffset) = $pager->getOffsetByPageId();
	$startOffset--; 
	list($back, $pages, $next)  = $pager->getLinks();
	if(!$pages) { $pages='<span class="mw_te_pager_link_cur">1</span>'; } 
	$pager_range_ini=($total > 0 ? $startOffset + 1 : 0); 
	$pager_range_end=min($startOffset + $perPage, $total);
	$pager_description=sprintf(mw_te_pager_showing_msg, $pager_range_ini, $pager_range_end, $total); 
	$pagerResult='<div class="mw_te_list_pager_txt">'. $pager_description .'</div>';
	$pagerResult.='<div class="mw_te_list_pager_txt">'. $pager->_printFirstPage() .''. $back .' [ '. mw_te_htmlentities(mw_te_pager_pages) .': '. $pages .' ] '. $next .''. $pager->_printLastPage() .'</div>'; 
	return $pagerResult; 
} 
function mw_te_field_name($name) { $name=str_replace("_ID", "", $name); $name=str_replace("_", " ", $name); return $name; }

function mw_te_tit($txt) { $txt='<div class="mw_te_tit">'.mw_te_htmlentities($txt).'</div>'; return $txt; } 

function mw_te_table_name($table) 
{
	$tit=$table; $tit=str_replace("mw_", "", $tit);$tit=str_replace("te_", "", $tit); $tit=str_replace("c_", "", $tit); $tit=str_replace("cfg_", "", $tit);
	$tit=str_replace("p_", "", $tit); $tit=ucwords(str_replace("_", " ",$tit)); return $tit; 
}
function mw_te_email_validate($email) { $regex = "/^([*+!.&#$|'\\%\/0-9a-z^_`{}=?~:-]+)@(([0-9a-z-]+\.)+[0-9a-z]{2,4})$/i"; if(!empty($email) AND !preg_match($regex, $email)) { return false; } else { return true; } } 

function mw_te_doctype($filename, $return)
{
	$ext=(strpos($filename, '.') ? strtolower(substr(strrchr($filename, '.'), 1)) : '');
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
			   'xls' => array('csv', 'dbf', 'prn', 'pxl', 'sdc', 'slk', 'stc', 'sxc', 'xla', 'xlb', 'xlc', 'xld', 'xlr', 'xls', 'xlt', 'xlw', 'xlsx')
		); 
		foreach($types as $types_v => $types_vs) { if(in_array($ext, $types_vs)) { $type=$types_v; break; } }
	}
	if($return==1) { return $ext; } elseif($return==2) { return $type; }
}
function mw_te_upload($file_var, $path, $fie_newname) 
{ 
	$save_mode=2; $accept=''; $ext=''; 
	$upload=new mw_te_uploader; 
	$upload->max_filesize(10485760); 
	if($upload->upload($file_var, $accept, $ext)) { $new_file=$upload->save_file($path, $save_mode, $fie_newname); } 
	if($new_file) { return $new_file; } 
}
function mw_te_complete($str, $long, $char='0', $pos=1) 
{ 
	switch((int)$pos) { case 1: $pos=STR_PAD_LEFT; break; case 2: $pos=STR_PAD_RIGHT; break; case 3: $pos=STR_PAD_BOTH; break; default: $pos=STR_PAD_LEFT; break; }
	return str_pad($str, $long, $char, $pos); 
} 

function mw_te_int_validate($num) { if($num!=strval(intval($num))) { return false; } else { return true; } } 
function mw_te_rfc_validate($rfc) { if(strlen($rfc)!=12 && strlen($rfc)!=13) { return false;} else { return true; } } 
function mw_te_date_validate($date) { $dia=(int)substr($date,0,2); $mes=(int)substr($date,3,2); $ano=(int)substr($date,6,4); if(checkdate($mes,$dia,$ano)) { return true; } else { return false; } }
function mw_te_MySQL_to_date($date) { if(strstr($date,"-")) { $date=substr($date,8,2)."/".substr($date,5,2)."/".substr($date,0,4); } return $date; } 
function mw_te_date_to_MySQL($date) { $date2=explode("/",strtolower($date)); $date=$date2[2]."-".$date2[1]."-".$date2[0]; return $date; } 

/****************/
function TEMysqlToDatetime($d) { if(strstr($d,"-")) { $d=substr($d,8,2)."/".substr($d,5,2)."/".substr($d,0,4)." ".substr($d,10,9); } return $d; } 
function TEDatetimeToMysql($d) { if(strstr($d,"/")) { $d=substr($d,6,4)."-".substr($d,3,2)."-".substr($d,0,2)." ".substr($d,10,9); } return $d; }

?>