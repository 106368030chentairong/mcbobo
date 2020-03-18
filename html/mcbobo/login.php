<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	</head>
	<body>
		<?php
		   if ($_GET['message']==1){
		   echo "<span style='color:red;'>Check your input</span>";
		   } 
		?>
		<form method="POST" action="login_php.php">
			請輸入帳號：<input type="text" name="username"/><br>
			請輸入密碼：<input type="Password" name="password"/><br>
			
			<input type="submit" value="登入"/>
		</form>
	</body>
</html>
