<?php
namespace MyInterFace;

interface Subject{
	public function register($object,$name);
	public function remove($object,$name);
	public function notify();
}


interface Obsever{
	public function update($temp,$humidity,$pressure);
}

interface MyDisplay{
	public function display();
}
