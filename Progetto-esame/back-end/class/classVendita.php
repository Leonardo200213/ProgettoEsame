<?php
include("DBConnection.php");

class Vendita
{
	public $db;

    public function __construct() {
		$this->db = new Connection();
		$this->db = $this->db->get_connection();
	} 

    public function get_Ordine($id){
        $sql = "SELECT ordini.descrizione, prodotto.id_prodotto, prodotto.descrizione, 
        COUNT(prodotto.id_prodotto) * prodotto.prezzo AS importo
        FROM ordini INNER JOIN vendita ON ordini.num_ordini = vendita.id_ordine 
        INNER JOIN prodotto ON vendita.id_prodotto = prodotto.id_prodotto
        WHERE ordini.num_ordini = $id
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
        $sql = "INSERT INTO `vendita`(`id_prodotto`, `id_ordine`) VALUES ()";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

    public function delete_Vendita($prodotto, $ordini){
        $sql = "DELETE FROM `vendita` WHERE `id_prodotto` = $prodotto AND `id_ordine` = $ordini";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }
    public function delete_all_Vendita($ord){
        $sql = "DELETE FROM `vendita` WHERE `id_ordine` = $ord";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

    public function delete_Ordine($id){
        delete_all_Vendita($id);
        $sql = "DELETE FROM `ordine` WHERE `num_ordini` = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

    public function get_Prodotto($id){
        $sql = "SELECT prodotto.id_prodotto, prodotto.descrizione, prodotto.prezzo, 
        artista.id_artista, artista.cognome, artista.nome
         FROM prodotto INNER JOIN artista ON prodotto.id_artista = artista.id_artista
         WHERE prodotto.id_prodotto = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result; 
    }

    public function get_all_Prodotti(){
        $sql = "SELECT prodotto.id_prodotto, prodotto.descrizione, prodotto.prezzo, 
        artista.id_artista, artista.cognome, artista.nome
         FROM prodotto INNER JOIN artista ON prodotto.id_artista = artista.id_artista";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result; 
    }
}

?>