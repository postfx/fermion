<?php

/**
 * This is the model class for table "productCategory".
 *
 * The followings are the available columns in table 'productCategory':
 * @property integer $id
 * @property integer $zIndex
 * @property string $name
 * @property string $img
 * @property string $desc
 * @property string $text
 * @property string $video
 * @property integer $date_create
 *
 * The followings are the available model relations:
 * @property Product[] $products
 * @property Review[] $reviews
 */
class ProductCategory extends CActiveRecord
{
    public $_images;
    public static $image_w = 250;
    public static $image_h = 180;

	public function tableName()
	{
            return 'productCategory';
	}


	public function rules()
	{
            return array(
                array('name, desc, text', 'required'),
                array('zIndex', 'numerical', 'integerOnly'=>true),
                array('_images', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true, 'maxSize'=>1024*1024*4, 'maxFiles'=>1),
                array('name', 'length', 'max'=>128),
                array('img', 'length', 'max'=>32),
                array('video', 'length', 'max'=>255),
                array('video', 'url', 'allowEmpty'=>true),
            
                // search
                    array('id, zIndex, name, img, desc, text, video', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'products' => array(self::HAS_MANY, 'Product', 'category_id'),
//                    'reviews' => array(self::HAS_MANY, 'Review', 'category_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'zIndex' => 'Порядок',
                'name' => 'Название',
                'img' => 'Изображение',
                'desc' => 'Аннотация',
                'text' => 'Описание',
                'video' => 'Видео',
                'date_create'=>'Дата создания',
                '_images[]' => 'Изображение',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('zIndex',$this->zIndex);         
            $criteria->compare('name',$this->name,true);         
            //$criteria->compare('img',$this->img,true);         
            $criteria->compare('`desc`',$this->desc,true);         
            //$criteria->compare('text',$this->text,true);         
            //$criteria->compare('video',$this->video,true);         

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
                //$this->user_id = Yii::app()->user->id;
            } else {
                //$this->date_update = time();
            }
            
//            $this->category_name = $this->category->name;
            
            if ( count($this->_images)!=0 ) {
                foreach($this->_images as $file) {
                    if ( $file->name!='' ) {
                        $imageExtention = pathinfo($file->getName(), PATHINFO_EXTENSION);
                        $imageName      = substr(md5($file->name.microtime()), 0, 28).'.'.$imageExtention;
                        $image = Yii::app()->image->load($file->tempName);
                        //$image->resize(self::$image_w, self::$image_h);
                        $image->save('./uploads/productCategory/'.$imageName);
                        $image->resize(self::$image_w, self::$image_h);
                        $image->save('./uploads/productCategory/preview/'.$imageName);
                        $this->img = $imageName;
                    }
                    break;
                }
            }
            
//            if ( strlen($this->date_begin)!=0 ) {
//                $this->date_begin    =   strtotime($this->date_begin);
//            }
//            if ( strlen($this->date_end)!=0 ) {
//                $this->date_end    =   strtotime($this->date_end);
//            }

            if ( $this->save(false) ) {
                return true;
            } else {
                return false;
            }
        }
        
        
        public function get_img()
        {
            $img = $this->img;
            if ( strlen($img)!=0 ) {
                return CHtml::image('/uploads/productCategory/preview/'.$img, '', array(
                    //'style'=>'max-width: 100px; max-height: 66px;',
                ));
            } else {
                return null;
            }
        }
        
        
        public static function items()
        {
            $result = array(
                //''=>'',
            );
            $criteria = new CDbCriteria;
            $criteria->select = array('id', 'zIndex', 'name');
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
