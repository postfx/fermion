<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $id
 * @property integer $category_id
 * @property string $article
 * @property string $name
 * @property integer $countBasket
 * @property integer $countPack
 * @property string $countPack_unit
 * @property integer $price
 * @property integer $points
 * @property string $shelfLife
 * @property string $weight
 * @property string $weight_unit
 * @property string $volume
 * @property string $volume_unit
 * @property integer $packSize
 * @property string $desc
 * @property string $text
 * @property string $ingredients
 * @property string $structure
 * @property string $img
 * @property string $video
 * @property integer $isSale
 * @property integer $deliveryType
 * @property integer $active
 * @property integer $date_create
 * @property integer $date_update
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property User $user
 * @property ProductCategory $category
 * @property ProductImage[] $productImages
 * @property ProductPrice[] $productPrices
 * @property RelOrderProduct[] $relOrderProducts
 * @property RelProductUser[] $relProductUsers
 * @property Review[] $reviews
 */
class Product extends CActiveRecord
{
    public $_images;
    public static $image_w = 368;
    public static $image_h = 300;

	public function tableName()
	{
            return 'product';
	}


	public function rules()
	{
            return array(
                array('category_id, article, name, countPack, countPack_unit, price, weight, weight_unit, desc, text', 'required'),
                array('category_id, countBasket, countPack, price, points, isSale, deliveryType, active', 'numerical', 'integerOnly'=>true),
                array('article', 'length', 'max'=>32),
                array('name, video', 'length', 'max'=>255),
                array('video', 'url', 'allowEmpty'=>true),
                array('countPack_unit, shelfLife, weight_unit, packSize, volume_unit', 'length', 'max'=>16),
                array('weight, volume', 'length', 'max'=>8),
                array('ingredients, structure', 'safe'),
                //array('weight, volume', 'numerical', 'integerOnly'=>false, 'numberPattern'=>''),      // todo
                array('_images', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true, 'maxSize'=>1024*1024*4, 'maxFiles'=>1),
            
                // search
                    array('id, category_id, article, name, countBasket, countPack, сountPack_unit, price, points, shelfLife, weight, weight_unit, volume, volume_unit, packSize, desc, text, ingredients, structure, img, isSale, deliveryType, active, date_create, date_update, user_id, video', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
                    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
                    'category' => array(self::BELONGS_TO, 'ProductCategory', 'category_id'),
//                    'productImages' => array(self::HAS_MANY, 'ProductImage', 'product_id'),
//                    'productPrices' => array(self::HAS_MANY, 'ProductPrice', 'product_id'),
//                    'relOrderProducts' => array(self::HAS_MANY, 'RelOrderProduct', 'product_id'),
//                    'relProductUsers' => array(self::HAS_MANY, 'RelProductUser', 'product_id'),
//                    'reviews' => array(self::HAS_MANY, 'Review', 'product_id'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'category_id' => 'Категория',
                'article' => 'Артикул',
                'name' => 'Наименование',
                'countBasket' => 'Кол-во товара, добавляемое в корзину',
                'countPack' => 'Кол-во в упаковке',
                'countPack_unit' => 'Кол-во в упаковке (ед. измерения)',
                'price' => 'Цена, руб',
                'points' => 'Баллов за покупку',
                'shelfLife' => 'Срок годности',
                'weight' => 'Вес',
                'weight_unit' => 'Вес (ед. измерения)',
                'volume' => 'Объем',
                'volume_unit' => 'Объем (ед. измерения)',
                'packSize' => 'Размер упаковки',
                'desc' => 'Описание короткое',
                'text' => 'Описание полное',
                'ingredients' => 'Ингредиенты',
                'structure' => 'Состав',
                'img' => 'Изображение',
                '_images[]' => 'Изображение',
                'isSale' => 'Is Sale',
                'deliveryType' => 'Способ получения',
                'active' => 'Активный',
                'date_create' => 'Дата создания',
                'date_update' => 'Дата обновления',
                'user_id' => 'Пользователь (автор)',
                'video'=>'Обучающее видео',
            );
	}


        // todo
	public function search()
	{
            $criteria=new CDbCriteria;

//            $criteria->compare('id',$this->id);         
//            $criteria->compare('category_id',$this->category_id);         
//            $criteria->compare('article',$this->article,true);         
//            $criteria->compare('name',$this->name,true);         
//            $criteria->compare('countBasket',$this->countBasket);         
//            $criteria->compare('countPack',$this->countPack);         
//            $criteria->compare('unitCount',$this->unitCount,true);         
//            $criteria->compare('price',$this->price);         
//            $criteria->compare('points',$this->points);         
//            $criteria->compare('shelfLife',$this->shelfLife,true);         
//            $criteria->compare('weight',$this->weight,true);         
//            $criteria->compare('unitWeight',$this->unitWeight,true);         
//            $criteria->compare('packSize',$this->packSize);         
//            $criteria->compare('unitPackSize',$this->unitPackSize,true);         
//            $criteria->compare('`desc`',$this->desc,true);         
//            $criteria->compare('text',$this->text,true);         
//            $criteria->compare('ingredients',$this->ingredients,true);         
//            $criteria->compare('structure',$this->structure,true);         
//            $criteria->compare('img',$this->img,true);         
//            $criteria->compare('isSale',$this->isSale);         
//            $criteria->compare('deliveryType',$this->deliveryType);         
//            $criteria->compare('active',$this->active);         
//            $criteria->compare('date_create',$this->date_create);         
//            $criteria->compare('date_update',$this->date_update);         
//            $criteria->compare('user_id',$this->user_id);         

            $dataProvider = new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>20,
                ),
            ));

            $dataProvider->sort->defaultOrder = '`id` DESC';

            return $dataProvider;
	}
        
        
        public function search_catalog()
	{
            $criteria=new CDbCriteria;

            $criteria->select = array('id', 'name', 'price', 'points', '`desc`', 'img', 'countBasket');
            
            $criteria->compare('active', 1);
            
            if ( $this->category_id != -1 ) {
                $criteria->compare('category_id', $this->category_id);
            }
            if ( $this->deliveryType != -1 ) {
                $criteria->compare('deliveryType', $this->deliveryType);
            }

            $pageSize = ( Yii::app()->request->cookies['pageSize_product']->value!==null ) ? (int)Yii::app()->request->cookies['pageSize_product']->value : 8;
            $dataProvider = new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=> $pageSize,
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
            return ($this->active)?'Активный':'Неактивный';
        }
        
        
        public function preUpdate()
        {
            
        }
        
        
        public function preSave()
        {
            if ( $this->isNewRecord ) {
                $this->date_create = time();
                $this->user_id = Yii::app()->user->id;
            } else {
                $this->date_update = time();
            }
            
//            $this->category_name = $this->category->name;
            
            if ( count($this->_images)!=0 ) {
                foreach($this->_images as $file) {
                    if ( $file->name!='' ) {
                        $imageExtention = pathinfo($file->getName(), PATHINFO_EXTENSION);
                        $imageName      = substr(md5($file->name.microtime()), 0, 28).'.'.$imageExtention;
                        $image = Yii::app()->image->load($file->tempName);
                        //$image->resize(self::$image_w, self::$image_h);
                        $image->save('./uploads/product/'.$imageName);
                        $image->resize(self::$image_w, self::$image_h);
                        $image->save('./uploads/product/preview/'.$imageName);
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
        
        
        public function get_img($class=null)
        {
            $img = $this->img;
            if ( strlen($img)!=0 ) {
                return CHtml::image('/uploads/product/preview/'.$img, '', array(
                    //'style'=>'max-width: 100px; max-height: 66px;',
                    'class'=>$class,
                ));
            } else {
                return null;
            }
        }
        
        
        public function get_price()
        {
            return number_format($this->price, 0, '.', ' ');
        }
        
        
//        public function get_points()
//        {
//            if ( $this->points%10 == 1 ) {
//                return $this->points.' балл';
//            }
//        }
}
