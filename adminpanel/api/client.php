<?php



define("WSDL_LINK","http://localhost/myblog/adminpanel/api/server.php?wsdl");
define("WSDL_SCHEMA","http://schemas.xmlsoap.org/soap/envelope/");
require_once ('lib/nusoap.php');
$client= new nusoap_client(WSDL_LINK,true);
$name=array("name" => "rashik","surname"=>"tuladhar");
$response=$client->call('helloworld',$name,WSDL_SCHEMA);
echo $response;
