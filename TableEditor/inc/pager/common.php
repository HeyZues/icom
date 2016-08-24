<?php 
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: Contains the Pager_Common class PHP versions 4 and 5 
	LICENSE: This source file is subject to version 3.0 of the PHP license that is available through the world-wide-web at the 
	following URI: http://www.php.net/license/3_0.txt.  If you did not receive a copy of the PHP License and are unable to obtain 
	it through the web, please send a note to license@php.net so we can mail you a copy immediately.
	@category   HTML 	@package    Pager		@author     Lorenzo Alberton <l dot alberton at quipo dot it>	
	@author     Richard Heyes <richard@phpguru.org>			@copyright  2003-2005 Lorenzo Alberton, Richard Heyes
	@license    http://www.php.net/license/3_0.txt  PHP License 3.0		
	@version    CVS: $Id: Common.php,v 1.35 2005/04/29 17:09:50 quipo Exp $ @link       http://pear.php.net/package/Pager
*/

// Two constants used to guess the path- and file-name of the page when the user doesn't set any other value */
if(substr($_SERVER['PHP_SELF'], -1) == '/') { define('CURRENT_FILENAME', ''); define('CURRENT_PATHNAME', str_replace('\\', '/', $_SERVER['PHP_SELF'])); } 
else { define('CURRENT_FILENAME', preg_replace('/(.*)\?.*/', '\\1', basename($_SERVER['PHP_SELF']))); define('CURRENT_PATHNAME', str_replace('\\', '/', dirname($_SERVER['PHP_SELF']))); } 

// Error codes 
define('PAGER_OK',                         0);
define('ERROR_PAGER',                     -1);
define('ERROR_PAGER_INVALID',             -2);
define('ERROR_PAGER_INVALID_PLACEHOLDER', -3);
define('ERROR_PAGER_INVALID_USAGE',       -4);
define('ERROR_PAGER_NOT_IMPLEMENTED',     -5);

/** Pager_Common - Common base class for [Sliding|Jumping] Window Pager Extend this class to write a custom paging class 
	@category   HTML @package    Pager @author     Lorenzo Alberton <l dot alberton at quipo dot it> 
	@author     Richard Heyes <richard@phpguru.org> @copyright  2003-2005 Lorenzo Alberton, Richard Heyes 
	@license    http://www.php.net/license/3_0.txt  PHP License 3.0 @link       http://pear.php.net/package/Pager
*/
class Pager_Common
{
	var $_totalItems;
	var $_perPage     = 10;
	var $_delta       = 10;
	var $_currentPage = 1;
	var $_totalPages  = 1;
	var $_linkClass   = '';
	var $_classString = '';
	var $_path        = CURRENT_PATHNAME;
	var $_fileName    = CURRENT_FILENAME;
	var $_append      = true;
	var $_httpMethod  = 'GET';
	var $_importQuery = true;
	var $_urlVar      = 'pageID';
	var $_linkData    = array();
	var $_extraVars   = array();
	var $_excludeVars = array();
	var $_expanded    = true;
	var $_altPrev     = ''; 
	var $_altNext     = '';
    var $_altPage     = 'Página';
    var $_prevImg     = '&lt;&lt; Back';
    var $_nextImg     = 'Next &gt;&gt;';
    var $_separator   = '';
    var $_spacesBeforeSeparator = 0;
    var $_spacesAfterSeparator  = 10;
    var $_curPageLinkClassName  = '';
    var $_curPageSpanPre        = '';
    var $_curPageSpanPost       = '';
    var $_firstPagePre  = '';
    var $_firstPageText = 'Primer página';
    var $_firstPagePost = '';
    var $_lastPagePre   = '';
    var $_lastPageText  = 'Última página';
    var $_lastPagePost  = '';
    var $_spacesBefore  = '';
    var $_spacesAfter   = '';
    var $_firstLinkTitle = 'first page';
    var $_nextLinkTitle = 'next page';
    var $_prevLinkTitle = 'previous page';
    var $_lastLinkTitle = 'last page';
    var $_showAllText   = '';
    var $_itemData      = null;
    var $_clearIfVoid   = true;
    var $_useSessions   = false;
    var $_closeSession  = false;
    var $_sessionVar    = 'setPerPage';
    var $_pearErrorMode = null;
    var $links = '';
    var $linkTags = '';
    var $range = array();
	// Returns an array of current pages data
	function getPageData($pageID = null) 
	{
		$pageID = empty($pageID) ? $this->_currentPage : $pageID; if (!isset($this->_pageData)) { $this->_generatePageData(); } 
		if (!empty($this->_pageData[$pageID])) { return $this->_pageData[$pageID]; } return false; 
	}
	// Returns pageID for given offset
	function getPageIdByOffset($index)
	{
		$msg = '<b>PEAR::Pager Error:</b>'.' function "getPageIdByOffset()" not implemented.'; 
		return $this->raiseError($msg, ERROR_PAGER_NOT_IMPLEMENTED); 
	}
	// Returns offsets for given pageID. Eg, if you pass it pageID one and your perPage limit is 10 
	// it will return (1, 10). PageID of 2 would give you (11, 20).
	function getOffsetByPageId($pageid = null)
	{
		$pageid = isset($pageid) ? $pageid : $this->_currentPage;
		if (!isset($this->_pageData)) { $this->_generatePageData(); } 
		if (isset($this->_pageData[$pageid]) || is_null($this->_itemData)) { return array(max(($this->_perPage * ($pageid - 1)) + 1, 1), min($this->_totalItems, $this->_perPage * $pageid)); } else { return array(0, 0); }
	}
	function getPageRangeByPageId($pageID)
	{
		$msg = '<b>PEAR::Pager Error:</b>'.' function "getPageRangeByPageId()" not implemented.'; 
		return $this->raiseError($msg, ERROR_PAGER_NOT_IMPLEMENTED);
	}
	function getLinks($pageID=null, $next_html='')
	{
		$msg = '<b>PEAR::Pager Error:</b>'.' function "getLinks()" not implemented.';
		return $this->raiseError($msg, ERROR_PAGER_NOT_IMPLEMENTED);
	}
	function getCurrentPageID() { return $this->_currentPage; }
	function getNextPageID() { return ($this->getCurrentPageID() == $this->numPages() ? false : $this->getCurrentPageID() + 1); } 
	function getPreviousPageID() { return $this->isFirstPage() ? false : $this->getCurrentPageID() - 1; } 
	function numItems() { return $this->_totalItems; }
	function numPages() { return (int)$this->_totalPages; }
	function isFirstPage() { return ($this->_currentPage < 2); } 
	function isLastPage() { return ($this->_currentPage == $this->_totalPages); }
	function isLastPageComplete() { return !($this->_totalItems % $this->_perPage); }
	function _generatePageData()
	{
		if (!is_null($this->_itemData)) { $this->_totalItems = count($this->_itemData); }
		$this->_totalPages = ceil((float)$this->_totalItems / (float)$this->_perPage); $i = 1;
		if (!empty($this->_itemData)) 
		{
			foreach ($this->_itemData as $key => $value) { $this->_pageData[$i][$key] = $value; if(count($this->_pageData[$i]) >= $this->_perPage) { $i++; } } 
		} else { $this->_pageData = array(); } 
		$this->_currentPage = min($this->_currentPage, $this->_totalPages);
	}
    function _renderLink($altText, $linkText)
	{
		if ($this->_httpMethod == 'GET') 
		{
			if ($this->_append) { $href = '?' . $this->_http_build_query_wrapper($this->_linkData); } 
			else { $href = sprintf($this->_fileName, $this->_linkData[$this->_urlVar]); }
			return sprintf('<a href="%s"%s title="%s">%s</a>', htmlentities($this->_url . $href), 
						empty($this->_classString) ? '' : ' '.$this->_classString, $altText, $linkText);
		}
		if ($this->_httpMethod == 'POST') 
		{
			return sprintf('<a onclick=\'%s\' href="#"%s title="%s">%s</a>', 
				$this->_generateFormOnClick($this->_url, $this->_linkData), 
				empty($this->_classString) ? '' : ' '.$this->_classString, $altText, $linkText);
		}
		return '';
	}
	function _generateFormOnClick($formAction, $data)
	{
		if (!is_array($data)) 
		{
			trigger_error('_generateForm() Parameter 1 expected to be Array or Object. Incorrect value given.', E_USER_WARNING);
			return false;
		}
		$str = 'var form = document.createElement("form"); var input = ""; '; 
		$str .= sprintf('form.action = "%s"; ', htmlentities($formAction)); 
		$str .= sprintf('form.method = "%s"; ', $this->_httpMethod);
		foreach ($data as $key => $val) { $str .= $this->_generateFormOnClickHelper($val, $key); }
		$str .= 'document.getElementsByTagName("body")[0].appendChild(form);'; $str .= 'form.submit();'; return $str;
	}
	function _generateFormOnClickHelper($data, $prev = '')
	{
		$str = '';
		if (is_array($data) || is_object($data)) 
		{
			foreach ((array)$data as $key => $val) { $tempKey = sprintf('%s[%s]', $prev, $key); $str .= $this->_generateFormOnClickHelper($val, $tempKey); }
		} 
		else 
		{  
			$search  = array("\n", "\r"); $replace = array('\n', '\n'); $escapedData = str_replace($search, $replace, $data);
			$escapedData = htmlentities($escapedData);
			$str .= 'input = document.createElement("input"); '; $str .= 'input.type = "hidden"; '; 
			$str .= sprintf('input.name = "%s"; ', $prev); $str .= sprintf('input.value = "%s"; ', $escapedData); 
			$str .= 'form.appendChild(input); '; 
		} 
		return $str;
	}
	function _getLinksData()
	{
		$qs = array();
		if ($this->_importQuery) { if ($this->_httpMethod == 'POST') { $qs = $_POST; } else if ($this->_httpMethod == 'GET') { $qs = $_GET; } }
		if (count($this->_extraVars)){ $this->_recursive_urldecode($this->_extraVars); }
		$qs = array_merge($qs, $this->_extraVars);
		foreach ($this->_excludeVars as $exclude) { if (array_key_exists($exclude, $qs)) { unset($qs[$exclude]); } } 
		if (count($qs) && get_magic_quotes_gpc()) { $this->_recursive_stripslashes($qs); } 
		return $qs; 
	}
	function _recursive_stripslashes(&$var)
	{
		if (is_array($var)) { foreach (array_keys($var) as $k) { $this->_recursive_stripslashes($var[$k]); } } 
		else { $var = stripslashes($var); } 
	}
	function _recursive_urldecode(&$var)
	{
		if (is_array($var)) { foreach (array_keys($var) as $k) { $this->_recursive_urldecode($var[$k]); } } 
		else { $trans_tbl = array_flip(get_html_translation_table(HTML_ENTITIES)); $var = strtr($var, $trans_tbl); } 
	}
	function _getBackLink($url='', $link='')
	{
		if (!empty($url)) { $this->_path = $url; } if (!empty($link)) { $this->_prevImg = $link; } $back = ''; 
		if ($this->_currentPage > 1) 
		{
			$this->_linkData[$this->_urlVar] = $this->getPreviousPageID(); 
			$back = $this->_renderLink($this->_altPrev, $this->_prevImg) . $this->_spacesBefore . $this->_spacesAfter;
		}
		return $back;
	}
	function _getPageLinks($url='') 
	{
		$msg = '<b>PEAR::Pager Error:</b>' .' function "getOffsetByPageId()" not implemented.'; 
		return $this->raiseError($msg, ERROR_PAGER_NOT_IMPLEMENTED); 
	}
	function _getNextLink($url='', $link='')
	{
		if (!empty($url)) { $this->_path = $url; } if (!empty($link)) { $this->_nextImg = $link; } $next = '';
		if ($this->_currentPage < $this->_totalPages) 
		{
			$this->_linkData[$this->_urlVar] = $this->getNextPageID(); 
			$next = $this->_spacesAfter . $this->_renderLink($this->_altNext, $this->_nextImg) . $this->_spacesBefore . $this->_spacesAfter;
		}
		return $next;
	}
	function _getFirstLinkTag()
	{
		if ($this->isFirstPage() || ($this->_httpMethod != 'GET')) { return ''; } 
		return sprintf('<link rel="first" href="%s" title="%s" />'."\n", $this->_getLinkTagUrl(1), $this->_firstLinkTitle);
	}
	function _getPrevLinkTag()
	{
		if ($this->isFirstPage() || ($this->_httpMethod != 'GET')) { return ''; } 
		return sprintf('<link rel="previous" href="%s" title="%s" />'."\n", $this->_getLinkTagUrl($this->getPreviousPageID()), $this->_prevLinkTitle);
	}
	function _getNextLinkTag()
	{
		if ($this->isLastPage() || ($this->_httpMethod != 'GET')) { return ''; }
		return sprintf('<link rel="next" href="%s" title="%s" />'."\n", $this->_getLinkTagUrl($this->getNextPageID()), $this->_nextLinkTitle);
	}
	function _getLastLinkTag()
	{
		if ($this->isLastPage() || ($this->_httpMethod != 'GET')) { return ''; }
		return sprintf('<link rel="last" href="%s" title="%s" />'."\n", $this->_getLinkTagUrl($this->_totalPages), $this->_lastLinkTitle);
	}
	function _getLinkTagUrl($pageID)
	{
		$this->_linkData[$this->_urlVar] = $pageID; 
		if ($this->_append) { $href = '?' . $this->_http_build_query_wrapper($this->_linkData); } 
		else { $href = sprintf($this->_fileName, $this->_linkData[$this->_urlVar]); } 
		return htmlentities($this->_url . $href);
	}
	function getPerPageSelectBox($start=5, $end=30, $step=5, $showAllData=false, $extraParams=array())
	{
		$optionText = '%d'; $attributes = '';
		if (is_string($extraParams)) { $optionText = $extraParams; } 
		else 
		{
			if (array_key_exists('optionText', $extraParams)) { $optionText = $extraParams['optionText']; }
			if (array_key_exists('attributes', $extraParams)) { $attributes = $extraParams['attributes']; }
        }
		if (!strstr($optionText, '%d')) 
		{
			return $this->raiseError($this->errorMessage(ERROR_PAGER_INVALID_PLACEHOLDER),ERROR_PAGER_INVALID_PLACEHOLDER);
		}
		$start = (int)$start; $end   = (int)$end; $step  = (int)$step;
		if (!empty($_SESSION[$this->_sessionVar])) { $selected = (int)$_SESSION[$this->_sessionVar]; } else { $selected = $this->_perPage; }
		$tmp = '<select name="'.$this->_sessionVar.'"'; if (!empty($attributes)) { $tmp .= ' '.$attributes; } $tmp .= '>';
		for ($i=$start; $i<=$end; $i+=$step) 
		{
			$tmp .= '<option value="'.$i.'"'; if ($i == $selected) { $tmp .= ' selected="selected"'; } $tmp .= '>'.sprintf($optionText, $i).'</option>';
		}
		if ($showAllData && $end < $this->_totalItems) 
		{
			$tmp .= '<option value="'.$this->_totalItems.'"'; if ($this->_totalItems == $selected) { $tmp .= ' selected="selected"'; } $tmp .= '>';
			if (empty($this->_showAllText)) { $tmp .= str_replace('%d', $this->_totalItems, $optionText); } 
			else { $tmp .= $this->_showAllText; } $tmp .= '</option>'; 
		} 
		$tmp .= '</select>'; return $tmp;
	}
	function _printFirstPage()
	{
		if ($this->isFirstPage()) { return ''; } $this->_linkData[$this->_urlVar] = 1;
		return $this->_renderLink($this->_altPage.' 1',$this->_firstPagePre . $this->_firstPageText . $this->_firstPagePost) . $this->_spacesBefore . $this->_spacesAfter;
	}
	function _printLastPage()
	{
		if ($this->isLastPage()) { return ''; } $this->_linkData[$this->_urlVar] = $this->_totalPages; 
		return $this->_renderLink($this->_altPage.' '.$this->_totalPages, $this->_lastPagePre . $this->_lastPageText . $this->_lastPagePost);
	}
	function _setFirstLastText()
	{
		if ($this->_firstPageText == '') { $this->_firstPageText = '1'; } 
		if ($this->_lastPageText == '') { $this->_lastPageText = $this->_totalPages; }
	}
	function _http_build_query_wrapper($data)
	{
		$data = (array)$data; if (empty($data)) { return ''; }
		$separator = ini_get('arg_separator.output'); if ($separator == '&amp;') { $separator = '&'; } $tmp = array ();
		foreach ($data as $key => $val) 
		{
			if (is_scalar($val)) { array_push($tmp, $key.'='.$val); continue; } 
			if (is_array($val)) { array_push($tmp, $this->__http_build_query($val, htmlentities($key))); continue; }
		}
		return implode($separator, $tmp);
	}
	function __http_build_query($array, $name)
	{
		$tmp = array ();
		foreach ($array as $key => $value) 
		{
			if (is_array($value)) { array_push($tmp, $this->__http_build_query($value, sprintf('%s[%s]', $name, $key))); } 
			elseif (is_scalar($value)) { array_push($tmp, sprintf('%s[%s]=%s', $name, htmlentities($key), htmlentities($value))); } 
			elseif (is_object($value)) { array_push($tmp, $this->__http_build_query(get_object_vars($value), sprintf('%s[%s]', $name, $key))); }
		}
		return implode(ini_get('arg_separator.output'), $tmp);
	}
	function raiseError($msg, $code)
	{
		include_once 'PEAR.php'; if (empty($this->_pearErrorMode)) { $this->_pearErrorMode = PEAR_ERROR_RETURN; } 
		return PEAR::raiseError($msg, $code, $this->_pearErrorMode);
	}
	function _setOptions($options)
	{
		$allowed_options = array('totalItems','perPage','delta','linkClass','path','fileName','append','httpMethod','importQuery',
			'urlVar','altPrev','altNext','altPage','prevImg','nextImg','expanded','separator','spacesBeforeSeparator',
			'spacesAfterSeparator','curPageLinkClassName','curPageSpanPre','curPageSpanPost','firstPagePre','firstPageText',
			'firstPagePost','lastPagePre','lastPageText','lastPagePost','firstLinkTitle','nextLinkTitle','prevLinkTitle',
			'lastLinkTitle','showAllText','itemData','clearIfVoid','useSessions','closeSession','sessionVar','pearErrorMode',
			'extraVars','excludeVars','currentPage',);
		foreach ($options as $key => $value) { if (in_array($key, $allowed_options) && (!is_null($value))) { $this->{'_' . $key} = $value; } }
		$this->_fileName = ltrim($this->_fileName, '/');  $this->_path = rtrim($this->_path, '/'); 
		if ($this->_append) { $this->_fileName = CURRENT_FILENAME; $this->_url = $this->_path.'/'.$this->_fileName; } 
		else 
		{
			$this->_url = $this->_path;
			if (strncasecmp($this->_fileName, 'javascript', 10) != 0) { $this->_url .= '/'; } 
			if (!strstr($this->_fileName, '%d')) { trigger_error($this->errorMessage(ERROR_PAGER_INVALID_USAGE), E_USER_WARNING); } 
		}
		$this->_classString = '';
		if (strlen($this->_linkClass)) { $this->_classString = 'class="'.$this->_linkClass.'"'; }
		if (strlen($this->_curPageLinkClassName)) 
		{
			$this->_curPageSpanPre  = '<span class="'.$this->_curPageLinkClassName.'">'; $this->_curPageSpanPost = '</span>'; 
		}
		$this->_perPage = max($this->_perPage, 1); 
		if ($this->_useSessions && !isset($_SESSION)) { @session_start(); } 
		if (!empty($_REQUEST[$this->_sessionVar])) 
		{
			$this->_perPage = max(1, (int)$_REQUEST[$this->_sessionVar]); 
			if ($this->_useSessions) { $_SESSION[$this->_sessionVar] = $this->_perPage; } 
		}
		if (!empty($_SESSION[$this->_sessionVar])) { $this->_perPage = $_SESSION[$this->_sessionVar]; } 
		if ($this->_closeSession) { session_write_close(); }
		$this->_spacesBefore = str_repeat('&nbsp;', $this->_spacesBeforeSeparator);
		$this->_spacesAfter  = str_repeat('&nbsp;', $this->_spacesAfterSeparator);
		$request = ($this->_httpMethod == 'POST') ? $_POST : $_GET;
		if (isset($request[$this->_urlVar]) && empty($options['currentPage'])) { $this->_currentPage = (int)$request[$this->_urlVar]; }
		$this->_currentPage = max($this->_currentPage, 1);
		$this->_linkData = $this->_getLinksData();
		return PAGER_OK;
	}
	function errorMessage($code)
	{
		static $errorMessages;
		if (!isset($errorMessages)) 
		{
			$errorMessages = array(ERROR_PAGER=> 'unknown error', ERROR_PAGER_INVALID => 'invalid', 
				ERROR_PAGER_INVALID_PLACEHOLDER => 'invalid format - use "%d" as placeholder.', 
				ERROR_PAGER_INVALID_USAGE => 'if $options[\'append\'] is set to false, ' .' $options[\'fileName\'] MUST contain the "%d" placeholder.',
				ERROR_PAGER_NOT_IMPLEMENTED => 'not implemented');
		}
		return '<b>PEAR::Pager error:</b> '. (isset($errorMessages[$code]) ? $errorMessages[$code] : $errorMessages[ERROR_PAGER]);
	}
}

?>