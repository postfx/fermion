<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property integer $id
 * @property integer $date_create
 * @property integer $deliveryType
 * @property integer $deliveryPoint_id
 * @property integer $paymentMethod_id
 * @property integer $user_id
 * @property string $fio
 * @property string $phone
 * @property string $email
 * @property string $skype
 * @property integer $sum
 * @property integer $vat
 * @property integer $pointsUse
 * @property string $total
 * @property integer $status
 * @property integer $issued
 * @property integer $pointsReceive
 * @property integer $date_payment
 *
 * The followings are the available model relations:
 * @property PaymentMethod $paymentMethod
 * @property DeliveryPoint $deliveryPoint
 * @property User $user
 * @property RelOrderEvent[] $relOrderEvents
 * @property RelOrderProduct[] $relOrderProducts
 */
class Order extends CActiveRecord
{
    

	public function tableName()
	{
            return 'order';
	}


	public function rules()
	{
            return array(
                array('date_create, deliveryType, deliveryPoint_id, paymentMethod_id, user_id, fio, phone, sum, vat, total, pointsReceive', 'required'),
                array('date_create, deliveryType, deliveryPoint_id, paymentMethod_id, user_id, sum, vat, pointsUse, status, issued, pointsReceive, date_payment', 'numerical', 'integerOnly'=>true),
                array('fio', 'length', 'max'=>255),
                array('phone, skype', 'length', 'max'=>32),
                array('email', 'length', 'max'=>128),
                array('total', 'length', 'max'=>11),
            
                // search
                    array('id, date_create, deliveryType, deliveryPoint_id, paymentMethod_id, user_id, fio, phone, email, skype, sum, vat, pointsUse, total, status, issued, pointsReceive, date_payment', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'paymentMethod' => array(self::BELONGS_TO, 'PaymentMethod', 'paymentMethod_id'),
//                    'deliveryPoint' => array(self::BELONGS_TO, 'DeliveryPoint', 'deliveryPoint_id'),
//                    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
//                    'relOrderEvents' => array(self::HAS_MANY, 'RelOrderEvent', 'order_id'),
//                    'relOrderProducts' => array(self::HAS_MANY, 'RelOrderProduct', 'order_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'date_create' => 'Date Create',
                'deliveryType' => 'Delivery Type',
                'deliveryPoint_id' => 'Delivery Point',
                'paymentMethod_id' => 'Payment Method',
                'user_id' => 'User',
                'fio' => 'Fio',
                'phone' => 'Phone',
                'email' => 'Email',
                'skype' => 'Skype',
                'sum' => 'Sum',
                'vat' => 'Vat',
                'pointsUse' => 'Points Use',
                'total' => 'Total',
                'status' => 'Status',
                'issued' => 'Issued',
                'pointsReceive' => 'Points Receive',
                'date_payment' => 'Date Payment',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('date_create',$this->date_create);         
            $criteria->compare('deliveryType',$this->deliveryType);         
            $criteria->compare('deliveryPoint_id',$this->deliveryPoint_id);         
            $criteria->compare('paymentMethod_id',$this->paymentMethod_id);         
            $criteria->compare('user_id',$this->user_id);         
            $criteria->compare('fio',$this->fio,true);         
            $criteria->compare('phone',$this->phone,true);         
            $criteria->compare('email',$this->email,true);         
            $criteria->compare('skype',$this->skype,true);         
            $criteria->compare('sum',$this->sum);         
            $criteria->compare('vat',$this->vat);         
            $criteria->compare('pointsUse',$this->pointsUse);         
            $criteria->compare('total',$this->total,true);         
            $criteria->compare('status',$this->status);         
            $criteria->compare('issued',$this->issued);         
            $criteria->compare('pointsReceive',$this->pointsReceive);         
            $criteria->compare('date_payment',$this->date_payment);         

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
