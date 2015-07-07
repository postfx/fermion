<?php

/**
 * This is the model class for table "city".
 *
 * The followings are the available columns in table 'city':
 * @property integer $id
 * @property integer $country_id
 * @property integer $region_id
 * @property string $name
 *
 * The followings are the available model relations:
 * @property Region $region
 * @property Country $country
 * @property DeliveryPoint[] $deliveryPoints
 * @property Office[] $offices
 * @property User[] $users
 * @property UserProfile[] $userProfiles
 */
class City extends CActiveRecord
{
    

	public function tableName()
	{
            return 'city';
	}


	public function rules()
	{
            return array(
                array('country_id, region_id, name', 'required'),
                array('country_id, region_id', 'numerical', 'integerOnly'=>true),
                array('name', 'length', 'max'=>128),
            
                // search
                    array('id, country_id, region_id, name', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'region' => array(self::BELONGS_TO, 'Region', 'region_id'),
//                    'country' => array(self::BELONGS_TO, 'Country', 'country_id'),
//                    'deliveryPoints' => array(self::HAS_MANY, 'DeliveryPoint', 'city_id'),
//                    'offices' => array(self::HAS_MANY, 'Office', 'city_id'),
//                    'users' => array(self::HAS_MANY, 'User', 'city_id'),
//                    'userProfiles' => array(self::HAS_MANY, 'UserProfile', 'city_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'country_id' => 'Country',
                'region_id' => 'Region',
                'name' => 'Name',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('country_id',$this->country_id);         
            $criteria->compare('region_id',$this->region_id);         
            $criteria->compare('name',$this->name,true);         

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
        
        
        public static function items($region_id=null)
        {
            $result = array(
                //''=>'',
            );
            $criteria = new CDbCriteria;
            if ( $region_id!==null ) {
                $criteria->compare('region_id', (int)$region_id);
            }
            $values = self::model()->findAll($criteria);
            
            foreach ( $values as $value ) {
                //$result[$value->id] = $value->name;
                $result[] = array(
                    'id'=>$value->id,
                    'value'=>$value->name,
                );
            }
            
            return $result;
        }
}
