<?php

/**
 * This is the model class for table "eventCategory".
 *
 * The followings are the available columns in table 'eventCategory':
 * @property integer $id
 * @property integer $zIndex
 * @property string $name
 * @property string $desc
 * @property string $color
 * @property integer $date_create
 *
 * The followings are the available model relations:
 * @property Event[] $events
 * @property UserCode[] $userCodes
 */
class EventCategory extends CActiveRecord
{
    

	public function tableName()
	{
            return 'eventCategory';
	}


	public function rules()
	{
            return array(
                array('name, color', 'required'),
                array('zIndex', 'numerical', 'integerOnly'=>true),
                array('name', 'length', 'max'=>128),
                array('color', 'length', 'max'=>7),
                array('desc', 'safe'),
            
                // search
                    array('id, zIndex, name, desc, color', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'events' => array(self::HAS_MANY, 'Event', 'category_id'),
//                    'userCodes' => array(self::HAS_MANY, 'UserCode', 'eventCategory_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'zIndex' => 'Порядок',
                'name' => 'Название',
                'desc' => 'Описание',
                'color' => 'Маркер',
                'date_create'=>'Дата создания'
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('zIndex',$this->zIndex);         
            $criteria->compare('name',$this->name,true);         
            $criteria->compare('`desc`',$this->desc,true);         
            $criteria->compare('color',$this->color,true);         

            $dataProvider = new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>20,
                ),
            ));

            $dataProvider->sort->defaultOrder = '`zIndex` ASC, `id` ASC';

            return $dataProvider;
	}


	public static function model($className=__CLASS__)
	{
            return parent::model($className);
	}
        
        
        public function preUpdate()
        {
            
        }
        
        
        public function preSave()
        {
            if ( $this->isNewRecord ) {
                $this->date_create = time();
            } else {
                
            }
            
//            if ( strlen($this->passport_date)!=0 ) {
//                $this->passport_date    =   strtotime($this->passport_date);
//            }

            if ( $this->save(false) ) {
                return true;
            } else {
                return false;
            }
        }
        
        
        public static function items()
        {
            $result = array(
                //''=>'',
            );
            $criteria = new CDbCriteria;
            $criteria->order = '`zIndex` ASC, `id` ASC';
            $values = self::model()->findAll($criteria);
            
            foreach ( $values as $value ) {
                //$result[$value->id] = $value->name;
                $result[] = array(
                    'id'=>$value->id,
                    'value'=>$value->name,
                );
            }
            
            return $result;
        }
        
        
        public function get_desc()
        {
            if ( strlen(strip_tags($this->desc))>100 ) {
                return mb_substr(strip_tags($this->desc), 0, 100).'...';
            } else {
                return strip_tags($this->desc);
            }
        }
        
        
        public function get_color()
        {
            return '<div style="background: '.$this->color.';" class="color-marker"></div>';
        }
}
