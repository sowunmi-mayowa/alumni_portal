<?php
    //require'./fetch.php';
    session_start();
    $matric = $_SESSION['matric_number'];
    $first_name = $_SESSION['first_name'];
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni | Payment Portal</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php
        include_once('./navs.php');
        echo $matric;
        echo $first_name;
    ?>

   
</body>
</html>