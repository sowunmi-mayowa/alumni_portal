<?php
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
        
        $result = json_decode($run);

        $status = $result->data->status;
        $id = $result->data->id;
        $amount = $result->data->charged_amount;
        $name = $result->data->customer->name;
        $email = $result->data->customer->email;
        $number = $result->data->customer->phone_number;
        
        if(($status != $trans_status) OR ($id != $trans_id)){
            header("location: index.php");
            exit;
        }
        curl_close($curl);
    }else{
        header("location: index.php");
        exit;
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
            <form>
                <h3 style="margin: 10px 0px; text-transform:capitalize;">Payment successful</h3>
                <div>
                    <label for="name">Name: </label>
                    <input type="text" value="<?php echo $name ?>" disabled>
                </div>
                <div>
                    <label for="name">Email: </label>
                    <input type="text" value="<?php echo $email ?>" disabled>
                </div>
                <div>
                    <label for="id">Transaction Id: </label>
                    <input type="text" value="<?php echo $id ?>" disabled>
                </div>
                <div>
                    <label for="name">Phone Number: </label>
                    <input type="text" value="<?php echo $number ?>" disabled>
                </div>
                <div>
                    <label for="name">Amount Paid: </label>
                    <input type="text" value="<?php echo $amount ?>" disabled>
            </div>
        </form>
        
        <button id="print-btn">Print Recript</button>
        </div>
        <script type="text/javascript" src="js/script.js"></script>
    </div>
</body>
</html>