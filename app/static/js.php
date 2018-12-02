<?php 

/*Files*/
$emigaJS = array(
 "pack/vendors/js/vendor.bundle.base.js",
 "pack/js/template.js"
);


$emigaBuffer = "";
foreach ($emigaJS as $JS) {
$emigaBuffer .= file_get_contents($JS);}

header('Content-Type: application/javascript');
echo $emigaBuffer;
?>