<?php
include('connect.php');
session_start();
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
?>

<div style = "padding: 10%; font-size:14px">
 <?php
     $filepath2 = $sproduct['image'];
    echo '<img src="isreal/'.$filepath2.'" width="300px">';
    echo '<br>';
    echo $sproduct['title']. ' - ' . $sproduct['amount'];
?>

<form action="product.php" method="POST" >
        <input type="submit" value="delete" name="delete">
</form>
<?php
if(isset($_POST['delete'])){
    
    $sqldelete = "DELETE FROM products WHERE id=$pid";
    mysqli_query ($connect, $sqldelete);
    header("location: create.php");


}
?>

    

</body>
</html>