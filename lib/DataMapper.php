<?php

require_once "/lib/Profile.php";

class DataMapper
{
    public $DBH;
    public function __construct(PDO $DBH)
    {
        $this->DBH = $DBH;
    }
    
    public function fetchProfile($code)
    {
        $STH = $this->DBH->prepare("SELECT*FROM students WHERE secretcode=:code");
        $STH->bindparam(":code", $code);
        $STH->execute();
        $STH->setFetchMode(PDO::FETCH_CLASS, 'profile');
        return $STH->fetch();
        
    }
    
    
    public function isEmailUsed($email, $id)
    {
        $STH = $this->DBH->prepare("SELECT*FROM students WHERE email=:email AND id!=:id");
        $STH->bindparam(":email", $email);
        $STH->bindparam(":id", $id);
        $STH->execute();
        $STH->setFetchMode(PDO::FETCH_CLASS, 'profile');
        return $STH->fetch();
    }
    
    public function showStudents($sort, $order, $num, $recordsPerPage)
    {
        $regExp      = "/^(name|groupindex|points)$/ui";
        $orderRegExp = "/^(ASC|DESC)$/ui";
        $numRegExp   = "/^[0-9]+$/ui";
        if (!preg_match($regExp, $sort) || !preg_match($orderRegExp, $order) || !preg_match($numRegExp, $num)) {
            throw new Exception("Не верный запрос к базе данных");
        }
        
        $STH = $this->DBH->prepare("SELECT name, sname, groupindex, points FROM students ORDER BY $sort $order LIMIT :num, :records");
        $STH->bindValue(":num", intval($num), PDO::PARAM_INT);
        $STH->bindValue(":records", $recordsPerPage, PDO::PARAM_INT);
        $STH->execute();
        
        $result = $STH->fetchAll(PDO::FETCH_CLASS, "profile");
        return $result;
        
        
        
        
        
        
    }
    
    
    public function searchStudents($needle, $num, $recordsPerPage, $sort, $order)
    {
        
        $regExp      = "/^(name|groupindex|points)$/ui";
        $orderRegExp = "/^(ASC|DESC)$/ui";
        $numRegExp   = "/^[0-9]+$/ui";
        if (!preg_match($regExp, $sort) || !preg_match($orderRegExp, $order) || !preg_match($numRegExp, $num)) {
            throw new Exception("Не верный запрос к базе данных");
        }
        $STH = $this->DBH->prepare("SELECT name, sname, groupindex, points FROM students WHERE name LIKE :name OR sname LIKE :sname OR groupindex=:groupindex OR points=:points ORDER BY $sort $order LIMIT :num, :records");
        $STH->bindparam(":name", $name);
        $STH->bindparam(":sname", $sname);
        $STH->bindparam(":groupindex", $groupindex);
        $STH->bindparam(":points", $points);
        $STH->bindValue(":num", intval($num), PDO::PARAM_INT);
        $STH->bindValue(":records", $recordsPerPage, PDO::PARAM_INT);
        
        $name       = "%" . $needle . "%";
        $sname      = "%" . $needle . "%";
        $groupindex = $needle;
        $points     = $needle;
        $STH->execute();
        
        $result = $STH->fetchAll(PDO::FETCH_CLASS, "profile");
        return $result;
        
        
    }
    
    
    
    public function addStudent(Profile $profile)
    {
        $STH = $this->DBH->prepare("INSERT INTO students (name, sname, email, birthdate, points, sex, groupindex, secretcode) 
            VALUES (:name, :sname, :email,:birthdate, :points, :sex, :groupindex, :secretcode)");
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
        $secretcode = $profile->showCode();
        $STH->execute();
    }
    
    
    public function editProfile(Profile $profile)
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
        
        $STH    = $this->DBH->query("SELECT COUNT(*) FROM students");
        $result = $STH->fetchColumn();
        $id     = $result;
        return $id;
    }
    
    public function getSearchCount($needle)
    {
        $STH = $this->DBH->prepare("SELECT COUNT(*) FROM students  
            WHERE name LIKE :name OR sname LIKE :sname OR groupindex=:groupindex OR points=:points");
        $STH->bindparam(":name", $name);
        $STH->bindparam(":sname", $sname);
        $STH->bindparam(":groupindex", $groupindex);
        $STH->bindparam(":points", $points);
        
        
        $name       = "%" . $needle . "%";
        $sname      = "%" . $needle . "%";
        $groupindex = $needle;
        $points     = $needle;
        $STH->execute();
        $result = $STH->fetchColumn();
        return $result;
    }
    
    
}




?>
