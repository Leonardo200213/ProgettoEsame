<?php
$method = $_SERVER["REQUEST_METHOD"];

include("class/classLezioni.php");

$les = new Lezioni(); 

switch($method) 
{
	case 'GET':
	$pt = "";
	$pren = getID(5);
	if(isset($pren)){
		//$pt = $prenota->get_prenotazione($id); 
	}
	else{
	    //$pt = $prenota->get_all_prenotazioni();
		$pt = $les->get_mie_Lezioni();
	}
	$js_encode = json_encode(array('corsi'=>$pt),true);
	header("Content-Type: application/json");
    echo $js_encode;
	break;
	
	case 'POST':
		$body = json_decode(@file_get_contents('php://input'), true);
		$user = $body[''];
		$corso = $body[''];
		$les->add_iscrizione($user, $corso);

	break;

	case 'DELETE':
		$user = getID(5);
		$corso = getID(6);
		$les->remove_iscrizione($user, $corso);

	break;

	default:
	break;
}

function getID($num) {
    return explode('/', getenv('REQUEST_URI'))[$num];
}
?>