<?php 
	   require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/process.php";
	   require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/head.php";
	   require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/navbar.php";

	   /* Security */
	   $u=$_SESSION['user_id'];
	   $f_u="SELECT * from users WHERE user_id='$u' LIMIT 1";
	   $r_u= mysqli_query($connect, $f_u);
	   if(mysqli_num_rows($r_u) > 0)  {
	       while($r = mysqli_fetch_array($r_u)){
	       $t=$r['token'];
	       if($t!=$_COOKIE['emigaUniqID']){header("Location: /logout");}
		   }	
	   }

	   
	   if(!empty($_GET['route'])){

	   		/*Add Problem*/
	   			if($_GET['route']=="add-problem"){
	   				require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/add-problem.php";}
	   		/*My Problem*/
	   			else if($_GET['route']=="my-problems"){
	   				require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/my-problems.php";}
	   		/*Problems*/
	   			else if($_GET['route']=="all-problems" && ($_SESSION['user_permission']=="GA") ){
	   				require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/all-problems.php";}
	   		/*Edit Problems*/
	   			else if($_GET['route']=="edit-problem"){
	   				require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/edit-problem.php";}

	   		/*Add Department*/
	   			else if($_GET['route']=="add-department" && ($_SESSION['user_permission']=="GA")){
	   				require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/add-department.php";}
			/*Edit Department*/
	   			else if($_GET['route']=="edit-department" && ($_SESSION['user_permission']=="GA")){
	   				require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/edit-department.php";}
			/*Departments*/
	   			else if($_GET['route']=="departments" && ($_SESSION['user_permission']=="GA") ){
	   				require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/departments.php";}

	   		/*Notifications*/
	   			else if($_GET['route']=="notifications" && ($_SESSION['user_permission']=="A" || $_SESSION['user_permission']=="GA")){
	   				require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/notifications.php";}
	   		/*Notifications*/
	   			else if($_GET['route']=="edit-notification" &&  ($_SESSION['user_permission']=="A" || $_SESSION['user_permission']=="GA")){
	   				require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/edit-notification.php";}

	   		/*Main*/
	   			else if($_GET['route']=="main"){
	   				require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/index.php";}
	   		/*User Profile*/
	   			else if($_GET['route']=="user"){
	   				require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/user.php";}
	   		/*User All Profile*/
	   			else if($_GET['route']=="profiles" && ($_SESSION['user_permission']=="GA") ){
	   				require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/user-profiles.php";}	
	   		/*Edit User All Profile*/
	   			else if($_GET['route']=="edit-user-profile" && $_SESSION['user_permission']=="GA"){
	   				require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/edit-user-profile.php";}		   				
	   		/*User Settings*/
	   			else if($_GET['route']=="profile/settings"){
	   				require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/settings.php";}
	   		/*Support*/
	   			else if($_GET['route']=="support"){
	   				require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/support.php";}


	   		/*Error 404*/
	   		else{require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/404.php";}
	   }
	   /* Root Dashboard */
	   else{require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/index.php";}
	   require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/dashboard/footer.php";
	   require_once realpath($_SERVER["DOCUMENT_ROOT"])."/template/foot.php";