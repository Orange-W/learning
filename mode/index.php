<?php
$chose_mode = isset($_GET['mode'])?$_GET['mode']:"Strategists";

define('MODE_NAME',"Mode");
define('MODE_PATH', dirname(__FILE__)."/".MODE_NAME."/$chose_mode");
define('CLASS_ROOT', MODE_PATH."/MyClass");

function includeFiles($path){ 
	foreach(scandir($path) as $afile)
	{
		if($afile=='.'||$afile=='..') continue; 
		if(is_dir($path.'/'.$afile)) 
		{ 
			includeFiles($path.'/'.$afile); 
		} else { 
			include $path.'/'.$afile;
		} 
	} 
} 


include MODE_PATH."/interface.php";
includeFiles(MODE_PATH."/BaseClass");
includeFiles(CLASS_ROOT);
include MODE_PATH."/$chose_mode.php";