<?php

/**
 * This is the model class for table "userProfile".
 *
 * The followings are the available columns in table 'userProfile':
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property integer $country_id
 * @property integer $region_id
 * @property integer $city_id
 * @property string $postcode
 * @property string $address
 * @property integer $main
 *
 * The followings are the available model relations:
 * @property City $city
 * @property Country $country
 * @property Region $region
 * @property User $user
 */
class UserProfile extends CActiveRecord
{
    

	public function tableName()
	{
            return 'userProfile';
	}


	public function rules()
	{
            return array(
                array('user_id, name, country_id, region_id, city_id, postcode, address', 'required'),
                array('user_id, country_id, region_id, city_id, main', 'numerical', 'integerOnly'=>true),
                array('name, address', 'length', 'max'=>255),
                array('postcode', 'length', 'max'=>8),
            
                // search
                    array('id, user_id, name, country_id, region_id, city_id, postcode, address, main', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'city' => array(self::BELONGS_TO, 'City', 'city_id'),
//                    'country' => array(self::BELONGS_TO, 'Country', 'country_id'),
//                    'region' => array(self::BELONGS_TO, 'Region', 'region_id'),
//                    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'user_id' => 'User',
                'name' => 'Name',
                'country_id' => 'Country',
                'region_id' => 'Region',
                'city_id' => 'City',
                'postcode' => 'Postcode',
                'address' => 'Address',
                'main' => 'Main',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('user_id',$this->user_id);         
            $criteria->compare('name',$this->name,true);         
            $criteria->compare('country_id',$this->country_id);         
            $criteria->compare('region_id',$this->region_id);         
            $criteria->compare('city_id',$this->city_id);         
            $criteria->compare('postcode',$this->postcode,true);         
            $criteria->compare('address',$this->address,true);         
            $criteria->compare('main',$this->main);         

            $dataProvider = new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>20,
                ),
            ));

            $dataProvider->sort->defaultOrder = '`id` DESC';

            return $dataProvider;
	}


	public static function model($className=__CLASS__)
	{
            return parent::model($className);
	}
        
        
        
}
