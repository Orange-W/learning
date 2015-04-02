<?php 
namespace MyClass;
class carfacade { 
	public function catgo($carref){ 
		$carref->check_stop(); 
		$carref->check_box(); 
		$carref->check_console(); 
		$carref->start(); 
	} 
} 
