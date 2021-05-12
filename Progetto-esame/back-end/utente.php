<?php
$method = $_SERVER["REQUEST_METHOD"];

include("class/classUtente.php");
$utenti = new Persona(); 

switch($method) 
{
	case 'GET':
	$iden = getID();
	$pt = $utenti->inserisci($iden);
	$js_encode = json_encode(array('clienti'=>$pt),true);
	 header("Content-Type: application/json");
	 echo $js_encode;
		
	break;
		
	case 'POST':
	$pt = $utenti->inserisci();
	$js_encode = json_encode(array('clienti'=>$pt),true);
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