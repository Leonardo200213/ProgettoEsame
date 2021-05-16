<?php
$method = $_SERVER["REQUEST_METHOD"];

include("class/classNazioni.php");
$stati = new Stati(); 

switch($method) 
{
	case 'GET':
	$nat = $stati->all_regione();
	$js_encode = json_encode(array('regioni'=>$nat),true);
	 header("Content-Type: application/json");
	 echo $js_encode;
		
	break;
	
	case 'POST':
	$corpo = json_decode(@file_get_contents('comuni.json'), true);
	//$corpo = json_decode(@file_get_contents('php://input'));
	  /*$a = $corpo['name'];
	  $b = $corpo['surname'];
	  $c = $corpo['tax_code'];
	  $d = $corpo['sidi_code'];*/
	  //$student->create($a, $b, $c, $d);
	  $cont = "";
	  foreach ($corpo as $value) {
		  $id_reg = $value['regione']['codice'];
		  $nome_reg = $value['regione']['nome'];
		  $id_pr = $value['provincia']['codice'];
		  $nome_pr = $value['provincia']['nome'];
		  $id = $value['codice'];
		  $nome = $value['nome'];
		  $stati->insert_comune($id, $nome, $id_pr);
	  }
	  $js_encode = json_encode($cont,true);
	  echo $js_encode;
	break;
		
	default:
	break;
}

?>