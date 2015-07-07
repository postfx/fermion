<?php

/**
 * This is the model class for table "productPrice".
 *
 * The followings are the available columns in table 'productPrice':
 * @property integer $id
 * @property integer $product_id
 * @property integer $date_begin
 * @property integer $date_end
 * @property integer $price
 * @property string $promoName
 *
 * The followings are the available model relations:
 * @property Product $product
 */
class ProductPrice extends CActiveRecord
{
    

	public function tableName()
	{
            return 'productPrice';
	}


	public function rules()
	{
            return array(
                array('product_id, date_begin, date_end, price', 'required'),
                array('product_id, date_begin, date_end, price', 'numerical', 'integerOnly'=>true),
                array('promoName', 'length', 'max'=>128),
            
                // search
                    array('id, product_id, date_begin, date_end, price, promoName', 'safe', 'on'=>'search'),
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
                'date_begin' => 'Date Begin',
                'date_end' => 'Date End',
                'price' => 'Price',
                'promoName' => 'Promo Name',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('product_id',$this->product_id);         
            $criteria->compare('date_begin',$this->date_begin);         
            $criteria->compare('date_end',$this->date_end);         
            $criteria->compare('price',$this->price);         
            $criteria->compare('promoName',$this->promoName,true);         

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
