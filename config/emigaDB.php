<?php

	$connect = mysqli_connect(""  , ""  , ""  , "");  
	
	if (mysqli_connect_errno())	 {
	      echo "<!-- MYSQL ERROR :" . mysqli_connect_error() ."-->";
	      die();
	      exit();
	}