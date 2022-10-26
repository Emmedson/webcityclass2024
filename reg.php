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

<h1>Register Now</h1>
    <form action="reg.php" method="POST">
        <label>Username</label>
    <input type="text" name="username" > <br><br>
    <label>Email</label>
    <input type="email" name="email" > <br><br>
    <label>Password</label>
    <input type="password" name="password" ><br><br>
    <label>Confirm Password</label>
    <input type="password" name="confirm_password" ><br><br>
    <input type="submit" value="Register" name="register">

    </form>
<?php
// echo $encpassword;

if(isset($_POST['register'])){
    $username = ($_POST['username']);
    $email = ($_POST['email']);
    $password = ($_POST['password']);
    $encpassword = MD5($password);

    if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) ){
        echo "Username, Email and Password are required";
    
    }

    if(($_POST['password']) !== ($_POST['confirm_password']) ){
        echo "Password not match";

    }
   
    else{
        
    $query = "INSERT INTO users (username, email, upassword) VALUES('$username', '$email', '$encpassword')";
    mysqli_query($connect, $query);
        session_start();
        $_SESSION['username'] = $username;
        header('location: login.php');
    }
}
  
?>

</body>
</html>