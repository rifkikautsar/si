<?php
define("DEVELOPMENT",TRUE);
function dbConnect(){
    global $db;
	$db=new mysqli("localhost","root","","si");
	return $db;
}