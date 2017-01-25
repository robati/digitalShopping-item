<?php
require_once "databaseAccess.php";
class shopDBAcess extends databaseAccess{

public function addCategory($categoryID,$shopID){   
		$sql = "INSERT INTO `shop-category`( `categoryid`,`shopid`) VALUES ('$categoryID','$shopID')";
		return $this->query($sql);
}
public function deleteCategory($categoryID,$shopID){   
		$sql="DELETE  FROM `shop-category` WHERE `categoryID`=$categoryID AND`shopid`='$shopID';";
		return $this->query($sql);
}
public function createShop($name){   
		$sql = "INSERT INTO `shopmodel`(`name`) VALUES ('$name');";
		$this->query($sql);
		
		$sql = "SELECT * FROM `shopmodel` ;";
		$result = $this->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$lastId=$row["id"];
			}}
		//echo $lastId;
		return $lastId;
}
function updateShop($name,$id){
		$sql="UPDATE `shopmodel` SET `name`='$name' WHERE `id`='$id';";
		return $this->query($sql);
}	

public function createTable(){
	echo "jadval sakhte";
	
	$sql="CREATE TABLE IF NOT EXISTS `shopmodel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=23 ;
";
	$this->query($sql);
	echo "jadval sakhte";
	
	$sql="CREATE TABLE IF NOT EXISTS `shop-category` (
  `shopid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=27 ;
";
	return $this->query($sql);
	
}
public  function getRow($id){  //getShop($id)
	$sql="SELECT * FROM `shopmodel` WHERE `id`='$id';";
	return $this->query($sql);
}
public  function deleteRow($id){
	$sql="DELETE  FROM `shopmodel` WHERE `id`='$id';";
	return $this->query($sql);
}
public function getShopCategories($id){
	$sql="SELECT * FROM `shop-category` WHERE `shopid`='$id';";
	return $this->query($sql);
}
}
?>