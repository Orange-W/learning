<?php
namespace MyClass;
use MyInterface\MyDisplay;
use MyInterface\Obsever;

class Display2 implements MyDisplay,Obsever{
	private $name="王艳辉";
	private $temp;
	private $humidity;
	private $pressure;
	private $weatherData;
	
	public function __construct($weatherData){
		$this->weatherData = $weatherData;
		$this->weatherData->register($this,$this->name);
	}
	
	public function update($temp,$humidity,$pressure){
		
		$this->temp = $temp;
		$this->humidity = $humidity;
		$this->pressure = $pressure;
		$this->display();
	}
	
	public function display(){
		echo "<br/>$this->name 数据跟新:<br/>";
		echo "温度:".$this->temp."<br/>湿度:".$this->humidity."%<br/><br/>";
	}
	
	public function returnName(){
		return $this->name;
	}
}