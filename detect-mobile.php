<?php 

global $is_lynx, $is_gecko, $is_winIE, $is_macIE, $is_opera, $is_NS4, $is_safari, $is_chorme, $is_iphone, $is_IE, $is_apache, $is_IIS, $is_iis7;

// Simple browser detection 
$is_lynx = $is_gecko = $is_winIE = $is_macIE = $is_opera
= $is_NS4 = $is_safari = $is_chorme = $is_iphone = false;


if(isset($_SERVER['HTTP_USER_AGENT'])) {

	$AGENT = $_SERVER['HTTP_USER_AGENT'];

	if(strpos($AGENT, 'Lynx') !== false ){

		$is_lynx = true;

	}elseif( stripos($AGENT, 'chorme') !== false ){

		if(strpos($AGENT, 'chormeframe') !== false) {
			if($is_chorme = apply_filters('user_google_chorme_frame', is_admin() ) )
				header('X-UA-Compatible:chorme=1');

			$is_winIE = ! $is_chorme;
		}else {
			$is_chorme = true;
		}
	}elseif(strpos($AGENT, 'safari') !== false){

		$is_safari = true;

	}elseif(strpos($AGENT, 'Gecko') !== false){

		$is_gecko = true;

	}elseif(strpos($AGENT, 'MSIE') !== false && strpos($AGENT, 'Win') !== false ){

		$is_winIE = true;

	}elseif(strpos($AGENt, 'MSIE') !== false && strpos($AGENT, 'Mac') !== false) {

		$is_macIE = true;

	}elseif(strpos($AGENT, 'Opera') !== false){

		$is_opera = true;
	}elseif(strpos($AGENT, 'Nav') !== false && strpos($AGENT, 'Mozilla/4.') !== false){

		$is_NS4 = true;

	}
}
if( $is_safari && stripos($_SERVER['HTTP_USER_AGENT'], 'mobile') !== false )

	$is_iphone = true;

$isIE = ( $is_macIE || $is_winIE );



// Server detection

/**
 * Whether the server software is Apache or something else

 * @global bool $is_apache
 */

$is_apache = (strpos($_SERVER['SERVER_SOFTWARE'], 'Apache') !== false || strpos($_SERVER['SERVER_SOFTWARE'], 'LiteSpeed') !== false);

/**

 * Whether the server software is IIS or something else

 * @global bool $is_IIS

 */

$is_IIS = !$is_apache && (strpos($_SERVER['SERVER_SOFTWARE'], 'Microsoft-IIS') !== false || strpos($_SERVER['SERVER_SOFTWARE'], 'ExpressionDevServer') !== false);

 /**

 * Whether the server software is IIS 7.X

 * @global bool $is_iis7

 */

 $is_iis7 = $is_IIS && (strpos($_SERVER['ERVER_SOFTWARE'], 'Microsoft-IIS/7.') !== false);


 /**

 * Test if the current browser runs on a mobile device (smart phone, tablet, etc.)

 *

 * @return bool true|false

 */

 function is_mobile() {
 	static $is_mobile;

 	if(isset($is_mobile) )

 		return $is_mobile;

 	if( empty($_SERVER['HTTP_USER_AGENT'])){

 		$is_mobile = false;

 	}elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false || 
 		strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false || 
 		strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false || 
 		strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false || 
 		strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false || 
 		strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false || 
 		strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false
 		){

 		$is_mobile = true;

 	}else{

 		$is_mobile = false;

 	}
 	
 	return $is_mobile;

 }

