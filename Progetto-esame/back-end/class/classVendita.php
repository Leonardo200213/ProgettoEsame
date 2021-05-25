<?php
include("DBConnection.php");

class Vendita
{
	public $db;

    public function __construct() {
		$this->db = new Connection();
		$this->db = $this->db->get_connection();
	} 

    public function get_Ordine(){
        $sql = "SELECT ordini.descrizione, prodotto.id_prodotto, prodotto.descrizione, COUNT(prodotto.id_prodotto) * prodotto.prezzo AS importo
        FROM ordini INNER JOIN vendita ON ordini.num_ordini = vendita.id_ordine INNER JOIN prodotto ON vendita.id_prodotto = prodotto.id_prodotto
        WHERE ordini.num_ordini = 1
        GROUP BY ordini.descrizione, prodotto.id_prodotto, prodotto.descrizione";
		$stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result; 
    }

    public function add_Ordine($descr, $user){
        $sql = "INSERT INTO ordini(descrizione, num_utente) VALUES ('$descr', $user)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

    public function add_Vendita($prodotto, $ordini){
        $sql = "INSERT INTO INSERT INTO `vendita`(`id_prodotto`, `id_ordine`) VALUES ()";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }
}

?>