<?php
require_once "PDO.php";
require_once "profileclass.php";

$title = $_COOKIE['studentscookie']['name'];
$email=  $_COOKIE['studentscookie']['email'];

$STH=$DBH->query("SELECT name, sname, email, birthdate, points, sex, groupindex FROM students WHERE email='$email'");
$STH->setFetchMode(PDO::FETCH_CLASS, 'profile');
$profile=$STH->fetch();




$isRegistered = "<a href='register.php' class=\"navigation\">Зарегистрироваться</a>";

if($_COOKIE['studentscookie']['name']){
	$isRegistered = "<a href='profile.php' class=\"navigation\">".$_COOKIE['studentscookie']['name']."</a>";
}
include "template.html";

if(isset($_POST['submitted'])){
	
$profile->setFields($_POST);
$email = $_POST['email'];
$STH=$DBH->query("SELECT*FROM students WHERE email LIKE '$email'");
if($STH->fetch() && $email!= $_COOKIE['studentscookie']['email']){
	$profile->setMailError();
}



}

echo "<br>";
echo<<<_END
<form action='profile.php' method='post'><pre>
Имя           <textarea name="name">{$profile->showName()}</textarea> {$profile->errors['name']}

Фамилия       <textarea name="sname">{$profile->showSname()}</textarea> {$profile->errors['sname']}

Пол           <select size="1" name="sex"><option disabled> Выберите пол</option> {$profile->errors['sex']}
 <option value="М">Мужской</option>
<option value="Ж">Женский</option></select>

 Почта       <textarea name="email">{$profile->showEmail()}</textarea> {$profile->errors['email']}

Группа       <textarea name="groupindex">{$profile->showGroupIndex()}</textarea> {$profile->errors['groupindex']}

Баллы        <textarea name="points">{$profile->showPoints()}</textarea> {$profile->errors['points']}

Год рождения <textarea name="birthdate">{$profile->showBirthDate()}</textarea> {$profile->errors['birthdate']}
<input type='hidden' name='submitted' value='yes'>
<input type='submit' value='изменить'>
</pre>
</form>
_END;

if(isset($_POST['submitted']) && $profile->checkErrors()){
	$STH=$DBH->prepare("UPDATE students SET name=:name, sname=:sname, email=:email, birthdate=:birthdate, points=:points, sex=:sex, groupindex=:groupindex WHERE email=:prevMail");
	$STH->bindparam(":name", $name);
	$STH->bindparam(":sname", $sname);
	$STH->bindparam(":email", $email);
	$STH->bindparam(":birthdate", $birthdate);
	$STH->bindparam(":points", $points);
	$STH->bindparam(":sex", $sex);
	$STH->bindparam(":groupindex", $groupindex);
	$STH->bindparam(":prevMail", $prevMail);

	$name = $_POST['name'];
    $sname=$_POST['sname'];
    $email=$_POST['email'];
    $birthdate=$_POST['birthdate'];
    $points=$_POST['points'];
    $sex=$_POST['sex'];
    $groupindex=$_POST['groupindex'];
    $prevMail=$_COOKIE['studentscookie']['email'];
    $STH->execute();
    setcookie("studentscookie[email]", $email);
     setcookie("studentscookie[name]", $name);
}
?>