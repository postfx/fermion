<?php

/**
 * This is the model class for table "eventCategory".
 *
 * The followings are the available columns in table 'eventCategory':
 * @property integer $id
 * @property integer $zIndex
 * @property string $name
 * @property string $desc
 * @property string $color
 *
 * The followings are the available model relations:
 * @property Event[] $events
 * @property UserCode[] $userCodes
 */
class EventCategory extends CActiveRecord
{
    

	public function tableName()
	{
            return 'eventCategory';
	}


	public function rules()
	{
            return array(
                array('name, color', 'required'),
                array('zIndex', 'numerical', 'integerOnly'=>true),
                array('name', 'length', 'max'=>128),
                array('color', 'length', 'max'=>6),
                array('desc', 'safe'),
            
                // search
                    array('id, zIndex, name, desc, color', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'events' => array(self::HAS_MANY, 'Event', 'category_id'),
//                    'userCodes' => array(self::HAS_MANY, 'UserCode', 'eventCategory_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'zIndex' => 'Z Index',
                'name' => 'Name',
                'desc' => 'Desc',
                'color' => 'Color',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('zIndex',$this->zIndex);         
            $criteria->compare('name',$this->name,true);         
            $criteria->compare('desc',$this->desc,true);         
            $criteria->compare('color',$this->color,true);         

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
