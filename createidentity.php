<?php
function addIdentity(){
	
$url = 'http://sendgrid.com/';
$user = 'username';
$pass = 'password';

$params = array(
 'api_user'  => $user,
 'api_key'   => $pass,
 'identity' => 'new Identity',
 'name'     => 'Andrei',
 'email'    => 'andrei@sendgrid.com',
 'address'  => 'address',
 'city'     =>  'city',
 'state'    => 'state',
 'zip'      => 'zip' ,
 'country'  => 'Romania'
);
$request =  $url.'api/newsletter/identity/add.json';

// Generate curl request
$session = curl_init($request);
// Tell curl to use HTTP POST
curl_setopt ($session, CURLOPT_POST, true);
// Tell curl that this is the body of the POST
curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
// Tell curl not to return headers, but do return the response
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
 
// obtain response
$response = curl_exec($session);
curl_close($session);
return $params['identity'];
}
addIdentity();
?>

