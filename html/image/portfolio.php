<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Photographer | HTML Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="Photographer html template">
	<meta name="keywords" content="photographer, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon" />

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/magnific-popup.css" />
	<link rel="stylesheet" href="css/slicknav.min.css" />
	<link rel="stylesheet" href="css/owl.carousel.min.css" />
	<link rel="stylesheet" href="css/image.css?v=0.001" />
	<!--Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css?v=1.21112" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</head>

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section  -->
	<header class="header-section" style="background-color:#474747;">
		<a href="index.html" class="site-logo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/McDonald%27s_Golden_Arches.svg/1200px-McDonald%27s_Golden_Arches.svg.png" alt="logo" width="50" height="50"></a>
		<div class="header-controls">
			<button class="nav-switch-btn"><i class="fa fa-bars"></i></button>
		</div>
		<ul class="main-menu">
			<li><a href="index.html">首頁</a></li>
			<li><a href="about.html">關於麥當勞報報</a></li>
			<li><a href="portfolio.php">設定優惠卷</a></li>
		</ul>
	</header>
	<!-- Header section end  -->

	<!-- Portfolio section  -->
	<ul class="portfolio-filter controls text-center">
		<li class="control" data-filter=".G">series G </li>
		<li class="control" data-filter=".S">series S </li>
		<li class="control" data-filter=".Q">series Q </li>

	</ul>

	<form method="post" name="form1" id="form1" action="get_submit.php">

		<!-- <div class="row portfolio-gallery m-0" id="test"></div> -->
		<div class="row portfolio-gallery m-0">
			<?php
			$url = "https://mcdapp1.azureedge.net/";
			$handle = opendir('./image_G/'); //當前目錄
			  while (false !== ($file = readdir($handle))) { //遍歷該php檔案所在目錄
				list($filesname,$kzm)=explode(".",$file);//獲取副檔名
					if($kzm=="gif" or $kzm=="jpg" or $kzm=="JPG") { //檔案過濾
						if (!is_dir('./'.$file)) { //資料夾過濾
							$name = explode(".",$file)[0];
							echo '<div class="mix col-xl-2 col-md-3 col-sm-4 col-6 p-0 G">';
							echo '<input type="checkbox" name="checkbox[]" id="'.$name.'" value="'.$name.'" />';
							echo '<label for="'.$name.'">';
							echo '<img src="'.$url.$name.'.jpg" title="' .$url.$name. '" />';
							echo '</label></input></div>';
						}}}
			?>

			<?php
			$url = "https://mcdapp1.azureedge.net/";
			$handle = opendir('./image_S/'); //當前目錄
			  while (false !== ($file = readdir($handle))) { //遍歷該php檔案所在目錄
				list($filesname,$kzm)=explode(".",$file);//獲取副檔名
					if($kzm=="gif" or $kzm=="jpg" or $kzm=="JPG") { //檔案過濾
						if (!is_dir('./'.$file)) { //資料夾過濾
							$name = explode(".",$file)[0];
							echo '<div class="mix col-xl-2 col-md-3 col-sm-4 col-6 p-0 S">';
							echo '<input type="checkbox" name="checkbox[]" id="'.$name.'" value="'.$name.'" />';
							echo '<label for="'.$name.'">';
							echo '<img src="'.$url.$name.'.jpg" title="' .$url.$name. '" />';
							echo '</label></input></div>';
						}}}
			?>

			<?php
			$url = "https://mcdapp1.azureedge.net/";
			$handle = opendir('./image_Q/'); //當前目錄
			  while (false !== ($file = readdir($handle))) { //遍歷該php檔案所在目錄
				list($filesname,$kzm)=explode(".",$file);//獲取副檔名
					if($kzm=="gif" or $kzm=="jpg" or $kzm=="JPG") { //檔案過濾
						if (!is_dir('./'.$file)) { //資料夾過濾
							$name = explode(".",$file)[0];
							echo '<div class="mix col-xl-2 col-md-3 col-sm-4 col-6 p-0 Q">';
							echo '<input type="checkbox" name="checkbox[]" id="'.$name.'" value="'.$name.'" />';
							echo '<label for="'.$name.'">';
							echo '<img src="'.$url.$name.'.jpg" title="' .$url.$name. '" />';
							echo '</label></input></div>';
						}}}
			?>

		</div>

		<!-- Footer section   -->
		<ul class="navbar">
			<a class="navbar_a"><input type="submit" class="btn btn-default" name="button" id="button" value="設定優惠卷" style="color:white;" /></a>
			<a class="navbar_a"><button type="button" class="btn btn-default" onClick="CleanUp();" style="color:white;">清除勾選</button></a>

			<ul class="copyright_css">
				<div class="row">

					<div class="copyright">
						<a><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/McDonald%27s_Golden_Arches.svg/1200px-McDonald%27s_Golden_Arches.svg.png" alt="logo" width="25" height="25"></a>
						<a>Copyright © McDonald's. All Rights Reserved.</a>
					</div>

				</div>
			</ul>
		</ul>
		<!-- Footer section end  -->

		</from>



		<!--====== Javascripts & Jquery ======
	<script src="js/jquery-3.2.1.min.js"></script>-->
	<script data-ad-client="ca-pub-6399457699832378" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.slicknav.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/circle-progress.min.js"></script>
		<script src="js/mixitup.min.js"></script>
		<script src="js/instafeed.min.js"></script>
		<script src="js/masonry.pkgd.min.js"></script>
		<script src="js/main.js"></script>
		<script src="js/mcbobo-image.js"></script>
</body>

</html>