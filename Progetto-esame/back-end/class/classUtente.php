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
	
	public function delete_user($id){
		$sql = "DELETE FROM utente WHERE id_utente = $id";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
	}
}

?>