<?php
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div style="padding:100px">
        <form action="login2.php" method="POST">
            <label for="">Username</label>
            <input type="text" name="username"> <br><br>
            <label for="">Password</label>
            <input type="password" name="password"> <br><br>
            <input type="submit" value="Login" name="login">
        </form>
    </div>

<?php
if(isset($_POST['login'])){

    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    if(empty($username) || empty($password)){
        echo "Username and Password is required";
    } else{
        $encpassword = md5($password);
        $query = " SELECT * FROM users WHERE username = '$username' AND upassword = '$encpassword'";
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) == 1) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: adminpage.php');
        }else{
            echo "invalid credentials";
        }
    }
}

?>
</body>
</html>