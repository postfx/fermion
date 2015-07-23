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
                array('fio, email, question_id, text', 'required'),
                array('email', 'email'),
                array('question_id', 'numerical', 'integerOnly'=>true),
                array('fio', 'length', 'max'=>255),
                array('email', 'length', 'max'=>128),
                array('phone', 'length', 'max'=>32),
                array('text', 'length', 'max'=>1000),
            
                // search
                    array('id, fio, email, phone, user_id, date_create, question_id, text', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
                    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
                    'question' => array(self::BELONGS_TO, 'FeedbackQuestion', 'question_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'fio' => 'ФИО',
                'email' => 'E-mail',
                'phone' => 'Телефон',
                'user_id' => 'Пользователь',
                'date_create' => 'Дата создания',
                'question_id' => 'Тема вопроса',
                'text' => 'Вопрос',
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
            $criteria->compare('`text`',$this->text,true);         

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
        
        
        public function get_user()
        {
            if ( $this->user_id!==null ) {
                $role = User::model()->findByPk(Yii::app()->user->id)->_role;       //  todo
                if ( $role->opt_user_read ) {
                    return CHtml::link($this->user->login, array('/cabinet/user/view', 'id'=>$this->user_id), array('target'=>'_blank'));
                } else {
                    return $this->user->login;
                }
            } else {
                return null;
            }
        }
        
        
        public function preSave()
        {
            if ( $this->isNewRecord ) {
                $this->date_create = time();
                if ( !Yii::app()->user->isGuest ) {
                    $this->user_id = Yii::app()->user->id;
                }
            } else {
                
            }
            
            

            if ( $this->save(false) ) {
                return true;
            } else {
                return false;
            }
        }
}
