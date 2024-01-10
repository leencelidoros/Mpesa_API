<?php

    header("Content-Type:application/json");
    $response ='{
        "ResultCode":0,
        "ResultDesc":Confirmation Recieved Successfully"
    }';

    $mpesaResponse =file_get_contents('php://input');

    $logfile ="MpesaConfirmationResponse.txt";
    $jsonMpesaResponse =json_decode($mpesaResponse,true);
    $log =fopen($logfile,"a");
    fwrite($log ,$jsonMpesaResponse);
    fclose($log);

    echo($response);
