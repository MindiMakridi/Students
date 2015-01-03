<?php
require_once "/lib/PDO.php";
require_once "/lib/student.php";
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

	public function showStudents($sort, $class){
	$STH  = $this->DBH->query("SELECT name, sname, groupindex, points FROM students ORDER BY $sort");

    $STH->setFetchMode(PDO::FETCH_CLASS, get_class($class));
while($obj = $STH->fetch()){
	echo "<tr><td>$obj->name $obj->sname</td><td>$obj->groupindex</td><td>$obj->points</td></tr>";

}



	}


	public function searchStudents($needle, $class){
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

         $STH->setFetchMode(PDO::FETCH_CLASS, get_class($class));
while($obj = $STH->fetch()){
	echo "<tr><td>$obj->name $obj->sname</td><td>$obj->groupindex</td><td>$obj->points</td></tr>";

}


	}



	public function addStudent($data){
		$STH=$this->DBH->prepare("INSERT INTO students (name, sname, email, birthdate, points, sex, groupindex) VALUES (:name, :sname, :email,:birthdate, :points, :sex, :groupindex)");
	$STH->bindparam(":name", $name);
	$STH->bindparam(":sname", $sname);
	$STH->bindparam(":email", $email);
	$STH->bindparam(":birthdate", $birthdate);
	$STH->bindparam(":points", $points);
	$STH->bindparam(":sex", $sex);
	$STH->bindparam(":groupindex", $groupindex);

	$name = $data['name'];
    $sname=$data['sname'];
    $email=$data['email'];
    $birthdate=$data['birthdate'];
    $points=$data['points'];
    $sex=$data['sex'];
    $groupindex=$data['groupindex'];
    $STH->execute();
	}


	public function editProfile($data){
		$STH=$this->DBH->prepare("UPDATE students SET name=:name, sname=:sname, email=:email, birthdate=:birthdate, points=:points, sex=:sex, groupindex=:groupindex WHERE email=:prevMail");
	$STH->bindparam(":name", $name);
	$STH->bindparam(":sname", $sname);
	$STH->bindparam(":email", $email);
	$STH->bindparam(":birthdate", $birthdate);
	$STH->bindparam(":points", $points);
	$STH->bindparam(":sex", $sex);
	$STH->bindparam(":groupindex", $groupindex);
	$STH->bindparam(":prevMail", $prevMail);

	$name = $data['name'];
    $sname=$data['sname'];
    $email=$data['email'];
    $birthdate=$data['birthdate'];
    $points=$data['points'];
    $sex=$data['sex'];
    $groupindex=$data['groupindex'];
    $prevMail=$_COOKIE['studentscookie']['email'];
    $STH->execute();
	}
}



$mapper=new StudentMapper($DBH);
?>