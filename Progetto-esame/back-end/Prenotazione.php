<?php
$method = $_SERVER["REQUEST_METHOD"];

include("class/classUtente.php");

$prenota = new Prenota(); 

switch($method) 
{
	case 'GET':
	
	header("Content-Type: application/json");
    echo $js_encode;
	break;
	
	
	default:
	break;
}

function getID() {
    return explode('/', getenv('REQUEST_URI'))[5];
}
?>