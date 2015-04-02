<?php 
use MyClass\UserCommand;
use MyClass\MailCommand;
$cc = new \MyClass\CommandChain();
$cc->addCommand( new UserCommand() );
$cc->addCommand( new MailCommand() );
$cc->runCommand( 'addUser', '键盘豪' );
$cc->runCommand( 'printUser', '用户的名字' );
$cc->runCommand( 'sendMail', array(0=>'兴妈',1=>'love you!<br/>我正在用命令链给你发信~今晚约吗?') );