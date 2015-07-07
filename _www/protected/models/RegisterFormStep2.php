<?php

class RegisterFormStep2 extends CFormModel
{
	public $city_id;
	public $region_id;
	public $country_id;
	public $username;
	public $birthday;
	public $passport_num;
	public $passport_date;
	public $passport_org;
	public $post_index;
	public $address;
	public $phone;
	public $mobile_phone;
	public $email;
	public $password;
	public $password_repeat;

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city_id, region_id, country_id, username, birthday, passport_num, passport_date, phone, mobile_phone, passport_org, post_index, email, password, password_repeat', 'required'),
			array('city_id, region_id, country_id', 'numerical', 'integerOnly'=>true),
			array('username, passport_num, passport_org, post_index, address, phone, mobile_phone, email, password', 'length', 'max'=>256),
			array('city_id, region_id, country_id, username, birthday, passport_num, passport_date, passport_org, post_index, address, phone, mobile_phone, email, password, password_repeat', 'safe', 'on'=>'search'),
			array('email', 'email'),
			array('email', 'unique', 'className' => 'Users'),
			array('password', 'length', 'min' => 6, 'max' => 28),
			array('password_repeat', 'compare', 'compareAttribute'=>'password'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'city_id' => 'Город',
			'region_id' => 'Регион',
			'country_id' => 'Страна',
			'username' => 'ФИО',
			'birthday' => 'Дата рождения',
			'passport_num' => 'Серия и номер паспорта',
			'passport_date' => 'Дата выдачи',
			'passport_org' => 'Кем выдан',
			'post_index' => 'Индекс',
			'address' => 'Улица, дом, квартира',
			'phone' => 'Домашний телефон',
			'mobile_phone' => 'Мобильный телефон',
			'email' => 'Email',
			'password' => 'Пароль',
			'password_repeat' => 'Повторите пароль',
		);
	}
}
