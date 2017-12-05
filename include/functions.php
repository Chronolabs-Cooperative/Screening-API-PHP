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
 * @copyright       Chronolabs Cooperative http://snails.email
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         screening
 * @since           1.0.2
 * @author          Simon Roberts <meshy@snails.email>
 * @version         $Id: functions.php 1000 2013-06-07 01:20:22Z mynamesnot $
 * @subpackage		api
 * @description		Screening API Service REST
 */
 
include __DIR__ . DIRECTORY_SEPARATOR . 'common.php';


if (!function_exists("getHTMLForm")) {
    /**
     * Get the HTML Forms for the API
     *
     * @param unknown_type $mode
     * @param unknown_type $clause
     * @param unknown_type $output
     * @param unknown_type $version
     *
     * @return string
     */
    function getHTMLForm($mode = '', $clause = '', $callback = '', $output = '', $version = 'v2')
    {
        if (empty($clause))
            $ua = substr(sha1($_SERVER['HTTP_USER_AGENT']), mt_rand(0,32), 9);
        else 
            $ua = $clause;
        
        $form = array();
        switch ($mode)
        {
            case "screening":
                $form[] = "<form name=\"" . $ua . "\" method=\"POST\" enctype=\"multipart/form-data\" action=\"" . API_URL . '/v2/' .$ua . "/form.api\">";
                $form[] = "\t<table class='screening' id='screening' style='vertical-align: top !important; min-width: 98%;'>";
                $form[] = "\t\t<tr>";
                $form[] = "\t\t\t<td style='width: 320px;'>";
                $form[] = "\t\t\t\t<label for='email'>Assignee Email:&nbsp;<font style='float: right; color: rgb(250,0,0); font-size: 139%; font-weight: bold'>*</font></label>";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t\t<td>";
                $form[] = "\t\t\t\t<input type='textbox' name='email' id='email' maxlen='198' size='41' />&nbsp;&nbsp;";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t\t<td>";
                $form[] = "\t\t\t\t&nbsp;";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t</tr>";
                $form[] = "\t\t<tr>";
                $form[] = "\t\t\t<td style='width: 320px;'>";
                $form[] = "\t\t\t\t<label for='name'>Assignee Name:&nbsp;<font style='float: right; color: rgb(250,0,0); font-size: 139%; font-weight: bold'>*</font></label>";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t\t<td>";
                $form[] = "\t\t\t\t<input type='textbox' name='name' id='name' maxlen='198' size='41' /><br/>";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t\t<td>&nbsp;</td>";
                $form[] = "\t\t</tr>";
                $form[] = "\t\t<tr>";
                $form[] = "\t\t\t<td style='width: 320px;'>";
                $form[] = "\t\t\t\t<label for='email'>Tester's Email:&nbsp;<font style='float: right; color: rgb(250,0,0); font-size: 139%; font-weight: bold'>*</font></label>";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t\t<td>";
                $form[] = "\t\t\t\t<input type='textbox' name='tester-email' id='tester-email' maxlen='198' size='41' />&nbsp;&nbsp;";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t\t<td>";
                $form[] = "\t\t\t\t&nbsp;";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t</tr>";
                $form[] = "\t\t<tr>";
                $form[] = "\t\t\t<td style='width: 320px;'>";
                $form[] = "\t\t\t\t<label for='name'>Tester's Name:&nbsp;<font style='float: right; color: rgb(250,0,0); font-size: 139%; font-weight: bold'>*</font></label>";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t\t<td>";
                $form[] = "\t\t\t\t<input type='textbox' name='tester-name' id='tester-name' maxlen='198' size='41' /><br/>";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t\t<td>&nbsp;</td>";
                $form[] = "\t\t</tr>";
                $form[] = "\t\t<tr>";
                $form[] = "\t\t\t<td>";
                $form[] = "\t\t\t\t<label for='tester-address'>Testing address/department:<font style='float: right; color: rgb(250,0,0); font-size: 139%; font-weight: bold'>*</font></label>";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t\t<td>";
                $form[] = "\t\t\t\t<textarea name='tester-address' id='tester-address' cols='44' rows='5'></textarea>&nbsp;&nbsp;";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t\t<td>";
                $form[] = "\t\t\t\t&nbsp;";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t</tr>";
                $form[] = "\t\t<tr>";
                $form[] = "\t\t\t<td style='width: 320px;'>";
                $form[] = "\t\t\t\t<label for='managers-emails'>Managers of batch of Screening emails <strong>To's</strong>:<font style='float: right; color: rgb(250,0,0); font-size: 139%; font-weight: bold'>*</font><br/><br/><font style='font-size:0.67em; font-style: italics;'>Email Formats Supported: &quot;Bob Smith&quot; &lt;bob@company.com&gt;, joe@company.com, &quot;John Doe&quot;&lt;john@company.com&gt;, Billy Doe&lt;billy@company.com&gt;</font></label>";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t\t<td>";
                $form[] = "\t\t\t\t<textarea name='managers-emails' id='managers-emails' cols='44' rows='11'></textarea>&nbsp;&nbsp;";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t\t<td>";
                $form[] = "\t\t\t\t&nbsp;";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t</tr>";
                $form[] = "\t\t<tr>";
                $form[] = "\t\t\t<td style='width: 320px;'>";
                $form[] = "\t\t\t\t<label for='emails'>Testee's Emails <strong>To:</strong>:<font style='float: right; color: rgb(250,0,0); font-size: 139%; font-weight: bold'>*</font><br/><br/><font style='font-size:0.67em; font-style: italics;'>Email Formats Supported: &quot;Bob Smith&quot; &lt;bob@company.com&gt;, joe@company.com, &quot;John Doe&quot;&lt;john@company.com&gt;, Billy Doe&lt;billy@company.com&gt;</font></label>";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t\t<td>";
                $form[] = "\t\t\t\t<textarea name='emails' id='emails' cols='44' rows='11'></textarea>&nbsp;&nbsp;";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t\t<td>";
                $form[] = "\t\t\t\t&nbsp;";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t</tr>";
                $form[] = "\t\t<tr>";
                $form[] = "\t\t\t<td style='width: 320px;'>";
                $form[] = "\t\t\t\t<label for='number'>Number to Select Randomly:&nbsp;<font style='float: right; color: rgb(250,0,0); font-size: 139%; font-weight: bold'>*</font></label>";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t\t<td>";
                $form[] = "\t\t\t\t<input type='textbox' name='number' id='number' maxlen='198' size='41' value='".mt_rand(1,16)."' /><br/>";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t\t<td>&nbsp;</td>";
                $form[] = "\t\t</tr>";
                $form[] = "\t\t<tr>";
                $form[] = "\t\t\t<td style='width: 320px;'>";
                $form[] = "\t\t\t\t<label for='return'>URL to Return to after submitting form:&nbsp;<font style='float: right; color: rgb(250,0,0); font-size: 139%; font-weight: bold'>*</font></label>";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t\t<td>";
                $form[] = "\t\t\t\t<input type='textbox' name='return' id='return' maxlen='250' size='41' value='".API_URL."' /><br/>";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t\t<td>&nbsp;</td>";
                $form[] = "\t\t</tr>";
                $form[] = "\t\t<tr>";
                $form[] = "\t\t\t<td style='width: 320px;'>";
                $form[] = "\t\t\t\t<label for='callback'>API Callback URL to call on acknowledgements/results:&nbsp;<font style='float: right; color: rgb(250,0,0); font-size: 139%; font-weight: bold'>*</font></label>";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t\t<td>";
                $form[] = "\t\t\t\t<input type='textbox' name='callback' id='callback' maxlen='250' size='41' value='".API_URL."/v2/".$ua."/callback.api' /><br/>";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t\t<td>&nbsp;</td>";
                $form[] = "\t\t</tr>";
                $form[] = "\t\t<tr>";
                $form[] = "\t\t\t<td style='width: 320px;'>";
                $form[] = "\t\t\t\t<label for='tester-callback'>Testers API Callback URL to call on acknowledgements/results:&nbsp;</label>";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t\t<td>";
                $form[] = "\t\t\t\t<input type='textbox' name='tester-callback' id='tester-callback' maxlen='250' size='41' value='' /><br/>";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t\t<td>&nbsp;</td>";
                $form[] = "\t\t</tr>";
                $form[] = "\t\t<tr>";
                $form[] = "\t\t\t<td colspan='3' style='padding-left:64px;'>";
                $form[] = "\t\t\t\t<input type='submit' value='Submit Screening' name='submit' style='padding:11px; font-size:122%;'>";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t</tr>";
                $form[] = "\t\t<tr>";
                $form[] = "\t\t\t<td colspan='3' style='padding-top: 8px; padding-bottom: 14px; padding-right:35px; text-align: right;'>";
                $form[] = "\t\t\t\t<font style='float: right; color: rgb(250,0,0); font-size: 139%; font-weight: bold;'>* </font><font  style='color: rgb(10,10,10); font-size: 99%; font-weight: bold'><em style='font-size: 76%'>~ Required Field for Form Submission</em></font>";
                $form[] = "\t\t\t</td>";
                $form[] = "\t\t</tr>";
                $form[] = "\t\t<tr>";
                $form[] = "\t</table>";
                $form[] = "</form>";
                break;
            
        }
        return implode("\n", $form);
    }
}

if (!function_exists("parseEmailArray")) {
    
    /* function parseEmailArray()
     *
     * parses an email string list into email addresses
     *
     * $str = '"Bob Smith" <bob@company.com>, joe@company.com, "John Doe"<john@company.com>, Billy Doe<billy@company.com>';
     * 
     * Result:
     * 
     * Array
     *      (
     *          [bob@company.com] => Bob Smith
     *          [joe@company.com] => joe@company.com
     *          [john@company.com] => John Doe
     *          [billy@company.com] => Billy Doe
     *      )
     *      
     * @author 		Simon Roberts (Chronolabs) simon@snails.email
     * @return 		array
     */
    function parseEmailArray($str = '') {
        $emails = array();
        
        if(preg_match_all('/\s*"?([^><,"]+)"?\s*((?:<[^><,]+>)?)\s*/', $str, $matches, PREG_SET_ORDER) > 0)
        {
            foreach($matches as $m)
            {
                if(! empty($m[2]))
                {
                    $emails[trim($m[2], '<>')] = $m[1];
                }
                else
                {
                    $emails[$m[1]] = $m[1];
                }
            }
        }
        return $emails;
    }
}

if (!function_exists("whitelistGetIP")) {

	/* function whitelistGetIPAddy()
	 *
	 * 	provides an associative array of whitelisted IP Addresses
	 * @author 		Simon Roberts (Chronolabs) simon@snails.email
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
	 * @author 		Simon Roberts (Chronolabs) simon@snails.email
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
	 * @author 		Simon Roberts (Chronolabs) simon@snails.email
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
	 * @author 		Simon Roberts (Chronolabs) simon@snails.email
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
	 * @author 		Simon Roberts (Chronolabs) simon@snails.email
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
		 * @author 		Simon Roberts (Chronolabs) simon@snails.email
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