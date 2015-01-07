<?php
require_once "/lib/PDO.php";

require_once "/lib/profileclass.php";

class StudentMapper{
	public $DBH;
	public function __construct($DBH){
		$this->DBH = $DBH;
	}

	public function fetchProfile($email){
	$STH=$this->DBH->prepare("SELECT name, sname, email, birthdate, points, sex, groupindex FROM students WHERE email=:email");
	$STH->bindparam(":email", $email);
	$STH->execute();
	$STH->setFetchMode(PDO::FETCH_CLASS, 'profile');
	return $STH->fetch();

	}

	public function showStudents($sort, $order){
    $regExp = "/^((name)|(groupindex)|(points))$/ui";
    $regExp2 = "/^(ASC|DESC)$/ui";
		if(!preg_match($regExp, $sort) && !preg_match($regExp2, $order)){
			die ("Не верный запрос к базе данных");
		}
		else{
	$STH  = $this->DBH->query("SELECT name, sname, groupindex, points FROM students ORDER BY $sort $order");


   $result = $STH->fetchAll(PDO::FETCH_CLASS, "profile");
   return $result;


}



	}


	public function searchStudents($needle){
		$STH=$this->DBH->prepare("SELECT name, sname, groupindex, points FROM students WHERE name LIKE :name OR sname LIKE :sname OR groupindex=:groupindex OR points=:points" );
		$STH->bindparam(":name", $name);
		$STH->bindparam(":sname", $sname);
		$STH->bindparam(":groupindex", $groupindex);
		$STH->bindparam(":points", $points);

		$name = "%".$needle."%";
		$sname = "%".$needle."%";
		$groupindex = $needle;
		$points = $needle;
        $STH->execute();

          $result = $STH->fetchAll(PDO::FETCH_CLASS, "profile");
   return $result;


	}



	public function addStudent($profile){
		$STH=$this->DBH->prepare("INSERT INTO students (name, sname, email, birthdate, points, sex, groupindex) VALUES (:name, :sname, :email,:birthdate, :points, :sex, :groupindex)");
	$STH->bindparam(":name", $name);
	$STH->bindparam(":sname", $sname);
	$STH->bindparam(":email", $email);
	$STH->bindparam(":birthdate", $birthdate);
	$STH->bindparam(":points", $points);
	$STH->bindparam(":sex", $sex);
	$STH->bindparam(":groupindex", $groupindex);

	$name = $profile->showName();
    $sname=$profile->showSname();
    $email=$profile->showEmail();
    $birthdate=$profile->showBirthDate();
    $points=$profile->showPoints();
    $sex=$profile->showSex();
    $groupindex=$profile->showGroupIndex();
    $STH->execute();
	}


	public function editProfile($profile){
		$STH=$this->DBH->prepare("UPDATE students SET name=:name, sname=:sname, email=:email, birthdate=:birthdate, points=:points, sex=:sex, groupindex=:groupindex WHERE email=:prevMail");
	$STH->bindparam(":name", $name);
	$STH->bindparam(":sname", $sname);
	$STH->bindparam(":email", $email);
	$STH->bindparam(":birthdate", $birthdate);
	$STH->bindparam(":points", $points);
	$STH->bindparam(":sex", $sex);
	$STH->bindparam(":groupindex", $groupindex);
	$STH->bindparam(":prevMail", $prevMail);

    $name = $profile->showName();
    $sname=$profile->showSname();
    $email=$profile->showEmail();
    $birthdate=$profile->showBirthDate();
    $points=$profile->showPoints();
    $sex=$profile->showSex();
    $groupindex=$profile->showGroupIndex();
    $prevMail=getUserMail();
    $STH->execute();
	}
}



$mapper=new StudentMapper($DBH);
?>