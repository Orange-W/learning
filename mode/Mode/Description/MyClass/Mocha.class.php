<?php
namespace MyClass;
use MyClass\Shop;

class Mocha extends Shop{
	private $theObject; 
	private $name ="抹茶";
	private $money = 8;
	
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