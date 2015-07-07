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
 * @property string $unitCount
 * @property integer $price
 * @property integer $points
 * @property string $shelfLife
 * @property string $weight
 * @property string $unitWeight
 * @property integer $packSize
 * @property string $unitPackSize
 * @property string $desc
 * @property string $text
 * @property string $ingredients
 * @property string $structure
 * @property string $img
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
    

	public function tableName()
	{
            return 'product';
	}


	public function rules()
	{
            return array(
                array('category_id, article, name, unitCount, price, weight, unitWeight, desc, text, date_create, user_id', 'required'),
                array('category_id, countBasket, countPack, price, points, packSize, isSale, deliveryType, active, date_create, date_update, user_id', 'numerical', 'integerOnly'=>true),
                array('article, img', 'length', 'max'=>32),
                array('name', 'length', 'max'=>255),
                array('unitCount, shelfLife, unitWeight, unitPackSize', 'length', 'max'=>16),
                array('weight', 'length', 'max'=>8),
                array('ingredients, structure', 'safe'),
            
                // search
                    array('id, category_id, article, name, countBasket, countPack, unitCount, price, points, shelfLife, weight, unitWeight, packSize, unitPackSize, desc, text, ingredients, structure, img, isSale, deliveryType, active, date_create, date_update, user_id', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
//                    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
//                    'category' => array(self::BELONGS_TO, 'ProductCategory', 'category_id'),
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
                'category_id' => 'Category',
                'article' => 'Article',
                'name' => 'Name',
                'countBasket' => 'Count Basket',
                'countPack' => 'Count Pack',
                'unitCount' => 'Unit Count',
                'price' => 'Price',
                'points' => 'Points',
                'shelfLife' => 'Shelf Life',
                'weight' => 'Weight',
                'unitWeight' => 'Unit Weight',
                'packSize' => 'Pack Size',
                'unitPackSize' => 'Unit Pack Size',
                'desc' => 'Desc',
                'text' => 'Text',
                'ingredients' => 'Ingredients',
                'structure' => 'Structure',
                'img' => 'Img',
                'isSale' => 'Is Sale',
                'deliveryType' => 'Delivery Type',
                'active' => 'Active',
                'date_create' => 'Date Create',
                'date_update' => 'Date Update',
                'user_id' => 'User',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('category_id',$this->category_id);         
            $criteria->compare('article',$this->article,true);         
            $criteria->compare('name',$this->name,true);         
            $criteria->compare('countBasket',$this->countBasket);         
            $criteria->compare('countPack',$this->countPack);         
            $criteria->compare('unitCount',$this->unitCount,true);         
            $criteria->compare('price',$this->price);         
            $criteria->compare('points',$this->points);         
            $criteria->compare('shelfLife',$this->shelfLife,true);         
            $criteria->compare('weight',$this->weight,true);         
            $criteria->compare('unitWeight',$this->unitWeight,true);         
            $criteria->compare('packSize',$this->packSize);         
            $criteria->compare('unitPackSize',$this->unitPackSize,true);         
            $criteria->compare('desc',$this->desc,true);         
            $criteria->compare('text',$this->text,true);         
            $criteria->compare('ingredients',$this->ingredients,true);         
            $criteria->compare('structure',$this->structure,true);         
            $criteria->compare('img',$this->img,true);         
            $criteria->compare('isSale',$this->isSale);         
            $criteria->compare('deliveryType',$this->deliveryType);         
            $criteria->compare('active',$this->active);         
            $criteria->compare('date_create',$this->date_create);         
            $criteria->compare('date_update',$this->date_update);         
            $criteria->compare('user_id',$this->user_id);         

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
