<?php

/**
 * This is the model class for table "faqCategory".
 *
 * The followings are the available columns in table 'faqCategory':
 * @property integer $id
 * @property string $name
 * @property integer $zIndex
 * @property string $desc
 * @property string $img
 *
 * The followings are the available model relations:
 * @property Faq[] $faqs
 */
class FaqCategory extends CActiveRecord
{
    

	public function tableName()
	{
            return 'faqCategory';
	}


	public function rules()
	{
            return array(
                array('name, desc, img', 'required'),
                array('zIndex', 'numerical', 'integerOnly'=>true),
                array('name', 'length', 'max'=>128),
                array('desc', 'length', 'max'=>255),
                array('img', 'length', 'max'=>32),
            
                // search
                    array('id, name, zIndex, desc, img', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'faqs' => array(self::HAS_MANY, 'Faq', 'category_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'name' => 'Name',
                'zIndex' => 'Z Index',
                'desc' => 'Desc',
                'img' => 'Img',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('name',$this->name,true);         
            $criteria->compare('zIndex',$this->zIndex);         
            $criteria->compare('`desc`',$this->desc,true);         
            $criteria->compare('img',$this->img,true);         

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
