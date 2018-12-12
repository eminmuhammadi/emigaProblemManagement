<?php
require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/process.php";

	if ($_GET['status']=="0") {

		
			if ($_SESSION["verified"]=="0") {

			echo "Hesabınız administratorlar tərəfindən rədd edilmişdir....";
			exit();				



			}
			else if ($_SESSION["verified"]=="1") {
			
			echo "Yönləndirilir....";
			header("Location: /dashboard/main");
			exit();

			}	





	}
	else {

		echo "Yönləndirilir....";
		header("Location: /dashboard/main");
		exit();
	}