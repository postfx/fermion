<?php

/**
 * This is the model class for table "f_users".
 *
 * The followings are the available columns in table 'f_users':
 * @property integer $id
 * @property string $creation_date
 * @property integer $referrer_id
 * @property integer $city_id
 * @property string $username
 * @property string $birthday
 * @property string $passport_num
 * @property string $passport_date
 * @property string $passport_org
 * @property string $post_index
 * @property string $address
 * @property string $phone
 * @property string $mobile_phone
 * @property string $email
 * @property string $password
 * @property string $hash
 * @property integer $status
 * @property string $userkey
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'f_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city_id, username, birthday, passport_num, passport_date, passport_org, post_index, email, password, hash, status', 'required'),
			array('referrer_id, city_id, status', 'numerical', 'integerOnly'=>true),
			array('username, passport_num, passport_org, post_index, address, phone, mobile_phone, email, password, hash, userkey', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, creation_date, referrer_id, city_id, username, birthday, passport_num, passport_date, passport_org, post_index, address, phone, mobile_phone, email, password, hash, status, userkey', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'creation_date' => 'Дата создания',
			'referrer_id' => 'ID консультанта',
			'city_id' => 'Город',
			'username' => 'ФИО',
			'birthday' => 'Дата рождения',
			'passport_num' => 'Серия и номер паспорта',
			'passport_date' => 'Дата выдачи',
			'passport_org' => 'Кем выдан',
			'post_index' => 'Индекс',
			'address' => 'Адрес',
			'phone' => 'Домашний телефон',
			'mobile_phone' => 'Мобильный телефон',
			'email' => 'Email',
			'password' => 'Пароль',
			'hash' => 'Хэш',
			'status' => 'Статус',
			'userkey' => 'Ключ',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('referrer_id',$this->referrer_id);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('passport_num',$this->passport_num,true);
		$criteria->compare('passport_date',$this->passport_date,true);
		$criteria->compare('passport_org',$this->passport_org,true);
		$criteria->compare('post_index',$this->post_index,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('mobile_phone',$this->mobile_phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('hash',$this->hash,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('userkey',$this->userkey,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
