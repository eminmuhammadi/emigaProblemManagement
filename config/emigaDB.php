<?php
	/*Database Connection*/
        /*servername , username , password , database         , port , socket*/
	$connect = mysqli_connect(""  , ""  , ""  , "");  
	/*Error Message*/
	if (mysqli_connect_errno()){
	echo "<!-- MYSQL ERROR :" . mysqli_connect_error() ."-->";die();exit();}
