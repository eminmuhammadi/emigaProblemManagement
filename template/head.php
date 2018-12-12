<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html lang="az">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title><?php echo $title;?></title>


<link rel="shortcut icon" type="image/png" href="/static/favicon.png"/>
<link rel="apple-touch-icon" sizes="57x57" href="/static/fav/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/static/fav/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/static/fav/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/static/fav/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/static/fav/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/static/fav/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/static/fav/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/static/fav/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/static/fav/apple-icon-180x180.png">
<link rel="manifest" href="/static/fav/manifest.json">
<meta name="msapplication-TileColor" content="#090e40">
<meta name="msapplication-TileImage" content="/static/fav/ms-icon-144x144.png">
<meta name="theme-color" content="#090e40">
  <?php
	if($emigaFileName=="login.php"||$emigaFileName=="register.php"){
  			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/static/main.css\">";}?>
  <!-- All -->
  <link rel="stylesheet" href="/static/app.css">
  <link rel="stylesheet" type="text/css" href="/static/pack/vendors/iconfonts/simple-line-icon/css/simple-line-icons.css">
  <?php if($emigaFileName=="dashboard.php"){echo "<script src=\"/static/chartjs.min.js\"></script>";}?>
  <style type="text/css">body{font-display: swap;}.no-js{display:none;}.holder,.preloader,.preloader div{position:absolute}.holder{left:0;top:0;bottom:0;right:0;width:100%;height:100%;background-color:#090e40}.preloader{width:100px;height:100px;left:50%;top:50%;transform:translateX(-50%) translateY(-50%);animation:rotatePreloader 1.9s infinite ease-in}@keyframes rotatePreloader{0%{transform:translateX(-50%) translateY(-50%) rotateZ(0)}100%{transform:translateX(-50%) translateY(-50%) rotateZ(-360deg)}}.preloader div{width:100%;height:100%;opacity:0}.preloader div:before{content:"";position:absolute;left:50%;top:0;width:10%;height:10%;background-color:#fff;transform:translateX(-50%);border-radius:50%}.preloader div:nth-child(1){transform:rotateZ(0);animation:rotateCircle1 1.9s infinite linear;z-index:9}@keyframes rotateCircle1{0%{opacity:1;transform:rotateZ(36deg)}57%,7%{transform:rotateZ(0)}100%{transform:rotateZ(-324deg);opacity:1}}.preloader div:nth-child(2){transform:rotateZ(36deg);animation:rotateCircle2 1.9s infinite linear;z-index:8}@keyframes rotateCircle2{5%{opacity:0}5.0001%{opacity:1;transform:rotateZ(0)}12%,62%{transform:rotateZ(-36deg)}100%{transform:rotateZ(-324deg);opacity:1}}.preloader div:nth-child(3){transform:rotateZ(72deg);animation:rotateCircle3 1.9s infinite linear;z-index:7}@keyframes rotateCircle3{10%{opacity:0}10.0002%{opacity:1;transform:rotateZ(-36deg)}17%,67%{transform:rotateZ(-72deg)}100%{transform:rotateZ(-324deg);opacity:1}}.preloader div:nth-child(4){transform:rotateZ(108deg);animation:rotateCircle4 1.9s infinite linear;z-index:6}@keyframes rotateCircle4{15%{opacity:0}15.0003%{opacity:1;transform:rotateZ(-72deg)}22%,72%{transform:rotateZ(-108deg)}100%{transform:rotateZ(-324deg);opacity:1}}.preloader div:nth-child(5){transform:rotateZ(144deg);animation:rotateCircle5 1.9s infinite linear;z-index:5}@keyframes rotateCircle5{20%{opacity:0}20.0004%{opacity:1;transform:rotateZ(-108deg)}27%,77%{transform:rotateZ(-144deg)}100%{transform:rotateZ(-324deg);opacity:1}}.preloader div:nth-child(6){transform:rotateZ(180deg);animation:rotateCircle6 1.9s infinite linear;z-index:4}@keyframes rotateCircle6{25%{opacity:0}25.0005%{opacity:1;transform:rotateZ(-144deg)}32%,82%{transform:rotateZ(-180deg)}100%{transform:rotateZ(-324deg);opacity:1}}.preloader div:nth-child(7){transform:rotateZ(216deg);animation:rotateCircle7 1.9s infinite linear;z-index:3}@keyframes rotateCircle7{30%{opacity:0}30.0006%{opacity:1;transform:rotateZ(-180deg)}37%,87%{transform:rotateZ(-216deg)}100%{transform:rotateZ(-324deg);opacity:1}}.preloader div:nth-child(8){transform:rotateZ(252deg);animation:rotateCircle8 1.9s infinite linear;z-index:2}@keyframes rotateCircle8{35%{opacity:0}35.0007%{opacity:1;transform:rotateZ(-216deg)}42%,92%{transform:rotateZ(-252deg)}100%{transform:rotateZ(-324deg);opacity:1}}.preloader div:nth-child(9){transform:rotateZ(288deg);animation:rotateCircle9 1.9s infinite linear;z-index:1}@keyframes rotateCircle9{40%{opacity:0}40.0008%{opacity:1;transform:rotateZ(-252deg)}47%,97%{transform:rotateZ(-288deg)}100%{transform:rotateZ(-324deg);opacity:1}}.preloader div:nth-child(10){transform:rotateZ(324deg);animation:rotateCircle10 1.9s infinite linear;z-index:0}@keyframes rotateCircle10{45%{opacity:0}45.0009%{opacity:1;transform:rotateZ(-288deg)}102%,52%{transform:rotateZ(-324deg)}100%{transform:rotateZ(-324deg);opacity:1}}</style>
</head>
<body>
<div class="loader" id="loader">
  <div class="holder">
  <div class="preloader"><div>
       </div><div>
       </div><div>
       </div><div>
       </div><div>
       </div><div>
       </div><div>
       </div><div>
       </div><div>
       </div><div>
       </div></div>
  </div>
</div>
<emiga::app class="no-js" id="no-js">