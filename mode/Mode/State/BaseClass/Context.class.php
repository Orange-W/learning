<?php 
namespace MyClass;
class Context 
{ 
	private $_state = null; 
	public function __construct($state) 
	{ 
		$this->_state = $state; 
	} 
	
	public function setState($state) 
	{ 
		$this->turning();
		$this->_state = $state; 
	} 
	
	public function request() 
	{ 
		$this->_state->display(); 
		$this->_state->handle($this); 
	} 
	
	public function turning() 
	{ 
		echo '×ª»»ÖÐ...<br><br>';
	} 
} 