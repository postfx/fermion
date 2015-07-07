<?php

/**
 * This is the model class for table "feedback".
 *
 * The followings are the available columns in table 'feedback':
 * @property integer $id
 * @property string $fio
 * @property string $email
 * @property string $phone
 * @property integer $user_id
 * @property integer $date_create
 * @property integer $question_id
 * @property string $text
 *
 * The followings are the available model relations:
 * @property User $user
 * @property FeedbackQuestions $question
 */
class Feedback extends CActiveRecord
{
    

	public function tableName()
	{
            return 'feedback';
	}


	public function rules()
	{
            return array(
                array('fio, email, date_create, question_id, text', 'required'),
                array('user_id, date_create, question_id', 'numerical', 'integerOnly'=>true),
                array('fio', 'length', 'max'=>255),
                array('email', 'length', 'max'=>128),
                array('phone', 'length', 'max'=>32),
            
                // search
                    array('id, fio, email, phone, user_id, date_create, question_id, text', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
//                    'question' => array(self::BELONGS_TO, 'FeedbackQuestions', 'question_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'fio' => 'Fio',
                'email' => 'Email',
                'phone' => 'Phone',
                'user_id' => 'User',
                'date_create' => 'Date Create',
                'question_id' => 'Question',
                'text' => 'Text',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('fio',$this->fio,true);         
            $criteria->compare('email',$this->email,true);         
            $criteria->compare('phone',$this->phone,true);         
            $criteria->compare('user_id',$this->user_id);         
            $criteria->compare('date_create',$this->date_create);         
            $criteria->compare('question_id',$this->question_id);         
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
