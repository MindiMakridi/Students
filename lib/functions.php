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


$mapper=new StudentMapper($DBH);
?>