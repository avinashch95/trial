<?php
include "db_connect.php";
$link = connect();
$uid = $_GET['uid'];
$result = mysqli_query($link,"select * from pubKeys where uid = '".$uid."'");
for ($i=0;$i<mysqli_num_rows($result);$i++) {
    echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
}
?>