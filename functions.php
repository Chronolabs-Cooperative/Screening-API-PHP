<?php
/**
 * Chronolabs REST Screening Selector API
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       Chronolabs Cooperative http://labs.coop
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         screening
 * @since           1.0.2
 * @author          Simon Roberts <meshy@labs.coop>
 * @version         $Id: functions.php 1000 2013-06-07 01:20:22Z mynamesnot $
 * @subpackage		api
 * @description		Screening API Service REST
 */
 

if (!function_exists("whitelistGetIP")) {

	/* function whitelistGetIPAddy()
	 *
	 * 	provides an associative array of whitelisted IP Addresses
	 * @author 		Simon Roberts (Chronolabs) simon@labs.coop
	 *
	 * @return 		array
	 */
	function whitelistGetIPAddy() {
		return array_merge(whitelistGetNetBIOSIP(), file(dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'whitelist.txt'));
	}
}

if (!function_exists("whitelistGetNetBIOSIP")) {

	/* function whitelistGetNetBIOSIP()
	 *
	 * 	provides an associative array of whitelisted IP Addresses base on TLD and NetBIOS Addresses
	 * @author 		Simon Roberts (Chronolabs) simon@labs.coop
	 *
	 * @return 		array
	 */
	function whitelistGetNetBIOSIP() {
		$ret = array();
		foreach(file(dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'whitelist-domains.txt') as $domain) {
			$ip = gethostbyname($domain);
			$ret[$ip] = $ip;
		}
		return $ret;
	}
}

if (!function_exists("whitelistGetIP")) {

	/* function whitelistGetIP()
	 *
	 * 	get the True IPv4/IPv6 address of the client using the API
	 * @author 		Simon Roberts (Chronolabs) simon@labs.coop
	 *
	 * @param		$asString	boolean		Whether to return an address or network long integer
	 *
	 * @return 		mixed
	 */
	function whitelistGetIP($asString = true){
		// Gets the proxy ip sent by the user
		$proxy_ip = '';
		if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$proxy_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else
		if (!empty($_SERVER['HTTP_X_FORWARDED'])) {
			$proxy_ip = $_SERVER['HTTP_X_FORWARDED'];
		} else
		if (! empty($_SERVER['HTTP_FORWARDED_FOR'])) {
			$proxy_ip = $_SERVER['HTTP_FORWARDED_FOR'];
		} else
		if (!empty($_SERVER['HTTP_FORWARDED'])) {
			$proxy_ip = $_SERVER['HTTP_FORWARDED'];
		} else
		if (!empty($_SERVER['HTTP_VIA'])) {
			$proxy_ip = $_SERVER['HTTP_VIA'];
		} else
		if (!empty($_SERVER['HTTP_X_COMING_FROM'])) {
			$proxy_ip = $_SERVER['HTTP_X_COMING_FROM'];
		} else
		if (!empty($_SERVER['HTTP_COMING_FROM'])) {
			$proxy_ip = $_SERVER['HTTP_COMING_FROM'];
		}
		if (!empty($proxy_ip) && $is_ip = preg_match('/^([0-9]{1,3}.){3,3}[0-9]{1,3}/', $proxy_ip, $regs) && count($regs) > 0)  {
			$the_IP = $regs[0];
		} else {
			$the_IP = $_SERVER['REMOTE_ADDR'];
		}
			
		$the_IP = ($asString) ? $the_IP : ip2long($the_IP);
		return $the_IP;
	}
}

if (!function_exists("selectPeople")) {

	/* function selectPeople()
	 *
	 * 	Function that randomly select the selection entitie from the $persons array
	 * @author 		Simon Roberts (Chronolabs) simon@labs.coop
	 *
	 * @param		$persons		array		Single Element depth associate array of entities and keys to be selected from
	 * @param		$mode			string		API Output mode (JSON, XML, SERIAL, HTML, RAW)
	 * @param		$numselected	float		Number of items to select for output
	 * @param		$seed			float		Randomisation Seed
	 *
	 * @return 		array
	 */
	
	function selectPeople($persons = array(), $mode = 'json', $numselected = 1, $seed = 0.000000000000001)
	{
		
		error_reporting(E_ERROR);
		session_start();
		if (!in_array(whitelistGetIP(true), whitelistGetIPAddy())) {
			if (isset($_SESSION['places']['queries']['time'])) {
				if ($_SESSION['places']['queries']['time']>time()) {
					$_SESSION['places']['queries']['number'] = 0;
					$_SESSION['places']['queries']['time'] = time()+3600;
				}
			} elseif (!isset($_SESSION['places']['queries']['time'])) {
				$_SESSION['places']['queries']['number'] = 0;
				$_SESSION['places']['queries']['time'] = time()+3600;
			}
			if ($_SESSION['places']['queries']['number']>MAXIMUM_QUERIES) {
					header("HTTP/1.0 404 Not Found");
					exit;
			}
			$_SESSION['places']['queries']['number']++;
		}
	
		mt_srand($seed);
		if (count($persons)<$numselected)
			return array('error'=>'number of person\'s listed outlays number requested to return!');
		
		$people = count($persons);
		$ret = array();
		if ($mode!='raw') {
			while(count($ret['result'])<$numselected) {
				$keys = array_keys($persons);
				shuffle($keys);
				$sel = mt_rand(0, count($keys) - 1);
					if (!in_array($keys[$sel], array_keys($ret['result']))) {
						$ret['result'][$keys[$sel]] = $persons[$keys[$sel]];
						$key .= $keys[$sel] . $persons[$keys[$sel]] . '+';
						unset($persons[$keys[$sel]]);
					}
			}
		} else {
			while(count($ret)<$numselected) {
				if (!in_array($keys[$sel], array_keys($ret))) {
						$ret[$keys[$sel]] = $persons[$keys[$sel]];
						$key .= $keys[$sel] . $persons[$keys[$sel]] . '+';
						unset($persons[$keys[$sel]]);
					}
				}
			}
		
		if ($mode!='raw') {
			$ret['screening']['key'] = md5($numselected.$seed.$key);
			$ret['screening']['seed'] = $seed;
			$ret['screening']['return'] = $numselected;
			$ret['screening']['remaining'] = count($persons);
			$ret['screening']['selection'] = $people;
		}
		return $ret;
	}	
}

if (!class_exists("XmlDomConstruct")) {
	/**
	 * class XmlDomConstruct
	 * 
	 * 	Extends the DOMDocument to implement personal (utility) methods.
	 *
	 * @author 		Simon Roberts (Chronolabs) simon@labs.coop
	 */
	class XmlDomConstruct extends DOMDocument {
	
		/**
		 * Constructs elements and texts from an array or string.
		 * The array can contain an element's name in the index part
		 * and an element's text in the value part.
		 *
		 * It can also creates an xml with the same element tagName on the same
		 * level.
		 *
		 * ex:
		 * <nodes>
		 *   <node>text</node>
		 *   <node>
		 *     <field>hello</field>
		 *     <field>world</field>
		 *   </node>
		 * </nodes>
		 *
		 * Array should then look like:
		 *
		 * Array (
		 *   "nodes" => Array (
		 *     "node" => Array (
		 *       0 => "text"
		 *       1 => Array (
		 *         "field" => Array (
		 *           0 => "hello"
		 *           1 => "world"
		 *         )
		 *       )
		 *     )
		 *   )
		 * )
		 *
		 * @param mixed $mixed An array or string.
		 *
		 * @param DOMElement[optional] $domElement Then element
		 * from where the array will be construct to.
		 * 
		 * @author 		Simon Roberts (Chronolabs) simon@labs.coop
		 *
		 */
		public function fromMixed($mixed, DOMElement $domElement = null) {
	
			$domElement = is_null($domElement) ? $this : $domElement;
	
			if (is_array($mixed)) {
				foreach( $mixed as $index => $mixedElement ) {
	
					if ( is_int($index) ) {
						if ( $index == 0 ) {
							$node = $domElement;
						} else {
							$node = $this->createElement($domElement->tagName);
							$domElement->parentNode->appendChild($node);
						}
					}
					 
					else {
						$node = $this->createElement($index);
						$domElement->appendChild($node);
					}
					 
					$this->fromMixed($mixedElement, $node);
					 
				}
			} else {
				$domElement->appendChild($this->createTextNode($mixed));
			}
			 
		}
		 
	}
}

?>