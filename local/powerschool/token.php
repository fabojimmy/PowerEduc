<?php
 require_once __DIR__.'/../../vendor/autoload.php';
 use Firebase\JWT\JWT;
 use Firebase\JWT\Key;

 $sec_key="6HSKOMSQL";
 $payload=array(
    "isd"=>'localhost',
    "aud"=>'localhost',
    "ii"=>'paspa',
    "usernames"=>'fabo',
    "password"=>'jimmy'
 );

 $encode=JWT::encode($payload,$sec_key,'HS256');
//  $decode=JWT::decode($encode,new Key($sec_key,'HS256'));

 $header=apache_request_headers();
//  var_dump($header['Authorization']);
$header['Authorization']=$encode;
if($header['Authorization'])
{
    $header=$header['Authorization'];
    $decode=JWT::decode($header,new Key($sec_key,'HS256'));
}

echo $decode->usernames;
  print_r($encode);
?>