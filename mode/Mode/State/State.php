<?php 

/*状态模式*/
/*允许一个对象在其内部状态改变时改变它的行为,对象看起来似乎修改了它所属的类 */

$objContext = new \MyClass\Context(new \MyClass\StateB()); 
$objContext->request(); 
$objContext->request(); 
$objContext->request(); 
$objContext->request(); 
$objContext->request(); 