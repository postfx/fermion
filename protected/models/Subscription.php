<?php

/**
 * This is the model class for table "subscription".
 *
 * The followings are the available columns in table 'subscription':
 * @property integer $id
 * @property string $email
 * @property integer $isConfirm
 * @property integer $date_create
 * @property integer $date_last
 * @property integer $date_confirm
 * @property string $hash
 */
class Subscription extends CActiveRecord
{
    

	public function tableName()
	{
            return 'subscription';
	}


	public function rules()
	{
            return array(
                array('email, isConfirm, date_create', 'required'),
                array('isConfirm, date_create, date_last, date_confirm', 'numerical', 'integerOnly'=>true),
                array('email', 'length', 'max'=>128),
                array('hash', 'length', 'max'=>32),
            
                // search
                    array('id, email, isConfirm, date_create, date_last, date_confirm, hash', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'email' => 'Email',
                'isConfirm' => 'Is Confirm',
                'date_create' => 'Date Create',
                'date_last' => 'Date Last',
                'date_confirm' => 'Date Confirm',
                'hash' => 'Hash',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('email',$this->email,true);         
            $criteria->compare('isConfirm',$this->isConfirm);         
            $criteria->compare('date_create',$this->date_create);         
            $criteria->compare('date_last',$this->date_last);         
            $criteria->compare('date_confirm',$this->date_confirm);         
            $criteria->compare('hash',$this->hash,true);         

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
