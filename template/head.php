<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html lang="en" class="no-js">
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
</head>
<body>
