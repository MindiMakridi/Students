<?php
require_once "/lib/PDO.php";

require_once "/lib/Profile.php";

class StudentMapper
{
    public $DBH;
    public function __construct($DBH)
    {
        $this->DBH = $DBH;
    }
    
    public function fetchProfile($code)
    {
        $STH = $this->DBH->prepare("SELECT name, sname, email, birthdate, points, sex, groupindex, id FROM students WHERE secretcode=:code");
        $STH->bindparam(":code", $code);
        $STH->execute();
        $STH->setFetchMode(PDO::FETCH_CLASS, 'profile');
        return $STH->fetch();
        
    }
    
    
    public function fetchMail($mail)
    {
        $STH = $this->DBH->prepare("SELECT name, sname, email, birthdate, points, sex, groupindex, id, code FROM students WHERE email=:email");
        $STH->bindparam(":email", $email);
        $STH->execute();
        $STH->setFetchMode(PDO::FETCH_CLASS, 'profile');
        return $STH->fetch();
    }
    
    public function showStudents($sort, $order)
    {
        $regExp  = "/^(name|groupindex|points)$/ui";
        $regExp2 = "/^(ASC|DESC)$/ui";
        if (!preg_match($regExp, $sort) || !preg_match($regExp2, $order)) {
            throw new Exception("Не верный запрос к базе данных");
        }
        
        $STH = $this->DBH->query("SELECT name, sname, groupindex, points FROM students ORDER BY $sort $order");
        
        
        $result = $STH->fetchAll(PDO::FETCH_CLASS, "profile");
        return $result;
        
        
        
        
        
        
    }
    
    
    public function searchStudents($needle)
    {
        $STH = $this->DBH->prepare("SELECT name, sname, groupindex, points FROM students WHERE name LIKE :name OR sname LIKE :sname OR groupindex=:groupindex OR points=:points");
        $STH->bindparam(":name", $name);
        $STH->bindparam(":sname", $sname);
        $STH->bindparam(":groupindex", $groupindex);
        $STH->bindparam(":points", $points);
        
        $name       = "%" . $needle . "%";
        $sname      = "%" . $needle . "%";
        $groupindex = $needle;
        $points     = $needle;
        $STH->execute();
        
        $result = $STH->fetchAll(PDO::FETCH_CLASS, "profile");
        return $result;
        
        
    }
    
    
    
    public function addStudent(profile $profile)
    {
        $STH = $this->DBH->prepare("INSERT INTO students (name, sname, email, birthdate, points, sex, groupindex, secretcode) VALUES (:name, :sname, :email,:birthdate, :points, :sex, :groupindex, :secretcode)");
        $STH->bindparam(":name", $name);
        $STH->bindparam(":sname", $sname);
        $STH->bindparam(":email", $email);
        $STH->bindparam(":birthdate", $birthdate);
        $STH->bindparam(":points", $points);
        $STH->bindparam(":sex", $sex);
        $STH->bindparam(":groupindex", $groupindex);
        $STH->bindparam(":secretcode", $secretcode);
        
        $name       = $profile->showName();
        $sname      = $profile->showSname();
        $email      = $profile->showEmail();
        $birthdate  = $profile->showBirthDate();
        $points     = $profile->showPoints();
        $sex        = $profile->showSex();
        $groupindex = $profile->showGroupIndex();
        $salt1      = "pineapple";
        $salt2      = "clevergirl";
        
        
        $secretcode = md5($salt1 . $email . $salt2);
        $STH->execute();
    }
    
    
    public function editProfile($profile)
    {
        $STH = $this->DBH->prepare("UPDATE students SET name=:name, sname=:sname, email=:email, birthdate=:birthdate, points=:points, sex=:sex, groupindex=:groupindex WHERE id=:id");
        $STH->bindparam(":name", $name);
        $STH->bindparam(":sname", $sname);
        $STH->bindparam(":email", $email);
        $STH->bindparam(":birthdate", $birthdate);
        $STH->bindparam(":points", $points);
        $STH->bindparam(":sex", $sex);
        $STH->bindparam(":groupindex", $groupindex);
        $STH->bindparam(":id", $id);
        
        $name       = $profile->showName();
        $sname      = $profile->showSname();
        $email      = $profile->showEmail();
        $birthdate  = $profile->showBirthDate();
        $points     = $profile->showPoints();
        $sex        = $profile->showSex();
        $groupindex = $profile->showGroupIndex();
        $id         = $profile->showID();
        $STH->execute();
    }
    
    public function getLastId()
    {
        
        $STH    = $this->DBH->query("SELECT id FROM students ORDER BY id DESC");
        $result = $STH->fetch();
        $id     = $result[0];
        return $id;
    }
    
    public function getCode()
    {
        $id     = $this->getLastId();
        $STH    = $this->DBH->query("SELECT secretcode FROM students WHERE id = $id");
        $result = $STH->fetch();
        return $result[0];
    }
}




?>