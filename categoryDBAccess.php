<?php
require_once "databaseAccess.php";
class categoryDBAcess extends databaseAccess{
	public function createTable(){
	echo "jadval sakhte";
	
	$sql="CREATE TABLE IF NOT EXISTS `category-item` (
  `categoryID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=23 ;
";
	$this->query($sql);
	
	echo "jadval sakhte";
	
	$sql="CREATE TABLE IF NOT EXISTS `categorymodel` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryType` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=50 ;

";
	return $this->query($sql);
}
public function getCategoryItems($categoryID){
	$sql = "SELECT * FROM `category-item` WHERE`categoryID`=$categoryID;";
	return $this->query($sql);
}

public function addItemtoCategory($categoryID,$itemID){   
		$sql = "INSERT INTO `category-item`( `itemid`,`categoryID`) VALUES ('$itemID','$categoryID')";
		return $this->query($sql);
}
public function deleteCategoryItem($categoryID,$itemID){   
		$sql="DELETE  FROM `category-item` WHERE `categoryID`=$categoryID AND`itemID`='$itemID';";
		return $this->query($sql);
}
public function createCategory($type){   
		$sql = "INSERT INTO `categorymodel`( `categoryType`) VALUES ('$type')";
		$result=$this->query($sql);
		if($result){
		$sql = "SELECT * FROM `categorymodel` ;";
		$result = $this->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$lastId=$row["categoryID"];
			}}
		//echo $lastId;
		return $lastId;}
		return 0;
}

function updateCategory($type,$id){
		$sql="UPDATE `categorymodel` SET `categoryType`='$type' WHERE `categoryID`='$id'";
		return $this->query($sql);
}

public  function getRow($id){   //getCategory($id)
	
	$sql = "SELECT * FROM `categorymodel` WHERE `categoryID`=$id;";
		return $result = $this->query($sql);
	
}
public  function deleteRow($id){
	$sql = "DELETE  FROM `categorymodel` WHERE `categoryID`=$id;";
		return $result = $this->query($sql);
	
}
}
?>