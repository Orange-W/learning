<?php 
namespace MyClass;
use MyClass\TemplateBase;
class NextTemplateObject extends TemplateBase 
{ 
	public function Step2($num) 
	{ 
		echo "原始工序:第二步 乘2<br/>"; 
		$result = $num*2;
		return $this->Step3($result); 
	} 
} 
