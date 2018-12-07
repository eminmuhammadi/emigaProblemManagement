<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title><?php echo $title;?></title>
  <?php
	if($emigaFileName=="login.php"||$emigaFileName=="register.php"){
  			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/static/main.css\">";}?>
  <!-- All -->
  <link rel="stylesheet" href="/<?php echo $_COOKIE['emigaUniqID'] ;?>-app.css">
  <link rel="stylesheet" type="text/css" href="/static/pack/vendors/iconfonts/simple-line-icon/css/simple-line-icons.css">
  <style type="text/css">.col_white{color:#FFF}.footer_ul li a,footer p{color:#CCC}footer{width:100%;background-color:#263238;min-height:250px;padding:10px 0 25px}.pt2{padding-top:40px;margin-bottom:20px}footer p{font-size:13px;padding-bottom:0;margin-bottom:8px}.footer_ul,.footer_ul2{margin:0;list-style-type:none}.mb10{padding-bottom:15px}.footer_ul{font-size:14px;padding:0 0 10px}.footer_ul li{padding:0 0 5px}.footer_ul li a:hover{color:#fff;text-decoration:none}.fleft{float:left}.padding-right{padding-right:10px}.footer_ul2{padding:0}.footer_ul2 li p{display:table}.footer_ul2 li a:hover{text-decoration:none}.footer_ul2 li i{margin-top:5px}.bottom_border{border-bottom:1px solid #323f45;padding-bottom:20px}.foote_bottom_ul{list-style-type:none;padding:0;display:table;margin:10px auto}.foote_bottom_ul li{display:inline}.foote_bottom_ul li a{color:#999;margin:0 12px}.social_footer_ul{display:table;margin:15px auto 0;list-style-type:none}.social_footer_ul li{padding-left:20px;padding-top:10px;float:left}.social_footer_ul li a{color:#CCC;border:1px solid #CCC;padding:8px;border-radius:50%}.social_footer_ul li i{width:20px;height:20px;text-align:center}</style>
</head>

<body>