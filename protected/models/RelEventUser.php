<?php

/**
 * This is the model class for table "rel_event_user".
 *
 * The followings are the available columns in table 'rel_event_user':
 * @property integer $id
 * @property integer $event_id
 * @property integer $event_date
 * @property integer $user_id
 * @property string $surname
 * @property string $name
 * @property string $patronymic
 * @property string $code
 * @property integer $date_create
 * @property integer $author_id
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property User $author
 * @property Event $event
 * @property User $user
 */
class RelEventUser extends CActiveRecord
{
    

	public function tableName()
	{
            return 'rel_event_user';
	}


	public function rules()
	{
            return array(
                array('event_id, event_date, user_id, surname, name, patronymic, code, date_create, author_id', 'required'),
                array('event_id, event_date, user_id, date_create, author_id, active', 'numerical', 'integerOnly'=>true),
                array('surname, name, patronymic, code', 'length', 'max'=>32),
            
                // search
                    array('id, event_id, event_date, user_id, surname, name, patronymic, code, date_create, author_id, active', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'author' => array(self::BELONGS_TO, 'User', 'author_id'),
//                    'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
//                    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'event_id' => 'Event',
                'event_date' => 'Event Date',
                'user_id' => 'User',
                'surname' => 'Surname',
                'name' => 'Name',
                'patronymic' => 'Patronymic',
                'code' => 'Code',
                'date_create' => 'Date Create',
                'author_id' => 'Author',
                'active' => 'Active',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('event_id',$this->event_id);         
            $criteria->compare('event_date',$this->event_date);         
            $criteria->compare('user_id',$this->user_id);         
            $criteria->compare('surname',$this->surname,true);         
            $criteria->compare('name',$this->name,true);         
            $criteria->compare('patronymic',$this->patronymic,true);         
            $criteria->compare('code',$this->code,true);         
            $criteria->compare('date_create',$this->date_create);         
            $criteria->compare('author_id',$this->author_id);         
            $criteria->compare('active',$this->active);         

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
