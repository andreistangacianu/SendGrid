<?php

$email = array('andreis@sendgrid.com','andrei2@sendgrid.com');
$name = array('andrei1','andrei2');

for($i=0;$i<count($email);$i++)
{
   $data[] = json_encode(array('email' => $email[$i],
               'name' => $name[$i]
                 ));	
    
}

$url = 'http://sendgrid.com/';
$user = 'username';
$pass = 'password'; 


print_r($data);
$listname = 'Story';

for($i=0;$i<count($data);$i++){
$params = array(
          'api_user' => $user,
          'api_key' => $pass,
          'list' => $listname,
          'data' => $data[$i]
           );

$request =  $url.'api/newsletter/lists/email/add.json';


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
 
// print everything out
print_r($response); 
}
?>