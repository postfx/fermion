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
 * @property string $office
 * @property string $workingHours_begin
 * @property string $workingHours_end
 * @property integer $workingHours_comment
 * @property string $desc
 * @property integer $isDeliveryPoint
 * @property integer $date_create
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
                array('city_id, region_id, country_id, isDeliveryPoint', 'numerical', 'integerOnly'=>true),
                array('name, workingHours_comment', 'length', 'max'=>255),
                array('street', 'length', 'max'=>128),
                array('house, office', 'length', 'max'=>16),
                array('workingHours_begin, workingHours_end', 'length', 'max'=>5),
                array('desc', 'safe'),
            
                // search
                    array('id, name, city_id, region_id, country_id, street, house, workingHours_begin, workingHours_end, desc, isDeliveryPoint, workingHours_comment, office', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
                    'country' => array(self::BELONGS_TO, 'Country', 'country_id'),
                    'city' => array(self::BELONGS_TO, 'City', 'city_id'),
                    'region' => array(self::BELONGS_TO, 'Region', 'region_id'),
//                    'users' => array(self::HAS_MANY, 'User', 'office_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'name' => 'Название',
                'city_id' => 'Город',
                'region_id' => 'Регион',
                'country_id' => 'Страна',
                'street' => 'Улица',
                'house' => 'Дом',
                'office' => 'Офис',
                'workingHours_begin' => 'Время работы, с',
                'workingHours_end' => 'Время работы, до',
                'workingHours_comment' => 'Время работы, инфо',
                'desc' => 'Описание',
                'date_create'=>'Дата создания',
                'isDeliveryPoint'=>'Является пунктом выдачи',
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
            $criteria->compare('`desc`',$this->desc,true);         

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
        
        
        public static function items($country_id=null, $region_id=null, $city_id=null)
        {
            $result = array(
                //''=>'',
            );
            $criteria = new CDbCriteria;
            $criteria->order = '`name` ASC';
            if ( $country_id!==null ) {
                $criteria->compare('country_id', $country_id);
            }
            if ( $region_id!==null ) {
                $criteria->compare('region_id', $region_id);
            }
            if ( $city_id!==null ) {
                $criteria->compare('city_id', $city_id);
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
        
        
        public function get_desc()
        {
            if ( strlen(strip_tags($this->desc))>100 ) {
                return mb_substr(strip_tags($this->desc), 0, 100).'...';
            } else {
                return strip_tags($this->desc);
            }
        }
        
        
        public function preUpdate()
        {
            
        }
        
        
        public function preSave()
        {
            if ( $this->isNewRecord ) {
                $this->date_create = time();
            } else {
                
            }

            if ( $this->save(false) ) {
                return true;
            } else {
                return false;
            }
        }
        
        
        public function get_address()
        {
            return $this->city->name.', '.$this->street.', д. '.$this->house . ( (strlen($this->office)!=0) ? ', оф. '.$this->office : '' );
        }
        
        
        public function get_workingHours()
        {
            return $this->workingHours_begin.' - '.$this->workingHours_end . ( (strlen($this->workingHours_comment)!=0) ? ', '.$this->workingHours_comment : '' );
        }
}
