<?php
include('connect.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="regform">
	<h2>Registeration Form</h2>
  <form method="POST" action="register.php">
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>

  </div>

<?php
// initializing variables
$username = "";
$email    = "";
$errors = array(); 


// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = ($_POST ['username']);
  $email = ($_POST['email']);
  $password_1 = ($_POST['password_1']);
  $password_2 = ($_POST['password_2']);

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $sqlreg = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($connect, $sqlreg);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if (strtolower($user['username']) === strtolower($username)) {
      echo ("Username already exists");
	  exit();
    }

    if ($user['email'] === $email) {
      echo ("email already exists");
	  exit();

    }
  }

  
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";
  	mysqli_query($connect, $query);
	session_start();
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in to the Admin Dashboard";
  	header('location: adminpage.php');
  }
}
?>

</body>
</html>