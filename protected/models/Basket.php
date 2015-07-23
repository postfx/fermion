<?php

/**
 * This is the model class for table "basket".
 *
 * The followings are the available columns in table 'basket':
 * @property integer $id
 * @property integer $date_create
 * @property integer $user_id
 * @property integer $product_id
 * @property integer $event_id
 * @property integer $price         //  эт стоимость 1 единицы товара/события, дублируем для оптимизации запросов
 * @property integer $count
 */
class Basket extends CActiveRecord
{
    

	public function tableName()
	{
            return 'basket';
	}


	public function rules()
	{
            return array(
//                array('date_create, user_id, count', 'required'),
//                array('date_create, user_id, product_id, event_id, count', 'numerical', 'integerOnly'=>true),
            
                // addProduct
                    array('product_id, count', 'required', 'on'=>'addProduct'),
                    array('product_id, count', 'numerical', 'integerOnly'=>true, 'on'=>'addProduct'),
                    array('product_id', 'checkProduct', 'on'=>'addProduct'),
                
                // addEvent
                    array('event_id, count', 'required', 'on'=>'addEvent'),
                    array('event_id, count', 'numerical', 'integerOnly'=>true, 'on'=>'addEvent'),
                    array('event_id', 'checkEvent', 'on'=>'addEvent'),
                
                // search
                    array('id, date_create, user_id, product_id, event_id, count, price', 'safe', 'on'=>'search'),
            );
	}
        public function checkProduct()
        {
            if ( !$this->hasErrors() ) {
                $product = Yii::app()->db->createCommand()->select('id, active, countBasket')->from('product')->where('id = :id', array(
                    ':id'=>$this->product_id
                ))->queryRow();
                if ( !$product || !$product['active'] ) {
                    $this->addError('product_id', 'Товар не найден.');
                }
            }
        }
        // todo
        public function checkEvent()
        {
            if ( !$this->hasErrors() ) {
                $event = Yii::app()->db->createCommand()->select('id')->from('event')->where('id = :id', array(
                    ':id'=>$this->event_id
                ))->queryRow();
                if ( !$event || !$event->active ) {
                    $this->addError('event_id', 'Событие не найдено.');
                }
            }
        }


	public function relations()
	{
            return array(
                'user'=>array(self::BELONGS_TO, 'User', 'user_id'),
                'product'=>array(self::BELONGS_TO, 'Product', 'product_id'),
                'event'=>array(self::BELONGS_TO, 'Event', 'event_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'date_create' => 'Дата добавления',
                'user_id' => 'Пользователь',
                'product_id' => 'Товар',
                'event_id' => 'Событие',
                'count' => 'Количество',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
//            $criteria->compare('date_create',$this->date_create);         
            $criteria->compare('user_id',$this->user_id);         
            $criteria->compare('product_id',$this->product_id);         
            $criteria->compare('event_id',$this->event_id);         
            $criteria->compare('count',$this->count);         

            $dataProvider = new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>20,
                ),
            ));

            $dataProvider->sort->defaultOrder = '`id` DESC';

            return $dataProvider;
	}
        public function search_product()
	{
            $criteria=new CDbCriteria;
    
            $criteria->compare('user_id',Yii::app()->user->id);         
            $criteria->addCondition('product_id IS NOT NULL');     

            $dataProvider = new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>20,
                ),
            ));

            $dataProvider->sort->defaultOrder = '`id` DESC';

            return $dataProvider;
	}
        public function search_event()
	{
            $criteria=new CDbCriteria;
    
            $criteria->compare('user_id',Yii::app()->user->id);         
            $criteria->addCondition('event_id IS NOT NULL');     

            $dataProvider = new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
                'pagination'=>/*array(
                    'pageSize'=>20,
                )*/false,
            ));

            $dataProvider->sort->defaultOrder = '`id` DESC';

            return $dataProvider;
	}


	public static function model($className=__CLASS__)
	{
            return parent::model($className);
	}
        
        
        public function addProduct()
        {
            if ( $this->validate() ) {
                
                $exist_basket = Yii::app()->db->createCommand()->select('*')->from('basket')->where('user_id = :user_id AND product_id = :product_id', array(
                    ':user_id'=>Yii::app()->user->id,
                    ':product_id'=>$this->product_id,
                ))->queryRow();
                
                if ( !$exist_basket ) {
                    $this->user_id = Yii::app()->user->id;
                    $this->date_create = time();
                    $this->price = $this->product->price;
                    if ( $this->save(false) ) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    Basket::model()->findByPk($exist_basket['id'])->saveCounters(array('count'=>$this->count));
                    return true;
                }
            } else {
                //return $this->errors;
            }
        }
        // todo
        public function addEvent()
        {
            if ( $this->validate() ) {
                $this->user_id = Yii::app()->user->id;
                $this->date_create = time();
                $this->price = $this->event->price;
                if ( $this->save(false) ) {
                    return true;
                } else {
                    return false;
                }
            } else {
                //return $this->errors;
            }
        }
}
