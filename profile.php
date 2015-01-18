<?php
require_once "/lib/DataMapper.php";
require_once "/lib/functions.php";

$mapper=new StudentMapper($DBH);

$title = "Регистрация";


if (getUserCode()) {
    $isRegistered      = getUserID();
    $email   = getUserMail();
    $code = getUserCode();
    $title   = getUserID();
    $profile = $mapper->fetchProfile($code);
    $value   = "Изменить";
    $id = $profile->showID();
}
    

    
 else {
    $isRegistered      = 'Регистрация';
    $value   = "Зарегистрироваться";
    $profile = new profile;
    $id = 0;
 }


 if (isset($_POST['submitted'])) {
        
        $profile->setFields($_POST);
        $email = $_POST['email'];
       
        
        if ($mapper->fetchMail($email, $id)) {
            $profile->setMailError();
            
        }
    }



   if (isset($_POST['submitted']) && $profile->checkErrors()) {
        if(!getUserCode()){
        $profile->generateCode();
        $mapper->addStudent($profile);
        setcookie("studentscookie[code]", $profile->showCode(), time()+(7*24*60*60*42), "/");
    }
    else{
         $mapper->editProfile($profile);
    }
        updateStudentCookie($profile->showName(), $profile->showEmail());
        header("Location: $Configredirect");
    }      


include "/templates/header.html";
include "/templates/profile.html";
include "/templates/footer.html";
?>