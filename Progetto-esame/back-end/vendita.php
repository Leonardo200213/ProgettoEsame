<?php
$method = $_SERVER["REQUEST_METHOD"];

include("class/classVendita.php");

$affitto = new Vendita(); 

switch($method) 
{
	case 'GET':

    break;

    case 'POST':
    
    break;

    case 'DELETE':

    break;

    default:
	break;
    
    
?>