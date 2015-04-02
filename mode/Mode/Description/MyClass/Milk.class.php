<?php
namespace MyClass;
use MyClass\Shop;

class Milk extends Shop{
	private $theObject; 
	private $name ="牛奶";
	private $money = 4;
	
	public function __construct($theObject){
		$this->theObject = $theObject;
	}
	
	public function getDescription(){
		return $this->theObject->getDescription()." $this->name";
	}
	
	public function  cost(){
		return $this->money + $this->theObject->cost();
	}
}