<?php

/**
 * This is the model class for table "slide".
 *
 * The followings are the available columns in table 'slide':
 * @property integer $id
 * @property integer $zIndex
 * @property string $name
 * @property string $text
 * @property string $spec_link
 * @property string $spec_text
 * @property string $img
 * @property string $link
 */
class Slide extends CActiveRecord
{
    public $_images;
    public static $image_w = 320;
    public static $image_h = 240;

	public function tableName()
	{
            return 'slide';
	}


	public function rules()
	{
            return array(
                array('zIndex', 'required'),
                array('zIndex', 'numerical', 'integerOnly'=>true),
                array('name', 'length', 'max'=>128),
                array('text, spec_link, link', 'length', 'max'=>255),
                array('spec_link, link', 'url', 'allowEmpty'=>true),
                array('spec_text', 'length', 'max'=>64),
                
                array('_images', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true, 'maxSize'=>1024*1024*4, 'maxFiles'=>1),
            
                // search
                    array('id, zIndex, name, text, spec_link, link, spec_text, img', 'safe', 'on'=>'search'),
            );
	}


	public function relations()
	{
            return array(
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'zIndex' => 'Порядок',
                'name' => 'Заголовок слайда',
                'text' => 'Текст',
                'spec_link' => 'Доп. ссылка',
                'spec_text' => 'Текст доп. ссылки',
                'img' => 'Изображение',
                'link' => 'Ссылка (слайда)',
                '_images[]' => 'Изображение',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('zIndex',$this->zIndex);         
            $criteria->compare('name',$this->name,true);         
            $criteria->compare('`text`',$this->text,true);         
            $criteria->compare('spec_link',$this->spec_link,true);         
            $criteria->compare('spec_text',$this->spec_text,true);         
            $criteria->compare('img',$this->img,true);         
            $criteria->compare('link',$this->link,true);         

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
//            if ( $this->isNewRecord ) {
//                
//            } else {
//                
//            }
            
            if ( count($this->_images)!=0 ) {
                foreach($this->_images as $file) {
                    if ( $file->name!='' ) {
                        $imageExtention = pathinfo($file->getName(), PATHINFO_EXTENSION);
                        $imageName      = substr(md5($file->name.microtime()), 0, 28).'.'.$imageExtention;
                        $image = Yii::app()->image->load($file->tempName);
                        //$image->resize(self::$image_w, self::$image_h);
                        $image->save('./uploads/slide/'.$imageName);
                        $image->resize(self::$image_w, self::$image_h);
                        $image->save('./uploads/slide/preview/'.$imageName);
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
                return CHtml::image('/uploads/slide/preview/'.$img, '', array(
                    //'style'=>'max-width: 100px; max-height: 66px;',
                ));
            } else {
                return null;
            }
        }
}
