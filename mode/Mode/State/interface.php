<?php
namespace MyInterFace;

interface None{
	
}

interface State 
{ 
	public function handle($state); 
	public function display(); 
} 

