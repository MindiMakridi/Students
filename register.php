<?php
setcookie('studentscookie', "", time()+60*60*24*365);
mb_internal_encoding('utf-8');

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

$tag="input type='text'";

$title = "Регистрация";



$profile=new profile;
if(isset($_POST['submitted'])){
	
$profile->setFields($_POST);
$email = $_POST['email'];
if($mapper->fetchProfile($email)){
	$profile->setMailError();
}



}




if(isset($_POST['submitted']) && $profile->checkErrors()){
	$mapper->addStudent($profile);
    setcookie("studentscookie[email]", $profile->showEmail());
     setcookie("studentscookie[name]", $profile->showName());
     header("Location: $redirect");
}
include "/templates/template.html";
include "/templates/profile.html";
