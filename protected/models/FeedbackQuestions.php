<?php

/**
 * This is the model class for table "feedbackQuestions".
 *
 * The followings are the available columns in table 'feedbackQuestions':
 * @property integer $id
 * @property string $zIndex
 * @property string $text
 *
 * The followings are the available model relations:
 * @property Feedback[] $feedbacks
 */
class FeedbackQuestions extends CActiveRecord
{
    

	public function tableName()
	{
            return 'feedbackQuestions';
	}


	public function rules()
	{
            return array(
                array('text', 'required'),
                array('zIndex, text', 'length', 'max'=>255),
            
                // search
                    array('id, zIndex, text', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'feedbacks' => array(self::HAS_MANY, 'Feedback', 'question_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'zIndex' => 'Z Index',
                'text' => 'Text',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('zIndex',$this->zIndex,true);         
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
