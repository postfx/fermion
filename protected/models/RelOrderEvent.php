<?php

/**
 * This is the model class for table "rel_order_event".
 *
 * The followings are the available columns in table 'rel_order_event':
 * @property integer $id
 * @property integer $order_id
 * @property integer $event_id
 * @property string $code
 *
 * The followings are the available model relations:
 * @property Event $event
 * @property Order $order
 */
class RelOrderEvent extends CActiveRecord
{
    

	public function tableName()
	{
            return 'rel_order_event';
	}


	public function rules()
	{
            return array(
                array('order_id, event_id, code', 'required'),
                array('order_id, event_id', 'numerical', 'integerOnly'=>true),
                array('code', 'length', 'max'=>32),
            
                // search
                    array('id, order_id, event_id, code', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
//                    'order' => array(self::BELONGS_TO, 'Order', 'order_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'order_id' => 'Order',
                'event_id' => 'Event',
                'code' => 'Code',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('order_id',$this->order_id);         
            $criteria->compare('event_id',$this->event_id);         
            $criteria->compare('code',$this->code,true);         

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
