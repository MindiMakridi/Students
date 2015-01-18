<?php


require_once "/lib/DataMapper.php";
require_once "/lib/functions.php";

$mapper=new StudentMapper($DBH);

if(getUserID()){
	$isRegistered = getUserID();
	

}
else{
	$isRegistered = 'Регистрация';
	
}

if(isset($_POST['exit'])){
	logOut();
}


$title = "Студенты";


$directionName="ASC";
$directionGroup="ASC";
$directionPoints="ASC";



$sort='points';
$order='ASC';
if(isset($_GET['order'])){
	$sort=$_GET['order'];
	$order=$_GET['direction'];
  if($_GET['direction']!='DESC'){
	switch ($_GET['order']) {
	case 'name':
		$directionName = "DESC";
		break;
	case 'groupindex':
	    $directionGroup= "DESC";
	    break;
	case 'points':
	    $directionPoints= "DESC";
	    break; 
	      
	
}
}
}


if(isset($_GET['search'])){
	$search=$_GET['search'];
$table = $mapper->searchStudents($search);
}
else{
$table = $mapper->showStudents($sort, $order);

}


include "/templates/main.html";


include "/templates/footer.html";









