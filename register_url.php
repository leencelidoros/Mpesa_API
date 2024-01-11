<?php
	$url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';

	$access_token = '7jEjbPEGfOxkEGMtlZ8mJj5YTTlz'; 
	$shortCode = '600584'; 
	$confirmationUrl = 'https://mydomain.com/confirmation'; 
	$validationUrl = 'https://mydomain.com/validation'; 

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token)); //setting custom header

	$curl_post_data = array(
	  'ShortCode' => $shortCode,
	  "ResponseType"=>"Completed",
	  'ConfirmationURL' => $confirmationUrl,
	  'ValidationURL' => $validationUrl
	);

	$data_string = json_encode($curl_post_data);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

	$curl_response = curl_exec($curl);

	echo $curl_response ;

	curl_close($curl);
?>
