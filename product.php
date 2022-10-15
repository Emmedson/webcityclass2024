<h1>Single Product Page</h1>


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
<?php
$pid = ($_GET['id']);
$xyz = "SELECT * FROM products WHERE id = '$pid'";

$result = mysqli_query($connect, $xyz);

$sproduct = mysqli_fetch_assoc($result);
?>

<div style = "padding: 10%; font-size:14px">
 <?php
     $filepath2 = $sproduct['imgname'];
    echo '<img src="productsimages/'.$filepath2.'" width="300px">';
    echo '<br>';
    echo $sproduct['title']. ' - ' . $sproduct['amount'];
?>

<form action="product.php" method = "POST">
    <input type="hidden" value="<?php echo $pid ?>" name="productid">
    <input type="submit" value="delete" name="delete">
</form>

</div>
<?php
if(isset($_POST['delete'])){
    $pid = $_POST['productid'];
    $sqldelete = "DELETE FROM products WHERE id=$pid";
    if(mysqli_query($connect, $sqldelete)){
    header("location: class5.php");
    }else{
        echo "Unable to delete this record now, please try agian";
    }
}
?>
    

</body>
</html>