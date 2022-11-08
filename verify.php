<?php
    require 'connection.php';
    if(isset($_GET['transaction_id']) AND isset($_GET['status']) AND isset($_GET['tx_ref'])){
        $trans_id = htmlspecialchars($_GET['transaction_id']);
        $trans_status = htmlspecialchars($_GET['status']);
        $trans_ref = htmlspecialchars($_GET['tx_ref']);
    

        //verify endpoint
        $url = "https://api.flutterwave.com/v3/transactions/".$trans_id."/verify";

        //init url handler
        //Create cURL session
        $curl = curl_init($url);

        //Turn off SSL checker
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        //Decide the request that you want
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        
        //Set the API headers
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer FLWSECK_TEST-3b41a6d6bb9a9c733905ab0708d15a5d-X",
            "Content-Type: Application/json"
        ]);

        //Run cURL
        $run = curl_exec($curl);

        //Check for erros
        $error = curl_error($curl);
        if($error){
            die("Curl returned some errors: " . $error);
        }

        
        // echo "<pre>". $run . "<pre>";
        session_start();
        $result = json_decode($run);

        $status = $result->data->status;
        $_SESSION['id'] = $result->data->id;
        $_SESSION['amount'] = $result->data->charged_amount;
        $_SESSION['name'] = $result->data->customer->name;
        $_SESSION['email'] = $result->data->customer->email;
        $_SESSION['number']= $result->data->customer->phone_number;
        $_SESSION['date'] = $result->data->customer->created_at;
        $_SESSION['reference'] = $result->data->tx_ref;
        
        
        if(($status != $trans_status) OR ($_SESSION['id'] != $trans_id)){
            header("location: index.php");
            exit;
        }
        curl_close($curl);
    }else{
        header("location: index.php");
        exit;
    }
    
    //$_SESSION['name'] = $_POST['name'];
    if (isset($_POST['submit'])) {
       $name = $_SESSION['name'];
       $email = $_SESSION['email'];
       $id = $_SESSION['id'];
       $number = $_SESSION['number'];
       $amount = $_SESSION['amount'];
       $date = $_SESSION['date'];
       $reference = $_SESSION['reference'];
       $matric = $_SESSION['matric_number'];

       $query = "insert into `records`(`payment_id`, `amount_paid`, `name`,`matric_number` , `email`, `number`, `date`, `reference`) values ('$id', '$amount', '$name', '$matric', '$email', '$number', '$date', '$reference' )";

       $run = mysqli_query($conn, $query);
       if ($run) {
           echo "working";
       }
       else{
           echo "wrong";
           echo mysqli_error($conn);
       }


    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Payment receipt | Alunmmi fee | The Federal Polytechnic Ilaro</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,400;0,700;1,300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/receipt.css">
</head>
<body>
	<div class="test-bg" style="height: 100vh;">
        <div class="header">
           <div class="logo"> 
            <img src="http://localhost/project/bgs/FPI.jpg" alt="sch logo">
           </div>
           <div class="content">
             <h1>the federal polytechnic ilaro</h1>
             <h3>Alunmi fees receipt</h3>
           </div>
        </div>

        <div class="container">
            <form method="POST">
                <h3 style="margin: 10px 0px; text-transform:capitalize;">Payment successful</h3>
                <div>
                    <label for="name">Name: </label>
                    <input type="text" name="name" value="<?php echo $_SESSION['name'] ?>"  disabled>
                </div>
                <div>
                    <label for="name">Email: </label>
                    <input type="text" value="<?php echo $_SESSION['email'] ?>" name="email">
                </div>
                <div>
                    <label for="name">Matric No: </label>
                    <input type="text" value="<?php echo $_SESSION['matric_number'] ?>" name="matric">
                </div>
                <div>
                    <label for="id">Transaction Id: </label>
                    <input type="text" value="<?php echo $_SESSION['id'] ?>" name="id" disabled>
                </div>
                <div>
                    <label for="name">Phone Number: </label>
                    <input type="text" value="<?php echo $_SESSION['number'] ?>" name="number" disabled>
                </div>
                <div>
                    <label for="name">Amount Paid: </label>
                    <input type="text" value="<?php echo $_SESSION['amount'] ?>" name="amount" disabled>
            </div>
            <div style="display: none;">
                    <label for="name">Date: </label>
                    <input type="text" value="<?php echo $_SESSION['date'] ?>" name="date" disabled>
                </div>
                <div style="display: none;">
                    <label for="name">reference: </label>
                    <input type="text" value="<?php echo $_SESSION['reference'] ?>" name="reference" disabled>
                </div>
            <input type="submit" value="Print REceipt" id="print-btn" name="submit">
        </form>
        
       
        </div>
        <script type="text/javascript" src="js/script.js"></script>
    </div>
</body>
</html>