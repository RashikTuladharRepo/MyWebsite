<?php
require_once('lib/nusoap.php'); 

$server = new nusoap_server;

$server->configureWSDL('server', 'urn:server');

$server->wsdl->schemaTargetNamespace = 'urn:server';

//SOAP complex type return type (an array/struct)
$server->wsdl->addComplexType(
    'Person',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'id_user' => array('name' => 'id_user', 'type' => 'xsd:int'),
        'fullname' => array('name' => 'fullname', 'type' => 'xsd:string'),
        'email' => array('name' => 'email', 'type' => 'xsd:string'),
        'level' => array('name' => 'level', 'type' => 'xsd:int')
    )
);


$server->wsdl->addComplexType(
  'Persons',
  'complexType',
  'array',
  '',
  'SOAP-ENC:Array',
  array(),
  array(
    array('ref' => 'SOAP-ENC:arrayType',
         'wsdl:arrayType' => 'tns:Person[]')
  ),
  'tns:Person'
);


$server->wsdl->addComplexType('Personss','complexType','struct','all','',
    array(
        'id_user' => array('name' => 'id_user', 'type' => 'tns:Persons'),
        'fullname' => array('name' => 'fullname', 'type' => 'tns:Persons'),
        'email' => array('name' => 'email', 'type' => 'tns:Persons'),
        'level' => array('name' => 'level', 'type' => 'tns:Persons')
    )
);



//first simple function
$server->register('hello',
			array('username' => 'xsd:string'),  //parameter
			array('return' => 'xsd:string'),  //output
			'urn:server',   //namespace
			'urn:server#helloServer',  //soapaction
			'rpc', // style
			'encoded', // use
			'Just say hello');  //description

//this is the second webservice entry point/function 
$server->register('login',
			array('username' => 'xsd:string', 'password'=>'xsd:string'),  //parameters
			array('return' => 'tns:Person'),  //output
			'urn:server',   //namespace
			'urn:server#loginServer',  //soapaction
			'rpc', // style
			'encoded', // use
			'Check user login');  //description

//first function implementation
function hello($username) {
        return 'Howdy, '.$username.'!';
}

//second function implementation 
function login($username, $password) {
        //should do some database query here
        // .... ..... ..... .....
        //just some dummy result

		// $a= array(
		// 		array('id_user'=>1,'fullname'=>'John Reese','email'=>'john@reese.com','level'=>99),
		// 		array('id_user'=>2,'fullname'=>'Rashik Tuladhar','email'=>'rashik@reese.com','level'=>95)
		// 	);

		// print_r($a);
		// die();

		// return $a;

        return array('id_user'=>1,'fullname'=>'John Reese','email'=>'john@reese.com','level'=>99);
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';

$server->service($HTTP_RAW_POST_DATA);