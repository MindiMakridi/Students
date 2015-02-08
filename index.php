<?php


require_once "/lib/DataMapper.php";
require_once "/lib/functions.php";
require_once "/lib/PDO.php";


$token = null;
$mapper = new DataMapper($DBH);

$pages = ceil($mapper->getLastId() / $recordsPerPage);


if (getUserID()) {
    $isRegistered = getUserID();
    $token = createXsrfCookie();
    
    
} else {
    $isRegistered = 'Регистрация';
    
}

if (isset($_POST['exit'])&& $_POST['token']==$token) {
    logOut();
    header("Location: $currentPage");
    die;
}


$title           = "Студенты";
$Arrow['name']   = "";
$Arrow['group']  = "";
$Arrow['points'] = "";
$searchText      = "";
$search          = "";

$directionName   = "ASC";
$directionGroup  = "ASC";
$directionPoints = "DESC";
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

if ($sort == 'points' && $order == "DESC") {
    $directionPoints = "ASC";
}

if ($order == 'ASC') {
    $arrow = "&uarr;";
} else {
    $arrow = "&darr;";
}

switch ($sort) {
    case 'name':
        $Arrow['name'] = $arrow;
        break;
    case 'groupindex':
        $Arrow['group'] = $arrow;
        break;
    case 'points':
        $Arrow['points'] = $arrow;
        break;
        
}


if (isset($_GET['search']) && trim($_GET['search'])!= "") {
    $search     = trim($_GET['search']);
    $pages      = ceil($mapper->getSearchCount($search) / $recordsPerPage);
    $table      = $mapper->searchStudents($search, $num, $recordsPerPage, $sort, $order);
    $searchText = "Показываются только студенты, найденные по словам $search";
} else {
    $table = $mapper->showStudents($sort, $order, $num, $recordsPerPage);
    
}
$link                    = htmlspecialchars($currentPage) . "?order=" . htmlspecialchars(urlencode($sort), ENT_QUOTES) . "&amp;direction=" . htmlspecialchars(urlencode($order), ENT_QUOTES);
$searchLink              = htmlspecialchars(urlencode($currentPage)) . "?order=" . htmlspecialchars(urlencode($sort), ENT_QUOTES) . "&amp;direction=" . htmlspecialchars(urlencode($order), ENT_QUOTES) . "&amp;search=" . htmlspecialchars(urlencode($search), ENT_QUOTES);
$tableLink['name']       = "order=name&amp;direction=" . $directionName . "&amp;num=0";
$tableLink['groupindex'] = "order=groupindex&amp;direction=" . $directionGroup . "&amp;num=0";
$tableLink['points']     = "order=points&amp;direction=" . $directionPoints . "&amp;num=0";

include "/templates/main.html";


include "/templates/footer.html";

