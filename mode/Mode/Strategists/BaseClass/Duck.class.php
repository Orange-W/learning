<?php
namespace MyClass;
abstract class Duck{
		private $flyBehavior;
		private $quackBehavior;
		
		public function __construct(){
			echo "欧,从前有只小小小小亚,非非非非非不高。";
		}
		
	/*****************/	
		public function setFly($howFly){
			$this->flyBehavior = $howFly;
		}
		
		public function toFly(){
			$this->flyBehavior->fly();
		}

	
	/********************/
		public function setQuack($howQuack){
			$this->quackBehavior = $howQuack;
		}
		
		public function toQuack(){
			$this->quackBehavior->quack();
		}
		
		public function des(){
			echo "欧,从前有只小小小小亚,非非非非非不高。<br/>";
		}
}
	

?>