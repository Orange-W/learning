<?php
$a = new \MyClass\Shop();
$a = new \MyClass\Mocha($a);
$a = new \MyClass\Apple($a);

echo $a->getDescription()." <br/>价格: $".$a->cost();
?>