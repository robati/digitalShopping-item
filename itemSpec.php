<?php
////////////////////////////////////////enum////////////////////////////////////////
abstract class type{
const cellPhone = "cellPhone";
const camera = "camera";
const tv="tv";	
const adaptor="adaptor";
}
abstract class builder{
const samsung="SAMSUNG";
const sony="SONY";
const apple="APPLE";	
}

////////////////////////////////////////itemSpec////////////////////////////////////////
abstract class itemSpec{ 
	public $matchMethod;
	public $properties;
	public function match($itemSpec){
	
	return $this->matchMethod->match($this,$itemSpec);
	}
	public function getProperty($propertyName){
		return $this->properties[$propertyName];
	}
}
////////////////////////////////////////matchMethod////////////////////////////////////////
interface matchMethod
{
	
    public function match($itemSpec,$itemspec2);
}
////////////////////////////////////////matchMethod implementations////////////////////////////////////////
class basicMatch implements matchMethod
{
	public function getTypeofmatch(){
		echo "basicMatch";
	}
	 public function match($itemSpec2,$itemSpec){//the second one is more important .it is what we're looking for

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
////////////////////////////////////////itemSpec extends////////////////////////////////////////
class basicItemSpec extends itemSpec{
	public function __construct(){
		$this->matchMethod=new basicMatch();
		$this->properties=[];
	}
	public function setProperty($propertyName,$propertyValue){ //WARNING:do not use on spec that belongs to an item. set a new spec for item
		$this->properties[$propertyName]=$propertyValue;
	}
		
	public function getProperty($propertyName){
		return $this->properties[$propertyName];
	}
	public function getProperties(){
		return $this->properties;
	}
	public function setProperties($properties){
		$this->properties=$properties;
	}
	//setProperties(json_decode($row['properties']))
}