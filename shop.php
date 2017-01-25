<?php

include_once "itemSpec.php";
include_once "shopDBAccess.php";


class Shop{

private $categories;
private $shopID;
private $name;

public function create_dbAccess($database){
		$dbAccess = new shopDBAcess($database);                   
		$dbAccess->mycreateConnection();
		return $dbAccess;
		
	}

public function __construct($id) {
	$this->shopID=$id;
	
	}
public function setName($name){
	$db=$this->create_dbAccess("ds"); 
	$db->updateShop($name,$this->shopID);
	$this->name=$name;
}
public function getName(){
	return $this->name;
}
public function getID(){
	return $this->shopID;
}

public function addCategoryToShop($category){
	$db=$this->create_dbAccess("ds");
	$db->addCategory($category->getID(),$this->shopID);
	$this->categories[$category->getId()]=$category;
}
public function deleteCategoryFromShop($category){
	unset($this->categories[$category->getId()]);
	$db=$this->create_dbAccess("ds");
	$db->deleteCategory($category->getID(),$this->shopID); 

}

public function getAllCategories(){
	return $this->categories;            
}
function search($itemSpec){
	$result=[];
	foreach($this->categories as $category){
		//echo $category->getCategoryType();		
		$items=$category->getAllItems();
		foreach($items as $item){
			//echo $item->getId();
			if($item->getSpec()->match($itemSpec))
				array_push($result,$item);
		}
		
	}
	return $result;
}
public function setAllCategories($categories){//just use this function if categories are already inserted in shop-category 
	return $this->categories=$categories;            
}

}
	 
?>