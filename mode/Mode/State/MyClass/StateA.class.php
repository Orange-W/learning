<?php 
namespace MyClass;
use MyInterFace\State;
use MyClass\StateB;
class StateA implements State 
{ 
	public function handle($context) 
	{ 
		$context->setState(new StateB()); 
	} 
	
	public function display() 
	{ 
		echo "µ±Ç°ÊÇ:state A<br/>"; 
	} 
} 