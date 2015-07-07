<?php

/**
 * This is the model class for table "userOperation".
 *
 * The followings are the available columns in table 'userOperation':
 * @property integer $id
 * @property integer $user_id
 * @property integer $date_create
 * @property integer $sum
 * @property string $text
 *
 * The followings are the available model relations:
 * @property User $user
 */
class UserOperation extends CActiveRecord
{
    

	public function tableName()
	{
            return 'userOperation';
	}


	public function rules()
	{
            return array(
                array('user_id, date_create, sum, text', 'required'),
                array('user_id, date_create, sum', 'numerical', 'integerOnly'=>true),
                array('text', 'length', 'max'=>255),
            
                // search
                    array('id, user_id, date_create, sum, text', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'user_id' => 'User',
                'date_create' => 'Date Create',
                'sum' => 'Sum',
                'text' => 'Text',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('user_id',$this->user_id);         
            $criteria->compare('date_create',$this->date_create);         
            $criteria->compare('sum',$this->sum);         
            $criteria->compare('text',$this->text,true);         

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
