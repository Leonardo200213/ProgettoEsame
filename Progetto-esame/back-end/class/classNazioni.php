<?php
include("DBConnection.php");

class Stati
{
	private $db;
	public $_nome;

	public function __construct() {
		$this->db = new Connection();
		$this->db = $this->db->get_connection();
	} 
	
	public function all(){
		$sql = "SELECT nome FROM nazione";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		return $result;
	}
}

?>