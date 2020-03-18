<!DOCTYPE html>
<html>
<body>
<?php
	session_start();
	if (isset($_SESSION['id'])){
		require("conn_mysql.php");
	}else{
		header('Content-Type: text/html; charset=utf-8');
		$username=$_POST['username'];
		$password=$_POST['password'];
		require("conn_mysql.php");
		$sql_query_login="SELECT * FROM account where username='$username' AND password='$password'";
		$result1=mysqli_query($db_link,$sql_query_login) or die("查詢失敗");
	}
?>

<input type="button" value="登出" onclick="location.href='logout.php'">
<input type="button" value="設定優惠卷" onclick="location.href='../image/index.php'">

<table border=1 width=400 cellpadding=5>
<tr>
	<td>user_ID</td>
	<td>coupon_id</td>
	<td>coupon_name</td>
	<td>status</td>
	<td>day</td>
</tr>

<?php
	if(isset($result1)){
		$ID = mysqli_fetch_array($result1)[0];
        $_SESSION['id'] = $ID;
		$sql_query="SELECT * FROM user WHERE user_ID =".$ID;
		$result=mysqli_query($db_link,$sql_query);
		
		while($row=mysqli_fetch_array($result)){
			echo "<tr>
				<td>$row[0]</td>
				<td>$row[1]</td>
				<td>$row[2]</td>
				<td>$row[3]</td>
                <td>$row[4]</td>
			    </tr>";
		}
		echo"</table>";
	}

	if(isset($_SESSION['id'])){
		$sql_query="SELECT * FROM user WHERE user_ID = ".$_SESSION['id'];
		$result=mysqli_query($db_link,$sql_query);
		
		while($row=mysqli_fetch_array($result)){
			echo "<tr>
				<td>$row[0]</td>
				<td>$row[1]</td>
				<td>$row[2]</td>
				<td>$row[3]</td>
                <td>$row[4]</td>
			    </tr>";
		}
		echo"</table>";

	}
		#}else{
	#	header("location: ./login.php?message=1");
	#	exit();
	#}

?>
</body>
</html>