<?php
    session_start();
    
    $matric = $_SESSION['matric_number'];
    $first_name = $_SESSION['first_name'];
    $middle_name = $_SESSION['middle_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $department = $_SESSION['department'];
    $level = $_SESSION['level'];
    $phone_number = $_SESSION['phone_number'];

    if(isset($_POST['submit'])){
        
        //integrate flutterwave
        $endpoint = "https://api.flutterwave.com/v3/payments"; 
    
        $post_data = array(
            "tx_ref" => uniqid().uniqid(),
            "currency" => "NGN",
            "amount" => 2000,
            "customer" => array(
                "email" => $email,
                "name" => $first_name . " " . $middle_name. " " . $last_name,
                "phone_number" => $phone_number
            ),
            "customization" => array(
                "title" => "The federal polytechnic ilaro",
                "description" => "Payment of alumni fee ",
            ),
            "meta" => array(
                "title" => "The federal polytechnic ilaro Alumni fee payment"
            ),
            "redirect_url" => "https://fpi-alumni-payment.herokuapp.com/project/verify.php"
        );

        //init url handler
        $ch = curl_init();

        //turn off ssl checking
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        //set endpoint
        curl_setopt($ch, CURLOPT_URL, $endpoint);

        //TURN ON THE URL POST METHOS
        curl_setopt($ch, CURLOPT_POST,  1);

        //EMCODE THE POST FIELD
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));

        //make it return data
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //set the waiting timeout 
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 200);
        curl_setopt($ch, CURLOPT_TIMEOUT, 200);

        //set the headers for end point
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer FLWSECK_TEST-3b41a6d6bb9a9c733905ab0708d15a5d-X",
            "Content-Type: Application/json",
            "Cache-Control : no cahe "
        ));

        //execute the url session
        $request = curl_exec($ch);

        $result = json_decode($request);

        header("location: ".$result->data->link);

        curl_close($ch);
        //var_dump($result);
        
    }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni | Payment Portal</title>
    <link rel="stylesheet" href="../css/payment.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   <div class="test-bg">
   <?php
        include_once('./navs.php');
    ?>
    <div class="container">
        <h1>Payment Section</h1>
        <form method="POST">
            <input type="text" name="first_name" id="first_name" value="<?php echo $first_name ?>" disabled>
            <input type="text" name="middle_name" id="middle_name" value="<?php echo $middle_name ?>" disabled>
            <input type="text" name="last_name" id="last_name" value="<?php echo $last_name ?>" disabled>
            <input type="text" name="matric" id="matric" value="<?php echo $matric ?>" disabled>
            <input type="text" name="department" id="department" value="<?php echo $department ?>" disabled>
            <input type="text" name="level" id="level" value="<?php echo $level ?>" disabled>
            <input type="email" name="email" id="email" value="<?php echo $email ?>" disabled>
            <input type="text" name="amount" id="amount" value="2000" disabled>
            <input type="number" name="number" id="number"  value="<?php echo $phone_number ?>" disabled>
            <input type="submit" name="submit" id="submit" value="make payment">
            </form>
    </div>
   </div>
   <script src="../js/script.js"></script>
</body> 
</html>