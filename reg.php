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
    <input type="submit" value="submit" name="register">

    </form>
<?php
if(isset($_POST['register'])){
    if(empty($_POST['username']) || empty($_POST['email']) ){
        echo "Username and Email are required";
    }

    if(empty($_POST['password'])){
        echo "Password Is required";
    }

    if(($_POST['password']) !== ($_POST['confirm_password']) ){
        echo "Password not match";
    }
   
} else{
    echo "saved succefully!";
}
?>

</body>
</html>