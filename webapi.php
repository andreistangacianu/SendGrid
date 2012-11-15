<?php

include 'createidentity.php';
 

$url = 'http://sendgrid.com/';
$user = 'andrei';
$pass = 'silv3r198'; 
$name = 'New Sebi2';
$identity = addIdentity();
 
$params = array('add'=> array(
    'api_user'  => $user,
    'api_key'   => $pass,
    'identity'  => $identity, 
    'name'      => $name,
    'subject'   => 'subject',
    'html'      => 'testing body',
    'text'      => 'testing body',
    ),
    'list' => array(
     'api_user'  => $user,
     'api_key'   => $pass,
     'name' => $name,
     'list' => 'SendGrid',
    ),
    'schedule' => array(
     'api_user'  => $user,
     'api_key'   => $pass,
     'name' => $name,
     'after' => 2
    )
   );

function addNewsletter(){
	global $params;
	global $url;
$request =  $url.'api/newsletter/add.json';
$var = $params['add'];

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
}

function addList(){
	global $params;
	global $url;
$request =  $url.'api/newsletter/recipients/add.json';
$var = $params['list'];

// Generate curl request
$session = curl_init($request);

curl_setopt ($session, CURLOPT_POST, true);
curl_setopt ($session, CURLOPT_POSTFIELDS, $var);
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
 
$response = curl_exec($session);
curl_close($session);
 
print_r($response);
}

function addSchedule(){
	global $params;
	global $url;
    $request =  $url.'api/newsletter/schedule/add.json';
    $var = $params['schedule'];

$session = curl_init($request);

curl_setopt ($session, CURLOPT_POST, true);
curl_setopt ($session, CURLOPT_POSTFIELDS, $var);
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
 
$response = curl_exec($session);
curl_close($session);
 
print_r($response);
	}


addNewsletter();
addList();
addSchedule();
