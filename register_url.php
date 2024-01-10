<?php
	$url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';

	$access_token = '4G5LErIk86gmr8jUIsGkpKApzOSo'; 
	$shortCode = '600984'; 
	$confirmationUrl = 'https://mydomain.com/confirmation';
	$validationUrl = 'https://mydomain.com/validation'; 


	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token));


	$curl_post_data = array(
	
	  'ShortCode' => $shortCode,
	  'ResponseType' => 'Confirmed',
	  'ConfirmationURL' => $confirmationUrl,
	  'ValidationURL' => $validationUrl
	);

	$data_string = json_encode($curl_post_data);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

	$curl_response = curl_exec($curl);
	print_r($curl_response);

	echo $curl_response;
?>