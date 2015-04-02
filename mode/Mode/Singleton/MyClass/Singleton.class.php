<?php 
namespace MyClass;
class Singleton{
	
	static $instance;
	
	private function __construct($char){
		echo "单例模式:$char";
	}
	
	public static function get_instance($char)
	{
		if(!(self::$instance instanceof self))
	  {
		self::$instance=new self($char);
	  }
		return self::$instance;
	}
}
