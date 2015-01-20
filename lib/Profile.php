<?php



class Profile
{
    
    const ERROR = "Не верный формат данных";
    
    protected $name;
    protected $sname;
    protected $sex;
    protected $groupindex;
    protected $email;
    protected $points;
    protected $birthdate;
    protected $id;
    protected $secretcode;
    
    public $errors = array('name' => null, 'sname' => null, 'sex' => null, 'groupindex' => null, 'email' => null, 'points' => null, 'birthdate' => null);
    
    public function checkErrors()
    {
        foreach ($this->errors as $error) {
            if ($error != null) {
                return false;
            }
        }
        
        
        
        return true;
    }
    
    
    
       public  function generateCode(){
      $string = "abcdefghijklmnopqrstuvwxyz1234567890";
        $length = mb_strlen($string);
        for($i=0; $i<=5; $i++){
            $cypher.= mb_substr($string, mt_rand(0, $length-1), mt_rand(1, $length-1));
        }
        $salt1      = "pineapple";
        $salt2      = "clevergirl";
        
        
       $this->secretcode = md5($salt1 . $cypher . $salt2);
        
}
 
    
    public function setMailError()
    {
        $this->errors['email'] = "Введенный электронный адрес занят";
    }
    
    protected function checkField($field, $regExp)
    {
        if (preg_match($regExp, $field)) {
            return $field;
        } else {
            return false;
        }
    }
    
    public function setFields($data)
    {
        $regExp = "/^[а-я]+$/ui";
        if ($this->checkField($data['name'], $regExp)) {
            $this->name = $this->checkField($data['name'], $regExp);
        } else {
            $this->errors['name'] = self::ERROR;
        }
        
        $temp = $this->checkField($data['sname'], $regExp);
        if ($temp) {
            $this->sname = $temp;
        } else {
            $this->errors['sname'] = self::ERROR;
        }
        
        
        if (isset($data['sex'])) {
            $this->sex = $data['sex'];
        } else {
            $this->errors['sex'] = "Пол не выбран";
        }
        
        $regExp = "/^[0-9]+$/";
        $temp   = $this->checkField($data['groupindex'], $regExp);
        if ($temp && $temp <= 99999 && $temp > 999) {
            $this->groupindex = $temp;
        } else {
            $this->errors['groupindex'] = self::ERROR;
        }
        
        $regExp = "/[a-zA-Z0-9_+.-]+@[a-z0-9.-]+/ui";
        $temp   = $this->checkField($data['email'], $regExp);
        
        if ($temp) {
            
            $this->email = $temp;
        }
        
        else {
            $this->errors['email'] = self::ERROR;
        }
        
        
        $regExp = "/^[0-9]+$/";
        
        $temp = $this->checkField($data['points'], $regExp);
        if ($temp && $temp <= 500) {
            $this->points = $temp;
        }
        
        else {
            $this->errors['points'] = self::ERROR;
        }
        
        $temp = $this->checkField($data['birthdate'], $regExp);
        if ($temp && $temp >= 1900 && $temp <= 2010) {
            $this->birthdate = $temp;
        } else {
            $this->errors['birthdate'] = self::ERROR;
        }
    }
    
    
    
    
    public function showName()
    {
        return $this->name;
    }
    
    public function showSname()
    {
        return $this->sname;
    }
    
    public function showGroupIndex()
    {
        return $this->groupindex;
    }
    
    public function showEmail()
    {
        return $this->email;
    }
    
    public function showPoints()
    {
        return $this->points;
    }
    
    public function showBirthDate()
    {
        return $this->birthdate;
    }
    
    public function showSex()
    {
        return $this->sex;
    }

    public function showID(){
        return $this->id;
    }

    public function showCode(){
        return $this->secretcode;
    }
    
}
?>