<?php
	include('connect.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
       
	 if ($_POST['password'] == $_POST['confirmpassword']) {
		   $Firstname = $_POST['Firstname'];
		   $Lastname = $_POST['Lastname'];
	       $email = $_POST['email'];
           $password = ($_POST['password']);
		   $confirmpassword=$_POST['confirmpassword'];
		   $age=$_POST['age'];
		   $phone=$_POST['phone'];
 
            $sql= "INSERT INTO registration (FirstName,LastName,Email,Password,Age,Mobile) VALUES ('$Firstname', '$Lastname', '$email','$password','$age','$phone')";

		    $result = mysql_query($sql,$con);
   
	
		if($result){
            
			//$success= '<div style="color: red;font-size: 18px;position: absolute;top:60px;left:350px;">Your account is created successfully! Please login</div>';
			//echo $success;
            
          
			  
            //echo '<div id="DIV_1"> <div id="DIV_2"> Your email preferences have been updated</div></div>';
			
			//echo '<div id="success-body"><div id="success-box"><h1>Congratulations!</h1><h3>Your account has been created successfully!</h3><i id="check" class="fa fa-check-circle" aria-hidden="true"></i><a href="ne.html" class="button"> OKAY</a> ';      	
          
		  //echo '<script type="text/javascript"> function myFunc(){alert("I am  alert!");} </script> ';
		  //echo $success;
		 /* echo  '   <div id="somedialog" class="dialog">
					<div class="dialog__overlay"></div>
					<div class="dialog__content">
						<h2><strong>Hello</strong>, I am sticky modal</h2>
						<div>
						<button class="action btn btn-lg btn-danger" data-dialog-close>Close</button>
						</div>
					</div>
				</div> 
				<script src="js/classie.js"></script>
		<script src="js/dialogFx.js"></script>
		<script>
			(function() {

				var dlgtrigger = document.querySelector( "[data-dialog]" ),
					somedialog = document.getElementById( dlgtrigger.getAttribute( "data-dialog" ) ),
					dlg = new DialogFx( somedialog );

				dlgtrigger.addEventListener( "click", dlg.toggle.bind(dlg));



			})();
		</script> ';*/
		
		echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Congratulations!","Your account has been created successfully!","success");';
        echo '}, 1000);</script>';
		
		
		}
		else{
		$fail='<div style="color: red;font-size: 18px;position: absolute;top:80px;left:350px;">User Registration Failed</div>';
		echo $fail;
		die('Error: ' . mysql_error());
		}

	}
   else{
     $error = '<div style="color: red;font-size: 18px;position: absolute;top:60px;left:350px;">Passwords do not match!   Try Again</div>';
	 echo $error;
	 //echo "";
     //$_SESSION['message'] = 'Two passwords do not match!';
   }  	   
 }	
    mysql_close($con)
?>
<!DOCTYPE html>
<html>
<head>
<title>User Registration</title>
<script src="sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert.css">
<link href="https://fonts.googleapis.com/css?family=PT+Sans|Ubuntu:400,500" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style3.css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/dialog.css" />
		<!-- individual effect -->
		<link rel="stylesheet" type="text/css" href="css/dialog-ken.css" />
		<script src="js/modernizr.custom.js"></script>
</head>
<script type="text/javascript">

function validate_email(field,alerttxt)
{
with (field)
  {
  apos=value.indexOf("@");
  dotpos=value.lastIndexOf(".");
  if (apos<1||dotpos-apos<2)
    {alert(alerttxt);return false;}
  else {return true;}
  }
}

function validate_form(thisform)
{
with (thisform)
  {
  if (validate_email(email,"Not a valid e-mail address!")==false)
    {email.focus();return false;}
  }
}


</script>





<body>
<div class="wrapper">
    <div class="background">
      <div class="right">
        <h2 class="back-header">already have an account??</h2>
        <p class="back-p">get yourself logged in</p>
        <!--<button class="back-btn signup-but" ></button>-->
        <button id="myButton" class="back-btn signup-but">LOGIN</button>
		<script type="text/javascript">
        document.getElementById("myButton").onclick = function () {
        location.href = "login.php";
    };

</script>



	  </div>
	 </div>
    
	
	<form  onsubmit="return validate_form(this);"class="form-sign-up"   method="post">
	<div class="form-container">
      
	  <div class="sign-up">
	  
        <h2 class="form-header">SIGN UP</h2>
		
        
		<input type="text" name="Firstname" placeholder="First Name" required> <i class="fa fa-user"></i> </input>
         <input type="text" name="Lastname" placeholder="Last Name" required ><i class="fa fa-user"></i> </input>
		<input type="text" name="email" placeholder="Email" required ><i class="fa fa-envelope-o"></i> </input>
        <input type="password" name="password" placeholder="Password" autocomplete="new-password" required ><i class="fa fa-lock"></i></input>
        <input type="password" name="confirmpassword" placeholder="Confirm Password" autocomplete="new-password" required> <i class="fa fa-lock"></i></input>
		<input type="text" name="age" placeholder="Age" required> <i class="fa fa-birthday-cake "></i> </input>
		<input type="text" name="phone" placeholder="Mobile No" required> <i class="fa fa-mobile-phone "></i> </input>
        <button  data-dialog="somedialog" class="form-btn" type="submit"  >SIGN UP</button>

		</div>
		
	  
      
    </div>
	</form>
  </div>

 </body>



</html>