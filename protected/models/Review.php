<?php

/**
 * This is the model class for table "review".
 *
 * The followings are the available columns in table 'review':
 * @property integer $id
 * @property string $keys
 * @property integer $date_create
 * @property integer $ratingValue
 * @property integer $ratingCount
 * @property integer $type
 * @property string $title
 * @property integer $user_id
 * @property integer $product_id
 * @property integer $category_id
 * @property string $text
 * @property string $video
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Product $product
 * @property ProductCategory $category
 * @property User $user
 */
class Review extends CActiveRecord
{
    

	public function tableName()
	{
            return 'review';
	}


	public function rules()
	{
            return array(
                array('date_create, title, user_id, product_id, category_id, active', 'required'),
                array('date_create, ratingValue, ratingCount, type, user_id, product_id, category_id, active', 'numerical', 'integerOnly'=>true),
                array('keys, title, video', 'length', 'max'=>255),
                array('text', 'safe'),
            
                // search
                    array('id, keys, date_create, ratingValue, ratingCount, type, title, user_id, product_id, category_id, text, video, active', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
//                    'category' => array(self::BELONGS_TO, 'ProductCategory', 'category_id'),
//                    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'keys' => 'Keys',
                'date_create' => 'Date Create',
                'ratingValue' => 'Rating Value',
                'ratingCount' => 'Rating Count',
                'type' => 'Type',
                'title' => 'Title',
                'user_id' => 'User',
                'product_id' => 'Product',
                'category_id' => 'Category',
                'text' => 'Text',
                'video' => 'Video',
                'active' => 'Active',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('`keys`',$this->keys,true);         
            $criteria->compare('date_create',$this->date_create);         
            $criteria->compare('ratingValue',$this->ratingValue);         
            $criteria->compare('ratingCount',$this->ratingCount);         
            $criteria->compare('`type`',$this->type);         
            $criteria->compare('title',$this->title,true);         
            $criteria->compare('user_id',$this->user_id);         
            $criteria->compare('product_id',$this->product_id);         
            $criteria->compare('category_id',$this->category_id);         
            $criteria->compare('text',$this->text,true);         
            $criteria->compare('video',$this->video,true);         
            $criteria->compare('`active`',$this->active);         

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
