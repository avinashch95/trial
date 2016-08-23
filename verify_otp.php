<!DOCTYPE html>
<?php
include "db_connect.php";
$link = connect();

session_start();
?>
<head>
<title> update keys </title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		
	</head>


<header id="header" class="skels-layers-fixed">
				<h1><strong><a href="https://www.flock.co"><img style="max-width:148px;margin-left: 0px; margin-top:20px" src="https://www.flock.co/img/flock-logo-55dcf4dc.png"></a></strong></h1>
				<nav id="nav">
					<ul>
						<li><a href="update_keys.php">Update Keys</a></li>
					</ul>
				</nav>
</header>



<body>

<div class='container bg-1'>
<div >
	<div class='col-sm-offset-3'><br>
 		<h2> Enter OTP </h2>
 	</div>
</div>
</div>

<div class = 'container bg-2'>
	<div class='jumbotron'>

<form role = "form" name="otp verify" id="keyform" method="POST" action="" class="form-horizontal">
<h4>
<div id="formdiv" >



	 <div id="inputbox">
		<label for="pvtKey">Enter OTP</label>
	 <input type="password" id="otp" name="otp" class="box" required>
	 </div>
	 

	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-10">
			<br>
			<button type="submit" name="submit"  class="button" >Update</button>
		</div>
	</div>
	</h4>
   </form>
   </div>
   
   </div>   
   </div>   
   <script src='./js/jquery-2.1.4.min.js'></script>
   <script src='./js/bootstrap.min.js'></script>
   
</body>

</html>




<?php

 if(isset($_POST['submit']))
 { 
	$otp_orig = $_SESSION['otp'];
    $otp_entered = $_POST['otp'];
	
    if(strcmp($otp_entered,$otp_orig)!=0)
   {
	   $msg = "OTP Did not not Match";
   }
   else
   {
	   
	   $query1 = mysqli_query($link,"insert into pub_keys (e_id,pub_key,name) values('".$_SESSION['e_id']."','".$_SESSION['pubKey']."','".$_SESSION['name']."')");
       $msg = "Keys Updated";
       header('refresh:1;url=update_keys.php');
   }
	   
   }
   if(isset($msg))
   {
	   echo '<div class="container"><h3>'.$msg.'</h3></div>';
   }

?>
