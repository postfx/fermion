<?php

class RegisterFormStep1 extends CFormModel
{
	public $referrer_id;

	public function rules()
	{
		return array(
			array('referrer_id', 'required'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'referrer_id'=>'ID консультанта',
		);
	}
}
