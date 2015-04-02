<?php 
namespace MyClass;
use MyInterFace\State;
use MyClass\StateA;
class StateB implements State 
{ 
	public function handle($context) 
	{ 
		$context->setState(new StateA()); 
	} 
	
	public function display() 
	{ 
		echo "µ±Ç°ÊÇ:state B<br/>"; 
	} 
} 