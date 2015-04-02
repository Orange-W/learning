<?php
namespace MyClass;
use MyInterface\Subject;

class WeatherData implements Subject{
	private $obsever;
	private $temp;
	private $humidity;
	private $pressure;
	
	public function __construct(){
		$this->obsever = array();
	}
	
	public function register($object,$name){
		array_push($this->obsever,$object);
		echo "用户: <font color='green'>$name</font> <br/><font color='red'>订阅成功!</font><br/><br/>";
	}
	
	public function remove($object,$name){
		$key = array_search($object,$this->obsever);
		unset($this->obsever[$key]);
		echo "$name 退订了天气报告!<br/>";
	}
	
	public function notify(){
		foreach($this->obsever as $key => $value){
			$value->update($this->temp,$this->humidity,$this->pressure);
		}
	}
	
	public function setAll($temp,$humidity,$pressure){
		$this->temp = $temp;
		$this->humidity = $humidity;
		$this->pressure = $pressure;
		$this->notify();
	}
	
}