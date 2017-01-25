<?php
include_once "category.php";
include_once "shop.php";
include_once "itemDBAccess.php";
include_once "categoryDBAccess.php";
include "../FrameWork/Factory.php";
function compareProperty(){
	$factory=new createFactory();
	
	$spec=new basicItemSpec();
	$spec->setProperty("type",type::cellPhone);
	$spec->setProperty("builder",builder::samsung);
	$item=$factory->createItem(32,$spec);
	
	$category=$factory->createCategory(array($item),categoryType::digital);
	$list[0]=$item;

	$spec2=new basicItemSpec();
	$spec2->setProperty("type",type::tv);
	$spec2->setProperty("builder",builder::samsung);
	$item2=$factory->createItem(15,$spec2);
	$list[1]=$item2;

	$spec3=new basicItemSpec();
	$spec3->setProperty("type",type::adaptor);
	$spec3->setProperty("builder",builder::samsung);
	$item3=$factory->createItem(50,$spec3);
	$list[2]=$item3;


	$list=$category->compare($list,"price");
	echo "compare price<br/>";
	foreach ($list as $item) {
	   echo $item->getprice()."<br/>";
	}
	echo "compare property<br/>";
	$list=$category->compare($list,"type");
	foreach ($list as $item) {
		echo $item->getSpec()->getProperty("type")."<br/>";
}
}
function addToCategory(){

	$Factory=new getFactory();
	$category=$Factory->getCategory(82);
	
	$Factory2=new createFactory();
	$spec=new basicItemSpec();
	$spec->setProperty("type",type::adaptor);
	$spec->setProperty("builder",builder::samsung);
	$item=$Factory2->createItem(22,$spec);
	
	echo "<br/> itemID=";
	echo $item->getID();
	$category->addItem($item);

	echo "<pre>";
	print_r($category->getAllItems());
	echo "</pre>";

}
function categoryType(){
		$factory=new createFactory();
		$category=$factory->createCategory([],categoryType::digital);
		echo $category->getCategoryType();
		echo "<br/> ";
		/* $Factory=new getFactory();
		$category=$Factory->getCategory(82); */
		$category->setCategoryType(categoryType::food);
		echo $category->getCategoryType();
}
function addCategory2Shop(){
	$factory=new createFactory();
	$factory2=new getFactory();
	$item=$factory2->getItem(320);
	$category=$factory->createCategory(array($item),categoryType::food);
	$shop=$factory->createShop("amazon",array($category));
	
	echo "<br/> categoryID=";
	echo $category->getID();

	$category1=$factory->createCategory([],categoryType::digital);
	$shop->addCategoryToShop($category1);
	echo "<br/>shopID=";
	echo $shop->getID();	
	echo "<pre>";
	print_r( $shop->getAllCategories());
	echo "</pre>";
}
function shopName(){
	$factory=new createFactory();
	$shop=$factory->createShop("digikala",[]);
	echo $shop->getName();
	echo "<br/>";
	$shop->setName("amazon");
	echo $shop->getName();
	
	}
function shopSearch(){
	$factory=new createFactory();
	$shop=$factory->createShop("digikala",[]);
	echo $shop->getID();
	$spec3=new basicItemSpec();
	$spec3->setProperty("type",type::adaptor);
	$spec3->setProperty("builder",builder::samsung);
	$item3=$factory->createItem(35,$spec3);
	$category=$factory->createCategory(array($item3),categoryType::food);
	
	$shop->addCategoryToShop($category);
	
	$spec=new basicItemSpec();
	$spec->setProperty("type",type::cellPhone);
	$spec->setProperty("builder",builder::samsung);
	$item = $factory->createItem(12,$spec);
	
	
	$spec2=new basicItemSpec();
	$spec2->setProperty("type",type::tv);
	$spec2->setProperty("builder",builder::sony);
	$item2 = $factory->createItem(35,$spec2);
	
	$category1=$factory->createCategory(array($item,$item2),categoryType::digital);
	$shop->addCategoryToShop($category1);
	
	$searchSpec=new basicItemSpec();
	$searchSpec->setProperty("type",type::cellPhone);
	$searchSpec->setProperty("builder",builder::samsung);
	echo "<pre>";
	print_r( $shop->search($searchSpec));
	echo "<pre/>";
}

function createTables(){
	$dbAccess = new itemDBAcess('ds');                   
	$dbAccess->mycreateConnection();
	$dbAccess->createTable();
	$dbAccess = new categoryDBAcess('ds');                   
	$dbAccess->mycreateConnection();
	$dbAccess->createTable();
	$dbAccess2 = new shopDBAcess('ds');                   
	$dbAccess2->mycreateConnection();
	$dbAccess2->createTable();
}
function getRow(){
	$dbAccess = new categoryDBAcess('ds');                   
	$dbAccess->mycreateConnection();
	print_r($dbAccess->getRow(50)->fetch_assoc());
	echo "<br/>";
	$dbAccess2 = new shopDBAcess('ds');                   
	$dbAccess2->mycreateConnection();
	print_r($dbAccess2->getRow(23)->fetch_assoc());
	echo "<br/>";
	$dbAccess3 = new itemDBAcess('ds');                   
	$dbAccess3->mycreateConnection();
	print_r($dbAccess3->getRow(291)->fetch_assoc());
}
function deleteRow(){
	$dbAccess = new itemDBAcess('ds');                   
	$dbAccess->mycreateConnection();
//	print_r($dbAccess->deleteRow(284));
	$dbAccess = new shopDBAcess('ds');                   
	$dbAccess->mycreateConnection();
//	print_r($dbAccess->deleteRow(24));
	$dbAccess = new categoryDBAcess('ds');                   
	$dbAccess->mycreateConnection();
//	print_r($dbAccess->deleteRow(77));
}
function matchSpec(){
	$spec=new basicItemSpec();
	$spec->setProperty("type",type::cellPhone);
	$spec->setProperty("builder",builder::samsung);
		$Factory=new createFactory();
	$item=$Factory->createItem(5,$spec);
	print_r ($item->getSpec()->getProperties());

	if($item->getSpec()->match($spec))
		echo "matched";
	else
		echo "didn't match";
	echo "<br/>";
	$spec2=new basicItemSpec();
	$spec2->setProperty("builder",builder::sony);
	$spec2->setProperty("type",type::cellPhone);
	print_r ($spec2->getProperties());
	if($item->getSpec()->match($spec2))
		echo "matched";
	else
		echo "didn't match";


}
function setItemPrice(){
	$spec=new basicItemSpec();
	$spec->setProperty("type",type::cellPhone); 
	$spec->setProperty("builder",builder::samsung);
	$Factory=new createFactory();
	$item=$Factory->createItem(5,$spec);
	echo "price:";
	echo $item->getprice()."<br/>ID:";
	echo $item->getID()."<br/>new price:";
	$item->setPrice(12);
	echo $item->getprice();
}

function deleteCategory4Shop(){
	$factory=new createFactory();
	$shop=$factory->createShop("ebay",[]);
	$Factory2=new getFactory();
	$item1=$Factory2->getItem(320);
	$item2=$Factory2->getItem(321);
	$category=$factory->createCategory(array($item1,$item2),categoryType::digital);
	$shop->addCategoryToShop($category);
	$category1=$factory->createCategory([],categoryType::food);
	$shop->addCategoryToShop($category1);
	echo "<br/>shopID=";
	echo $shop->getID();
	echo "<br/><pre>";
	print_r( $shop->getAllCategories());
	$shop->deleteCategoryFromShop($category1);
	echo "</pre><br/><pre>";
	print_r( $shop->getAllCategories());
	echo "</pre>";
}
function deleteItemfromCategory(){
	$factory=new createFactory();
	$category=$factory->createCategory([],categoryType::digital);

	$spec=new basicItemSpec();
	$spec->setProperty("type",type::cellPhone);
	$spec->setProperty("builder",builder::samsung);
	$item = $factory->createItem(12,$spec);
	$category->addItem($item);
	$spec2=new basicItemSpec();
	$spec2->setProperty("type",type::adaptor);
	$spec2->setProperty("builder",builder::samsung);
	$item2 = $factory->createItem(35,$spec2);
	$category->addItem($item2);
	echo "<br/><pre>";
	print_r($category->getAllItems());
	$category->deleteItemfromCategory($item);
	echo "</pre><br/><pre>";
	print_r($category->getAllItems());
	echo "</pre>";

}
function itemSpec(){
	$class = new basicItemSpec;
	$class->setProperty("builder",builder::sony);
	print_r( $class->getProperties());
	echo "<br/>".$class->getProperty("builder"); 
}
function factoryCreateItem(){
	$Factory=new createFactory();
	$spec=new basicItemSpec();
	$spec->setProperty("type",type::cellPhone);
	$spec->setProperty("builder",builder::samsung);
	$item = new item(12,$spec);
	$item=$Factory->createItem(12,$spec);
	echo "<pre>";
	print_r($spec->getProperties());
	echo "</pre>";
	
}
function getfactoryItem(){
	$Factory=new getFactory();
	$item=$Factory->getItem(320);
	echo "<pre>";
	print_r($item);
	echo "</pre>";
	
	$spec=new basicItemSpec();
	$spec->setProperty("type",type::tv);
	$spec->setProperty("builder",builder::samsung);
	$item->setSpec($spec);
	echo "<pre>";
	print_r($Factory->getItem(320));
	echo "</pre>";
}
function factoryCreatecategory(){
	$Factory=new createFactory();

	$Factory2=new getFactory();
	$item1=$Factory2->getItem(320);
	$item2=$Factory2->getItem(321);
	$category=$Factory->createCategory(array($item1,$item2),categoryType::digital);
	echo "<pre>";
	print_r($category);
	echo "</pre>";
	
}
function getfactoryCategory(){
	$Factory=new getFactory();
	$category=$Factory->getCategory(84);
	echo "<pre>";
	print_r($category);
	echo "</pre>";
}
function factoryCreateShop(){
	$Factory=new createFactory();

	$Factory2=new getFactory();
	$categories[0]=$Factory2->getCategory(84);
	$categories[1]=$Factory2->getCategory(82);	
	$shop=$Factory->createShop("Amazon",$categories);
	echo "<pre>";
	print_r($shop);
	echo "</pre>";
	
}
function getfactoryShop(){
	$Factory=new getFactory();
	$shop=$Factory->getShop(26);
	echo "<pre>";
	print_r($shop);
	echo "</pre>";
}
 //compareProperty();
					//addToCategory();
///categoryType()
					//addCategory2Shop()
//shopName();
					//shopSearch();
//createTables()
//getRow();
//deleteRow();
//matchSpec();
//setItemPrice();
//deleteCategory4Shop();
//deleteItemfromCategory()
//itemSpec();

//factoryCreateItem()
//getfactoryItem();
//factoryCreatecategory();
//getfactoryCategory();
//factoryCreateShop();
//getfactoryShop();

?>