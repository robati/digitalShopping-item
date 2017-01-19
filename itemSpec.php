<?php
abstract class type{
const cellPhone = "cellPhone";
const camera = "camera";
const tv="tv";	
}
abstract class builder{
const samsung="SAMSUNG";
const sony="SONY";
const apple="APPLE";	
}
abstract class itemSpec{ 
	public $matchMethod;
	public $properties;
	public function match($itemSpec){
	
	return $this->matchMethod->match($this,$itemSpec);
	}
}
interface matchMethod
{
	
    public function match($itemSpec,$itemspec2);
}
class basicMatch implements matchMethod
{
	public function getTypeofmatch(){
		echo "basicMatch";
	}
	 public function match($itemSpec2,$itemSpec){//dovomi mohem tare chon chizie ke donbaleshim 
			/*if($itemSpec->properties==$itemspec2->properties)
				return true;
		*/
			foreach($itemSpec->properties as $name => $value) {
				if(isset($itemSpec2->properties[$name])){
					if($value!=$itemSpec2->properties[$name]){
						return false;			//common value differs
					}
				}
				else{
					return false;                   //doesnt have the commmon value
			}
			}
		return true;
	}
}
class basicItemSpec extends itemSpec{
	public function __construct(){
		$this->matchMethod=new basicMatch();
		$this->properties=[];
	}
/* 	public function match($itemSpec){
		echo "m1";
		
	$this->matchMethod->match($this,$itemSpec);
	} */
	public function setProperty($propertyName,$propertyValue){
		$this->properties[$propertyName]=$propertyValue;
		}
		
		//array_push($this->properties,$propertyName,$propertyValue);
	public function getProperty($propertyName){
		return $this->properties[$propertyName];
	}
	public function getProperties(){
		return $this->properties;
	}
}
/* $class = new basicItemSpec;
$class->setProperty("name","bache");
print_r( $class->getProperties());
echo "<br/>".$class->getProperty("name"); */