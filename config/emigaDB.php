<?php

	$connect = mysqli_connect("localhost"  , "emiga"  , "emiga"  , "emigaproject");  
	
	if (mysqli_connect_errno())	 {
	      echo "<!-- MYSQL ERROR :" . mysqli_connect_error() ."-->";
	      die();
	      exit();
	}