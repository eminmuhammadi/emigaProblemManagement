<?php
		
		/*
		*   Disable directly 
		*/
		if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) { 
			header('HTTP/1.0 403 Forbidden');};
		/*
		*	Security
		*/	
		header('X-Frame-Options: SAMEORIGIN');



	/*Library*/
	require_once realpath($_SERVER["DOCUMENT_ROOT"])."/lib/emigaLib.php";
	/*Database*/
	require_once realpath($_SERVER["DOCUMENT_ROOT"])."/config/emigaDB.php";

	ini_set('display_errors', '1');
	if(!isset($_COOKIE['emigaUniqID'])) {
	setcookie("emigaUniqID",emigaToken(), time() + (86400 * 30), "/");}

	/*Login System*/
	emigaLoginVerify();

	/*Cache*/
	emigaCacheStart('1','1');
	
	$powered="AzMIU &mdash; IKT Mərkəzi";

	if ($emigaFileName=="login.php"){
		$title="Daxil ol | ".$powered;}

	else if($emigaFileName=="register.php"){
		$title="Qeydiyyatdan keç | ".$powered;}

	else if($emigaFileName=="index.php"){
		$title="Əsas səhifə | ".$powered;}

	else if($emigaFileName=="dashboard.php"){
		
		if(!empty($_GET['route'])){

			/*Add Problem*/
	   			if($_GET['route']=="add-problem"){$title="Problem Əlavə et | ".$powered;}
	   		/*My Problem*/
	   			else if($_GET['route']=="my-problems"){$title="Mənim problemlərim | ".$powered;}
	   		/*Problems*/
	   			else if($_GET['route']=="all-problems"){$title="Problemlər | ".$powered;}
	   		/*Edit Problems*/
	   			else if($_GET['route']=="edit-problem"){$title="Problemi düzəlt | ".$powered;}

	   		/*Add Department*/
	   			else if($_GET['route']=="add-department"){$title="Şöbə əlavə et | ".$powered;}
			/*Edit Department*/
	   			else if($_GET['route']=="edit-department"){$title="Şöbəni düzəlt | ".$powered;}
			/*Departments*/
	   			else if($_GET['route']=="departments"){$title="Şöbələr &mdash; ".$powered;}

		/*Notifications*/
	   			else if($_GET['route']=="notifications"){$title="Bildirişlər | ".$powered;}
	   	/*Edit Notifications*/
	   			else if($_GET['route']=="edit-notification"){$title="Bildirişi düzəlt | ".$powered;}

		/*Deleted problems*/
	   			else if($_GET['route']=="deleted-problems"){$title="Silinmiş Problmelər | ".$powered;}
	   	/*Edit Deleted problems*/
	   			else if($_GET['route']=="edit-deleted-problem"){$title="Silinmiş Problmeləri düzəlt | ".$powered;}
	   	/*Edit Deleted problems*/
	   			else if($_GET['route']=="my-tasks"){$title="Mənim işlərim | ".$powered;}

	   		/*Main*/
	   			else if($_GET['route']=="main"){$title="Əsas Panel | ".$powered;}
	   		/*User Profile*/
	   			else if($_GET['route']=="user"){$title="Mənim kabinetim | ".$powered;}
	   		/*User Settings*/
	   			else if($_GET['route']=="profile/settings"){$title="Tənzimləmələr | ".$powered;}
	   		/*Support*/
	   			else if($_GET['route']=="support"){$title="Xidməti dəstək | ".$powered;}
	   		/*User all profiles*/	
				else if($_GET['route']=="profiles"){$title="Bütün istifadəçilər | ".$powered;}
			/*Edit user profiles*/
				else if($_GET['route']=="edit-user-profile"){$title="İstifadəçinin məlumatlarını düzəlt | ".$powered;}

		}else{

			$title="404 Xəta | ".$powered;
		}

	}