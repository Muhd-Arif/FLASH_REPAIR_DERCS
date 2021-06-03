<?php
require_once '../../../BusinessServiceLayer/controller/adminController.php';
$admin = new adminController();

if(isset($_POST['login-submit']))
{
	$admin->loginAdmin();

}
?>

<!DOCTYPE html>
<html>

<head>

<title> Log-in Admin</title>
<link rel="stylesheet"  href="../../../assets/css/style.css">
<script src="https://kit.fontawesome.com/a81368914c.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

	
</head>

<body>
	<img class="wave" src="../../../uploads/wave.png">

	<form action="#" method="POST">
	<div class="loginbox">
		<img class="img" src="../../../uploads/avatar.svg">
		<h2 class="title">LOGIN ADMIN</h2>
	
	<div class="containar">
	<div class="fillbox" >
		<i class="fas fa-user"></i>
		<input  type="email" placeholder="Email" name="S_Mail">
	</div>
	   
  
  	<div class="fillbox">
		<i class="fas fa-lock"></i>
		<input type="password" placeholder="Password" name="S_Password">
	</div>
	</div>

    <div class="button">
    	<input class="btn" type="submit"  name="login-submit"  value="Login">
	</div>
	

	</form>
	</div>





</body>
</html>