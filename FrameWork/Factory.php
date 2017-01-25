<?php

/**
 * Created by PhpStorm.
 * User: Samane
 * Date: 1/23/2017
 * Time: 2:58 PM
 */
include_once "UserDBAccess.php";
include_once "itemDBAccess.php";
class createFactory
{

    public function createUser($userInfo){
        $sample=new UserDBAccess("FW");
        $userID=$sample->addUser($userInfo->email,$userInfo->firstName,$userInfo->lastName,$userInfo->phoneNumber,$userInfo->password);
        $user =new user($userID);
        $user->setUserInfo($userInfo);
        return $user;
    }
    public function createItem($price,$itemSpec){
		$dbAccess = new itemDBAcess('ds');                   
		$dbAccess->mycreateConnection();
		$itemID=$dbAccess->addItem($price,json_encode($itemSpec->getProperties()));
		$item =new item($itemID);
        $item->setSpec($itemSpec);
		$item->setPrice($price);
        return $item;
	}
    public function createCategory($items,$type){
		$dbAccess = new categoryDBAcess('ds');                   
		$dbAccess->mycreateConnection();
		$categoryID=$dbAccess->createCategory($type);
		$category=new category($categoryID);
		$category->setCategoryType($type);
		foreach($items as $item){
		$category->addItem($item);
		}
		return $category;
	}
    public function createShop($name,$categories){
		$dbAccess = new shopDBAcess('ds');                   
		$dbAccess->mycreateConnection();
		$id=$dbAccess->createShop($name);
		$shop=new shop($id);
		foreach($categories as $category){
		$shop->addCategoryToShop($category);
		}
		$shop->setName($name);
		return $shop;
		//addCategoryToShop($category)
		
	}
}

class getFactory
{
    public function getUser($id){
        $sample=new UserDBAccess("FW");
        $userinfo=$sample->getUser($id);
        $userInformation=new UserInfo($userinfo["firstName"],$userinfo["lastName"],$userinfo["password"],$userinfo["email"],$userinfo["phoneNumber"]);
        $user =new user($id);
        $user->setUserInfo($userInformation);
        return $user;
    }
    public function getItem($id){
		$dbAccess = new itemDBAcess('ds');                   
		$dbAccess->mycreateConnection();
        $row=$dbAccess->getRow($id)->fetch_assoc();
		$spec=new basicItemSpec();
		$spec->setProperties(json_decode($row['properties']));
        $item =new item($id);
        $item->setSpec($spec);
		$item->setPrice($row['price']);
        return $item; 
	}
    public function getCategory($id){
		$dbAccess = new categoryDBAcess('ds');                   
		$dbAccess->mycreateConnection();
        $row=$dbAccess->getRow($id)->fetch_assoc();
        $category =new category($id);
		$category->setCategoryType($row['categoryType']);
		$result=$dbAccess->getCategoryItems($id);
		$items=[];
		if($result){
		while($row = $result->fetch_assoc()) {
				$itemID=$row['itemID'];
				$items[$itemID]=$this->getItem($itemID);
			}
		$category->setAllItems($items);	
		}
        return $category; 
		
	}
    public function getShop($id){
		$dbAccess = new shopDBAcess('ds');                   
		$dbAccess->mycreateConnection();
        $row=$dbAccess->getRow($id)->fetch_assoc();
        $shop =new shop($id);
		$shop->setName($row['name']);
		$result=$dbAccess->getShopCategories($id);
		$categories=[];
		if($result){
		while($row = $result->fetch_assoc()) {
				$categoryID=$row['categoryid'];
				$categories[$categoryID]=$this->getCategory($categoryID);
			}
		$shop->setAllCategories($categories);	
		}
        return $shop; 
		
	}
}
