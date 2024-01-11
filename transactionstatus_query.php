<?php

    $consumerKey = 'clH3kkrYVl6kSAsMbWF1nqEGxYenQqKG'; 
    $consumerSecret = 'sTd9XZlsaiAIza6E'; 
    $headers = ['Content-Type:application/json; charset=utf8'];
    $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
    $curl = curl_init($access_token_url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_HEADER, FALSE);
    curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
    $result = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $result = json_decode($result);
    $access_token = $result->access_token;
    curl_close($curl);



    $tstatus_url = 'https://sandbox.safaricom.co.ke/mpesa/transactionstatus/v1/query';

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $tstatus_url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token)); //setting custom header

    $curl_post_data = array(
     
     'Initiator' =>'testapi',
      'SecurityCredential' => 'f8hWMDZsWPjVXQlQ/hKS5f5enKBb99W85kLsBfzrNIyFZ5ZG+EXWZGYvfiEEBLafaZlMWEcxoRh6MhbUK28KHqDMLKdUm+Fe3XDAjFOm0mldYfYMeO4TgPmXQSV4daglr5XoXWc3paWvQ6d0PCtNjFmJ8cbGpm5WGEMCWrMesDbABV13bSL/pfNigg+IwQuzg+Cxf2MH2I7NJcIqGgqk7hnzkp/3y3QB1KUy1B8233tVsWPslRfYRb8OoVCo6rcMUo5aAyKiNQxLrJjSMmH/fCNTXCmorX2kjYTYa8Af8najLJwKuP8Gepuhe0pvP0T+j6vW+CTjDOYbsV4HZCz3uA==',
      'CommandID' => 'TransactionStatusQuery',
      'TransactionID' => 'OEI2AK4Q16',
      'PartyA' => '600584', 
      'IdentifierType' => '4',
      'ResultURL' => 'https://mydomain.com/TransactionStatus/result/',
      'QueueTimeOutURL' => 'https://mydomain.com/TransactionStatus/queue/',
      'Remarks' => 'OK',
      'Occasion' => 'OK'
    );

    $data_string = json_encode($curl_post_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    $curl_response = curl_exec($curl);

    echo $curl_response;
?>