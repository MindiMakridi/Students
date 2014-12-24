<?php
$host = 'localhost';
$dbname = 'students';
$user = "root";
$pass = "chlenokok";

try{
	$DBH= new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
}

catch(PDOException $e){
	echo $e->getMessage();
}


?>
