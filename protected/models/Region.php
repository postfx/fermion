<?php

/**
 * This is the model class for table "region".
 *
 * The followings are the available columns in table 'region':
 * @property integer $id
 * @property integer $country_id
 * @property string $name
 *
 * The followings are the available model relations:
 * @property City[] $cities
 * @property DeliveryPoint[] $deliveryPoints
 * @property Office[] $offices
 * @property Country $country
 * @property User[] $users
 * @property UserProfile[] $userProfiles
 */
class Region extends CActiveRecord
{
    

	public function tableName()
	{
            return 'region';
	}


	public function rules()
	{
            return array(
                array('country_id, name', 'required'),
                array('country_id', 'numerical', 'integerOnly'=>true),
                array('name', 'length', 'max'=>128),
            
                // search
                    array('id, country_id, name', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'cities' => array(self::HAS_MANY, 'City', 'region_id'),
//                    'deliveryPoints' => array(self::HAS_MANY, 'DeliveryPoint', 'region_id'),
//                    'offices' => array(self::HAS_MANY, 'Office', 'region_id'),
//                    'country' => array(self::BELONGS_TO, 'Country', 'country_id'),
//                    'users' => array(self::HAS_MANY, 'User', 'region_id'),
//                    'userProfiles' => array(self::HAS_MANY, 'UserProfile', 'region_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'country_id' => 'Country',
                'name' => 'Name',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('country_id',$this->country_id);         
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
        
        
        public static function items($country_id=null)
        {
            $result = array(
                //''=>'',
            );
            $criteria = new CDbCriteria;
            if ( $country_id!==null ) {
                $criteria->compare('country_id', (int)$country_id);
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
