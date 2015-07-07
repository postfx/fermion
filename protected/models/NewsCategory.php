<?php

/**
 * This is the model class for table "newsCategory".
 *
 * The followings are the available columns in table 'newsCategory':
 * @property integer $id
 * @property integer $zIndex
 * @property string $name
 * @property string $desc
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property News[] $news
 */
class NewsCategory extends CActiveRecord
{
    

	public function tableName()
	{
            return 'newsCategory';
	}


	public function rules()
	{
            return array(
                array('name', 'required'),
                array('zIndex, active', 'numerical', 'integerOnly'=>true),
                array('name', 'length', 'max'=>128),
                array('desc', 'safe'),
            
                // search
                    array('id, zIndex, name, desc, active', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'news' => array(self::HAS_MANY, 'News', 'category_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'zIndex' => 'Z Index',
                'name' => 'Name',
                'desc' => 'Desc',
                'active' => 'Active',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('zIndex',$this->zIndex);         
            $criteria->compare('name',$this->name,true);         
            $criteria->compare('desc',$this->desc,true);         
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
