<?php
abstract class databaseAccess
{
	public $connection;
	public  $database;
	public function __construct($db) {
		$this->database=$db;
	}
	public function mycreateConnection(){

		$servername = "localhost";
		$conn = new mysqli($servername, "root","",$this->database);
		$conn->set_charset("utf8");
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		$this->connection=$conn;
		//echo "con";
	}
    public function createConnection(){
        try {
            $user='root';
            $pass = '';
           $conn = new PDO('mysql:host=localhost;dbname='.$this->database, $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        $this->connection=$conn;

    }
	public function closeConnection(){
		$this->connection->close();
	}
	function query($sql){
		$result = $this->connection->query($sql);
		$this->printError();
		return $result;
}
function printError(){
	echo mysqli_error($this->connection);}
	

	
    // Force Extending class to define this method
    abstract  function createTable();
    abstract  function getRow($id);
	abstract  function deleteRow($id);

}

?>