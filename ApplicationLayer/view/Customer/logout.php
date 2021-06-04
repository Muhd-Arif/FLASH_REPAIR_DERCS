<?php
/*
Filename: logout.php
Purpose: To logout from the website and destroy the self identity.
*/
//Start session
session_start();

//Unset the variables stored in session
session_destroy();
header("location: login.php");
?>

