<?php
if(isset($_GET['submit'])){
    echo $_GET['email'];
    echo "YES";
}
?>


<?php

$name = "";
$studentName = "Blessing";
$age = 20;
$name = 'Emmanuel';

$fkage = $age + 5;


// echo 'Welcome ' . $studentName . ' your fake age is ' . $fkage ;

// echo "My name is $name";

$text = 'Hello here is the "tea cup" ';

// echo strlen($text);

// echo str_replace("Hello", "Hello $name", $text);

// echo $fkage;

$name3 = "cook"; // string variable
$sname = 'Micheal'; // string variable
$email = 'goodness22@webcity.com.ng';
$age = 3; // Numeric variable
$Product = ['bag', 'NGN45', 'red', 45 ]; // Array Variable


// NUMERIC VARIABLES 

$price = 2000;
$qty = 5;
$discount = 0.1;
$amount = $price * $qty;
$discountValue = $amount * $discount ;
$discountAmount = $amount - $discountValue; 

 echo $discountAmount."<br>";

// TYPES OF NUMERIC VARIABLES
// - INTEGERS
// - FLOATS / DOUBLE

$age = 34; // integer
$gdp = 3.5; // float or double

$priceOne = 50;
$priceTwo = 40;

// COMPARISM OPERATORS ==, !=, >, <, >=, <= 
if($priceOne < $priceTwo){
    echo 'YES'. '<br>' ;
}

else {
    echo "NO". '<br>';
}


// BODMAS , BIDMAS

// echo $cal = (2 + 3) * 5;


// ARITHEMATIC OPERATORS = +, -, *, /, **, PI(), ++, --


// = Is called assignment operator


// echo pi();

$radius = 50;

// $radius = $radius + 1;

// $radius--;
 
// $radius = $radius + 10;

$radius -= 40;

$radius = $radius - 40;

echo $radius . "<br>";

// echo $area = pi() * $radius ** 2;


// PHP ARRAYS//

$Products = [ 'Aple', 20 , 'red', 'Nigeria' ];

// print_r($Product[2]);

foreach($Products as $product) {
    echo $product . "<br>";
}

for ($i=0; $i < count($Products); $i++){
    echo $Products[$i] . '<br>';
}




$Product = [ 'Title' => 'Apple', 'Amount' => 20 , 'color' => 'red', 'country' => 'Nigeria' ];

// echo $Product['country'];



$blogs = [
    [ 'Coding without hustles', 'Jake', 56],
    [ 'My FE journey', 'Johnson', 90 ],
    [ 'Need for speed', 'David', '20 sept. 2022' ],
    [ 'Backed Ninja', 'Goodness', 65 ],
    [ 'Fulstack Road map', 'Blessing', 40 ],
];


// $blogs = [ 'Coding without hustles', 'Jake', 56];
    
// print_r ($blogs[2][0]);

// print_r ($blogs);







?>

<html>
    <head>
        <title>PHP Class</title>
    </head>

    <body>
<form action="index.php" method="GET">

<input type="text" name="email">
<input type="text" name = "title">
<input type="submit" value="submit" name = "submit">
</form>
    </body>
</html>