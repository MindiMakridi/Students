<?php
require_once "/lib/PDO.php";

require_once "/lib/DataMapper.php";
require_once "/lib/functions.php";

$title = $_COOKIE['studentscookie']['name'];
$email=  $_COOKIE['studentscookie']['email'];



$profile=$mapper->fetchProfile($email);






include "/templates/template.html";

if(isset($_POST['submitted'])){
	
$profile->setFields($_POST);
$email = $_POST['email'];

if($mapper->fetchProfile($email) && $email!= $_COOKIE['studentscookie']['email']){
	$profile->setMailError();
}



}


include "/templates/profile.html";

if(isset($_POST['submitted']) && $profile->checkErrors()){
	$data['name'] = $profile->showName();
	$data['sname'] = $profile->showSname();
	$data['groupindex'] = $profile->showGroupIndex();
	$data['email'] = $profile->showEmail();
	$data['points'] = $profile->showPoints();
	$data['birthdate'] = $profile->showBirthDate();
	$data['sex'] = $_POST['sex'];
	$mapper->editProfile($data);
    setcookie("studentscookie[email]", $data['email']);
     setcookie("studentscookie[name]", $data['name']);
}
?>