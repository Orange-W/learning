<?php
namespace MyInterFace;

interface None{
	
}

interface MyCommand
{
  function checkCommand( $command, $description );
  function run( $command, $description );
}


