<?php
require_once "/lib/DataMapper.php";
require_once "/lib/functions.php";


$title = "Регистрация";


if (getUserCode()) {
    $id      = getUserID();
    $email   = getUserMail();
    $code = getUserCode();
    $title   = getUserID();
    $profile = $mapper->fetchProfile($code);
    $value   = "Изменить";
    
    if (isset($_POST['submitted'])) {
        
        $profile->setFields($_POST);
        $email = $_POST['email'];
        
        if ($mapper->fetchMail($email) && $email != $_COOKIE['studentscookie']['email']) {
            $profile->setMailError();
        }
        
        
        
    }
    
    if (isset($_POST['submitted']) && $profile->checkErrors()) {
        
        $mapper->editProfile($profile);
        setcookie("studentscookie[email]", $profile->showEmail());
        setcookie("studentscookie[name]", $profile->showName());
        
    }
    
} else {
    $id      = 'Регистрация';
    $value   = "Зарегистрироваться";
    $profile = new profile;
    if (isset($_POST['submitted'])) {
        
        $profile->setFields($_POST);
        $email = $_POST['email'];
        if ($mapper->fetchMail($email)) {
            $profile->setMailError();
        }
        
        
        
    }
    
    if (isset($_POST['submitted']) && $profile->checkErrors()) {
        $mapper->addStudent($profile);
        setcookie("studentscookie[code]", $mapper->getCode());
        setcookie("studentscookie[email]", $profile->showEmail());
        setcookie("studentscookie[name]", $profile->showName());
        header("Location: $redirect");
    }
    
}






include "/templates/header.html";
include "/templates/profile.html";
include "/templates/footer.html";
?>