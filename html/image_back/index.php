<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="Image.css?version=1.0"/>
	<!--JQuery-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<!--Image JS
  <script type="text/javascript" src="Image.js?version=0.2"></script>
  -->

  <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
  <META HTTP-EQUIV="EXPIRES" CONTENT="0">
  <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">

</head>
<body>
<?php
        session_start();
        var_dump($_SESSION['id'])
?>
<form method="post" name="form1" id="form1" action="get_submit.php">
  <p>
    <input type="submit" name="button" id="button" value="送出" />
  </p>
  <input type ="button" onclick="location.href='../mcbobo/login_php.php'" value="回到上一頁">
  
  <ul class="show">
  <li><input type="checkbox" name="checkbox[]" id="P_G226"  value="P_G226" /><label for="P_G226"><img src="https://mcdapp1.azureedge.net/P_G226.jpg" /></label></li>
  <li><input type="checkbox" name="checkbox[]" id="P_S037"  value="P_S037" /><label for="P_S037"><img src="https://mcdapp1.azureedge.net/P_S037.jpg" /></label></li>
  <li><input type="checkbox" name="checkbox[]" id="P_G52001"  value="P_G52001" /><label for="P_G52001"><img src="https://mcdapp1.azureedge.net/P_G52001.jpg" /></label></li>
  <li><input type="checkbox" name="checkbox[]" id="P_G051"  value="P_G051" /><label for="P_G051"><img src="https://mcdapp1.azureedge.net/P_G051.jpg" /></label></li>

  <?php
  $url = "https://mcdapp1.azureedge.net/";
  $handle = opendir('./image/'); //當前目錄
    while (false !== ($file = readdir($handle))) { //遍歷該php檔案所在目錄
      list($filesname,$kzm)=explode(".",$file);//獲取副檔名
        if($kzm=="gif" or $kzm=="jpg" or $kzm=="JPG") { //檔案過濾
          if (!is_dir('./'.$file)) { //資料夾過濾
            //echo explode(".",$file)[0];
            $name = explode(".",$file)[0];
            echo '<li><input type="checkbox" name="checkbox[]" id="'.$name.'"  value="'.$name.'" /><label for="'.$name.'"><img src="'.$url.$name.'.jpg" /></label></li>';
           }
          }
    }
  ?>

  </ul>
</from>

</body>
</html>
