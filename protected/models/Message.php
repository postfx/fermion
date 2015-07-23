<?php

/**
 * This is the model class for table "message".
 *
 * The followings are the available columns in table 'message':
 * @property integer $id
 * @property integer $date_create
 * @property integer $sender_id
 * @property integer $receiver_id
 * @property string $subject
 * @property string $text
 * @property integer $isRead
 * @property integer $isDelete
 *
 * The followings are the available model relations:
 * @property User $receiver
 * @property User $sender
 */
class Message extends CActiveRecord
{
    

	public function tableName()
	{
            return 'message';
	}


	public function rules()
	{
            return array(
                array('date_create, sender_id, receiver_id, subject, text', 'required'),
                array('date_create, sender_id, receiver_id, isRead, isDelete', 'numerical', 'integerOnly'=>true),
                array('subject', 'length', 'max'=>255),
            
                // search
                    array('id, date_create, sender_id, receiver_id, subject, text, isRead, isDelete', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'receiver' => array(self::BELONGS_TO, 'User', 'receiver_id'),
//                    'sender' => array(self::BELONGS_TO, 'User', 'sender_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'date_create' => 'Date Create',
                'sender_id' => 'Sender',
                'receiver_id' => 'Receiver',
                'subject' => 'Subject',
                'text' => 'Text',
                'isRead' => 'Is Read',
                'isDelete' => 'Is Delete',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('date_create',$this->date_create);         
            $criteria->compare('sender_id',$this->sender_id);         
            $criteria->compare('receiver_id',$this->receiver_id);         
            $criteria->compare('subject',$this->subject,true);         
            $criteria->compare('`text`',$this->text,true);         
            $criteria->compare('isRead',$this->isRead);         
            $criteria->compare('isDelete',$this->isDelete);         

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
