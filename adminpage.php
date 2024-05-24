<?php 


session_start();

if (!isset($_SESSION['username'])) {
    echo "You must log in first to access this page";
    echo '<a href="login.php">Login</a>'; 
    exit();
    //header('location: login2.php'); == !=
}
$username = $_SESSION['username'];
$welcomemsg = $_SESSION['success'];

if (isset($_POST['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Hello <?php echo $username?> ! </h1>
    <h3><?php echo $welcomemsg ?></h3>
    <form action="adminpage.php" method="POST">
        <input type="submit" value="Logout" name="logout">
    </form>


</body>
</html>