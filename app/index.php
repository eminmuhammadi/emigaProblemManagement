<?php
  require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/process.php";
  		$token=emigaToken();
		header("Location: /login?id=".$token);

?>