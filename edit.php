
<?php
include('connect.php');
session_start();
// echo $_SESSION['id'];
$pid = $_SESSION['id'];
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
<?php

$xyz = "SELECT * FROM products WHERE id = '$pid'";

$result = mysqli_query($connect, $xyz);

$sproduct = mysqli_fetch_assoc($result);

// mysqli_free_result($result);

// mysqli_close($connect);
?>

<div style = "padding: 10%; font-size:14px">

<h1>Edit/update Product </h1>
<?php
$imgname = $sproduct['imgname'];
echo '<img src="productsimages/'.$imgname.'" width="20%">';
?>
<form action="edit.php" method = "POST" enctype="multipart/form-data">
    <!-- <input type="hidden" value="" name="productid"> -->
    <label for="">Product Name</label>
    <input type="text" name="title" value="<?php echo  $sproduct['title']?>"> <br><br>
    <label for="">Price/Amount(Naira)</label>
    <input type="text" name="amount" value="<?php echo  $sproduct['amount']?>"><br><br>
    <input type="file" name="pimage"> <br><br>

    <input type="submit" value="Update" name="update">
</form>

</div>
<?php
if(isset($_POST['update'])){

    $filename = $_FILES['pimage']['name'];
    $tmplocation = $_FILES['pimage']['tmp_name']; 
    $destination = "productsimages/$filename";
    move_uploaded_file ($tmplocation, $destination);  
    
    $title = $_POST['title'];
    $amount = $_POST['amount'];
    
        $sqlupdate = "UPDATE products SET title = '$title', amount = '$amount', imgname ='$filename' WHERE id=$pid";
        if(mysqli_query($connect, $sqlupdate)){
        header("location: edit.php");
        }else{
            echo "Unable to update this record now, please try agian";
        }
    
}
?>    

</body>
</html>