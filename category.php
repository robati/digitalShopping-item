<?php

include_once "item.php";
include_once "categoryDBAccess.php";
///////////////////////////////////////////////enum/////////////////////////////////////////
abstract class categoryType{
const digital="Digital";
const food = "Food";

}
///////////////////////////////////////////////category/////////////////////////////////////////
class category{
private $categoryID;
private $items;
private $type;

public function create_dbAccess($database){
		$dbAccess = new categoryDBAcess($database);                   
		$dbAccess->mycreateConnection();
		return $dbAccess;
		
	}
public function __construct($id) {

	$this->categoryID=$id;
	
	}
public function setCategoryType($type){
	$db=$this->create_dbAccess("ds"); 
	 $db->updateCategory($type,$this->categoryID);
	$this->type=$type;
}
public function getCategoryType(){
	return $this->type;
}
public function getID(){
	return $this->categoryID;
}
public function addItem($item){
	$db=$this->create_dbAccess("ds");
	if( $db->addItemtoCategory($this->categoryID,$item->getID()))
	$this->items[$item->getId()]=$item;
}
public function deleteItemfromCategory($item){
	$db=$this->create_dbAccess("ds");
	if( $db->deleteCategoryItem($this->categoryID,$item->getID()))
	unset($this->items[$item->getId()]);
}
private  function sortFunction($sortKey){
	   if($sortKey=="price"){
		    return function($a,$b)use ($sortKey){
		    return ($a->getprice()<$b->getprice())? -1:1;
	   };}
	   else{
	  return function($a,$b)use ($sortKey){
		  return ($a->getSpec()->getProperty($sortKey)<$b->getSpec()->getProperty($sortKey))? -1:1;
		  
	  }; 
	   }
	  
   ;}
public function compare($list,$propertyName){	
	usort($list,$this->sortFunction($propertyName));
	return $list;
}


public function getAllItems(){
	return $this->items;            
}
public function setAllItems($items){//just use this function if items are already inserted in category-item 
	return $this->items=$items;            
}
}
	 
?>