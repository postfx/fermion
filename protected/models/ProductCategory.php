<?php

/**
 * This is the model class for table "productCategory".
 *
 * The followings are the available columns in table 'productCategory':
 * @property integer $id
 * @property integer $zIndex
 * @property string $name
 * @property string $img
 * @property string $desc
 * @property string $text
 * @property string $video
 *
 * The followings are the available model relations:
 * @property Product[] $products
 * @property Review[] $reviews
 */
class ProductCategory extends CActiveRecord
{
    

	public function tableName()
	{
            return 'productCategory';
	}


	public function rules()
	{
            return array(
                array('name, img, desc, text', 'required'),
                array('zIndex', 'numerical', 'integerOnly'=>true),
                array('name', 'length', 'max'=>128),
                array('img', 'length', 'max'=>32),
                array('video', 'length', 'max'=>255),
            
                // search
                    array('id, zIndex, name, img, desc, text, video', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'products' => array(self::HAS_MANY, 'Product', 'category_id'),
//                    'reviews' => array(self::HAS_MANY, 'Review', 'category_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'zIndex' => 'Z Index',
                'name' => 'Name',
                'img' => 'Img',
                'desc' => 'Desc',
                'text' => 'Text',
                'video' => 'Video',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('zIndex',$this->zIndex);         
            $criteria->compare('name',$this->name,true);         
            $criteria->compare('img',$this->img,true);         
            $criteria->compare('desc',$this->desc,true);         
            $criteria->compare('text',$this->text,true);         
            $criteria->compare('video',$this->video,true);         

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
