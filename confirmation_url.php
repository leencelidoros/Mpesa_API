<?php

    require 'config.php';
    header("Content-Type: application/json");

    $response = '{
        "ResultCode": 0, 
        "ResultDesc": "Confirmation Received Successfully"
    }';

    $mpesaResponse = file_get_contents('php://input');

    $logFile = "M_PESAConfirmationResponse.txt";

  
    $jsonMpesaResponse = json_decode($mpesaResponse, true);

    $transaction = array(
            ':TransactionType'      => $jsonMpesaResponse['TransactionType'] ??null,
            ':TransID'              => $jsonMpesaResponse['TransID'] ?? null,
            ':TransTime'            => $jsonMpesaResponse['TransTime'] ?? null,
            ':TransAmount'          => $jsonMpesaResponse['TransAmount'] ?? null,
            ':BusinessShortCode'    => $jsonMpesaResponse['BusinessShortCode'] ?? null,
            ':BillRefNumber'        => $jsonMpesaResponse['BillRefNumber'] ?? null ,
            ':InvoiceNumber'        => $jsonMpesaResponse['InvoiceNumber'] ?? null,
            ':OrgAccountBalance'    => $jsonMpesaResponse['OrgAccountBalance'] ?? null,
            ':ThirdPartyTransID'    => $jsonMpesaResponse['ThirdPartyTransID'] ?? null,
            ':MSISDN'               => $jsonMpesaResponse['MSISDN'] ?? null,
            ':FirstName'            => $jsonMpesaResponse['FirstName'] ?? null,
            ':MiddleName'           => $jsonMpesaResponse['MiddleName']?? null,
            ':LastName'             => $jsonMpesaResponse['LastName'] ?? null
    );


    $log = fopen($logFile, "a");
    fwrite($log, $mpesaResponse);
    fclose($log);

    echo $response;

    insert_response($transaction);
?>