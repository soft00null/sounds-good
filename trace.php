<?php
$info = "";


$ip = "0.0.0.0";
    if( ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) && ( !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) ) 
    {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif( ( isset( $_SERVER['HTTP_CLIENT_IP'])) && (!empty($_SERVER['HTTP_CLIENT_IP'] ) ) ) 
    {
        $ip = explode(".",$_SERVER['HTTP_CLIENT_IP']);
        $ip = $ip[3].".".$ip[2].".".$ip[1].".".$ip[0];
    } elseif((!isset( $_SERVER['HTTP_X_FORWARDED_FOR'])) || (empty($_SERVER['HTTP_X_FORWARDED_FOR']))) 
    {
        if ((!isset( $_SERVER['HTTP_CLIENT_IP'])) && (empty($_SERVER['HTTP_CLIENT_IP']))) 
        {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
    }
    


$ua = $_SERVER["HTTP_USER_AGENT"];


/* ==== Detect the OS ==== */

// ---- Mobile ----

// Android
$android = strpos($ua, 'Android') ? true : false;

// BlackBerry
$blackberry = strpos($ua, 'BlackBerry') ? true : false;

// iPhone
$iphone = strpos($ua, 'iPhone') ? true : false;

// Palm
$palm = strpos($ua, 'Palm') ? true : false;

// ---- Desktop ----

// Linux
$linux = strpos($ua, 'Linux') ? true : false;

// Macintosh
$mac = strpos($ua, 'Macintosh') ? true : false;

// Windows
$win = strpos($ua, 'Windows') ? true : false;

/* ============================ */


/* ==== Detect the UA ==== */

// Chrome
$chrome = strpos($ua, 'Chrome') ? true : false; // Google Chrome

// Firefox
$firefox = strpos($ua, 'Firefox') ? true : false; // All Firefox
$firefox_2 = strpos($ua, 'Firefox/2.0') ? true : false; // Firefox 2
$firefox_3 = strpos($ua, 'Firefox/3.0') ? true : false; // Firefox 3
$firefox_3_6 = strpos($ua, 'Firefox/3.6') ? true : false; // Firefox 3.6

// Internet Exlporer
$msie = strpos($ua, 'MSIE') ? true : false; // All Internet Explorer
$msie_7 = strpos($ua, 'MSIE 7.0') ? true : false; // Internet Explorer 7
$msie_8 = strpos($ua, 'MSIE 8.0') ? true : false; // Internet Explorer 8

// Opera
$opera = preg_match("/\bOpera\b/i", $ua); // All Opera


// Safari
$safari = strpos($ua, 'Safari') ? true : false; // All Safari
$safari_2 = strpos($ua, 'Safari/419') ? true : false; // Safari 2
$safari_3 = strpos($ua, 'Safari/525') ? true : false; // Safari 3
$safari_3_1 = strpos($ua, 'Safari/528') ? true : false; // Safari 3.1
$safari_4 = strpos($ua, 'Safari/531') ? true : false; // Safari 4

/* ============================ */




if ($ua) {

// ---- Test if using a Handheld Device ----
if ($android) { // Android
$info .= "Your are using Android ";

}
if ($blackberry) { // Blackbery
$info .= "Your are using BlackBerry ";

}
if ($iphone) { // iPhone
$info .= "Your are using iPhone ";
}
if ($palm) { // Palm
$info .= "Your are using Palm Device ";
}

if ($linux) { // Linux Desktop
$info .= "Your are using Linux ";
}

// ---- Test if Firefox ----
if ($firefox) {
$info .= "Your Browser is Firefox ";

// Test Versions
if ($firefox_2) { // Firefox 2
$info .= "Version: Firefox 2 ";
}
elseif ($firefox_3) { // Firefox 3
$info .= "version :Firefox 3";
}
elseif ($firefox_3_6) { // Firefox 3.6
$info .= "version : Firefox 3.6";
}
else { // A version not listed
$info .= "o.O what Version You are using? ";
}
}

// ---- Test if Safari or Chrome ----
elseif ( ($safari || $chrome) && !$iphone) {
$info .= "Your Browser is Webkit Based i.e. Chrome or Safari";

if ($safari && !$chrome) { // Test if Safari and not Chrome
$info .= "Yaa Your Webkit Based Browser is Safari ";

// Test if Safari Mac or Safari Windows
if ($mac && $safari) { // Safari Mac
$info .= "You are Using Safari on Mac ";
}
if ($win && $safari) { // Safari Windows
$info .= "You are using Sarafi on Windows :( ";
}

// Test Versions
if ($safari_2) { // Safari 2
$info .= "Safari Version 2 ";
}
elseif ($safari_3) { // Safari 3
$info .= "Safari Version 3 ";
}
elseif ($safari_4) { // Safari 4
$info .= "Safari version 4 ";
}
else {
$info .= " Safari Version  ";
}
}

elseif ($chrome) { // Test if Chrome
$info .= "Your Browser is Chrome ";
}
}

// ---- Test if iPhone with Safari 3.1 ----
elseif ($iphone && $safari_3_1) {
$info .= "iPhone With Safari ";
}

// ---- Test if Internet Explorer ----
elseif ($msie) {
$info .= "Your Browser is Internet Explorer ";

// Test Versions
if ($msie_7) { // Internet Explorer 7
$info .= "IE 7";
}
elseif ($msie_8) { // Internet Explorer 8
$info .= "IE 8";
}
else {
$info .= "Your Browser is IE ";
}
}

// ---- Test if Opera ----
elseif ($opera) {
$info .= "Your Browser is Opera ";
}

// ---- If none of the above ----
else {
$info .= "Unknown browser ";
}
}


$info .= "Your IP :".$ip;



echo "<script type='text/javascript'>alert('.$info.');</script>";

?>



