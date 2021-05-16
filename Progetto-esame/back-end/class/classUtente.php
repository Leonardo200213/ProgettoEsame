<?php
include("DBConnection.php");

class Persona
{
	public $_cognome;
    public $_nome;
	public $_genere;
	public $_età;
	public $_indirizzo;
	public $_cellulare;
	public $_comune;
	public $_cap; 
	public $_nazione;
	
	public function __construct() {
		$this->db = new Connection();
		$this->db = $this->db->get_connection();
	} 
	
	public function inserisci($name){
		$r = $this->get_ID_N($name);
		return $r;
	}
	
	public function get_ID_N($name){
		$sql = "SELECT id_regione FROM regione WHERE nome = '$name'";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		return $result;
	}
}

?>