<?php


require_once "/lib/DataMapper.php";
require_once "/lib/functions.php";

if(getUserID()){
	$id = getUserID();
	

}
else{
	$id = 'Регистрация';
	
}

if(isset($_POST['exit'])){
	setcookie('studentscookie[email]', "", time()-3600);
    setcookie('studentscookie[name]', "", time()-3600);
    setcookie('studentscookie[code]', "", time()-3600);
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


if(isset($_POST['search'])){
	$search=$_POST['search'];
$table = $mapper->searchStudents($search);
}
else{
$table = $mapper->showStudents($sort, $order);

}


include "/templates/main.html";


include "/templates/footer.html";



?>





