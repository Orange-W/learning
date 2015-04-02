<?php 
namespace MyClass;
use MyInterFace\Interator;
class MyInterator implements Interator
{
   private $_arr=array();
   
   public function __construct($arr)
   {
		$this->_arr =$arr;
   }
   
   public function first()
   {
		return $this->_arr[0];
   }
   
   public function current()
   {
		return current($this->_arr);
   }
   
   public function next()
   {
		return next($this->_arr);
   }
   
   public function printAll()
   {
	   print_r($this->_arr);
   }
}
