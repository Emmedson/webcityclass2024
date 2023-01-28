<?php
include ('connect.php');
?>

<?php
// Select Product From DB
$selectquery = "SELECT * FROM products";
$Sresult = mysqli_query($connect, $selectquery);
$products = mysqli_fetch_all($Sresult, MYSQLI_ASSOC);
?>

<DOCTYPE> 
<html>
    <Head></Head>
    <body>
        <h1>List Existing Product</h1>
        

<?php
foreach($products as $product){ ?>     
<?php
   echo '<img src="isreal/'.$product['image'].'" alt="" width="150px">'. "<br>";
   echo $product['id'] . ' '. $product['title']. ' - ' . $product['amount']."<br>";
   echo $product['details'];
   ?>
    <form action="create.php" method="POST">
    <input type="hidden" name ="pid" value="<?php echo $product['id'] ?>" >
    <input type="submit" value="view Product" name="viewProduct">
   </form>

   </form>
   <br>
   <hr>
   <br>

<?php echo '<br>'?> 
<?php } ?>

   <?php
   if(isset($_POST['viewProduct'])){
       session_start();
       $_SESSION['id'] = $_POST['pid'];
    //    $_SESSION['pid2'] = $product['id'];
       header("location:product.php");
   }
   ?> -->
   <br>

   <!-- <a href="edit.php?id=<?php //echo $product['id'] ?>"> Edit </a> -->
   <!-- <form action="class5.php" method="POST">
       <input type="hidden" name ="title" value="<?php echo $product['id'] ?>" >
       <input type="submit" value="Edite" name="edite">
   </form>
   <?php 
//    if(isset($_POST['edite'])){
//        session_start();
//        $_SESSION['id'] = $_POST['title'];
//        header("location: edit.php");}
   ?> -->



<!-- Forech Ends Here -->

<?php
if(isset($_POST['submit']))
{
    // echo "The submit button hass been clicked";
    // echo "the product title is $title";
    $title = $_POST['title'];
    $details = $_POST['description'];
    $amount = $_POST['amount'];

    
    // File Image from the form
    $productImage = $_FILES['image'];

    $fname = $_FILES['image'] ['name'];

    $filelocation = $_FILES['image']['tmp_name'];
    
    $filedestination = 'isreal/'. $fname;

    // print_r($pimage);
    move_uploaded_file($filelocation, $filedestination);

    // Inser Query

    $query = "INSERT INTO products (title, details, amount, image) values('$title', '$details', '$amount', '$fname')";

    $result = mysqli_query($connect, $query);

    echo "Saved Successfully";


    
}
?>
        
<h1>Create New Product</h1>
        <form action="create.php" method="POST" enctype="multipart/form-data">
            <label for="">Product Title</label>
            <input type="text" name="title" required> <br> <br>

            <label for="">Product Description</label>
            <textarea name="description" cols="30" rows="3" required></textarea> <br> <br>

            <label for="">Amount</label>
            <input type="text" name="amount" required> <br> <br>

            <label for="">Product Image</label>
            <input type="file" name="image"> <br> <br>

            <input type="submit" value="Submit" name="submit">

        </form>
    </body>
</html>