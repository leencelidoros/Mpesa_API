<?php
    $url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';
    
    $access_token = '7jEjbPEGfOxkEGMtlZ8mJj5YTTlz';    
    $ShortCode  = '600982'; 
    $amount     = '500';
    $msisdn     = '254708374149';
    $billRef    = '000n';

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token));


    $curl_post_data = array(
           'ShortCode' => $ShortCode,
           'CommandID' => 'CustomerPayBillOnline',
           'Amount' => $amount,
           'Msisdn' => $msisdn,
           'BillRefNumber' => $billRef
    );

    $data_string = json_encode($curl_post_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    $curl_response = curl_exec($curl);

    echo $curl_response;
?>