<?php

	if ($_GET['status']=="0") {

		echo "Hesabın təsdiqlənməyib";
	}
	else {

		echo "Redirecting....";
		header("Location: /dashboard/main");
		exit();
	}