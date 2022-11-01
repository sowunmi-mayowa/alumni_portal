<?php
    if(isset($_GET['transaction_id']) AND isset($_GET['status']) AND isset($_GET['tx_ref'])){
        $trans_id = htmlspecialchars($_GET['transaction_id']);
        $trans_status = htmlspecialchars($_GET['status']);
        $trans_ref = htmlspecialchars($_GET['tx_ref']);
    }

    //verify endpoint
    $url = "https://api.flutterwave.com/v3/transactions/".$trans_id."/verify";

     //init url handler
     $ch = curl_init();

     //turn off ssl checking
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
     
     //make it return data
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
?>