<?php
$method = $_SERVER["REQUEST_METHOD"];

include("class/classVendita.php");

$articoli = new Vendita(); 

switch($method) 
{
    case 'GET':
    $prd = "";
    $id = getID(5);
    if(isset($id)){
        $prd = $articoli->get_Prodotto($id);
    }
    else{
        $prd = $articoli->get_all_Prodotti();
    }
    $js_encode = json_encode(array('prodotti'=>$prd),true);
    header("Content-Type: application/json");
    echo $js_encode;
    break;
    
    case 'POST':

    break;

    default:
	break;
}

function getID($num) {
    return explode('/', getenv('REQUEST_URI'))[$num];
}

?>