<!DOCTYPE html>
<?php
session_start();
session_destroy();
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
 		<h2> Update Keys </h2>
 	</div>
</div>
</div>

<div class = 'container bg-2'>
	<div class='jumbotron'>

<form role = "form" name="new_keys" id="keyform" method="POST" action="" class="form-horizontal">
<h4>
<div id="formdiv" >
	 
	 
<div id="input-group" class="form-group">
		<label for="fname" class="control-label col-md-3"><br>Name</label>
		<div class="col-md-6">
			<div class="input-group">
     <input type="text" id="name" name="name"  class="form-control"  required>
	 </div>
	 <br>

	 <div id="input-group" class="form-group">
		<label for="eid" class="control-label col-md-3"><br>E-mail</label>
		<div class="col-md-6">
			<div class="input-group">
				 <input type="text"  id="eid" name="e_id"  class="form-control"  required>
			 </div>
		 </div>
	 </div>
	 <br>

	 <div id="inputbox">
		<label for="pvtKey">Enter Private Key (not stored on our servers :P)</label>
	 <input type="password" id="pvtKey" name="pvtKey" class="box" required>
	 </div>
	 <div id="inputbox">
		<label for="pubKey">Enter Public Key</label>
	 <input type="password" id="pubKey" name="pubKey" class="box" required>
	 </div>
	 

	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-10">
			<br>
			<button type="submit" name="submit"  class="button" >CONTINUE</button>
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
   	$eid = $_POST['e_id'];
	$pvtKey = $_POST['pvtKey'];
   	$pubKey = $_POST['pubKey'];
	$otp = md5($eid+$pubKey);
	$name = $_POST['name'];
	
	if(!preg_match("/^[A-Za-z ]+$/",$name))
    {
		$msg = "Invalid Name"; 
	}	
   else if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$eid))
   {
	   $msg = "Invalid E-mail Id";
	   echo $eid;
   }
  
   else
   {
	   $_SESSION['e_id'] = $eid;
	   $_SESSION['pubKey'] = $pubKey;
	   $_SESSION['name'] = $name;
	   $_SESSION['otp'] = $otp;
	   include "send_mail.php";
	   header('refresh:1;url=verify_otp.php');
   }
	   
   }
   if(isset($msg))
   {
	   echo '<div class="container"><h3>'.$msg.'</h3></div>';
   }

?>
