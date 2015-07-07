<?php

/**
 * This is the model class for table "config".
 *
 * The followings are the available columns in table 'config':
 * @property integer $id
 * @property string $adminEmail
 * @property string $social_facebook
 * @property string $social_twitter
 * @property string $social_vk
 * @property string $social_instagram
 * @property string $seo_title_ru
 * @property string $seo_title_en
 * @property string $seo_title_es
 * @property string $seo_desc_ru
 * @property string $seo_desc_en
 * @property string $seo_desc_es
 * @property string $seo_keys_ru
 * @property string $seo_keys_en
 * @property string $seo_keys_es
 * @property string $index_headerText_ru
 * @property string $index_headerText_en
 * @property string $index_headerText_es
 * @property string $index_welcomeTitle_ru
 * @property string $index_welcomeTitle_en
 * @property string $index_welcomeTitle_es
 * @property string $index_welcomeText_ru
 * @property string $index_welcomeText_en
 * @property string $index_welcomeText_es
 * @property string $address
 * @property string $manager_image
 * @property string $manager_name_ru
 * @property string $manager_name_en
 * @property string $manager_name_es
 * @property string $manager_text_ru
 * @property string $manager_text_en
 * @property string $manager_text_es
 * @property string $economy_title_ru
 * @property string $economy_title_en
 * @property string $economy_title_es
 * @property string $economy_text_ru
 * @property string $economy_text_en
 * @property string $economy_text_es
 * @property integer $countBlogLast
 * @property string $about_text_ru
 * @property string $about_text_en
 * @property string $about_text_es
 * @property string $about_ps_ru
 * @property string $about_ps_en
 * @property string $about_ps_es
 * @property string $counters
 * @property integer $moderateReviews
 */
class Config extends CActiveRecord
{
    public $_managerImages;
    public static $image_w = 144;
    public static $image_h = 144;

	public function tableName()
	{
            return 'config';
	}


	public function rules()
	{
            return array(
                // settings
                array('adminEmail, seo_title_ru, seo_title_en, seo_title_es, manager_name_ru, manager_name_en, manager_name_es, countBlogLast', 'required', 'on'=>'settings'),
                array('countBlogLast, moderateReviews', 'numerical', 'integerOnly'=>true, 'on'=>'settings'),
                array('adminEmail, social_facebook, social_twitter, social_vk, social_instagram, seo_title_ru, seo_title_en, seo_title_es, address, manager_text_ru, manager_text_en, manager_text_es', 'length', 'max'=>255, 'on'=>'settings'),
                array('manager_name_ru, manager_name_en, manager_name_es', 'length', 'max'=>64, 'on'=>'settings'),
                array('seo_desc_ru, seo_desc_en, seo_desc_es, seo_keys_ru, seo_keys_en, seo_keys_es, counters', 'safe', 'on'=>'settings'),
                
                array('adminEmail', 'email', 'on'=>'settings'),
                array('social_facebook, social_twitter, social_vk, social_instagram', 'url', 'allowEmpty'=>true, 'on'=>'settings'),
                array('_managerImages', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true, 'maxSize'=>1024*1024*4, 'maxFiles'=>1, 'on'=>'settings'),
                array('countBlogLast', 'numerical', 'min'=>0, 'max'=>99, 'on'=>'settings'),
                
                // index
                array('index_headerText_ru, index_headerText_en, index_headerText_es, index_welcomeTitle_ru, index_welcomeTitle_en, index_welcomeTitle_es, index_welcomeText_ru, index_welcomeText_en, index_welcomeText_es, economy_title_ru, economy_title_en, economy_title_es, economy_text_ru, economy_text_en, economy_text_es', 'required', 'on'=>'index'),
                array('index_headerText_ru, index_headerText_en, index_headerText_es, index_welcomeTitle_ru, index_welcomeTitle_en, index_welcomeTitle_es', 'length', 'max'=>255, 'on'=>'index'),
                array('economy_title_ru, economy_title_en, economy_title_es', 'length', 'max'=>128, 'on'=>'index'),
                
                // about
                array('about_text_ru, about_text_en, about_text_es, about_ps_ru, about_ps_en, about_ps_es', 'required', 'on'=>'about'),
            
                // search
                    array('id, adminEmail, social_facebook, social_twitter, social_vk, social_instagram, seo_title_ru, seo_title_en, seo_title_es, seo_desc_ru, seo_desc_en, seo_desc_es, seo_keys_ru, seo_keys_en, seo_keys_es, index_headerText_ru, index_headerText_en, index_headerText_es, index_welcomeTitle_ru, index_welcomeTitle_en, index_welcomeTitle_es, index_welcomeText_ru, index_welcomeText_en, index_welcomeText_es, address, manager_image, manager_name_ru, manager_name_en, manager_name_es, manager_text_ru, manager_text_en, manager_text_es, economy_title_ru, economy_title_en, economy_title_es, economy_text_ru, economy_text_en, economy_text_es, countBlogLast, about_text_ru, about_text_en, about_text_es, about_ps_ru, about_ps_en, about_ps_es, counters', 'safe', 'on'=>'search'),
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
                'adminEmail' => 'E-mail администратора',
                'social_facebook' => 'Facebook',
                'social_twitter' => 'Twitter',
                'social_vk' => ' Vk',
                'social_instagram' => 'Instagram',
                'seo_title_ru' => 'Title (ru)',
                'seo_title_en' => 'Title (en)',
                'seo_title_es' => 'Title (es)',
                'seo_desc_ru' => 'Description (ru)',
                'seo_desc_en' => 'Description (en)',
                'seo_desc_es' => 'Description (es)',
                'seo_keys_ru' => 'Keywords (ru)',
                'seo_keys_en' => 'Keywords (en)',
                'seo_keys_es' => 'Keywords (es)',
                'index_headerText_ru' => 'Текст в хеадере (ru)',
                'index_headerText_en' => 'Текст в хеадере (en)',
                'index_headerText_es' => 'Текст в хеадере (es)',
                'index_welcomeTitle_ru' => 'Заголовок блока "Добро пожаловать" (ru)',
                'index_welcomeTitle_en' => 'Заголовок блока "Добро пожаловать" (en)',
                'index_welcomeTitle_es' => 'Заголовок блока "Добро пожаловать" (es)',
                'index_welcomeText_ru' => 'Текст блока "Добро пожаловать" (ru)',
                'index_welcomeText_en' => 'Текст блока "Добро пожаловать" (en)',
                'index_welcomeText_es' => 'Текст блока "Добро пожаловать" (es)',
                'address' => 'Адрес',
                'manager_image' => 'Фото менеджера',
                '_managerImages[]' => 'Фото менеджера',
                'manager_name_ru' => 'Имя менеджера (ru)',
                'manager_name_en' => 'Имя менеджера (en)',
                'manager_name_es' => 'Имя менеджера (es)',
                'manager_text_ru' => 'Текст под именем (ru)',
                'manager_text_en' => 'Текст под именем (en)',
                'manager_text_es' => 'Текст под именем (es)',
                'economy_title_ru' => 'Заголовок блока "Вы сэкономили" (ru)',
                'economy_title_en' => 'Заголовок блока "Вы сэкономили" (en)',
                'economy_title_es' => 'Заголовок блока "Вы сэкономили" (es)',
                'economy_text_ru' => 'Текст блока "Вы сэкономили" (ru)',
                'economy_text_en' => 'Текст блока "Вы сэкономили" (en)',
                'economy_text_es' => 'Текст блока "Вы сэкономили" (es)',
                'countBlogLast' => 'Кол-во записей в слайдере "Последнее в блоге"',
                'about_text_ru' => 'Текст основной (ru)',
                'about_text_en' => 'Текст основной (en)',
                'about_text_es' => 'Текст основной (es)',
                'about_ps_ru' => 'Текст P.S (ru)',
                'about_ps_en' => 'Текст P.S (en)',
                'about_ps_es' => 'Текст P.S (es)',
                'counters' => 'Код счетчиков посещаемости',
                'moderateReviews'=>'Отображать только одобренные отзывы',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('adminEmail',$this->adminEmail,true);         
            $criteria->compare('social_facebook',$this->social_facebook,true);         
            $criteria->compare('social_twitter',$this->social_twitter,true);         
            $criteria->compare('social_vk',$this->social_vk,true);         
            $criteria->compare('social_instagram',$this->social_instagram,true);         
            $criteria->compare('seo_title_ru',$this->seo_title_ru,true);         
            $criteria->compare('seo_title_en',$this->seo_title_en,true);         
            $criteria->compare('seo_title_es',$this->seo_title_es,true);         
            $criteria->compare('seo_desc_ru',$this->seo_desc_ru,true);         
            $criteria->compare('seo_desc_en',$this->seo_desc_en,true);         
            $criteria->compare('seo_desc_es',$this->seo_desc_es,true);         
            $criteria->compare('seo_keys_ru',$this->seo_keys_ru,true);         
            $criteria->compare('seo_keys_en',$this->seo_keys_en,true);         
            $criteria->compare('seo_keys_es',$this->seo_keys_es,true);         
            $criteria->compare('index_headerText_ru',$this->index_headerText_ru,true);         
            $criteria->compare('index_headerText_en',$this->index_headerText_en,true);         
            $criteria->compare('index_headerText_es',$this->index_headerText_es,true);         
            $criteria->compare('index_welcomeTitle_ru',$this->index_welcomeTitle_ru,true);         
            $criteria->compare('index_welcomeTitle_en',$this->index_welcomeTitle_en,true);         
            $criteria->compare('index_welcomeTitle_es',$this->index_welcomeTitle_es,true);         
            $criteria->compare('index_welcomeText_ru',$this->index_welcomeText_ru,true);         
            $criteria->compare('index_welcomeText_en',$this->index_welcomeText_en,true);         
            $criteria->compare('index_welcomeText_es',$this->index_welcomeText_es,true);         
            $criteria->compare('address',$this->address,true);         
            $criteria->compare('manager_image',$this->manager_image,true);         
            $criteria->compare('manager_name_ru',$this->manager_name_ru,true);         
            $criteria->compare('manager_name_en',$this->manager_name_en,true);         
            $criteria->compare('manager_name_es',$this->manager_name_es,true);         
            $criteria->compare('manager_text_ru',$this->manager_text_ru,true);         
            $criteria->compare('manager_text_en',$this->manager_text_en,true);         
            $criteria->compare('manager_text_es',$this->manager_text_es,true);         
            $criteria->compare('economy_title_ru',$this->economy_title_ru,true);         
            $criteria->compare('economy_title_en',$this->economy_title_en,true);         
            $criteria->compare('economy_title_es',$this->economy_title_es,true);         
            $criteria->compare('economy_text_ru',$this->economy_text_ru,true);         
            $criteria->compare('economy_text_en',$this->economy_text_en,true);         
            $criteria->compare('economy_text_es',$this->economy_text_es,true);         
            $criteria->compare('countBlogLast',$this->countBlogLast);         
            $criteria->compare('about_text_ru',$this->about_text_ru,true);         
            $criteria->compare('about_text_en',$this->about_text_en,true);         
            $criteria->compare('about_text_es',$this->about_text_es,true);         
            $criteria->compare('about_ps_ru',$this->about_ps_ru,true);         
            $criteria->compare('about_ps_en',$this->about_ps_en,true);         
            $criteria->compare('about_ps_es',$this->about_ps_es,true);         
            $criteria->compare('counters',$this->counters,true);         

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
        
        
        public function admin_settings()
        {
            if ( count($this->_managerImages)!=0 ) {
                foreach($this->_managerImages as $file) {
                    if ( $file->name!='' ) {
                        $imageExtention = pathinfo($file->getName(), PATHINFO_EXTENSION);
                        $imageName      = substr(md5($file->name.microtime()), 0, 28).'.'.$imageExtention;
                        $image = Yii::app()->image->load($file->tempName);
                        $image->resize(self::$image_w, self::$image_h);
                        $image->save('./uploads/'.$imageName);
                        $this->manager_image = $imageName;
                    }
                    break;
                }
            }
            
            Contacts::model()->deleteAll();
            if ( count($_POST['contacts_title_ru'])!=0 ) {
                foreach ( $_POST['contacts_title_ru'] as $key => $c ) {
                    $contacts = new Contacts();
                    $contacts->title_ru = trim($_POST['contacts_title_ru'][$key]);
                    $contacts->title_en = trim($_POST['contacts_title_en'][$key]);
                    $contacts->title_es = trim($_POST['contacts_title_es'][$key]);
                    $contacts->value = trim($_POST['contacts_value'][$key]);
                    $contacts->save();
                }
            }
            
            ManagerContacts::model()->deleteAll();
            if ( count($_POST['managerContacts_title_ru'])!=0 ) {
                foreach ( $_POST['managerContacts_title_ru'] as $key => $c ) {
                    $managerContacts = new ManagerContacts();
                    $managerContacts->title_ru = trim($_POST['managerContacts_title_ru'][$key]);
                    $managerContacts->title_en = trim($_POST['managerContacts_title_en'][$key]);
                    $managerContacts->title_es = trim($_POST['managerContacts_title_es'][$key]);
                    $managerContacts->value = trim($_POST['managerContacts_value'][$key]);
                    $managerContacts->save();
                }
            }
            
            if ( $this->save(false) ) {
                return true;
            } else {
                return false;
            }
        }
        
        
        public function admin_index()
        {
            if ( $this->save(false) ) {
                return true;
            } else {
                return false;
            }
        }
        
        
        public function admin_about()
        {
            
            
            if ( $this->save(false) ) {
                return true;
            } else {
                return false;
            }
        }
}
