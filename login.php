<?php
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="login.php" method="POST">
    <label for="">Username</label>
    <input type="text" name="username" id="">
    <label for="">Password</label>
    <input type="password" name="password" id="">
    <input type="submit" value="Login" name="login">
</form>
</body>
</html>


<?php
// LOGIN USER
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($connect,$_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    if (empty($username)) {
        echo "Username is required";
        exit();
    }
    if (empty($password)) {
        echo "Password is required";
        exit();
    }

        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND upassword='$password'";
        $results = mysqli_query($connect, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: adminpage.php');
        }else {
            echo "Wrong username/password combination";
        }
    }

  
  ?>