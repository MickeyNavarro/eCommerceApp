<?php
//eCommerce App Version 1
//Almicke "Mickey" Navarro
//CST236
//November 5, 2018
//This is my own work.
//shows the edit form for a user

require_once '../../Header.php';
require_once '../../Autoloader.php';

//checks if role status is admin (1)
if ($_SESSION['ROLE'] != '1') {
    echo "Please login as an admin<br>";
    exit;
}

//get ID from user admin page
$id = $_POST['id']; 

//create a new instance of the UBS class
$bs = new UserBusinessService(); 

//find the user info by their given id 
$user = $bs->findByID($id); 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit User</title>
<link href="https://fonts.googleapis.com/css?family=Vampiro+One" rel="stylesheet">
<style>
body { 
 background-color: white; 
 color: black; 
 font-family: 'Vampiro One', cursive;
}
.forms { 
 margin: auto;
 height:650px; 
 padding: 40px;
 position: relative;
 border: 15px solid #80ffbf;
 border-radius: 50px;
 background-color: #161616;
 color:white; 
 
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
  color: #161616;
  border: none;
  cursor: pointer;
}
</style>
</head>
<body>
<br><br><br>
<div class = "forms">
 <div class="userSearch">
<h1>Edit User:</h1>
<form action= "/eCommerceApp/Presentation/Process/processUserEdit.php" method = "POST"> 
	<p>ID: </p><input type ="text" name="id" value = "<?php echo $user->getUser_id(); ?>" required><br>
	<p>First Name: </p><input type ="text" name="firstname" value = "<?php echo $user->getFirstname(); ?>" required><br>
	<p>Last Name: </p><input type ="text" name="lastname" value = "<?php echo $user->getLastname(); ?>" required><br>
	<p>Username: </p><input type ="text" name="username" value = "<?php echo $user->getUsername(); ?>" required><br>
	<p>Password: </p><input type ="password" name="password" value = "<?php echo $user->getPassword(); ?>" required><br><br>
	<p>Role: </p><select name="role" value = "<?php echo $user->getRole(); ?>" required>
	<option <?php if ($user->getRole() == 1) { echo "selected = 'selected'"; } ?>>1</option>
	<option <?php if ($user->getRole() == 2) { echo "selected = 'selected'"; } ?>>2</option>
	<option <?php if ($user->getRole() == 3) { echo "selected = 'selected'"; } ?>>3</option>
	<option <?php if ($user->getRole() == 4) { echo "selected = 'selected'"; } ?>>4</option>
	</select>
	<br>
	<br>
	<a class = "btn btn-light btn-lg" href = "/eCommerceApp/Presentation/Show/showUserAdmin.php">Cancel</a>
	<button class = "btn btn-light btn-lg" type="submit">Commit changes</button></form>
</div>
</div>
</body>
</html>