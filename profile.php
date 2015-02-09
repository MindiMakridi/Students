<?php
require_once "/lib/DataMapper.php";
require_once "/lib/functions.php";
require_once "/lib/PDO.php";


$token        = createXsrfCookie();
$message = "";
$messages = array("saved" =>"Изменения сохранены",
                 "registered" => "Вы успешно зарегистрировались",
                   "error"=>"Произошла ошибка, отправьте форму еще раз");

if (isset($_GET['msg'])) {
    $message = $messages[$_GET['msg']];
}
$mapper = new DataMapper($DBH);
if (isset($_POST['exit'])&& $_POST['token']==$token) {
    logOut();
    header("Location: $currentPage");
}

$title = "Регистрация";


if (getUserCode()) {
    $isRegistered = getUserID();
    $email        = getUserMail();
    $code         = getUserCode();
    $title        = getUserID();
    
    
    if (!($profile = $mapper->fetchProfile($code))) {
        throw new Exception("Не удалось загрузить профиль");
    }
    
    $value = "Изменить";
    $id    = $profile->showID();
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
  

    if (!getUserCode()&& $_POST['token']==$token) {
        $profile->generateCode();
        $mapper->addStudent($profile);
        $report = "registered";
        setcookie("studentscookie[code]", $profile->showCode(), time() + (7 * 24 * 60 * 60 * 42), "/");
        $token = createXsrfCookie();
        updateStudentCookie($profile->showName(), $profile->showEmail());
    } elseif($_POST['token']==$token) {
        $report = "saved";
        $mapper->editProfile($profile);
        updateStudentCookie($profile->showName(), $profile->showEmail());
    }
    else {
        $report = "error";
    }
    $report = urlencode($report);
    header("Location: http://students.ru/profile.php?msg=$report");
    die;
}



include "/templates/header.html";
include "/templates/profile.html";
include "/templates/footer.html";

