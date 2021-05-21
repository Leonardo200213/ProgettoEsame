<?php
include("DBConnection.php");

class Persona
{
	public $_cognome;
    public $_nome;
	public $_sesso;
	public $_età;
	public $_indirizzo;
	public $_telefono;
	public $_comune;
	public $_cap; 
	public $_email;
	public $_password;
	
	public function __construct() {
		$this->db = new Connection();
		$this->db = $this->db->get_connection();
	} 
	
	public function create_user($c, $n, $s, $i, $t, $e, $p, $cap, $id){
		$sql = "INSERT INTO utente(cognome, nome, sesso, indirizzo, telefono, email, password, cap, id_comune) VALUES('$c', '$n', '$s', '$i', $t, '$e', '$p', $cap, $id)"; 
	    $stmt = $this->db->prepare($sql);
		$stmt->execute();
	}
	
	public function inserisci($name){
		$r = $this->get_ID_N($name);
		return $r;
	}
	
	/*public function get_ID_N($name){
		$sql = "SELECT id_regione FROM regione WHERE nome = '$name'";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		return $result;
	}*/
}

?>