<?php 
namespace MyClass;
class CommandChain{
  private $_commands = array();
  
   public function addCommand( $cmd )
  {
    $this->_commands []= $cmd;
  }

  public function runCommand( $command, $description )
  {
    foreach( $this->_commands as $cmd )
    {
      if ( $cmd->checkCommand( $command, $description ) )
        return;
    }
  }
  
}
