<?php 
namespace MyClass;
use MyClass\TemplateBase;
class OtherTemplateObject extends TemplateBase 
{ 
	public function Step3($num) 
	{ 
		echo "原始工序:第三步 除以3<br/>"; 
		$result = $num/3;
		return $result;
	} 
} 
