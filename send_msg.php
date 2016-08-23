<?php
include "db_connect.php";
$link = connect();
$msgJson = $_POST['message'];
$uid = $_POST['uid'];
header("Access-Control-Allow-Origin: *");
$query1 = mysqli_query($link,"select utoken from userToken where uid = '".$uid."'");
$res = mysqli_fetch_array($query1);
$userToken = $res['utoken'];

$ch = curl_init("https://api.flock-staging.co/v1/chat.sendMessage");

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$msgJson);  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = array();
$headers[] = 'X-Flock-User-Token: '.$userToken;

$headers[] = 'Content-Type: application/json';

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$server_output = curl_exec ($ch);

curl_close ($ch);

print  $server_output ;




?>