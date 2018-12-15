<?php 
header("Content-type: text/css"); 
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
header("Cache-Control: max-age=2592000");
/*
*		For Generate CSS 
*/
function emigaCacheCSS(){
$emigaCSS = array(
 "pack/vendors/css/vendor.bundle.base.css",
 "pack/vendors/css/vendor.bundle.addons.css",
 "pack/css/style.css"
);
$emigaBuffer = "";    
foreach ($emigaCSS as $CSS) {
   $emigaBuffer .= file_get_contents($CSS);}
   $emigaBuffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $emigaBuffer);
   $emigaBuffer = str_replace(': ', ':', $emigaBuffer);
   $emigaBuffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $emigaBuffer);
   
   echo($emigaBuffer);
}
emigaCacheCSS();
?>