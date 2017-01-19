<?php
include "databaseAccess.php";
class itemDBAcess extends databaseAccess{

public function createTable(){
	echo "jadval sakhte";
}




function getItem($id){
		$sql = "SELECT * FROM `itemModel` WHERE itemid= '" . $id. "';";
		$result = $this->connection->query($sql);
		echo mysqli_error($this->connection);
		return $result;
		
	}
function addItem($price,$properties){
		$sql = "INSERT INTO `itemmodel`( `price`, `properties`) VALUES ('$price','$properties');";
		$result = $this->connection->query($sql);
		echo mysqli_error($this->connection);
	
		$sql = "SELECT * FROM `itemModel` ;";
		$result = $this->connection->query($sql);
		echo mysqli_error($this->connection);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$lastId=$row["itemid"];
			}}
		//echo $lastId;
		return $lastId;
		
	}
function updateTable($id,$price,$property){
	
		$sql = "UPDATE `itemmodel` SET `price`='$price',`properties`='$property' WHERE `itemid`=$id;";
		$result = $this->connection->query($sql);
		echo mysqli_error($this->connection);
		return $result;
}	
function deleteRow($id){
	$sql =" DELETE FROM `itemmodel` WHERE `itemid`=$id;";    ////test nashode
		$result = $this->connection->query($sql);
		echo mysqli_error($this->connection);
			return $result;
}
function getRow($id){
		$sql =" SELECT * FROM `itemModel` WHERE `itemid`=$id ";      ////test nashode
		$result = $this->connection->query($sql);
		echo mysqli_error($this->connection);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$allresult=array($row["price"],$row["properties"]);
			}
			return $allresult;
			}
			return 0;
}

}	
/*$class = new itemDBAcess("ds");
echo $class->createConncection();
$class->createTable();
$result= $class->getItem("1");
if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "<br/>".$row["price"];
			
}}
*/
?>