<?php 
namespace MyClass;
abstract class TemplateBase 
{ 
	public function Step1($num=0) 
	{ 
		echo "原始工序:第一步 加1<br/>"; 
		$result = $num+1;
		return $this->Step2($result);
	} 

	public function Step2($num) 
	{ 
		echo "原始工序:第二步 加2<br/>"; 
		$result = $num+2;
		return $this->Step3($result);
	} 

	public function Step3($num) 
	{ 
		echo "原始工序:第三步 加3<br/>"; 
		$result = $num+3;
		return $result;
	} 

	public function runStep() 
	{ 
		$result = $this->Step1(); 
		echo "完成<br/>";
		echo "最终结果:$result<br/><br/>";
		 
	} 
} 
