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

	global $domain, $protocol, $business, $entity, $contact, $referee, $peerings, $source;

	if (strlen($theip = whitelistGetIP(true))==0)
		$theip = "127.0.0.1";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta property="og:title" content="Toxicology Screening API Services"/>
<meta property="og:type" content="api"/>
<meta property="og:image" content="https://icons.ringwould.com.au/trusting/apple-touch-icon-114x114.png"/>
<meta property="og:url" content="<?php echo (isset($_SERVER["HTTPS"])?"https://":"http://").$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]; ?>" />
<meta property="og:site_name" content="<?php echo $business; ?>"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="rating" content="general" />
<meta http-equiv="author" content="wishcraft@users.sourceforge.net" />
<meta http-equiv="copyright" content="<?php echo $business; ?> &copy; <?php echo date("Y"); ?>" />
<meta http-equiv="generator" content="Chronolabs Cooperative (AUS)" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Toxicology Screening API Services || <?php echo $business; ?></title>
<!-- AddThis Smart Layers BEGIN -->
<!-- Go to http://www.addthis.com/get/smart-layers to customize -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50f9a1c208996c1d"></script>
<script type="text/javascript">
  addthis.layers({
	'theme' : 'transparent',
	'share' : {
	  'position' : 'right',
	  'numPreferredServices' : 6
	}, 
	'follow' : {
	  'services' : [
		{'service': 'facebook', 'id': 'Chronolabs'},
		{'service': 'twitter', 'id': 'JohnRingwould'},
		{'service': 'twitter', 'id': 'ChronolabsCoop'},
		{'service': 'twitter', 'id': 'Cipherhouse'},
		{'service': 'twitter', 'id': 'OpenRend'},
	  ]
	},  
	'whatsnext' : {},  
	'recommended' : {
	  'title': 'Recommended for you:'
	} 
  });
</script>
<!-- AddThis Smart Layers END -->
<link rel="stylesheet" href="<?php echo $source; ?>/style.css" type="text/css" />
<link rel="stylesheet" href="https://css.ringwould.com.au/3/gradientee/stylesheet.css" type="text/css" />
<link rel="stylesheet" href="https://css.ringwould.com.au/3/shadowing/styleheet.css" type="text/css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script>
	var icoroite = 9966 * Math.random() + 7755;
	setTimeout(function() {
		jQuery.getJSON( "https://icons.ringwould.com.au/icons/java/".($GLOBALS["domain"]=="ringwould.com.au"?"ringwould":"invader")."/random.json", function( data ) {
			$.each(data, function( keyey, value ) {
				$( "#" + keyey ).href = value;
			});
		});
	}, icoroite);
</script>
<?php
	if ((!isset($_SESSION['icon-meta-html']) || empty($_SESSION['icon-meta-html'])) && session_id())
		$_SESSION['icon-meta-html'] = file_get_contents("https://icons.ringwould.com.au/icons/java/".($GLOBALS["domain"]=="ringwould.com.au"?"ringwould":"invader")."/random.html");
	if (isset($_SESSION['icon-meta-html']) && !empty($_SESSION['icon-meta-html']))
		echo $_SESSION['icon-meta-html'];
	else
		echo file_get_contents("https://icons.ringwould.com.au/icons/java/".($GLOBALS["domain"]=="ringwould.com.au"?"ringwould":"invader")."/random.html");
?>

</head>
<?php $number = mt_rand(2,5); ?>
<body>
<div class="main">
    <h1>Toxicology Screening API Services -- <?php echo $business; ?></h1>
    <p>This is an API Service for conducting a screening placement of people, animals or entities for example for drugs, virus or toxin testing. It provides the selection based on either a generated seed or provided one, in reference to the array posted to the API by either GET or POST method of form REST API Posting.</p>
	<h2>Code API Documentation</h2>
    <p>You can find the phpDocumentor code API documentation at the following path :: <a href="<?php echo $source; ?>docs/" target="_blank"><?php echo $source; ?>docs/</a>. These should outline the source code core functions and classes for the API to function!</p>
    <h2>Examples of Calls (Using JSON)</h2>
    <p>There is a couple of calls to the API which I will explain.</p>
    <blockquote>For example if you want a call without providing a seed a short handed 400 character length GET method would be returning <?php echo $number; ?> items from the selection of the array :: <a href="<?php echo $source; ?>v1/<?php echo $number; ?>/json.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson" target="_blank"><?php echo $source; ?>v1/<?php echo $number; ?>/json.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson</a> or in providing a seed which is a numeric or double floating point/real variable you would do the following :: <a href="<?php echo $source; ?>v1/<?php echo $number; ?>/<?php echo $seed?>/json.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson" target="_blank"><?php echo $source; ?>v1/<?php echo $number; ?>/<?php echo $seed?>/json.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson</a>.<br /><br />You don't have to use the variable name 'person' it just has to be a variable passed to the API through GET or POST that is a one element array, the keys will be preserved and returned incase you want to place elements based on employment numbers with names and you can call the variable what you need, the API will detect the variable which is an array passed to it.</blockquote>
    <h2>Code API Documentation</h2>
    <p>You can find the phpDocumentor code API documentation at the following path :: <a href="<?php echo $source; ?>docs/" target="_blank"><?php echo $source; ?>docs/</a>. These should outline the source code core functions and classes for the API to function!</p>
    <h2>API Services' Peers</h2>
    <p>This is the services the key is dupicated on when lodged for a multiple recover points and options!</p>
    <blockquote>
    	<ol>
    		<?php foreach($peerings as $domain => $peer) { 
    				if (!strpos($domain, $source)) {
    					?>				<li><a href="mailto:<?php echo $peer['contact']; ?>" target="_blank"><?php echo $peer['business']; ?></a> ~~ <a href="<?php echo $peer['protocol'] . $peer['domain']; ?>" target="_blank"><?php echo $peer['protocol'] . $peer['domain']; ?></a><?php if ($peer['ping']>1.0001) { ?> --- <em>ping <?php echo $peer['ping']; ?>ms</em><?php } else { ?> -- Unabled to Ping! <?php } ?></li>
    					
			<?php }	}?>
    	</ol>
    </blockquote>
    <h2>RAW Document Output</h2>
    <p>This is done with the <em>raw.api</em> extension at the end of the url, you replace the example address with either a place, an country either with no spaces in words or country ISO2 or ISO3 code and a name to search for the place on the api</p>
    <blockquote>
        <font color="#009900">This is for a <?php echo $number; ?> items returned with a generated seed</font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/<?php echo $number; ?>/raw.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson" target="_blank"><?php echo $source; ?>v1/<?php echo $number; ?>/raw.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson</a></strong></em><br /><br />
		<font color="#009900">This is for <?php echo $number; ?> items return with a provided seed of <em>'<?php echo $seed?>'</em></font><br/>
        <em><strong><em><strong><a href="<?php echo $source; ?>v1/<?php echo $number; ?>/<?php echo $seed;?>/raw.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson" target="_blank"><?php echo $source; ?>v1/<?php echo $number; ?>/<?php echo $seed;?>/raw.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson</a></strong></em>
    </blockquote>
    <h2>HTML Document Output</h2>
    <p>This is done with the <em>html.api</em> extension at the end of the url, you replace the address with either a place, an country either with no spaces in words or country ISO2 or ISO3 code and a name to search for the place on the api</p>
    <blockquote>
        <font color="#009900">This is for a <?php echo $number; ?> items returned with a generated seed</font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/<?php echo $number; ?>/html.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson" target="_blank"><?php echo $source; ?>v1/<?php echo $number; ?>/html.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson</a></strong></em><br /><br />
		<font color="#009900">This is for <?php echo $number; ?> items return with a provided seed of <em>'<?php echo $seed?>'</em></font><br/>
        <em><strong><em><strong><a href="<?php echo $source; ?>v1/<?php echo $number; ?>/<?php echo $seed;?>/html.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson" target="_blank"><?php echo $source; ?>v1/<?php echo $number; ?>/<?php echo $seed;?>/html.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson</a></strong></em>
    </blockquote>
    <h2>Serialisation Document Output</h2>
    <p>This is done with the <em>serial.api</em> extension at the end of the url, you replace the address with either a place, an country either with no spaces in words or country ISO2 or ISO3 code and a name to search for the place on the api</p>
    <blockquote>
        <font color="#009900">This is for a <?php echo $number; ?> items returned with a generated seed</font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/<?php echo $number; ?>/serial.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson" target="_blank"><?php echo $source; ?>v1/<?php echo $number; ?>/serial.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson</a></strong></em><br /><br />
		<font color="#009900">This is for <?php echo $number; ?> items return with a provided seed of <em>'<?php echo $seed?>'</em></font><br/>
        <em><strong><em><strong><a href="<?php echo $source; ?>v1/<?php echo $number; ?>/<?php echo $seed;?>/serial.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson" target="_blank"><?php echo $source; ?>v1/<?php echo $number; ?>/<?php echo $seed;?>/serial.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson</a></strong></em>
    </blockquote>
    <h2>JSON Document Output</h2>
    <p>This is done with the <em>json.api</em> extension at the end of the url, you replace the address with either a place, an country either with no spaces in words or country ISO2 or ISO3 code and a name to search for the place on the api</p>
    <blockquote>
        <font color="#009900">This is for a <?php echo $number; ?> items returned with a generated seed</font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/<?php echo $number; ?>/json.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson" target="_blank"><?php echo $source; ?>v1/<?php echo $number; ?>/json.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson</a></strong></em><br /><br />
		<font color="#009900">This is for <?php echo $number; ?> items return with a provided seed of <em>'<?php echo $seed?>'</em></font><br/>
        <em><strong><em><strong><a href="<?php echo $source; ?>v1/<?php echo $number; ?>/<?php echo $seed;?>/json.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson" target="_blank"><?php echo $source; ?>v1/<?php echo $number; ?>/<?php echo $seed;?>/json.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson</a></strong></em>
    </blockquote>
    <h2>XML Document Output</h2>
    <p>This is done with the <em>xml.api</em> extension at the end of the url, you replace the address with either a place, an country either with no spaces in words or country ISO2 or ISO3 code and a name to search for the place on the api</p>
        <blockquote>
        <font color="#009900">This is for a <?php echo $number; ?> items returned with a generated seed</font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/<?php echo $number; ?>/xml.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson" target="_blank"><?php echo $source; ?>v1/<?php echo $number; ?>/xml.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson</a></strong></em><br /><br />
		<font color="#009900">This is for <?php echo $number; ?> items return with a provided seed of <em>'<?php echo $seed?>'</em></font><br/>
        <em><strong><em><strong><a href="<?php echo $source; ?>v1/<?php echo $number; ?>/<?php echo $seed;?>/xml.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson" target="_blank"><?php echo $source; ?>v1/<?php echo $number; ?>/<?php echo $seed;?>/xml.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson</a></strong></em>
    </blockquote>
    <?php if (file_exists(API_FILE_IO_FOOTER)) {
    	readfile(API_FILE_IO_FOOTER);
    }?>	
    <?php if (!in_array(whitelistGetIP(true), whitelistGetIPAddy())) { ?>
    <h2>Limits</h2>
    <p>There is a limit of <?php echo MAXIMUM_QUERIES; ?> queries per hour. You can add yourself to the whitelist by using the following form API <a href="http://whitelist.<?php echo domain; ?>/">Whitelisting form (whitelist.<?php echo domain; ?>)</a>. This is only so this service isn't abused!!</p>
    <?php } ?>
    <h2>The Author</h2>
    <p>This was developed by Simon Roberts in 2013 and is part of the Chronolabs System and api's.<br/><br/>This is open source which you can download from <a href="https://sourceforge.net/projects/chronolabsapis/">https://sourceforge.net/projects/chronolabsapis/</a> contact the scribe  <a href="mailto:wishcraft@users.sourceforge.net">wishcraft@users.sourceforge.net</a></p></body>
</div>
</html>
<?php 
