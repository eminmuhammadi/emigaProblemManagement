<?php 
header('Content-Type: application/javascript');
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
header("Cache-Control: max-age=2592000");
/*
*		For Generate JS
*/
$emigaJS = array(
 "pack/vendors/js/vendor.bundle.base.js",
 "pack/js/template.js"
);
$emigaBuffer = "";
foreach ($emigaJS as $JS) {
$emigaBuffer .= file_get_contents($JS);}
echo $emigaBuffer;
?>