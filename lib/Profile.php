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
    
    
    
    public function generateCode()
    {
        $string = "abcdefghijklmnopqrstuvwxyz1234567890";
        $length = mb_strlen($string);
        for ($i = 0; $i <= 10; $i++) {
            $cypher .= mb_substr($string, mt_rand(0, $length - 1), 1);
        }
        $salt1 = "pineapple";
        $salt2 = "clevergirl";
        
        
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
        foreach ($data as $key => $value) {
            $data[$key] = trim($value);
        }
        
        $regExp     = "/^[а-яa-z-]+$/ui";
        $temp       = $this->checkField($data['name'], $regExp);
        $this->name = $data['name'];
        if (!$temp) {
            $this->errors['name'] = self::ERROR;
            
        }
        
        $temp        = $this->checkField($data['sname'], $regExp);
        $this->sname = $data['sname'];
        if (!$temp) {
            
            $this->errors['sname'] = self::ERROR;
        }
        
        
        if (isset($data['sex'])) {
            $this->sex = $data['sex'];
        } else {
            $this->errors['sex'] = "Пол не выбран";
        }
        
        $regExp           = "/^[0-9]+$/";
        $temp             = $this->checkField($data['groupindex'], $regExp);
        $this->groupindex = $data['groupindex'];
        if (!($temp && $temp <= 99999 && $temp > 999)) {
            
            $this->errors['groupindex'] = self::ERROR;
        }
        
        $regExp      = "/[a-zA-Z0-9_+.-]+@[a-z0-9.-]+(\.)[a-z]{2,}/ui";
        $temp        = $this->checkField($data['email'], $regExp);
        $this->email = $data['email'];
        if (!$temp) {
            $this->errors['email'] = self::ERROR;
            
        }
        
        
        
        
        $regExp = "/^[0-9]+$/";
        
        $temp         = $this->checkField($data['points'], $regExp);
        $this->points = $data['points'];
        if (!($temp && $temp <= 500)) {
            $this->errors['points'] = self::ERROR;
        }
        
        
        
        $temp            = $this->checkField($data['birthdate'], $regExp);
        $this->birthdate = $data['birthdate'];
        if (!($temp && $temp >= 1900 && $temp <= 2010)) {
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
    
    public function showID()
    {
        return $this->id;
    }
    
    public function showCode()
    {
        return $this->secretcode;
    }
    
}
?>