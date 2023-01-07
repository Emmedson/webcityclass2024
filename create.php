<?php
include ('connect.php');
?>

<?php
if(isset($_POST['submit']))
{
    // echo "The submit button hass been clicked";
    // echo "the product title is $title";
    $title = $_POST['title'];
    $details = $_POST['description'];
    $amount = $_POST['amount'];

    // Inser Query

    $query = "INSERT INTO products (title, details, amount) values('$title', '$details', '$amount')";

    $result = mysqli_query($connect, $query);

    echo "Saved Successfully";


}
?>

<DOCTYPE> 
<html>
    <Head></Head>
    <body>
        <h1> My Product Page</h1>

        <form action="create.php" method="POST">
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