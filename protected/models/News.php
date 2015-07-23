<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $id
 * @property string $img
 * @property integer $date_create
 * @property integer $date_update
 * @property integer $date_begin
 * @property integer $date_end
 * @property integer $countComments
 * @property integer $countViews
 * @property integer $category_id
 * @property string $title
 * @property string $desc
 * @property string $text
 * @property integer $user_id
 * @property integer $active
 * @property integer $show_index
 *
 * The followings are the available model relations:
 * @property NewsCategory $category
 * @property User $user
 * @property NewsComment[] $newsComments
 */
class News extends CActiveRecord
{
    public $_images;
    public static $image_w = 373;
    public static $image_h = 252;
    
    public $isList = false;

	public function tableName()
	{
            return 'news';
	}


	public function rules()
	{
            return array(
                array('category_id, title, desc, text', 'required'),
                array('category_id, active, show_index', 'numerical', 'integerOnly'=>true),
                //array('img', 'length', 'max'=>32),
                array('_images', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true, 'maxSize'=>1024*1024*4, 'maxFiles'=>1),
                array('date_begin, date_end', 'safe'),
                array('title', 'length', 'max'=>255),
            
                // search
                    array('id, img, date_create, date_update, date_begin, date_end, countComments, countViews, category_id, title, desc, text, user_id, active, show_index', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
                    'category' => array(self::BELONGS_TO, 'NewsCategory', 'category_id'),
                    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
                    'newsComments' => array(self::HAS_MANY, 'NewsComment', 'news_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'img' => 'Изображение',
                'date_create' => 'Дата создания',
                'date_update' => 'Дата обновления',
                'date_begin' => 'Период действия - начало',
                'date_end' => 'Период действия - конец',
                'countComments' => 'Кол-во комментариев',
                'countViews' => 'Кол-во просмотров',
                'category_id' => 'Категория новости',
                'title' => 'Заголовок',
                'desc' => 'Анонс',
                'text' => 'Содержание',
                'user_id' => 'Автор',
                'active' => 'Активная новость',
                'show_index'=>'Отображать в популярных',
                '_images[]' => 'Изображение',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

//            $criteria->compare('id',$this->id);         
//            $criteria->compare('img',$this->img,true);         
//            $criteria->compare('date_create',$this->date_create);         
//            $criteria->compare('date_update',$this->date_update);         
//            $criteria->compare('date_begin',$this->date_begin);         
//            $criteria->compare('date_end',$this->date_end);         
//            $criteria->compare('countComments',$this->countComments);         
//            $criteria->compare('countViews',$this->countViews);         
            $criteria->compare('category_id',$this->category_id);         
//            $criteria->compare('title',$this->title,true);         
//            $criteria->compare('desc',$this->desc,true);         
//            $criteria->compare('text',$this->text,true);         
//            $criteria->compare('user_id',$this->user_id);         
//            $criteria->compare('active',$this->active);   
            
            if ( $this->isList ) {
                $criteria->compare('active', 1);
                $time = time();
                $criteria->addCondition('`date_begin`<'.$time.' AND `date_end`>'.$time);        //  mb edit
            }

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
        
        
        public function get_active()
        {
            return ($this->active)?'Активная':'Неактивная';
        }
        public function get_show_index()
        {
            return ($this->show_index)?'Да':'Нет';
        }
        
        
        public function get_desc()
        {
            if ( strlen(strip_tags($this->desc))>200 ) {
                return mb_substr(strip_tags($this->desc), 0, 200).'...';
            } else {
                return strip_tags($this->desc);
            }
        }
        public function get_descShort()
        {
            if ( strlen(strip_tags($this->desc))>100 ) {
                return mb_substr(strip_tags($this->desc), 0, 100).'...';
            } else {
                return strip_tags($this->desc);
            }
        }
        
        
        public function preUpdate()
        {
            if ( strlen($this->date_begin)>0 ) {
                $this->date_begin = date('d.m.Y', $this->date_begin);
            }
            if ( strlen($this->date_end)>0 ) {
                $this->date_end = date('d.m.Y', $this->date_end);
            }
        }
        
        
        public function preSave()
        {
            if ( $this->isNewRecord ) {
                $this->date_create = time();
                $this->user_id = Yii::app()->user->id;
            } else {
                $this->date_update = time();
            }
            
            $this->category_name = $this->category->name;
            
            if ( count($this->_images)!=0 ) {
                foreach($this->_images as $file) {
                    if ( $file->name!='' ) {
                        $imageExtention = pathinfo($file->getName(), PATHINFO_EXTENSION);
                        $imageName      = substr(md5($file->name.microtime()), 0, 28).'.'.$imageExtention;
                        $image = Yii::app()->image->load($file->tempName);
                        //$image->resize(self::$image_w, self::$image_h);
                        $image->save('./uploads/news/'.$imageName);
                        $image->resize(self::$image_w, self::$image_h);
                        $image->save('./uploads/news/preview/'.$imageName);
                        $this->img = $imageName;
                    }
                    break;
                }
            }
            
            if ( strlen($this->date_begin)!=0 ) {
                $this->date_begin    =   strtotime($this->date_begin);
            }
            if ( strlen($this->date_end)!=0 ) {
                $this->date_end    =   strtotime($this->date_end);
            }

            if ( $this->save(false) ) {
                return true;
            } else {
                return false;
            }
        }
        
        
        public function get_period()
        {
            return date('d.m.Y', $this->date_begin).'<br />'.date('d.m.Y', $this->date_end);
        }
        
        
        public function get_img()
        {
            $img = $this->img;
            if ( strlen($img)!=0 ) {
                return CHtml::image('/uploads/news/preview/'.$img, '', array(
                    //'style'=>'max-width: 100px; max-height: 66px;',
                ));
            } else {
                return null;
            }
        }
        
        
        public function behaviors()
        {
            return array(
                'sluggable' => array(
                    'class'=>'ext.behaviors.SluggableBehavior.SluggableBehavior',
                    'columns' => array('title'),
                    'unique' => true,
                    'update' => true,
                ),
            );
        }
        
        
        public static function items()
        {
            $result = array(
                //''=>'',
            );
            $criteria = new CDbCriteria;
            $criteria->compare('active', 1);
            $time = time();
            $criteria->addCondition('`date_begin`<'.$time.' AND `date_end`>'.$time);
            $criteria->select = array('id', 'title', 'slug');
            $criteria->order = '`id` DESC';
            $values = self::model()->findAll($criteria);
            
            foreach ( $values as $value ) {
                //$result[$value->id] = $value->name;
                $result[] = array(
                    'id'=>$value->id,
                    'value'=>$value->title,
                );
            }
            
            return $result;
        }
        
        
        public function get_user()
        {
            $role = User::model()->findByPk(Yii::app()->user->id)->_role;       //  todo
            if ( $role->opt_user_read ) {
                return CHtml::link($this->user->login, array('/cabinet/user/view', 'id'=>$this->user_id), array('target'=>'_blank'));
            } else {
                return $this->user->login;
            }
        }
}
