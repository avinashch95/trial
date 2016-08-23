<?php
include "db_connect.php";
$link = connect();
header("Access-Control-Allow-Origin: *");

$jdata =  file_get_contents('php://input');
// $jdata = str_replace("name",'"name"',$jdata);
// $jdata = str_replace("userId",'"userId"',$jdata);
// $jdata = str_replace("userToken",'"userToken"',$jdata);
$data = json_decode($jdata,true);
$namei =  $data['name'];
$uid =  $data['userId'];
$utoken = $data['userToken'];
if($namei=="app.install")
$query1 = mysqli_query($link,"insert into userToken (uid,utoken) values('".$uid."','".$utoken."')");
$msg = "OK";
if(isset($msg))
{
	echo '<div class="container"><h3>'.$msg.$uid.'</h3></div>';
}

?>
