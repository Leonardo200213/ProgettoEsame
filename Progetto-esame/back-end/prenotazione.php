<?php
$method = $_SERVER["REQUEST_METHOD"];

include("class/classPrenotazione.php");

$prenota = new Prenota(); 

switch($method) 
{
	case 'GET':
	$pt = "";
	$pren = getID(5);
	if(isset($pren)){
		$pt = $prenota->get_prenotazione($id); 
	}
	else{
	    $pt = $prenota->get_all_prenotazioni();
	}
	$js_encode = json_encode(array('affittate'=>$pt),true);
	header("Content-Type: application/json");
    echo $js_encode;
	break;
	
	case 'POST':
		$body = json_decode(@file_get_contents('php://input'), true);
		$user = $body[''];
		$stanza = $body[''];
		$inizio = $body[''];
		$fine = $body[''];
		$prenota->add_prenotazione($user, $stanza, $inizio, $fine);

	break;

	case 'DELETE':
		$user = getID(5);
		$stanza = getID(6);
		$prenota->remove_prenotazione($user, $stanza);

	break;

	default:
	break;
}

function getID($num) {
    return explode('/', getenv('REQUEST_URI'))[$num];
}
?>
