<?php
include_once "itemDBAccess.php";
include_once "itemSpec.php";
class item{
	private $itemSpec;
	private $itemID;
	private $price;

	public function create_dbAccess($database){
		$dbAccess = new itemDBAcess($database);                   
		$dbAccess->mycreateConnection();
		return $dbAccess;
		
	}
	public function __construct($id){

		$this->itemID=$id;
		
	}
	public function getSpec(){
		return $this->itemSpec;
	}
	public function setSpec($itemSpec){
		$db=$this->create_dbAccess("ds");
		$db->updateTable($this->itemID,$this->price,json_encode($itemSpec->getProperties())); 
		$this->itemSpec=$itemSpec;
	}
	public function getID(){
		return $this->itemID;
	}
	public function getPrice(){
		return $this->price;
	}
	public function setPrice($price){
		$db=$this->create_dbAccess("ds");
	    $db->updateTable($this->itemID,$price,json_encode($this->itemSpec->getProperties()));
		$this->price=$price;

	 }}

?>