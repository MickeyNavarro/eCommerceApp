<?php 
//require_once '../../_NavBar.php';
//NO LONGER IN USE
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login and Registration</title>
<link href="https://fonts.googleapis.com/css?family=Vampiro+One" rel="stylesheet">
<style>
body { 
 background-color: white; 
 color: black; 
 font-family: 'Vampiro One', cursive;
}
.login {
 float: left; 
 border: 10px solid white;
 border-radius: 25px;
 height: 450px; 
 width: 255px; 
 padding: 10px;
}
.register {
 float: right;
 border: 10px solid white;
 border-radius: 25px;
 padding: 10px;
 height: 450px; 
 width: 255px; 
}
.forms { 
 margin: auto;
 width: 610px;
 height: 500px; 
 padding: 40px;
 position: relative;
 border: 25px solid #80ffbf;
 border-radius: 50px;
 background-color: white; 
 
}
input {
 border-radius: 5px; 
 font-family: 'Vampiro One', cursive;
}
h1 {
 color:#80ffbf;
}
.btn {
  background-color: #80ffbf;
  color: white;
  border: none;
  cursor: pointer;
}
</style>
</head>
<body>
<br><br><br>
<div class = "forms">
 <div class="login">
<h1>Login Form</h1>
<form action= "/eCommerceApp/Presentation/Process/processLogin.php" method = "POST"> 
	<p>Username: </p><input name="username" type="text" required><br>
	<p>Password: </p><input name = "password" type="password" required><br><br>
	<input name = "login" value="Login" type="submit">
</form>
</div>

<div class="register">
<h1>Registration Form</h1>
<form action="/eCommerceApp/Presentation/Process/processRegistration.php" method="POST">
	<p>First Name: </p><input type ="text" name="firstname" required><br>
	<p>Last Name: </p><input type ="text" name="lastname" required><br>
	<p>Username: </p><input type ="text" name="username" required><br>
	<p>Password: </p><input type ="password" name="password" required><br><br>
	<input type="submit" value="Register">	
</form>
</div>
</div>

</body>
</html>