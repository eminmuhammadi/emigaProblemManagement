<?php

require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/process.php";

  		$d=$_SERVER['HTTP_USER_AGENT'];
  		$id=$_COOKIE['emigaUniqID'];
		header("Location: /dashboard/main&u=$id&d=$d");

?>