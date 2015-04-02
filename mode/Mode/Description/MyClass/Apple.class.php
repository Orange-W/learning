<?php
namespace MyClass;
use MyClass\Shop;

class Apple extends Shop{
	private $theObject; 
	private $name = "苹果";
	private $money = 2.5; 
	
	public function __construct($theObject){
		$this->theObject = $theObject;
	} 
	
	public function getDescription(){
		return $this->theObject->getDescription()." $this->name";
	}
	
	public function  cost(){
		return  $this->money + $this->theObject->cost();
	}
}