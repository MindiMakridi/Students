<?php


require_once "/lib/DataMapper.php";
require_once "/lib/functions.php";
require_once "/lib/PDO.php";



$mapper = new DataMapper($DBH);

$pages = ceil($mapper->getLastId() / $recordsPerPage);


if (getUserID()) {
    $isRegistered = getUserID();
    
    
} else {
    $isRegistered = 'Регистрация';
    
}

if (isset($_POST['exit'])) {
    logOut();
    header("Location: $currentPage");
    die;
}


$title       = "Студенты";
$nameArrow   = "";
$groupArrow  = "";
$pointsArrow = "";
$searchText  = "";
$search      = "";

$directionName   = "ASC";
$directionGroup  = "ASC";
$directionPoints = "ASC";
$num             = 0;
if (isset($_GET['num'])) {
    $num = $_GET['num'];
}



$sort  = 'points';
$order = 'ASC';
if (isset($_GET['order'])) {
    $sort  = $_GET['order'];
    $order = $_GET['direction'];
    if ($_GET['direction'] != 'DESC') {
        switch ($_GET['order']) {
            case 'name':
                $directionName = "DESC";
                break;
            case 'groupindex':
                $directionGroup = "DESC";
                break;
            case 'points':
                $directionPoints = "DESC";
                break;
                
                
        }
    }
}

if ($order == 'ASC') {
    $arrow = "&uarr;";
} else {
    $arrow = "&darr;";
}

switch ($sort) {
    case 'name':
        $nameArrow = $arrow;
        break;
    case 'groupindex':
        $groupArrow = $arrow;
        break;
    case 'points':
        $pointsArrow = $arrow;
        break;
        
}


if (isset($_GET['search']) && trim($_GET['search']!="")) {
    $search     = $_GET['search'];
    $table      = $mapper->searchStudents($search);
    $searchText = "Показываются только студенты, найденные по словам $search";
} else {
    $table = $mapper->showStudents($sort, $order, $num, $recordsPerPage);
    
}


include "/templates/main.html";


include "/templates/footer.html";









