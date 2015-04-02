<?php
namespace MyClass;
use MyClass;
class Factory{
	public function __construct($which){
		//getClass 产生Sample 一般可使用动态类装载装入类。
		if ($which==1)
			return new SampleA();
		else if ($which==2)
			return new SampleB();
	}
	
}
?>