<?php
 header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Key");
  function connect()
  {
 $user = "root";
 $pass = "";
 $link = mysqli_connect('localhost',$user,$pass,'test');
 if($link)
 {   
	 return $link;
 }
 else
 {   return 0;
	 exit();
 }
  }
?>