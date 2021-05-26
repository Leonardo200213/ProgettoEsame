<?php
$method = $_SERVER["REQUEST_METHOD"];

include("class/classUtente.php");
$utenti = new Persona(); 

switch($method) 
{
	case 'GET':
	$n = 5;
	//$iden = getID($n);
	$pt = " ";
	/*if(isset($iden)){
		$pt = $utenti->get_user($iden);
	}
	else{*/
		$pt = $utenti->get_all_user();
	
	$js_encode = json_encode(array('clienti'=>$pt),true);
	header("Content-Type: application/json");
    echo $js_encode;
		
	break;
		
	case 'POST':
	$corpo = json_decode(@file_get_contents('php://input'), true);
	$cognome = $corpo['cognome'];
	$nome = $corpo['nome'];
	$sesso = $corpo['sesso'];
	$indirizzo = $corpo['indirizzo'];
	$telefono = $corpo['telefono'];
	$email = $corpo['username'];
	$pass = $corpo['password'];
	$comune = $corpo['comune'];
	
	$utenti->create_user($cognome, $nome, $sesso, $indirizzo, $telefono, $email, $pass, $comune);
		
	break;
	
	case 'DELETE':
	$iden = getID();
	$utenti->delete_user($iden);
	
	break;
	
	
	default:
	break;
}

function getID() {
    return explode('/', getenv('REQUEST_URI'))[5];
}

?>