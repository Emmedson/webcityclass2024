<?php
include('connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $sql = "SELECT * FROM products";
    $result = mysqli_query($connect, $sql);
    $prod = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>


   <?php
   foreach($prod as $product){ ?>
        <div class="products">
            <div class="product">

                <div class="productimage">
                    <?php
                    $filepath2 = $product['image'];
                    echo '<img src="isreal/'.$filepath2.'" width="50px">';
                    ?>
                </div>
                <div class="details">
                    <?php
                    echo $product['title']. ' <br> ' . $product['amount'].'<br>'. $product['id'] ;
                    ?>

                    <form action="listproduct.php" method="POST">
                            <input type="hidden" name ="pid" value="<?php echo $product['id'] ?>" >
                            <input type="submit" value="view Product" name="viewProduct">
                        </form>
                        <?php
                        if(isset($_POST['viewProduct'])){
                            session_start();
                            // $_SESSION['id'] = $_POST['pid'];
                            // $_SESSION['pid2'] = $product['id'];
                            header("location:product.php");
                        }
                        ?>
                    <a href="product.php?id=<?php echo $product['id']?>">View Product</a>
                </div>

            </div>
        </div>
   <?php }?>
   


</body>
</html>