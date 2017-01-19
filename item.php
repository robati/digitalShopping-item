<?php
include "itemDBAccess.php";
include "itemSpec.php";
class item{
	public $itemSpec;
	private $itemID;
	private $price;

	/*public function __construct($id){
		$class = new itemDBAcess("ds");
		$class->createConncection();
		$allres=$this->itemID=$class->getRow($id);
		echo $allres;
		//$this->itemSpec=$property2;
	//	$this->price=$price2;
		
	}*/
	public function create_dbAccess($database){
		$dbAccess = new itemDBAcess($database);                   
		$dbAccess->createConncection();
		return $dbAccess;
		
	}
	public function __construct($price2,$property2){

		$class=$this->create_dbAccess("ds");
		$this->itemID=$class->addItem($price2,json_encode($property2->getProperties()));
		$this->itemSpec=$property2;
		$this->price=$price2;
		
	}
	public function getSpec(){
		return $this->itemSpec;
	}
	public function setSpec($itemSpec2){
		$class=$this->create_dbAccess("ds");
		echo $class->updateTable($this->itemID,$this->price,json_encode($itemSpec2->getProperties())); 
		$this->itemSpec=$itemSpec2;
	}
	public function getID(){
		return $this->itemID;
	}
	public function getPrice(){
		return $this->price;
	}
	public function setPrice($price){
		$class=$this->create_dbAccess("ds");
		echo $class->updateTable($this->itemID,$price,$this->itemSpec);
		$this->price=$price;

	 }}
$spec=new basicItemSpec();
$spec->setProperty("type",type::cellPhone);
$spec->setProperty("builder",builder::samsung);
$class = new item(5,$spec);
print_r ($class->getSpec()->getProperties());
//echo "<br/>=".$class->getSpec()->match($spec).".<br/>";
if($class->itemSpec->match($spec))
	echo "matched";
else
	echo "didn't match";
$spec2=new basicItemSpec();
$spec2->setProperty("builder",builder::sony);
$spec2->setProperty("type",type::cellPhone);
$class->setSpec($spec2);
//$spec3=$spec2;
$spec3=new basicItemSpec();
$spec3->setProperty("type",type::cellPhone);
print_r ($class->getSpec()->getProperties());
print_r ($spec2->getProperties());
print_r ($spec3->getProperties());
echo "<br/>";
if($class->itemSpec->match($spec))
	echo "matched";
else
	echo "didn't match";

echo "<br/>";
echo"m1";
if($class->itemSpec->match($spec3))
	echo "matched";
else
	echo "didn't match";
/* echo $class->getprice();
echo $class->getID()."<br/>";
echo $class->setPrice(12)."<br/>";
echo $class->getprice(); */
?>