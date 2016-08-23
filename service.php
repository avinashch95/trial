<?php
include "db_connect.php";
$link = connect();
header("Access-Control-Allow-Origin: *");

 if(isset($_POST['submitKey']))
 { 
   	$uid = $_POST['uid'];
   	$pubKey = $_POST['pubKey'];
    $query1 = mysqli_query($link,"delete from pubKeys where uid = '".$uid."'");
	$query1 = mysqli_query($link,"insert into pubKeys (uid,pub_key) values('".$uid."','".$pubKey."')");
	$msg = "OK";

}
if(isset($msg))
{
	   echo '<div class="container"><h3>'.$msg.'</h3></div>';
}
   

?>
