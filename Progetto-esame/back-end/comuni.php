<?php
$method = $_SERVER["REQUEST_METHOD"];

include("class/classNazioni.php");
$stati = new Stati(); 

switch($method) 
{
	case 'GET':
	$num = getID();
	$nat = "";
	if(isset($num)){
		$nat = $stati->get_comuni($num);
	}else{
		$nat = "richiesta non supportata ";
	}
	$js_encode = json_encode(array('comuni'=>$nat),true);
	 header("Content-Type: application/json");
	 echo $js_encode;
		
	break;

	case 'PUT':
	$num = getID();
	$nat = "";
	if(isset($num)){
		$nat = $stati->get_un_comune($num);
	}else{
		$nat = "richiesta non supportata ";
	}
	$js_encode = json_encode(array('comuni'=>$nat),true);
	 header("Content-Type: application/json");
	 echo $js_encode;
		
	break;

	case 'POST':
		$body = json_decode(@file_get_contents('comuni.json'), true);

		foreach($body as $key => $val)
		{
			$id_comune = $val['codice'];
			$località = $val['nome'];
			foreach($val['cap'] as $key => $valore)
			{
			$cap = $valore;
			}
			$id_provincia = $val['provincia']['codice'];
			$stati->insert_comune($id_comune, $località, $cap, $id_provincia);
		}
	
	break;
		
	default:
	break;
}

function getID() {
    return explode('/', getenv('REQUEST_URI'))[5];
}


?>