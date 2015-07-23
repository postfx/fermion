<?php

/**
 * This is the model class for table "feedbackQuestion".
 *
 * The followings are the available columns in table 'feedbackQuestion':
 * @property integer $id
 * @property string $zIndex
 * @property string $text
 *
 * The followings are the available model relations:
 * @property Feedback[] $feedbacks
 */
class FeedbackQuestion extends CActiveRecord
{
    

	public function tableName()
	{
            return 'feedbackQuestion';
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
                'zIndex' => 'Порядок',
                'text' => 'Тема вопроса',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('zIndex',$this->zIndex,true);         
            $criteria->compare('`text`',$this->text,true);         

            $dataProvider = new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>20,
                ),
            ));

            $dataProvider->sort->defaultOrder = '`zIndex` ASC, `id` ASC';

            return $dataProvider;
	}


	public static function model($className=__CLASS__)
	{
            return parent::model($className);
	}
        
        
        public function preUpdate()
        {
            
        }
        
        
        public function preSave()
        {
            if ( $this->isNewRecord ) {
                //$this->date_create = time();
            } else {
                
            }


            if ( $this->save(false) ) {
                return true;
            } else {
                return false;
            }
        }
        
        
        public static function items()
        {
            $result = array(
                //''=>'',
            );
            $criteria = new CDbCriteria;
            $criteria->order = '`zIndex` ASC, `id` ASC';
            $values = self::model()->findAll($criteria);
            
            foreach ( $values as $value ) {
                //$result[$value->id] = $value->name;
                $result[] = array(
                    'id'=>$value->id,
                    'value'=>$value->text,
                );
            }
            
            return $result;
        }
}
