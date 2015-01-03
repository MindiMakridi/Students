<?php

require_once "/lib/PDO.php";
require_once "/lib/DataMapper.php";
require_once "/lib/functions.php";

$student = new student;


$title = "Студенты";


$sortName = "name";
$sortGroup = "groupindex";
$sortPoints = "points";



$sort='points';
if(isset($_GET['order'])){
	$sort=$_GET['order'];

	switch ($_GET['order']) {
	case 'name':
		$sortName.=" DESC";
		break;
	case 'groupindex':
	    $sortGroup.=" DESC";
	    break;
	case 'points':
	    $sortPoints.=" DESC";
	    break;   
	
}

}

include "/templates/template.html";
include "/templates/main.html";
?>



