<?php

define("ERROR",  "<font color=\"red\">Не верный формат данных</font>");

class profile{
	

	protected $name;
	protected $sname;
	protected $sex;
	protected $groupindex;
	protected $email;
	protected $points;
	protected $birthdate;
	
	public $errors=array('name'=>null, 'sname'=>null, 'sex'=>null, 'groupindex'=>null, 'email'=>null, 'points'=>null, 'birthdate'=>null);

	public function checkErrors(){
		foreach ($this->errors as $error) {
			if($error!=null){
				return false;
			}
		}

		
		echo "<font color=\"green\">Ваши данные сохранены</font>";
		return true;
	}





		public function setMailError(){
			$this->errors['email'] = "<font color=\"red\">Введенный электронный адрес занят</font>";
		}

	protected function checkField($field, $regExp){
			if(preg_match($regExp, $field)){
			return $field;
		}
		else{
			return false;
		}
	}

	public function setFields($data){
		$regExp="/^[а-я]+$/ui";
		if($this->checkField($data['name'],$regExp)){
			$this->name=$this->checkField($data['name'],$regExp);
		}
		else{
			$this->errors['name'] = ERROR;
		}

		$temp = $this->checkField($data['sname'], $regExp);
		if($temp){
			$this->sname=$temp;
		}
		else{
			$this->errors['sname']=ERROR;
		}


		if(isset($data['sex'])){
			$this->sex = $data['sex'];
		}
		else{
			$this->errors['sex'] = "<font color=\"red\">Пол не выбран</font>";
		}

		$regExp = "/^[0-9]+$/";
		$temp = $this->checkField($data['groupindex'], $regExp);
		if($temp && ($temp<=99999 || $temp>999)){
			$this->groupindex=$temp;
		}
		else{
			$this->errors['groupindex'] = ERROR;
		}

		$regExp = "/[a-zA-Z0-9_+.-]+@[a-z.-]+/ui";
		$temp = $this->checkField($data['email'], $regExp);

		if($temp){
			
			$this->email = $temp;
		}

	else{
		$this->errors['email'] = ERROR;
	}


	$regExp = "/^[0-9]+$/";

    $temp = $this->checkField($data['points'], $regExp);
    if($temp && $temp<=500){
    	$this->points = $temp;
    }

    else{
    	$this->errors['points'] = ERROR;
    }

    $temp = $this->checkField($data['birthdate'], $regExp);
    if($temp && $temp>=1900 && $temp<=2010){
    	$this->birthdate = $temp;
    }
    else{
    	$this->errors['birthdate'] = ERROR;
    }
	}

	

	
public function showName(){
	return $this->name;
}

public function showSname(){
	return $this->sname;
}

public function showGroupIndex(){
	return $this->groupindex;
}

public function showEmail(){
	return $this->email;
}

public function showPoints(){
	return $this->points;
}

public function showBirthDate(){
	return $this->birthdate;
}

}
?>