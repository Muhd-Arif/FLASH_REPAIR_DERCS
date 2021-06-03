<?php
require_once '../../../BusinessServiceLayer/controller/customerController.php';
$customer = new customerController();

if(isset($_POST['regs-submit']))
{
	$customer->regsCust();

}
?>
<!DOCTYPE html>
<html>
<head>
<title> Register Customer</title>
<link rel="stylesheet"  href="../../../assets/css/style.css">
<script src="https://kit.fontawesome.com/a81368914c.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<!--  -->
<body>
  <img class="wave" src="../../../uploads/wave.png">

  <form action="" method="POST" enctype="multipart/form-data">
	<div class="loginbox">
		<h1>REGISTER CUSTOMER</h1>
		
    <div class="containar">
	
	<div class="imagefill">
				<img class="imageborder" src="../../../uploads/white.jpg" id="image" name="custImage" alt="white">
				
					<div class="buttonSelect"><button type="button" name="button" onclick="document.getElementById('fileName').click()">Select File
					</button>
					<input type="file" name="photoFile" id="fileName" style="display: none">
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                  <button type="button" name="button" onclick="document.getElementById('uploadFile').click()">Upload Photo</button>
                  <input type='button' id="uploadFile" style="display:none" onclick="return readURL();">
				</div>
				
			</div>

      
			<div class="fillbox1">
				<input type="text" placeholder="Name" name="C_Name" required></div>

			<div class="fillbox1"><input type="email" placeholder="Email" name="C_Mail" required></div>

			<div class="fillbox1"><input type="text" placeholder="No. Phone" name="C_Phone" required></div>

			<div class="fillbox1"><input type="Password" placeholder="Password" name="C_Password" required></div>
      </div>

      <div class="link-register">
      <a href="../../../ApplicationLayer/view/customer/loginCustomer.php">Click to Login</a>
      </div>

      <div class="button">
			<input class="btn" type="submit"  name="regs-submit" value="Register"></div>




	
	</form>
	</div>
<script>
  
  var fileName,input;
  var input = document.getElementById( 'fileName' );
  input.addEventListener( 'change', showFileName );

  function showFileName( event ) {
    // the change event gives us the input it occurred in
   input = event.srcElement;
  // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
   fileName = input.files[0].name;

  document.getElementById( 'photoImage' ).value = fileName ;
  }


    function readURL() {
    if (input.files && input.files[0]) {
    var reader = new FileReader();

      reader.onload = function(e) {
        $('#image').attr('src', e.target.result);
      }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
          }
      }

      function validate(){
        var nme = document.getElementById("fileName");
          if(nme.value.length < 4) {
              alert('Must Select any of your photo for upload!');
              nme.focus();
              return false;
            }
        }


</script> 
</body>
</html>
