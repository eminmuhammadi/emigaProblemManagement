<?php
$emigaFileName=basename($_SERVER['SCRIPT_FILENAME']);
function emigaToken($length = 32) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return md5($randomString);
}

function emigaLoginVerify(){
	$emigaFileName=basename($_SERVER['SCRIPT_FILENAME']);
	if ($emigaFileName=="register.php" || $emigaFileName=="login.php"){




    }
	else{
	session_start(); 
	if(!$_SESSION['emiga_logged_verify']){ 

        $d=$_SERVER['HTTP_USER_AGENT'];
        $id=$_COOKIE['emigaUniqID'];
        header("Location: /login?u=$id&d=$d");

	exit;}}
}