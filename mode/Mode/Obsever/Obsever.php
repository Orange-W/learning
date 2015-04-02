<?php
$data = new \MyClass\WeatherData();
$display = new \Myclass\Display($data);
$display2 = new \Myclass\Display2($data);

$data->setAll(80,65,30);

$data->setAll(01,6,98);

$data->remove($display2,$display2->returnName());

$data->setAll(101,61,998);