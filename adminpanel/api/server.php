<?php
require_once "lib/nusoap.php";

function helloworld($a,$b)
{
	return $a." And ".$b;
}

$server = new soap_server();
$server->configureWSDL("demo", "urn;demo");

$server->register("helloworld",
    array("name" => "xsd:string","surname"=>"xsd:string"),
    array("myname" => "xsd:string")
    );

@$server->service($HTTP_RAW_POST_DATA);






