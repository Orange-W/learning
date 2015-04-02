<?php 
namespace MyClass;
use MyInterFace\MyCommand;
class MailCommand implements MyCommand{
  private $user;
  function checkCommand( $command, $description ){
	  switch($command){
		  case "sendMail":  $function = "sendMail"; break;
		  default: return false;
	  }
	  
	  $this->run($function,$description);
  }
  
  function run( $function,$description ){
	  $this->$function($description);
  }
  
  function sendMail($array){
	  echo '当前正在发送邮件给:'.$array[0]."<br/>内容:".$array[1];
  }
  
  
}
