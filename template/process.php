<?php
	/*Library*/
	require_once realpath($_SERVER["DOCUMENT_ROOT"])."/lib/emigaLib.php";
	/*Database*/
	require_once realpath($_SERVER["DOCUMENT_ROOT"])."/config/emigaDB.php";

	ini_set('display_errors', '0');
	if(!isset($_COOKIE['emigaUniqID'])) {
	setcookie("emigaUniqID",emigaToken(), time() + (86400 * 7), "/");}

	/*Login System*/
	emigaLoginVerify();

	/*Cache*/
	emigaCacheStart('1','1');
	
	$powered="Emiga Problem Management";

	if ($emigaFileName=="login.php"){
		$title="Daxil ol &mdash; ".$powered;}

	else if($emigaFileName=="register.php"){
		$title="Qeydiyyatdan keç &mdash; ".$powered;}

	else if($emigaFileName=="index.php"){
		$title="Əsas səhifə &mdash; ".$powered;}

	else if($emigaFileName=="dashboard.php"){
		
		if(!empty($_GET['route'])){

			/*Add Problem*/
	   			if($_GET['route']=="add-problem"){$title="Problem Əlavə et &mdash; ".$powered;}
	   		/*My Problem*/
	   			else if($_GET['route']=="my-problems"){$title="Mənim problemlərim &mdash; ".$powered;}
	   		/*Problems*/
	   			else if($_GET['route']=="all-problems"){$title="Problemlər &mdash; ".$powered;}
	   		/*Edit Problems*/
	   			else if($_GET['route']=="edit-problem"){$title="Problemi düzəlt &mdash; ".$powered;}

	   		/*Add Department*/
	   			else if($_GET['route']=="add-department"){$title="Şöbə əlavə et &mdash; ".$powered;}
			/*Edit Department*/
	   			else if($_GET['route']=="edit-department"){$title="Şöbəni düzəlt &mdash; ".$powered;}
			/*Departments*/
	   			else if($_GET['route']=="departments"){$title="Şöbələr &mdash; ".$powered;}

		/*Notifications*/
	   			else if($_GET['route']=="notifications"){$title="Bildirişlər &mdash; ".$powered;}
	   	/*Edit Notifications*/
	   			else if($_GET['route']=="edit-notification"){$title="Bildirişi düzəlt &mdash; ".$powered;}

	   		/*Main*/
	   			else if($_GET['route']=="main"){$title="Əsas Panel &mdash; ".$powered;}
	   		/*User Profile*/
	   			else if($_GET['route']=="user"){$title="Mənim kabinetim &mdash; ".$powered;}
	   		/*User Settings*/
	   			else if($_GET['route']=="profile/settings"){$title="Tənzimləmələr &mdash; ".$powered;}
	   		/*Support*/
	   			else if($_GET['route']=="support"){$title="Xidməti dəstək &mdash; ".$powered;}
	   		/*User all profiles*/	
				else if($_GET['route']=="profiles"){$title="Bütün istifadəçilər &mdash; ".$powered;}
			/*Edit user profiles*/
				else if($_GET['route']=="edit-user-profile"){$title="İstifadəçinin məlumatlarını düzəlt &mdash; ".$powered;}

		}else{

			$title="404 Xəta &mdash; ".$powered;
		}

	}
?>