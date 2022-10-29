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
    <input type="text" name="password" ><br><br>
    <label>Confirm Password</label>
    <input type="text" name="confirm_password" ><br><br>
    <input type="submit" value="Register" name="register">

    </form>
<?php
// echo $encpassword;

if(isset($_POST['register'])){
    $username = ($_POST['username']);
    $email = ($_POST['email']);
    $password = ($_POST['password']);
    $encpassword = MD5($password);

    $uppercase = preg_match('@[A-Z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $number = preg_match('@[a-z]@', $password);
    $specialchars = preg_match('@[^\w]@', $password);
    $lent = strlen($password);

    if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) ){
        echo "Username, Email and Password are required";
    }

    if(($_POST['password']) !== ($_POST['confirm_password']) ){
        echo "Password not match";
    }

    // Check Password Strenght  
    if(!$uppercase || !$number || !$lent > 8 || !$specialchars){
        echo "Password must have at least one special character, capital letter, and must be more than 8 characters ";
        exit();
    }      
    else{
        // CHECK IF USER NAME ALREADY EXIST IN DB
        $sqlselect = "SELECT * FROM users WHERE username ='$username'";
        $result = mysqli_query($connect, $sqlselect);
        if(mysqli_num_rows($result) > 0){
            echo "Username already exist";
            exit();
        }

        // CHECK IF USER EMAIL ALREADY EXIST IN DB
        $sqlselect2 = "SELECT * FROM users WHERE email ='$email'";
        $result = mysqli_query($connect, $sqlselect2);
        if(mysqli_num_rows($result) > 0){
            echo "Email already exist";
            exit();
        }

        $query = "INSERT INTO users (username, email, upassword) VALUES('$username', '$email', '$encpassword')";
            mysqli_query($connect, $query);
        // mysqli_free_result($result);
        session_start();
        $_SESSION['username'] = $username;
        header('location: login2.php');
    
        
        
    
    }
}
  
?>

</body>
</html>