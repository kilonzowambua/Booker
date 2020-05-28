
<!DOCTYPE HTML>
<html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</head>
<body id="login">
  <div class="login-logo">
   
  </div>
  <h2 class="form-heading">login</h2>
  <div class="app-cam">
	  <form method="post" enctype='multipart/form-data' >
	 
    <input type="text" name="email" class="email" value="E-mail address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';}">
		<input type="password" name="password" value="Password" >
		<div class="submit">
      <input type="submit" name="login" value="Login"></div>
	
		<ul class="new">
		
			<div class="clearfix"></div>
		</ul>
	</form>
   <?php
include('includes/config.php');
session_start();

if(isset($_POST['login']))
{
$email=$_POST['email'];
$password = sha1(md5($_POST['password']));
$stmt=$conn->prepare("SELECT email,password,lid FROM learner WHERE email=? and password=? ");
				$stmt->bind_param('ss',$email,$password);
				$stmt->execute();
				$stmt -> bind_result($email,$password,$lid);
				$rs=$stmt->fetch();
			
				if($rs)
				{  
          $_SESSION['lid']=$lid;

					header("location:index.php");
            }
				else
				{
               echo "<script>
               Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: ' wrong crenditional!',
                  footer: '<a href=../index.php>Or Are your new learner?</a>'
                });</script>";
				}
			}
?>
  </div>
   <div class="copy_layout login">
      <p>Copyright &copy; <?php echo date("y"); ?> Booker. All Rights Reserved | Design by <a href="http://kilonzowambua.github.io" target="_blank">  Kilodev</a> </p>
   </div>
</body>
</html>
