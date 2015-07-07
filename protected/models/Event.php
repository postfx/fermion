<?php

/**
 * This is the model class for table "event".
 *
 * The followings are the available columns in table 'event':
 * @property integer $id
 * @property integer $date_create
 * @property integer $date_event_begin
 * @property integer $date_event_end
 * @property integer $price
 * @property integer $points
 * @property integer $ratingValue
 * @property integer $ratingCount
 * @property string $img
 * @property string $name
 * @property string $desc
 * @property string $text
 * @property integer $active
 * @property integer $status
 * @property integer $category_id
 *
 * The followings are the available model relations:
 * @property EventCategory $category
 * @property RelEventUser[] $relEventUsers
 * @property RelOrderEvent[] $relOrderEvents
 * @property UserCode[] $userCodes
 */
class Event extends CActiveRecord
{
    

	public function tableName()
	{
            return 'event';
	}


	public function rules()
	{
            return array(
                array('date_create, date_event_begin, date_event_end, name, desc, text, category_id', 'required'),
                array('date_create, date_event_begin, date_event_end, price, points, ratingValue, ratingCount, active, status, category_id', 'numerical', 'integerOnly'=>true),
                array('img', 'length', 'max'=>32),
                array('name', 'length', 'max'=>255),
            
                // search
                    array('id, date_create, date_event_begin, date_event_end, price, points, ratingValue, ratingCount, img, name, desc, text, active, status, category_id', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'category' => array(self::BELONGS_TO, 'EventCategory', 'category_id'),
//                    'relEventUsers' => array(self::HAS_MANY, 'RelEventUser', 'event_id'),
//                    'relOrderEvents' => array(self::HAS_MANY, 'RelOrderEvent', 'event_id'),
//                    'userCodes' => array(self::HAS_MANY, 'UserCode', 'event_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'date_create' => 'Date Create',
                'date_event_begin' => 'Date Event Begin',
                'date_event_end' => 'Date Event End',
                'price' => 'Price',
                'points' => 'Points',
                'ratingValue' => 'Rating Value',
                'ratingCount' => 'Rating Count',
                'img' => 'Img',
                'name' => 'Name',
                'desc' => 'Desc',
                'text' => 'Text',
                'active' => 'Active',
                'status' => 'Status',
                'category_id' => 'Category',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('date_create',$this->date_create);         
            $criteria->compare('date_event_begin',$this->date_event_begin);         
            $criteria->compare('date_event_end',$this->date_event_end);         
            $criteria->compare('price',$this->price);         
            $criteria->compare('points',$this->points);         
            $criteria->compare('ratingValue',$this->ratingValue);         
            $criteria->compare('ratingCount',$this->ratingCount);         
            $criteria->compare('img',$this->img,true);         
            $criteria->compare('name',$this->name,true);         
            $criteria->compare('desc',$this->desc,true);         
            $criteria->compare('text',$this->text,true);         
            $criteria->compare('active',$this->active);         
            $criteria->compare('status',$this->status);         
            $criteria->compare('category_id',$this->category_id);         

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
