<?php
class student{
	public $name;
	public $sname;
	public $groupindex;
	public $points;
}
require_once "PDO.php";

$title = "Студенты";

$isRegistered = "<a href='register.php' class=\"navigation\">Зарегистрироваться</a>";

if(isset($_COOKIE['studentscookie']['name'])){
	$isRegistered = "<a href='profile.php' class=\"navigation\">".$_COOKIE['studentscookie']['name']."</a>";
}
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

include "template.html";
?>
<br>
<form action='index.php' method='post'>
	<input type="text" name="search">
	<input type="hidden" name="submitted" value="yes">
	<input type="submit" value="Поиск">
</form>
<br>
<table>
	<tr><th><a href='index.php?order=<?php echo urlencode($sortName) ?>'>Студент</a></th><th><a href='index.php?order=<?php echo urlencode($sortGroup) ?>'>Номер группы</a></th><th><a href='index.php?order=<?php echo urlencode($sortPoints) ?>'>Баллы</a></th></tr>

<?php


if(isset($_POST['search'])){
	$search=$_POST['search'];
$STH = $DBH->query("SELECT name, sname groupindex, points FROM students WHERE name LIKE '%$search%' OR sname LIKE '%$search%' OR groupindex LIKE '$search' OR points LIKE '$search'");
}
else{
$STH  = $DBH->query("SELECT name, sname, groupindex, points FROM students ORDER BY $sort");
}
$STH->setFetchMode(PDO::FETCH_CLASS, 'student');
while($obj = $STH->fetch()){
	echo "<tr><td>$obj->name $obj->sname</td><td>$obj->groupindex</td><td>$obj->points</td></tr>";

}
echo "</table>";

echo "</body></html>";


?>
