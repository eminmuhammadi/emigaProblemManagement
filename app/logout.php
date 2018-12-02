<?php require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/process.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Loggin out ...</title>
</head>
<body>
<?php unset($_SESSION["emiga_logged_verify"]);header("Location: /login?action=logged_out");exit();?>
</body>
</html>