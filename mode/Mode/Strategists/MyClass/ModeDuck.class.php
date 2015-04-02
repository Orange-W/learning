<?php
namespace MyClass;
class ModeDuck extends Duck{
	
	public function __construct(){
		$this->display();
		$f = new \MyClass\Fly();
		$q = new \MyClass\Quack();
		$this->setFly($f);
		$this->setQuack($q);
	}
	
	public function display(){
		$this->des();
		echo '喵喵喵,其实我的真实身份是一只战5喵~<br/>';
	}
}

