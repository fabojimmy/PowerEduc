<?php
 require_once __DIR__.'/../../vendor/autoload.php';
 use Firebase\JWT\JWT;
 use Firebase\JWT\Key;

 
 $payload=array(
    "isd"=>'localhost',
    "aud"=>'localhost',
    "ii"=>'paspa',
    "usernames"=>'fabo',
    "password"=>'jimmy'
 );

 function tokenencode($payload)
 {
   $sec_key="6HSKOMSQL";
   $encode=JWT::encode($payload,$sec_key,'HS256');
   return $encode;
 }
//  $decode=JWT::decode($encode,new Key($sec_key,'HS256'));

function tokendecode($token)
{
  $sec_key="6HSKOMSQL";
  $header=apache_request_headers();
 //  var_dump($header['Authorization']);
 $header['Authorization']=$token;
 if($header['Authorization'])
 {
     $header=$header['Authorization'];
     $decode=JWT::decode($header,new Key($sec_key,'HS256'));
     
     return $decode;
 }

 
 //  print_r($encode);
}

?>