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

   // Fetch File Data 
    $filedata = ($_FILES['pimage']);
    $fileName = ($_FILES['pimage']['name']);
    $fileType = ($_FILES['pimage']['type']);
    $tempName = ($_FILES['pimage']['tmp_name']);
    $error = ($_FILES['pimage']['error']);
    $fileid = uniqid();

    // Get File extension and validate
    $fileext = explode('.', $fileName);
    $ext = strtolower(end($fileext));
    $allowedExt = array('png','jpg','jpeg','web');

    // 
    if(in_array($ext, $allowedExt)){
        $fileName = $fileid.$fileName;
        $fileDestination ='newimage/'.$fileName;
        move_uploaded_file($tempName, $fileDestination);
    }else{
        echo "Invalid File Extension";
    }
  






    

// Wrte your SQL Query
    $sql = "INSERT INTO products(title, amount, imgname) VALUES ('$title', '$amount', '$fileName')";

        if (mysqli_query($connect, $sql)){
            echo "Save successfully";
        }else{
            echo "query error:". mysqli_error($connect);
        }
}
?>

<?php
// SELECT QUERY HE
$xyz = "SELECT * FROM products";
$result = mysqli_query($connect, $xyz);
$sproducts = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<h1> Welcome to Oshodi Market</h1>
<div class="products">

    <div class="product1">   
    <img src="productimages/children.jpg" alt="">
    <h3>Rice</h3>
    <h4>Price N38,000</h4>
    </div>

    <div class="product1">   
    <img src="productimages/children.jpg" alt="">
    <h3>Beans</h3>
    <h4>Price N38,000</h4>
    </div>

    <div class="product1">   
    <img src="productimages/children.jpg" alt="">
    <h3>Garri</h3>
    <h4>Price N38,000</h4>
    </div>

</div>

<?php
 foreach($sproducts as $product){ ?>
 <?php
 $filepath = $product['imgname'];
 
 echo '<img src="newimage/'.$filepath.'" width="80px">';
    echo $product['title']. ' - ' . $product['amount'];?>
    <!-- <a href="product.php?id=<?php //echo $product['id'] ?>">View Product</a> -->
    <?php echo '<br>'?> 
 <?php } 
 // SELECT AND LISTING QUERY STOPS HERE
 ?>

<Hr></Hr>

<h1>Add New Product</h1>

<form action="classwork.php" method="POST" enctype="multipart/form-data" >
<input type="text" name="title" placeholder="Add product title">
<input type="text" name="amount" placeholder="Add Product Amount">
<label>Choose Product Image</label>
<input type="file" name="pimage" id="pimage">
<input type="submit" name="submit" value="Submit">
</form>



    
</body>
</html>