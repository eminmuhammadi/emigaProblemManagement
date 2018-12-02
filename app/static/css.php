<?php 
function emigaCacheCSS(){

/*Files*/
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


   header("Content-type: text/css"); 
   echo($emigaBuffer);


}
emigaCacheCSS();
?>