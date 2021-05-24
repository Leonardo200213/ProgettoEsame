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
		
	default:
	break;
}

function getID() {
    return explode('/', getenv('REQUEST_URI'))[5];
}


?>