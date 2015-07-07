<?php

/**
 * This is the model class for table "paymentMethod".
 *
 * The followings are the available columns in table 'paymentMethod':
 * @property integer $id
 * @property integer $zIndex
 * @property string $img
 * @property string $name
 * @property string $desc
 *
 * The followings are the available model relations:
 * @property Order[] $orders
 */
class PaymentMethod extends CActiveRecord
{
    

	public function tableName()
	{
            return 'paymentMethod';
	}


	public function rules()
	{
            return array(
                array('name', 'required'),
                array('zIndex', 'numerical', 'integerOnly'=>true),
                array('img', 'length', 'max'=>32),
                array('name', 'length', 'max'=>128),
                array('desc', 'safe'),
            
                // search
                    array('id, zIndex, img, name, desc', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'orders' => array(self::HAS_MANY, 'Order', 'paymentMethod_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'zIndex' => 'Z Index',
                'img' => 'Img',
                'name' => 'Name',
                'desc' => 'Desc',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('zIndex',$this->zIndex);         
            $criteria->compare('img',$this->img,true);         
            $criteria->compare('name',$this->name,true);         
            $criteria->compare('desc',$this->desc,true);         

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
