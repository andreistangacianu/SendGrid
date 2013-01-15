<?php

function addNewEmail(){
	
	}
$url = 'http://sendgrid.com/';
$user = 'username';
$pass = 'password'; 
$data = addNewEmail();

$listname = 'New Subscribers';
$params = array(
          'list' = $listname;
          'data' = $data;
           );

$request =  $url.'api/newsletter/lists/email/add.json';


// Generate curl request
$session = curl_init($request);
// Tell curl to use HTTP POST
curl_setopt ($session, CURLOPT_POST, true);
// Tell curl that this is the body of the POST
curl_setopt ($session, CURLOPT_POSTFIELDS, $var);
// Tell curl not to return headers, but do return the response
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
 
// obtain response
$response = curl_exec($session);
curl_close($session);
 
// print everything out
print_r($response);

?>
