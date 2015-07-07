<?php

/**
 * This is the model class for table "rel_product_user".
 *
 * The followings are the available columns in table 'rel_product_user':
 * @property integer $id
 * @property integer $product_id
 * @property integer $user_id
 * @property integer $date
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Product $product
 */
class RelProductUser extends CActiveRecord
{
    

	public function tableName()
	{
            return 'rel_product_user';
	}


	public function rules()
	{
            return array(
                array('product_id, user_id, date', 'required'),
                array('product_id, user_id, date', 'numerical', 'integerOnly'=>true),
            
                // search
                    array('id, product_id, user_id, date', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
//                    'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'product_id' => 'Product',
                'user_id' => 'User',
                'date' => 'Date',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('product_id',$this->product_id);         
            $criteria->compare('user_id',$this->user_id);         
            $criteria->compare('date',$this->date);         

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
