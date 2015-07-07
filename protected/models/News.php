<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $id
 * @property string $img
 * @property integer $date_create
 * @property integer $date_update
 * @property integer $date_begin
 * @property integer $date_end
 * @property integer $countComments
 * @property integer $countViews
 * @property integer $category_id
 * @property string $title
 * @property string $desc
 * @property string $text
 * @property integer $user_id
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property NewsCategory $category
 * @property User $user
 * @property NewsComment[] $newsComments
 */
class News extends CActiveRecord
{
    

	public function tableName()
	{
            return 'news';
	}


	public function rules()
	{
            return array(
                array('date_create, category_id, title, desc, text, user_id', 'required'),
                array('date_create, date_update, date_begin, date_end, countComments, countViews, category_id, user_id, active', 'numerical', 'integerOnly'=>true),
                array('img', 'length', 'max'=>32),
                array('title', 'length', 'max'=>255),
            
                // search
                    array('id, img, date_create, date_update, date_begin, date_end, countComments, countViews, category_id, title, desc, text, user_id, active', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'category' => array(self::BELONGS_TO, 'NewsCategory', 'category_id'),
//                    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
//                    'newsComments' => array(self::HAS_MANY, 'NewsComment', 'news_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'img' => 'Img',
                'date_create' => 'Date Create',
                'date_update' => 'Date Update',
                'date_begin' => 'Date Begin',
                'date_end' => 'Date End',
                'countComments' => 'Count Comments',
                'countViews' => 'Count Views',
                'category_id' => 'Category',
                'title' => 'Title',
                'desc' => 'Desc',
                'text' => 'Text',
                'user_id' => 'User',
                'active' => 'Active',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('img',$this->img,true);         
            $criteria->compare('date_create',$this->date_create);         
            $criteria->compare('date_update',$this->date_update);         
            $criteria->compare('date_begin',$this->date_begin);         
            $criteria->compare('date_end',$this->date_end);         
            $criteria->compare('countComments',$this->countComments);         
            $criteria->compare('countViews',$this->countViews);         
            $criteria->compare('category_id',$this->category_id);         
            $criteria->compare('title',$this->title,true);         
            $criteria->compare('desc',$this->desc,true);         
            $criteria->compare('text',$this->text,true);         
            $criteria->compare('user_id',$this->user_id);         
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
