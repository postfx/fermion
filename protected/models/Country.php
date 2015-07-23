<?php

/**
 * This is the model class for table "country".
 *
 * The followings are the available columns in table 'country':
 * @property integer $id
 * @property string $code
 * @property string $name
 *
 * The followings are the available model relations:
 * @property City[] $cities
 * @property DeliveryPoint[] $deliveryPoints
 * @property Office[] $offices
 * @property Region[] $regions
 * @property User[] $users
 * @property UserProfile[] $userProfiles
 */
class Country extends CActiveRecord
{
    

	public function tableName()
	{
            return 'country';
	}


	public function rules()
	{
            return array(
                array('code, name', 'required'),
                array('code', 'length', 'max'=>2),
                array('name', 'length', 'max'=>128),
            
                // search
                    array('id, code, name', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'cities' => array(self::HAS_MANY, 'City', 'country_id'),
//                    'deliveryPoints' => array(self::HAS_MANY, 'DeliveryPoint', 'country_id'),
//                    'offices' => array(self::HAS_MANY, 'Office', 'country_id'),
//                    'regions' => array(self::HAS_MANY, 'Region', 'country_id'),
//                    'users' => array(self::HAS_MANY, 'User', 'country_id'),
//                    'userProfiles' => array(self::HAS_MANY, 'UserProfile', 'country_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'code' => 'Code',
                'name' => 'Name',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('`code`',$this->code,true);         
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
        
        
        public static function items()
        {
            $result = array(
                //''=>'',
            );
            $criteria = new CDbCriteria;
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
