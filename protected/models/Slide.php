<?php

/**
 * This is the model class for table "slide".
 *
 * The followings are the available columns in table 'slide':
 * @property integer $id
 * @property integer $zIndex
 * @property string $name
 * @property string $text
 * @property string $spec_link
 * @property string $spec_text
 * @property string $img
 */
class Slide extends CActiveRecord
{
    

	public function tableName()
	{
            return 'slide';
	}


	public function rules()
	{
            return array(
                array('name, text, img', 'required'),
                array('zIndex', 'numerical', 'integerOnly'=>true),
                array('name', 'length', 'max'=>128),
                array('text, spec_link', 'length', 'max'=>255),
                array('spec_text, img', 'length', 'max'=>32),
            
                // search
                    array('id, zIndex, name, text, spec_link, spec_text, img', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'zIndex' => 'Z Index',
                'name' => 'Name',
                'text' => 'Text',
                'spec_link' => 'Spec Link',
                'spec_text' => 'Spec Text',
                'img' => 'Img',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('zIndex',$this->zIndex);         
            $criteria->compare('name',$this->name,true);         
            $criteria->compare('text',$this->text,true);         
            $criteria->compare('spec_link',$this->spec_link,true);         
            $criteria->compare('spec_text',$this->spec_text,true);         
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
