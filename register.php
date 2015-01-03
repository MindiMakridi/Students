<?php
setcookie('studentscookie', "", time()+60*60*24*365);
mb_internal_encoding('utf-8');
require_once "/lib/PDO.php";
require_once "/lib/profileclass.php";
require_once "/lib/DataMapper.php";
require_once "/lib/functions.php";

$title="Регистрация";


include "/templates/template.html";


$profile=new profile;
if(isset($_POST['submitted'])){
	
$profile->setFields($_POST);
$email = $_POST['email'];
if($mapper->fetchProfile($email)){
	$profile->setMailError();
}



}

include "/templates/register.html";


if(isset($_POST['submitted']) && $profile->checkErrors()){
	$data['name'] = $profile->showName();
	$data['sname'] = $profile->showSname();
	$data['groupindex'] = $profile->showGroupIndex();
	$data['email'] = $profile->showEmail();
	$data['points'] = $profile->showPoints();
	$data['birthdate'] = $profile->showBirthDate();
	$data['sex'] = $_POST['sex'];
	$mapper->addStudent($data);
    setcookie("studentscookie[email]", $data['email']);
     setcookie("studentscookie[name]", $data['name']);
     header("Location: $redirect");
}


