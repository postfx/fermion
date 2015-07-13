<?php

/**
 * This is the model class for table "newsCategory".
 *
 * The followings are the available columns in table 'newsCategory':
 * @property integer $id
 * @property integer $zIndex
 * @property string $name
 * @property string $desc
 * @property integer $active
 * @property integer $date_create
 *
 * The followings are the available model relations:
 * @property News[] $news
 */
class NewsCategory extends CActiveRecord
{
    

	public function tableName()
	{
            return 'newsCategory';
	}


	public function rules()
	{
            return array(
                array('name', 'required'),
                array('zIndex, active', 'numerical', 'integerOnly'=>true),
                array('name', 'length', 'max'=>128),
                array('desc', 'safe'),
            
                // search
                    array('id, zIndex, name, desc, active, date_create', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'news' => array(self::HAS_MANY, 'News', 'category_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'zIndex' => 'Порядок',
                'name' => 'Название',
                'desc' => 'Описание',
                'active' => 'Активность',
                'date_create'=>'Дата создания',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('zIndex',$this->zIndex);         
            $criteria->compare('name',$this->name,true);         
            $criteria->compare('desc',$this->desc,true);         
            $criteria->compare('active',$this->active);         

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
        
        
        public function get_active()
        {
            return ($this->active)?'Активная':'Неактивная';
        }
        
        
        public function get_desc()
        {
            if ( strlen(strip_tags($this->desc))>100 ) {
                return mb_substr(strip_tags($this->desc), 0, 100).'...';
            } else {
                return strip_tags($this->desc);
            }
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
}
