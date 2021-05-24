<?php
include("DBConnection.php");

class Stati
{
	private $db;
	
	public function __construct() {
		$this->db = new Connection();
		$this->db = $this->db->get_connection();
	} 
	
	public function get_prenotazione($id){
		$sql = "SELECT stanza.descrizione, prenotazione.data_inizio, prenotazione.data_fine
		FROM prenotazione INNER JOIN stanza ON prenotazione.id_stanza = stanza.id_stanza
		WHERE prenotazione.id_utente = $id ";
		$stmt = $this->$db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result; 		
	}

	public function get_all_prenotazioni(){
		$sql = "SELECT stanza.descrizione, prenotazione.data_inizio, prenotazione.data_fine
		FROM prenotazione INNER JOIN stanza ON prenotazione.id_stanza = stanza.id_stanza";
		$stmt = $this->$db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result; 		
	}
	//INSERT INTO `prenotazione` (`id_utente`, `id_stanza`, `data_inizio`, `data_fine`)
	// VALUES ('14', '1', '2021-05-25 16:26:30', '2021-05-25 18:26:30');

	public function add_prenotazione($user, $stanza, $inizio, $fine){
		$sql = "INSERT INTO prenotazione(id_utente, id_stanza, data_inizio, data_fine) VALUES ($user, $stanza, $inizio, $fine)";
		$stmt = $this->$db->prepare($sql);
        $stmt->execute();
	}

	public function remove_prenotazione($id, $stanza){
		$sql = "DELETE FROM prenotazione WHERE id_utente = $id AND id_stanza = $stanza";
		$stmt = $this->$db->prepare($sql);
        $stmt->execute();
	}
}
