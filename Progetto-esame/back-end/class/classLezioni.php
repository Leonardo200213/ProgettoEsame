<?php
include("DBConnection.php");

class Lezioni
{
	public $db;
	
	public function __construct() {
		$this->db = new Connection();
		$this->db = $this->db->get_connection();
	} 

    public function get_Lezioni($inizio, $fine){
        $sql = "SELECT descrizione, prezzo, ora_inizio, ora_fine, FROM corso 
        WHERE ora_inizio = $inizio AND ora_fine = $fine";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result; 		
    }

    public function get_mie_Lezioni(){
        $sql = "SELECT corso.descrizione, corso.prezzo, corso.ora_inizio, corso.ora_fine, insegnante.cognome 
        FROM iscrizione INNER JOIN corso ON iscrizione.id_corso = corso.id_corso 
        INNER JOIN insegnante ON insegnante.id_insegnante = corso.id_insegnante";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result; 		
    }

    public function add_iscrizione($user, $corso){
        $sql = "INSERT INTO iscrizione(id_user, id_corso) VALUES($user, $corso)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();		
    }

    public function remove_iscrizione($user, $corso){
        $sql = "DELETE FROM iscrizione WHERE id_user = $user AND id_corso = $corso";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();		

    }

	
}

?>