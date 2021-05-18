<?php
$method = $_SERVER["REQUEST_METHOD"];

include("class/classNazioni.php");
$stati = new Stati(); 

switch($method) 
{
	case 'GET':
	$nat = $stati->all();
	$js_encode = json_encode(array('nazioni'=>$nat),true);
	 header("Content-Type: application/json");
	 echo $js_encode;
		
	break;
		
	default:
	break;
}

?>