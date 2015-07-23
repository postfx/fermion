<?php

/**
 * This is the model class for table "userCode".
 *
 * The followings are the available columns in table 'userCode':
 * @property integer $id
 * @property integer $user_id
 * @property string $code
 * @property integer $event_id
 * @property integer $used
 * @property integer $eventCategory_id
 *
 * The followings are the available model relations:
 * @property EventCategory $eventCategory
 * @property Event $event
 * @property User $user
 */
class UserCode extends CActiveRecord
{
    

	public function tableName()
	{
            return 'userCode';
	}


	public function rules()
	{
            return array(
                array('user_id, code, event_id, eventCategory_id', 'required'),
                array('user_id, event_id, used, eventCategory_id', 'numerical', 'integerOnly'=>true),
                array('code', 'length', 'max'=>32),
            
                // search
                    array('id, user_id, code, event_id, used, eventCategory_id', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'eventCategory' => array(self::BELONGS_TO, 'EventCategory', 'eventCategory_id'),
//                    'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
//                    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'user_id' => 'User',
                'code' => 'Code',
                'event_id' => 'Event',
                'used' => 'Used',
                'eventCategory_id' => 'Event Category',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('user_id',$this->user_id);         
            $criteria->compare('`code`',$this->code,true);         
            $criteria->compare('event_id',$this->event_id);         
            $criteria->compare('used',$this->used);         
            $criteria->compare('eventCategory_id',$this->eventCategory_id);         

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
