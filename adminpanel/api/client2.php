<?php



// define("WSDL_LINK","http://localhost/myblog/adminpanel/api/server.php?wsdl");
// define("WSDL_SCHEMA","http://schemas.xmlsoap.org/soap/envelope/");
// require_once ('lib/nusoap.php');
// $client= new nusoap_client(WSDL_LINK,true);
// $name=array("name" => "rashik","surname"=>"tuladhar");
// $response=$client->call('helloworld',$name,WSDL_SCHEMA);
// echo $response;





require_once('lib/nusoap.php');

//This is your webservice server WSDL URL address
$wsdl = "http://localhost/myblog/adminpanel/api/server2.php?wsdl";

//create client object
$client = new nusoap_client($wsdl, 'wsdl');

$err = $client->getError();
if ($err) {
	// Display the error
	echo '<h2>Constructor error</h2>' . $err;
	// At this point, you know the call that follows will fail
        exit();
}

//calling our first simple entry point
$result1=$client->call('hello', array('username'=>'achmad'));
print_r($result1); 

//call second function which return complex type
$result2 = $client->call('login', array('username'=>'john', 'password'=>'doe') );
//$result2 would be an array/struct
print_r($result2);