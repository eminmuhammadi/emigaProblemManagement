<?php require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/process.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Loggin out ...</title>
</head>
<body>
<?php 
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
		unset($_SESSION["token"]);
		unset($_SESSION["emiga_logged_verify"]);
		if (isset($_SERVER['HTTP_COOKIE'])) {
    			$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
   						 foreach($cookies as $cookie) {
        					$parts = explode('=', $cookie);
        					$name = trim($parts[0]);
        					setcookie($name, '', time()-1000);
        					setcookie($name, '', time()-1000, '/');}} 
		header("Location: /login?action=logged_out");exit();
?>
</body>
</html>