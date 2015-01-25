<?php
require_once "/lib/DataMapper.php";
require_once "/lib/functions.php";
require_once "/lib/PDO.php";


$mapper = new DataMapper($DBH);
if (isset($_POST['exit'])) {
    logOut();
    header("Location: $currentPage");
}

$title = "Регистрация";


if (getUserCode()) {
    $isRegistered = getUserID();
    $email        = getUserMail();
    $code         = getUserCode();
    $title        = getUserID();
    if (!$mapper->fetchProfile($code)) {
        throw new Exception("Не удалось загрузить профиль");
    }
    $profile = $mapper->fetchProfile($code);
    $value   = "Изменить";
    $id      = $profile->showID();
}



else {
    $isRegistered = 'Регистрация';
    $value        = "Зарегистрироваться";
    $profile      = new Profile;
    $id           = 0;
}


if (isset($_POST['submitted'])) {
    
    $profile->setFields($_POST);
    $email = $_POST['email'];
    
    
    if ($mapper->isEmailUsed($email, $id)) {
        $profile->setMailError();
        
    }
}



if (isset($_POST['submitted']) && $profile->checkErrors()) {
    if (!getUserCode()) {
        $profile->generateCode();
        $mapper->addStudent($profile);
        setcookie("studentscookie[code]", $profile->showCode(), time() + (7 * 24 * 60 * 60 * 42), "/");
    } else {
        $mapper->editProfile($profile);
    }
    updateStudentCookie($profile->showName(), $profile->showEmail());
    header("Location: $Configredirect");
    die;
}


include "/templates/header.html";
include "/templates/profile.html";
include "/templates/footer.html";
