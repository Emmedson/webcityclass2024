<?php
// $con = mysqli_connect('localhost', 'root', '', 'webclass2024');

// SAVE DATA TO DB //
if(isset($_POST['submit'])){
    $username = htmlspecialchars($_POST['yourname']);
    $usernamehas = bin2hex ($username);

    // Upload Form file

    $file = $_FILES['profilepics'];
    $filename = $_FILES['profilepics']['name'];
    $filelocation = $_FILES['profilepics']['tmp_name'];
    $filedestination = 'profilepics/'.$filename;
    move_uploaded_file($filelocation, $filedestination);
    // print_r($file);
   
    // $save = "INSERT INTO userreg(username) VALUES('$username')";
    // $result = mysqli_query($con, $save);
    // header('Location: http://localhost/davidsclass/thanksyou.php/');
}
?>
<!-- End of phph code to send data to DB -->

<!-- Start of HTML Form -->
<html>
    <head>
    <title>Form Submision to DB</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.css">

    </head>

<body>       
    <h1>Create New Product</h1>
    <form action="formindex.php" method="POST" enctype="multipart/form-data" >
        <label>Your Name</label><br/>
        <input type="text" name = "yourname"> <br/>
        <input type="file" name="profilepics" id="userprofile">
        <input type="submit" value="submit" name="submit">
    </form>
    <!-- End of HTML Form -->

<hr>
<hr>

<!-- Start Of PHP Select from DB -->
<!-- <?php
// $readdata = "SELECT * FROM userreg";
// $result = mysqli_query($con, $readdata);
// $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
// mysqli_close($con);
?>
<!-C R U D -->
<h1>
    <!-- <?php //foreach($data as $user){ ?> -->

        <div class="user">
            <img src="non.jpg" alt="">
            <p><?php //echo $user['username'] ?></p> 
        </div>

   <?php //} ?>

</h1> 
<!-- End of Data selection from DB -->


</body>
</html>