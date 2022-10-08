
<?php

$dbconnect = mysqli_connect("localhost", "goodness", "Goodness@2022", "ladycuteg");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
   }



//echo TRUE; //"1"

//echo FALSE; //""
// echo 50 != 40;

// if ($Product['price'] > 100 && $Product['title'] === 'Bag') {

        

// }

// if ($Product['price'] > 100 || $Product['title'] === 'Bag') {

        

// }





// $Snames = [ 'Goodness', 'David', 'Johnson'];

// $y = count($Snames);
// echo $y;



// /print_r($products);


// for ($i=0; $i < $y; $i++){

//     echo $Snames[$i]. '<br>';
// }

//  foreach ($Products as $product ){     
//     <h1> <?php echo $product['price']; 

// >?php } 



// echo '<br>';

// End foreach



// $i = 0;

// while ($i > 5){
//     echo "Yes";
//     echo '<br>';
//     $i++;
// }

// $x = 0;
// do{
// echo "YES";
// $x++;
// }
// while ($x > 5);

// ?>





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
$products = [
    ['title' => 'Laptop', 'price' => 2500],
    ['title' => 'Bag', 'price' => 700],
    ['title' => 'Phone', 'price' => 1500]
];

// $students = ['Goodness', 'Sam', 'Johnson', 'David'];

// print_r($products);

if($products[0]['price'] == 200 || $products[0]['title'] === 'Laptop' && 50 == 40) {
    echo $products[0]['title']. '-'. $products[0]['price'];
    }

    else{
        echo "None of the condition are true";
    } 

    // elseif($products[0]['title'] === 'Laptop'){
    // echo 'The product title is '.$products[0]['title'];  
    // }

   



?>

<h1> Products</h1>

<ul>

    <?php foreach ($products as $product){ ?>
    <h3 class="prodcut">
        
        <?php 
        if($product['price'] > 1000) {
        echo $product['title']. '-'. $product['price'];
        }
        else{
            echo $product['title']. " is less than NGN1000";
        } 
        
        ?> 
    </h3>
    <?php } ?>
</ul>


<?php
if(isset($_POST['submit'])){

    $title = ($_POST['title']);
    $amount = ($_POST['amount']);
    
// Wrte your SQL Query
    $sql = "INSERT INTO products(title, amount) VALUES ('$title', '$amount')";

        if (mysqli_query($dbconnect, $sql)){
            echo "Save successfully";
        }
        else{
            echo "query error:". mysqli_error($dbconnect);
        }
}
?>

<?php
$xyz = "SELECT * FROM products";

$result = mysqli_query($dbconnect, $xyz);

$sproducts = mysqli_fetch_all($result, MYSQLI_ASSOC);

// print_r($sproducts);
 foreach($sproducts as $product){
    echo $product['title']. ' - ' . $product['amount'] . '<br>';
 }

?>

<form action="class5.php" method="POST" >
    <input type="text" name="title" placeholder="Add product title">
    <input type="text" name="amount" placeholder="Add Product Amount">
    <input type="submit" name="submit" value="Submit">
</form>
    
</body>
</html>