<?php
namespace MyClass;
use \MyInterFace\QuackBehavior;
		
class Quack implements QuackBehavior{
	
	public function quack(){
		echo 'ЮвНаАЁНа<br/>';
	}
}

?>