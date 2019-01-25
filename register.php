<?php
	include('connect.php');
       if (isset($_POST['Firstname']) && isset($_POST['Lastname'])){
       
	    $Firstname = $_POST['Firstname'];
		$Lastname = $_POST['Lastname'];
	    $email = $_POST['email'];
        $password = md5($_POST['password']);
		$confirmpassword=$_POST['confirmpassword'];
 
        //$sql= "INSERT INTO registration (FirstName,LastName,Email,Password,ConfirmPass) VALUES ('$_POST[Firstname]', '$_POST[Lastname]', '$_POST[email]','$_POST[password]','$_POST[confirmpassword]')";
        $sql= "INSERT INTO registration (FirstName,LastName,Email,Password) VALUES ('$Firstname', '$Lastname', '$email','$password')";

		$result = mysql_query($sql,$con);
   
	
		if($result){
            echo "Your account is created successfully!";
			
			
        }
		else{
		echo "User Registration Failed";
		die('Error: ' . mysql_error());
		}

	}	
    mysql_close($con)
?>
<!DOCTYPE html>
<html>
<head>
<title>User Registration</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 
<link rel="stylesheet" type="text/css" href="style.css" >
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>

<body>
   <div class="container">
	  <form  action="register.php" class="form-signin" method="POST">
        <h2 class="form-signin-heading">Please Register</h2>
         
	      
	       
	     <input type="text" name="Firstname" class="form-control" placeholder="Firstname" required></br>
	     <input type="text" name="Lastname" class="form-control" placeholder="Lastname" required></br>
		 
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus></br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputPassword" class="sr-only">Confirm Password</label>
        <input type="password" name="confirmpassword" id="inputPassword" class="form-control" placeholder="Confirm Password" required>

		
		<button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
      </form>
    </div>


</body>
</html>