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
if(isset($_POST['submit'])){
    $title = ($_POST['title']);
    $amount = ($_POST['amount']);
    
    $file = $_FILES ['pimage'];
    $fileName = $_FILES['pimage']['name'];
    $fileTempName = $_FILES ['pimage']['tmp_name'];
    $fileSize = $_FILES ['pimage']['size'];
    $fileType = $_FILES ['pimage']['type'];
    $fileError = $_FILES ['pimage']['error'];
    $fileid = uniqid();

    $fileExt = explode('.', $fileName);
    $ext = strtolower(end($fileExt));
    $allow = array('png', 'jpg', 'jpeg');
    
    if(in_array($ext, $allow)){
        echo $ext. 'Valid Ext'. '<br>';
        $fileName = $fileid.$fileName;
        $filedestination = 'productsimages/'. $fileName;
        move_uploaded_file($fileTempName, $filedestination);
    }else{
        echo "Invalid extention";
    }
  //  print_r($file);

// Wrte your SQL Query
    $sql = "INSERT INTO products(title, amount, imgname) VALUES ('$title', '$amount', '$fileName')";

        if (mysqli_query($connect, $sql)){
            echo "Save successfully";
        }else{
            echo "query error:". mysqli_error($connect);
        }
    
}
?>

<h1> Products</h1>

<?php
// SELECT QUERY HERE
$xyz = "SELECT * FROM products";
$result = mysqli_query($connect, $xyz);
$sproducts = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php
 foreach($sproducts as $product){ ?>
 <?php
    $filepath2 = $product['imgname'];
    echo '<img src="productsimages/'.$filepath2.'" width="50px">';
    echo $product['title']. ' - ' . $product['amount']; ?>
       
    <a href="product.php?id=<?php echo $product['id']?>">View Product</a>

    <form action="class5.php" method="POST">
        <input type="hidden" name ="pid" value="<?php echo $product['id'] ?>" >
        <input type="submit" value="view Product" name="viewProduct">
    </form>
    <?php
    if(isset($_POST['viewProduct'])){
        session_start();
        $_SESSION['id'] = $_POST['pid'];
        $_SESSION['pid2'] = $product['id'];
        header("location:product.php");
    }
    ?>
    <br>

    <!-- <a href="edit.php?id=<?php //echo $product['id'] ?>"> Edit </a> -->
    <form action="class5.php" method="POST">
        <input type="hidden" name ="title" value="<?php echo $product['id'] ?>" >
        <input type="submit" value="Edite" name="edite">
    </form>
<?php 
    if(isset($_POST['edite'])){
        session_start();
        $_SESSION['id'] = $_POST['title'];
        header("location: edit.php");

       
    }
?>
    <?php echo '<br>'?> 
 <?php } ?>

 <!-- Forech Ends Here -->

<Hr></Hr>

<h1>Add New Product</h1>

<form action="class5.php" method="POST" enctype="multipart/form-data" >
<input type="text" name="title" placeholder="Add product title">
<input type="text" name="amount" placeholder="Add Product Amount">
<label>Upload product</label>
<input type="file" name="pimage" id="pimage">
<input type="submit" name="submit" value="Submit">
</form>



    
</body>
</html>