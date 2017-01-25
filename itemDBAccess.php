<?php
include_once "databaseAccess.php";
class itemDBAcess extends databaseAccess{

public function createTable(){
	echo "jadval sakhte";
	$sql="CREATE TABLE IF NOT EXISTS `itemmodel` (
  `itemid` int(11) NOT NULL AUTO_INCREMENT,
  `price` int(11) NOT NULL,
  `properties` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=284 ;
";
	return $this->query($sql);
}

function addItem($price,$properties){
		$sql = "INSERT INTO `itemmodel`( `price`, `properties`) VALUES ('$price','$properties');";
		$this->query($sql);
		$sql = "SELECT * FROM `itemModel` ;";
		$result =$this->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$lastId=$row["itemid"];
			}}
		//echo $lastId;
		return $lastId;
		
	}
function updateTable($id,$price,$property){
	
		$sql = "UPDATE `itemmodel` SET `price`='$price',`properties`='$property' WHERE `itemid`=$id;";
		return $this->query($sql);
}	
function deleteRow($id){
		$sql =" DELETE FROM `itemmodel` WHERE `itemid`=$id;";    ////test nashode
		return $this->query($sql);
}
function getRow($id){        //getItem($id)
		$sql =" SELECT * FROM `itemModel` WHERE `itemid`=$id";
		return $this->query($sql);
}
    function getPrice($id){        //getItem($id)
        $sql =" SELECT * FROM `itemModel` WHERE `itemid`=$id";
        $result =$this->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $price=$row["price"];
            }}
        return $price;
    }

}	

?>