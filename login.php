<?php
session_start();
ob_start();
include("connect.php"); 
$db = mysqli_connect("localhost","root","","new_db");



if(isset($_POST['login'])){

   $email = $_POST['email'];
   $password = $_POST['password'];
  
    
 
$result = mysql_query("SELECT * FROM registration WHERE Email = '$email' AND Password = '$password' ");
 while($row = mysql_fetch_array($result)){
	 
 if($email==$row['Email'] && $password==$row['Password']){
        
       $_SESSION['message'] = " You are now logged in. ";
	   $_SESSION['email'] = $email;	
       	   
	   if(isset($_POST['remember'])){
				setcookie('email',$email,time()+60*60*24*7);
				setcookie('password',$password,time()+60*60*24*7);
			}	
     
		header('Location: welcome.php');
	 
     
	 
 }
    
 }

 
  $error = '<div style="color: red;font-size: 18px;position: absolute;top:60px;left:350px;">Wrong Email id or password!   Try Again</div>';
	 echo $error;
     
	 
    
}


?>

<html>
<head>
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

<title>User Login</title>
<link href="https://fonts.googleapis.com/css?family=PT+Sans|Ubuntu:400,500" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style3.css" >
</head>

<body>
 <div class="wrapper">
 <!--<div class="right">-->
 <div class="background">
      <div class="right">
        <h2 class="back-header">Don't have an account yet?</h2>
        <p class="back-p"><!--<a href="regi.php">click here </a> -->create an account!</p>
        
		<button id="myButton" class="back-btn signup-but">SIGN UP</button>
		<script type="text/javascript">
        document.getElementById("myButton").onclick = function () {
        location.href = "regi.php";
    };
</script>
        
		
	  </div>
	 </div>
   
   <form action="login.php" onsubmit="return validate_form(this);"class="form-sign-in"  method="post">
	<div class="form-container-a">
	
	<div class="login">
      <h2 class="form-header">LOGIN</h2>
        <input type="text" name="email" placeholder="Email"required><i class="fa fa-envelope-o"></i></input>
        <input type="password" name="password" placeholder="Password"required><i class="fa fa-lock"></i></input>
		
        <button class="form-btn" type="submit" name="login" >LOGIN</button>
		<input type="checkbox" name="remember" value="1" ></input>
		<p style="margin-left: 130px;margin-top: -27px;">Remember Me</p>
        <a class="forgot" href="#">Forgot password?</a>
		 
		
        
      
	  
		
	  
      
    </div>
	
	   
      
   </div>
  </form>
  </div>
 </div>
</body>
</html>