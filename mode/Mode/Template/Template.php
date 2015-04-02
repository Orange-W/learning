<?php 
use MyClass\TemplateObject;
use MyClass\NextTemplateObject;
use MyClass\OtherTemplateObject;

$objTemplate = new TemplateObject(); 
$objTemplate1 = new NextTemplateObject(); 
$objTemplate2 = new OtherTemplateObject(); 

$objTemplate->runStep(); 
$objTemplate1->runStep(); 
$objTemplate2->runStep(); 