<?php 
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//December 10, 2018
//This is my own work.

require_once '../../Header.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Home</title>
<link href="https://fonts.googleapis.com/css?family=Vampiro+One" rel="stylesheet">
<link href="/eCommerceApp/Style.css/" rel="stylesheet">
<style>
body { 
 background-color: white; 
 color: black; 
 font-family: 'Vampiro One', cursive;
}
.forms { 
 margin: auto;
 height: 500px; 
 padding: 40px;
 position: relative;
 background-color: #161616;
 color:white; 
 
}
.login {
 float: left; 
 padding: 10px;
 width:50%; 
}
.register {
 float: right;
 padding: 10px;
 width: 50%; 
}
input {
 border-radius: 5px; 
 font-family: 'Vampiro One', cursive;
 width:100%;
}
h1 {
 color:#80ffbf;
 
}
h2 { 
  color:black; 
}
.btn {
  background-color: #161616;
  color: white;
  border: none;
  cursor: pointer;
}
</style>
</head>
<body>
<br><br><br>
<?php 
if (isset($_SESSION['loginpopup'])) {
    if ($_SESSION['loginpopup'] == "2" && !$_SESSION['loginpopup'] == NULL) {
        //echo out the login error
        echo "<div class='alert alert-danger' role='alert'>Invalid username and/or password!</div>";
        //unset the session variable so that the danger div will not stay if the page is refreshed
        unset($_SESSION['loginpopup']); 
    }
    else {
        //echo to the user that they are now logged in 
        echo "<div class='alert alert-success' role='alert'>You are now logged in!</div>";
        //unset the session variable so that the div will not stay if the page is refreshed
        unset($_SESSION['loginpopup']); 
    }
}

if (isset($_SESSION['registerpopup'])) {
    if ($_SESSION['registerpopup'] == "2" && !$_SESSION['registerpopup'] == NULL) {
        //echo out the register error
        echo "<div class='alert alert-danger' role='alert'>Error! Account was not created.</div>";
        //unset the session variable so that the danger div will not stay if the page is refreshed
        unset($_SESSION['registerpopup']);
    }
    else {
        //echo to the user that they are now registered
        echo "<div class='alert alert-success' role='alert'>Hooray! You have created an account! Please login below!</div>";
        //unset the session variable so that the div will not stay if the page is refreshed
        unset($_SESSION['registerpopup']);
    }
}

if (isset($_SESSION['logoutpopup'])) {
    if ($_SESSION['logoutpopup'] == "2") {
        //echo out the login error
        echo "<div class='alert alert-warning' role='alert'>You have logged out!</div>";
        //unset the session variable so that the danger div will not stay if the page is refreshed
        unset($_SESSION['logoutpopup']);
    }
}
?>
<div class="jumbotron" style = "background-color:#80ffbf; text-align: center; ">
  <h2>Welcome to Luminous Lights</h2>
      <p> </p>
      <i class = "fa fa-lightbulb-o"></i>
      <i class = "fa fa-lightbulb-o"></i>
      <i class = "fa fa-lightbulb-o"></i>
      <p> </p>
  <p><a class="btn btn-light btn-lg" href="/eCommerceApp/Presentation/Show/showAllProducts.php" role="button" style = "width:10%;">Shop</a></p>
</div>

<!-- Hidden login/registration form ; if user is logged in, the form will not show-->
<?php 
if (!isset($_SESSION['ID'])) {
?>
<div id="partial">
<div class = "forms">

<div class="login">
<h1>Login</h1>
<form action= "/eCommerceApp/Presentation/Process/processLogin.php" method = "POST"> 
	<p>Username: </p><input name="username" type="text" required><br>
	<p>Password: </p><input name = "password" type="password" required><br><br>
	<input class="btn btn-light btn-lg" name = "login" value="Login" type="submit" style = "background-color:#80ffbf;">
</form>
</div>

<div class="register">
<h1>Register</h1>
<form action="/eCommerceApp/Presentation/Process/processRegistration.php" method="POST">
	<p>First Name: </p><input type ="text" name="firstname" required><br>
	<p>Last Name: </p><input type ="text" name="lastname" required><br>
	<p>Username: </p><input type ="text" name="username" required><br>
	<p>Password: </p><input type ="password" name="password" required><br><br>
	<input class="btn btn-light btn-lg" type="submit" value="Register" style = "background-color:#80ffbf;">	
</form>
</div>

</div>
</div>
<?php 
}
?>

