<?php

/**
 * This is the model class for table "productImage".
 *
 * The followings are the available columns in table 'productImage':
 * @property integer $id
 * @property integer $product_id
 * @property string $img
 * @property integer $main
 *
 * The followings are the available model relations:
 * @property Product $product
 */
class ProductImage extends CActiveRecord
{
    

	public function tableName()
	{
            return 'productImage';
	}


	public function rules()
	{
            return array(
                array('product_id, img, main', 'required'),
                array('product_id, main', 'numerical', 'integerOnly'=>true),
                array('img', 'length', 'max'=>32),
            
                // search
                    array('id, product_id, img, main', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'product_id' => 'Product',
                'img' => 'Img',
                'main' => 'Main',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('product_id',$this->product_id);         
            $criteria->compare('img',$this->img,true);         
            $criteria->compare('main',$this->main);         

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
