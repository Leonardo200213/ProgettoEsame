<?php

class Connection 
{
	private $_dbHostname = "localhost";
	private $_dbPort = "3308";
    private $_dbName = "catalogo";
    private $_dbUsername = "root";
    private $_dbPassword = "";
    private $_con;
	
	public function __construct(){
		try{
			$this->_con = new PDO("mysql:host=$this->_dbHostname;port=$this->_dbPort;dbname=$this->_dbName", 
			$this->_dbUsername, $this->_dbPassword);
			$this->_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->_con->exec('SET NAMES utf8');
		} catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}
	
	public function get_connection(){
        return $this->_con;
	}	
}
?>