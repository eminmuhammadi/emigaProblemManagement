<!DOCTYPE html>
<html>
<head>
	<title>Loggin out ...</title>
</head>
<body>
<?php 
		session_start();
		session_destroy();

		unset($_SESSION["user_name"]);
		unset($_SESSION["user_email"]);
		unset($_SESSION["user_lastname"]);
		unset($_SESSION["user_permission"]);
		unset($_SESSION["user_department_detail"]);
		unset($_SESSION["reg_date"]);
		unset($_SESSION["last_logged"]);
		unset($_SESSION["ip"]);
		unset($_SESSION["user_agent"]);
		unset($_SESSION["user_id"]);
		unset($_SESSION["user_mobile"]);
		unset($_SESSION["verified"]);				
		unset($_SESSION["token"]);
		unset($_SESSION["emiga_logged_verify"]);
  		$d=$_SERVER['HTTP_USER_AGENT'];
  		$id=$_COOKIE['emigaUniqID'];	
		header("Location: /login?action=logged_out&u=$id&d=$d");exit();
?>
</body>
</html>