<?php

/**
 * This is the model class for table "faq".
 *
 * The followings are the available columns in table 'faq':
 * @property integer $id
 * @property integer $zIndex
 * @property integer $category_id
 * @property string $question
 * @property string $answer
 *
 * The followings are the available model relations:
 * @property FaqCategory $category
 */
class Faq extends CActiveRecord
{
    

	public function tableName()
	{
            return 'faq';
	}


	public function rules()
	{
            return array(
                array('category_id, question, answer', 'required'),
                array('zIndex, category_id', 'numerical', 'integerOnly'=>true),
                array('question', 'length', 'max'=>255),
            
                // search
                    array('id, zIndex, category_id, question, answer', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'category' => array(self::BELONGS_TO, 'FaqCategory', 'category_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'zIndex' => 'Z Index',
                'category_id' => 'Category',
                'question' => 'Question',
                'answer' => 'Answer',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('zIndex',$this->zIndex);         
            $criteria->compare('category_id',$this->category_id);         
            $criteria->compare('question',$this->question,true);         
            $criteria->compare('answer',$this->answer,true);         

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
