<?php
setcookie('studentscookie', "", time()+60*60*24*365);
mb_internal_encoding('utf-8');
require_once "profileclass.php";
require_once "PDO.php";

$title="Регистрация";
$isRegistered = "<a href='register.php' class=\"navigation\">Зарегистрироваться</a>";

include "template.html";


$profile=new profile;
if(isset($_POST['submitted'])){
	
$profile->setFields($_POST);
$email = $_POST['email'];
$STH=$DBH->query("SELECT*FROM students WHERE email LIKE '$email'");
if($STH->fetch()){
	$profile->setMailError();
}



}

echo<<<_EMD
<form action='register.php' method='post'><pre>
Имя               <input type="text" name="name"> {$profile->errors['name']}

Фамилия           <input type="text" name="sname"> {$profile->errors['sname']}

Пол               <select size="1" name="sex"><option disabled> Выберите пол</option> {$profile->errors['sex']}
<option value="М">Мужской</option>
<option value="Ж">Женский</option></select>

Номер группы      <input type="text" name="groupindex"> {$profile->errors['groupindex']}

Электронная почта <input type="text" name="email"> {$profile->errors['email']}

Баллы             <input type="text" name="points"> {$profile->errors['points']}

Год рождения      <input type="text" name="birthdate"> {$profile->errors['birthdate']}
<input type="hidden" name="submitted" value="yes">
<input type="submit" value="Зарегестрироваться">
</form>
<br>
_EMD;


if(isset($_POST['submitted']) && $profile->checkErrors()){
	$STH=$DBH->prepare("INSERT INTO students (name, sname, email, birthdate, points, sex, groupindex) VALUES (:name, :sname, :email,:birthdate, :points, :sex, :groupindex)");
	$STH->bindparam(":name", $name);
	$STH->bindparam(":sname", $sname);
	$STH->bindparam(":email", $email);
	$STH->bindparam(":birthdate", $birthdate);
	$STH->bindparam(":points", $points);
	$STH->bindparam(":sex", $sex);
	$STH->bindparam(":groupindex", $groupindex);

	$name = $_POST['name'];
    $sname=$_POST['sname'];
    $email=$_POST['email'];
    $birthdate=$_POST['birthdate'];
    $points=$_POST['points'];
    $sex=$_POST['sex'];
    $groupindex=$_POST['groupindex'];
    $STH->execute();
    setcookie("studentscookie[email]", $email);
     setcookie("studentscookie[name]", $name);
     header('Location: http://www.students.ru/profile.php');
}


