<?php

session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=sha1($_POST['password']);
$stmt=$conn->prepare("SELECT email,password,userid FROM librarian WHERE email=? and password=? ");
				$stmt->bind_param('ss',$email,$password);
				$stmt->execute();
				$stmt -> bind_result($email,$password,$userid);
				$rs=$stmt->fetch();
			
				if($rs)
				{  
          $_SESSION['userid']=$userid;

					header("location:index.php");
				}

				else
				{
					echo "<script>alert('Access Denied Please Check Your username and password again');</script>";
				}
			}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Login::: </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="css/jquery-ui.css"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<link rel="icon" type="image/png" href="../images/favicon-96x96.png" />
<!-- //lined-icons -->
</head> 
<body>
	<div class="main-wthree" style="background-image:url(../images/counter_background.jpg">
	<div class="container" >
	<div class="sin-w3-agile">
		<h2>Sign In</h2>
		<form  method="post" enctype="multipart/form-data">
			
			<div class="username">
				<span class="username">E-mail address:</span>
				<input type="text" name="email" class="name" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Password:</span>
				<input type="password" name="password" class="password" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			
			
			<div class="login-w3">
					<input type="submit" name="login" class="login" value="Sign In">
			</div>
			<div class="clearfix"></div>
		</form>
				<div class="back">
					<a href="../index.php">Back to home</a>
				</div>
				<div class="footer">
					<p>&copy; <script>document.write(new Date().getFullYear());</script>  . All Rights Reserved | Design by <a href="https://kilonzowambua.github.io">Booker</a></p>
				</div>
	
	</div>
	</div>
</body>
</html>