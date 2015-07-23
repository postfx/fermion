<?php

/**
 * This is the model class for table "rel_order_product".
 *
 * The followings are the available columns in table 'rel_order_product':
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $count
 *
 * The followings are the available model relations:
 * @property Product $product
 * @property Order $order
 */
class RelOrderProduct extends CActiveRecord
{
    

	public function tableName()
	{
            return 'rel_order_product';
	}


	public function rules()
	{
            return array(
                array('order_id, product_id', 'required'),
                array('order_id, product_id, count', 'numerical', 'integerOnly'=>true),
            
                // search
                    array('id, order_id, product_id, count', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
//                    'order' => array(self::BELONGS_TO, 'Order', 'order_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'order_id' => 'Order',
                'product_id' => 'Product',
                'count' => 'Count',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('order_id',$this->order_id);         
            $criteria->compare('product_id',$this->product_id);         
            $criteria->compare('`count`',$this->count);         

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
