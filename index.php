<?php


require_once "/lib/DataMapper.php";
require_once "/lib/functions.php";
require_once "/lib/PDO.php";

var_dump($_COOKIE);

$mapper=new DataMapper($DBH);

$pages = ceil($mapper->getLastId()/$recordsPerPage);


if(getUserID()){
	$isRegistered = getUserID();
	

}
else{
	$isRegistered = 'Регистрация';
	
}

if(isset($_POST['exit'])){
	logOut();
	header("Location: $currentPage");
}


$title = "Студенты";


$directionName="ASC";
$directionGroup="ASC";
$directionPoints="ASC";
$num = 0;
if(isset($_GET['num'])){
	$num = $_GET['num'];
}


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
$table = $mapper->showStudents($sort, $order, $num, $recordsPerPage);

}


include "/templates/main.html";


include "/templates/footer.html";









