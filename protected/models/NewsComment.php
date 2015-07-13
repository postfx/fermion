<?php

/**
 * This is the model class for table "newsComment".
 *
 * The followings are the available columns in table 'newsComment':
 * @property integer $id
 * @property integer $date_create
 * @property integer $news_id
 * @property integer $user_id
 * @property string $text
 *
 * The followings are the available model relations:
 * @property User $user
 * @property News $news
 */
class NewsComment extends CActiveRecord
{
    

	public function tableName()
	{
            return 'newsComment';
	}


	public function rules()
	{
            return array(
                array('news_id, user_id, text', 'required'),
                array('news_id, user_id', 'numerical', 'integerOnly'=>true),
            
                // search
                    array('id, date_create, news_id, user_id, text', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
                    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
                    'news' => array(self::BELONGS_TO, 'News', 'news_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'date_create' => 'Date Create',
                'news_id' => 'News',
                'user_id' => 'User',
                'text' => 'Комментарий',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('date_create',$this->date_create);         
            $criteria->compare('news_id',$this->news_id);         
            $criteria->compare('user_id',$this->user_id);         
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
        
        
        public function preSave()
        {
            $this->date_create = time();
            
            if ( $this->save(false) ) {
                $this->news->saveCounters(array('countComments'=>1));
                
                return true;
            } else {
                return false;
            }
        }
}
