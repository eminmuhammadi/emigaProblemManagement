<?php
  require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/process.php";
  		$uniqID=$_COOKIE['emigaUniqID'];
		header("Location: /login?id=$uniqID");

?>