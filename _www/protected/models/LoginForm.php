<?php

class LoginForm extends CFormModel
{
	public $email;
	public $password;

	private $_identity;

	public function rules()
	{
		return array(
			array('email, password', 'required'),
			array('email', 'email'),
			array('password', 'authenticate'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'email'=>'E-mail',
			'password'=>'Пароль',
		);
	}

	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->email,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','Неверные данные авторизации');
		}
	}

	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->email,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration = 3600*24*30;
			Yii::app()->user->login($this->_identity, $duration);
			return true;
		}
		else
			return false;
	}
}
