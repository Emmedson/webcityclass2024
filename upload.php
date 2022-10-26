<?php
include('connect.php');
?>

<?php
// if(isset($_POST['submit'])){
//     $title = ($_POST['title']);
//     $amount = ($_POST['amount']);
    
//     $file = $_FILES ['pimage'];
//     $fileName = $_FILES['pimage']['name'];
//     $fileTempName = $_FILES ['pimage']['tmp_name'];
//     $fileSize = $_FILES ['pimage']['size'];
//     $fileType = $_FILES ['pimage']['type'];
//     $fileError = $_FILES ['pimage']['error'];
//     $fileid = uniqid();

//     $fileExt = explode('.', $fileName);
//     $ext = strtolower(end($fileExt));
//     $allow = array('png', 'jpg', 'jpeg');
    
//     if(in_array($ext, $allow)){
//         echo $ext. 'Valid Ext'. '<br>';
//         $fileName = $fileid.$fileName;
//         $filedestination = 'productsimages/'. $fileName;
//         move_uploaded_file($fileTempName, $filedestination);
//     }else{
//         echo "Invalid extention";
//     }
//   //  print_r($file);

// // Wrte your SQL Query
//     $sql = "INSERT INTO products(title, amount, imgname) VALUES ('$title', '$amount', '$fileName')";

//         if (mysqli_query($connect, $sql)){
//             echo "Save successfully";
//         }else{
//             echo "query error:". mysqli_error($connect);
//         }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
    <h1>Upload Image</h1>

    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="xyz">
        <input type="submit" value="submit" name="submit">
    </form>
<?php
    if(isset($_POST['submit'])){
        $filedata = ($_FILES['xyz']);
        // print_r($filedata);
        $name = $_FILES['xyz']['name'];
        $templocation = $_FILES['xyz']['tmp_name'];
        $filename = $_FILES['xyz']['name'];
        $filedestination = "uploaded/".$name;

        move_uploaded_file($templocation, $filedestination);
         $sql = "INSERT INTO dbname(imgname) VALUES ('$filename')";
    }

?>

</body>
</html>