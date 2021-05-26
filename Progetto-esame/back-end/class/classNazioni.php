<?php
include("DBConnection.php");

class Stati
{
	private $db;

	public function __construct() {
		$this->db = new Connection();
		$this->db = $this->db->get_connection();
	} 
	
	public function all_regione(){
		$sql = "SELECT id_regione, nome FROM regione";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		return $result;
	}
	
	public function insert_regione($id, $nome_reg){
		$sql = "INSERT INTO `regione`(`id_regione`, `nome`) 
		SELECT * FROM (SELECT $id, '$nome_reg') AS tmp
		WHERE NOT EXISTS (Select `id_regione` From `regione` WHERE `id_regione` = $id) LIMIT 1;";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
	}
	public function insert_provincia($id, $nome_prov, $id_reg){
		$sql = "INSERT INTO `provincia`(`id_provincia`, `nome`, `id_regione`) 
		SELECT * FROM (SELECT $id, '$nome_prov', $id_reg) AS tmp
		WHERE NOT EXISTS (Select `id_provincia` From `provincia` WHERE `id_provincia` = $id) LIMIT 1;";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
	}
	public function insert_comune($id, $nome_com, $cap, $id_prov){
		$sql = "INSERT INTO `comune`(`id_comune`, `nome`, `cap`, `id_provincia`) 
		SELECT * FROM (SELECT $id, '$nome_com', $cap, $id_prov) AS tmp
		WHERE NOT EXISTS (Select `id_comune` From `comune` WHERE `id_comune` = $id) LIMIT 1;";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
	}
	
	public function get_provincie($prov){
		$sql = "SELECT id_provincia, nome FROM provincia WHERE id_regione = $prov";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		return $result;
	}
	
	public function get_comuni($com){
		$sql = "SELECT id_comune, nome, cap FROM comune WHERE id_provincia = $com";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		return $result;
	}

	function get_un_comune($com){
		$sql = "SELECT id_comune, nome, cap FROM comune WHERE id_comune = $com";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		return $result;
	}

	/*public function aggiungi_cap()){
		//$codice, $comune
		$sql = "UPDATE comune SET cap = 1 WHERE id_comune = 1002";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
	}*/
}

?>