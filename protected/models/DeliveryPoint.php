<?php

/**
 * This is the model class for table "deliveryPoint".
 *
 * The followings are the available columns in table 'deliveryPoint':
 * @property integer $id
 * @property string $address
 * @property string $schedule
 * @property string $phone
 * @property integer $city_id
 * @property integer $region_id
 * @property integer $country_id
 * @property integer $date_create
 *
 * The followings are the available model relations:
 * @property Country $country
 * @property City $city
 * @property Region $region
 * @property Order[] $orders
 */
class DeliveryPoint extends CActiveRecord
{
    

	public function tableName()
	{
            return 'deliveryPoint';
	}


	public function rules()
	{
            return array(
                array('address, schedule, phone, city_id, region_id, country_id', 'required'),
                array('city_id, region_id, country_id', 'numerical', 'integerOnly'=>true),
                array('address', 'length', 'max'=>255),
                array('schedule', 'length', 'max'=>128),
                array('phone', 'length', 'max'=>32),
            
                // search
                    array('id, address, schedule, phone, city_id, region_id, country_id', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'country' => array(self::BELONGS_TO, 'Country', 'country_id'),
//                    'city' => array(self::BELONGS_TO, 'City', 'city_id'),
//                    'region' => array(self::BELONGS_TO, 'Region', 'region_id'),
//                    'orders' => array(self::HAS_MANY, 'Order', 'deliveryPoint_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'address' => 'Адрес',
                'schedule' => 'График работы',
                'phone' => 'Телефон',
                'city_id' => 'Город',
                'region_id' => 'Регион',
                'country_id' => 'Страна',
                'date_create'=>'Дата создания',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('address',$this->address,true);         
            $criteria->compare('schedule',$this->schedule,true);         
            $criteria->compare('phone',$this->phone,true);         
            $criteria->compare('city_id',$this->city_id);         
            $criteria->compare('region_id',$this->region_id);         
            $criteria->compare('country_id',$this->country_id);         

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
