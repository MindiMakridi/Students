<?php
function  getUserId(){
if(isset($_COOKIE['studentscookie']['name'])){
 $id = $_COOKIE['studentscookie']['name'];
 return $id;
}
return false;
}

function getUserMail(){
	if(isset($_COOKIE['studentscookie']['email'])){
 $mail = $_COOKIE['studentscookie']['email'];
 return $mail;
}
return false;
}

function getUserCode(){
	if(isset($_COOKIE['studentscookie']['code'])){
		return $code = $_COOKIE['studentscookie']['code'];
	}
	return false;
}

function updateStudentCookie($name, $email){
 setcookie("studentscookie[email]", $email, time()+(7*24*60*60*42), "/");
 setcookie("studentscookie[name]", $name, time()+(7*24*60*60*42), "/");
}

function logOut(){
	setcookie('studentscookie[email]', "", time()-3600, '/');
    setcookie('studentscookie[name]', "", time()-3600, '/');
    setcookie('studentscookie[code]', "", time()-3600, '/');
}


?>