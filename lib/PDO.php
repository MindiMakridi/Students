<?php
require_once "/lib/config.php";

try{
	$DBH= new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
	 catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}





?>
