<?php
include('includes/config.php');
if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password= sha1($_POST['password']);
    
$pic=$_FILES["pic"]["name"];
      move_uploaded_file($_FILES["pic"]["tmp_name"],"photos/".$_FILES["pic"]["name"]);
    
$query="insert into librarian (username,email ,password,pic) values(?,?,?,?)";
$stmt = $conn->prepare($query);
$rc=$stmt->bind_param('ssss',$username,$email,$password, $pic);
$stmt->execute();
echo"<script>alert(' Successfully created librarian');</script>";
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
<!-- //lined-icons -->
</head> 
<body>
	<div class="main-wthree" style="background-image:url(../images/counter_background.jpg">
	<div class="container" >
	<div class="sin-w3-agile">
		<h2>Sign In</h2>
		<form  method="post" enctype="multipart/form-data">
			<div class="username">
				<span class="username">Username:</span>
				<input type="text" name="username" class="name" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
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
			<div class="form-group">
        <label for="exampleInputFile">Image:</label>
        <input type="file" name="pic" id="exampleInputFile">
        
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