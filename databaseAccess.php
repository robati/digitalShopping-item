<?php
abstract class databaseAccess
{
	public $connection;
	public  $database;
	public function __construct($db) {
		$this->database=$db;
	}
	public function createConncection(){

		$servername = "localhost";
		$conn = new mysqli($servername, "root","",$this->database);
		$conn->set_charset("utf8");
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		$this->connection=$conn;
		//echo "con";
	}
	public function closeConnection(){
		$this->connection->close();
	}
    // Force Extending class to define this method
    abstract  function createTable();
    abstract  function getRow($id);
	abstract  function deleteRow($id);

}

?>