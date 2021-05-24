<?php
$method = $_SERVER["REQUEST_METHOD"];

include("class/classUtente.php");

$prenota = new Prenota(); 

switch($method) 
{
	case 'GET':
	$js_encode = "";
	$pren = getID(5);
	if(isset($pren)){
		$js_encode = $prenota->get_prenotazione($id); 
	}
	else{
		$js_encode = $prenota->get_all_prenotazioni();
	}
	header("Content-Type: application/json");
    echo $js_encode;
	break;
	
	case 'POST':
		$body = json_decode(@file_get_contents('php://input'), true);
		$user = $body[''];
		$stanza = $body[''];
		$inizio = $body[''];
		$fine = $body[''];

	break;

	case 'DELETE':
		$user = getID(5);
		$stanza = getID(6);
		$prenota->remove_prenotazione($user, $stanza)
	break;

	default:
	break;
}

function getID($num) {
    return explode('/', getenv('REQUEST_URI'))[$num];
}
?>