<?php
require_once "/lib/DataMapper.php";
require_once "/lib/functions.php";

if(getUserID()){
	$id = getUserID();
	$isRegistered = 'profile.php';
}
else{
	$id = 'Регистрация';
	$isRegistered = 'register.php';
}

$email = getUserMail();
$tag="textarea";

$title = getUserID();



$profile=$mapper->fetchProfile($email);








if(isset($_POST['submitted'])){
	
$profile->setFields($_POST);
$email = $_POST['email'];

if($mapper->fetchProfile($email) && $email!= $_COOKIE['studentscookie']['email']){
	$profile->setMailError();
}



}




if(isset($_POST['submitted']) && $profile->checkErrors()){
	
	$mapper->editProfile($profile);
    setcookie("studentscookie[email]", $profile->showEmail());
     setcookie("studentscookie[name]", $profile->showName());
}
include "/templates/template.html";
include "/templates/profile.html";
?>