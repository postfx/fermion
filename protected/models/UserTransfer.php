<?php

/**
 * This is the model class for table "userTransfer".
 *
 * The followings are the available columns in table 'userTransfer':
 * @property integer $id
 * @property integer $sender_id
 * @property integer $date_create
 * @property integer $receiver_id
 * @property integer $sum
 *
 * The followings are the available model relations:
 * @property User $receiver
 * @property User $sender
 */
class UserTransfer extends CActiveRecord
{
    

	public function tableName()
	{
            return 'userTransfer';
	}


	public function rules()
	{
            return array(
                array('sender_id, date_create, receiver_id, sum', 'required'),
                array('sender_id, date_create, receiver_id, sum', 'numerical', 'integerOnly'=>true),
            
                // search
                    array('id, sender_id, date_create, receiver_id, sum', 'safe', 'on'=>'search'),
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
                'sender_id' => 'Sender',
                'date_create' => 'Date Create',
                'receiver_id' => 'Receiver',
                'sum' => 'Sum',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('sender_id',$this->sender_id);         
            $criteria->compare('date_create',$this->date_create);         
            $criteria->compare('receiver_id',$this->receiver_id);         
            $criteria->compare('`sum`',$this->sum);         

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
