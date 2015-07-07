<?php

/**
 * This is the model class for table "office".
 *
 * The followings are the available columns in table 'office':
 * @property integer $id
 * @property string $name
 * @property integer $city_id
 * @property integer $region_id
 * @property integer $country_id
 * @property string $street
 * @property string $house
 * @property integer $workingHours_begin
 * @property integer $workingHours_end
 * @property string $desc
 *
 * The followings are the available model relations:
 * @property Country $country
 * @property City $city
 * @property Region $region
 * @property User[] $users
 */
class Office extends CActiveRecord
{
    

	public function tableName()
	{
            return 'office';
	}


	public function rules()
	{
            return array(
                array('name, city_id, region_id, country_id, street, house, workingHours_begin, workingHours_end', 'required'),
                array('city_id, region_id, country_id, workingHours_begin, workingHours_end', 'numerical', 'integerOnly'=>true),
                array('name', 'length', 'max'=>255),
                array('street', 'length', 'max'=>128),
                array('house', 'length', 'max'=>16),
                array('desc', 'safe'),
            
                // search
                    array('id, name, city_id, region_id, country_id, street, house, workingHours_begin, workingHours_end, desc', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'country' => array(self::BELONGS_TO, 'Country', 'country_id'),
//                    'city' => array(self::BELONGS_TO, 'City', 'city_id'),
//                    'region' => array(self::BELONGS_TO, 'Region', 'region_id'),
//                    'users' => array(self::HAS_MANY, 'User', 'office_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'name' => 'Name',
                'city_id' => 'City',
                'region_id' => 'Region',
                'country_id' => 'Country',
                'street' => 'Street',
                'house' => 'House',
                'workingHours_begin' => 'Working Hours Begin',
                'workingHours_end' => 'Working Hours End',
                'desc' => 'Desc',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('name',$this->name,true);         
            $criteria->compare('city_id',$this->city_id);         
            $criteria->compare('region_id',$this->region_id);         
            $criteria->compare('country_id',$this->country_id);         
            $criteria->compare('street',$this->street,true);         
            $criteria->compare('house',$this->house,true);         
            $criteria->compare('workingHours_begin',$this->workingHours_begin);         
            $criteria->compare('workingHours_end',$this->workingHours_end);         
            $criteria->compare('desc',$this->desc,true);         

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
