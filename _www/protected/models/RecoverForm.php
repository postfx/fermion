<?php

class RecoverForm extends CFormModel
{
	public $email;

	public function rules()
	{
		return array(
			array('email', 'required'),
			array('email', 'email'),
			array('email', 'checkEmail'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'email'=>'e-mail',
		);
	}

	public function checkEmail($attribute, $params)
	{
		$user = Users::model()->exists('email=:email', array('email'=>$this->email));
		if (!$user)
			$this->addError($attribute, "User not found");
	}
}
