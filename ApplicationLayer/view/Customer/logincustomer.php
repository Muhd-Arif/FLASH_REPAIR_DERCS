<?php
require_once '../../../BusinessServiceLayer/controller/customerController.php';
$customer = new customerController();

if(isset($_POST['login-submit']))
{
	$customer = $customer->loginCust();
	  

}
?>

<!DOCTYPE html>
<html>

<head>

    <title> Log-in Customer</title>
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <img class="wave" src="../../../uploads/wave.png">

    <form action="#" method="POST">
        <div class="loginbox">
            <img class="img" src="../../../uploads/avatar.svg">
            <h2 class="title">LOGIN CUSTOMER</h2>

            <div class="containar">
                <div class="fillbox">
                    <i class="fas fa-user"></i>
                    <input type="email" placeholder="Email" name="C_Email">
                </div>


                <div class="fillbox">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="C_Password">
                </div>
            </div>
            <div class="link-register">
                <a href="../../../ApplicationLayer/view/customer/registerCustomer.php">Click to register</a>
            </div>

            <div class="button">
                <input class="btn" type="submit" name="login-submit" value="Login">
            </div>



    </form>
    </div>


</body>

</html>