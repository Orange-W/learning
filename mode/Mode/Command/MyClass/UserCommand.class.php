<?php 
namespace MyClass;
use MyInterFace\MyCommand;
class UserCommand implements MyCommand{
  private $user;
  
  function checkCommand( $command, $description ){
	  switch($command){
		  case "addUser":  $function = "addUser"; break;
		  case "printUser":  $function = "printUser"; break;
		  default: return false;
	  }
	  
	  $this->run($function,$description);
  }
  
  function run( $function,$description ){
	  $this->$function($description);
  }
  
  function addUser($name){
	  $this->user = $name;
  }
  
  function printUser($description){
	  echo "添加用户: ".$this->user.'<br/>描述: '.$description.'<br/>';
  }
  
}
