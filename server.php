<?php
// Database Connection
include('connect.php')
?>

<?php

// User Registration 
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



        //   while($age = 20){
            
        //     echo "hello"; 
        //     $age++;
        //   }
        
        
        
    
    }
}

?>


<?php

// User Login 

?>