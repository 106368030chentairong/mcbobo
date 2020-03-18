<?php 

  if(isset($_POST['checkbox'])){
    $check=$_POST['checkbox'];
    echo "設定".count($check)."張優惠卷 ";
    var_dump($check);
  };

  $json_string = file_get_contents("config.json");
  $data = json_decode($json_string,true);

  $tmp = "";
  $json = '"1": {"coupon_id": 1,"coupon_name": "'.$check[0].'","status": 1,"day": 2},';

  for($i=0 ; $i<count($check)-1; $i++){
    $tmp= $tmp .'"'.($i+1).'": {"coupon_id": '.($i+1).',"coupon_name": "'.$check[$i].'","status": 1,"day": 2},';
  }
  $tmp= $tmp .'"'.(count($check)).'": {"coupon_id": '.(count($check)).',"coupon_name": "'.$check[count($check)-1].'","status": 1,"day": 2}';

  $data["coupon_info"] = json_decode('{'.$tmp.'}');
  file_put_contents("output.json",json_encode($data));//寫入

  //header("location: ./index.php");
  echo "<script>alert('設定成功!');history.back();</script>";
?>
