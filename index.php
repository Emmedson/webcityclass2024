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

echo $radius;

// echo $area = pi() * $radius ** 2;



?>

<html>
    <head>
        <title>PHP Class</title>
    </head>

    <body>
        <div>

        </div>
    </body>
</html>