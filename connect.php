<?php
// mysqli_connect('localhost', 'goodness', 'Goodness@2022', 'timiandisrealdb');

$host = "127.0.0.1";
$dbuser ="root";
$dbpasword ="";
$DBname = "webclass2024";

$x = mysqli_connect("$host", "$dbuser", "$dbpasword", $DBname);
// echo "Connected Successfully";

$y = "INSERT INTO products(brand,category,colours,name,pimage,price,uid) VALUES('hp', 3,'red','elite-book', 'pimagename', 2345000, 23)";

mysqli_query($x, $y);
echo "Save Successfully";

?>

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
<?php
$query = "SELECT * FROM products";
$result = mysqli_query($con, $query);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($products as $prod) { ?>
<div class="products">
    <div class="product">
        <div class="image">
            <?php
            $prodname = $prod['imagename'];
            echo'<img src="productsimages/'.$prodname.'">';
            ?>
            
        </div>
        <div class="details">
            <h3><?php echo $prod['productname'] ?></h3>

            <h5> <?php echo $prod['amount'] ?></h5>
        </div>
    </div>
</div>

<?php } ?>

