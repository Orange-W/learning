<?php 
// 迭代器模式
/* 提供一个方法顺序访问一聚合对象中的各个元素,而又不暴露对象的内部表示 */

$objSomeInterator=new MyClass\MyInterator(array('第一个','我是二','老三',4,6,7));
echo$objSomeInterator->first(),"<br/>";
echo$objSomeInterator->next(),"<br/>";
echo$objSomeInterator->current(),"<br/>";
echo$objSomeInterator->current(),"<br/>";
echo$objSomeInterator->next(),"<br/>";
echo$objSomeInterator->current(),"<br/>";
echo$objSomeInterator->printAll(),"<br/>";