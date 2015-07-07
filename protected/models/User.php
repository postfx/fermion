<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property integer $balance
 * @property integer $points
 * @property string $phone
 * @property string $skype
 * @property string $surname
 * @property string $name
 * @property string $patronymic
 * @property integer $date_create
 * @property integer $date_update
 * @property integer $date_activity
 * @property integer $role
 * @property integer $active
 * @property string $hash
 * @property integer $deliveryPoint_id
 * @property integer $referer_id
 * @property integer $date_birthday
 * @property string $passport_num
 * @property integer $passport_date
 * @property string $passport_issuingAuthority
 * @property string $phoneHome
 * @property integer $office_id
 * @property string $info
 * @property integer $alert_news
 * @property integer $alert_products
 * @property integer $alert_events
 * @property integer $alert_promo
 * @property integer $alert_balance
 * @property integer $country_id
 * @property integer $region_id
 * @property integer $city_id
 * @property string $postcode
 * @property string $address
 *
 * The followings are the available model relations:
 * @property Feedback[] $feedbacks
 * @property Message[] $messages
 * @property Message[] $messages1
 * @property News[] $news
 * @property NewsComment[] $newsComments
 * @property Order[] $orders
 * @property Product[] $products
 * @property RelEventUser[] $relEventUsers
 * @property RelEventUser[] $relEventUsers1
 * @property RelProductUser[] $relProductUsers
 * @property Review[] $reviews
 * @property Office $office
 * @property User $referer
 * @property User[] $users
 * @property UserCode[] $userCodes
 * @property UserOperation[] $userOperations
 * @property UserProfile[] $userProfiles
 * @property UserTransfer[] $userTransfers
 * @property UserTransfer[] $userTransfers1
 */
class User extends CActiveRecord
{
    private $_identity;
    public $rememberMe = true;
    
    public $pass;
    public $passR;

	public function tableName()
	{
            return 'user';
	}


	public function rules()
	{
            return array(
//                array('login, password, surname, name, patronymic, date_create, date_birthday, passport_num, passport_date, passport_issuingAuthority, country_id, region_id, city_id, postcode', 'required'),
//                array('balance, points, date_create, date_update, date_activity, role, active, deliveryPoint_id, referer_id, date_birthday, passport_date, office_id, alert_news, alert_products, alert_events, alert_promo, alert_balance, country_id, region_id, city_id', 'numerical', 'integerOnly'=>true),
//                array('login, password', 'length', 'max'=>64),
//                array('phone, skype, surname, name, patronymic, hash, phoneHome', 'length', 'max'=>32),
//                array('passport_num', 'length', 'max'=>16),
//                array('passport_issuingAuthority, address', 'length', 'max'=>255),
//                array('postcode', 'length', 'max'=>8),
//                array('info', 'safe'),
                
                // login
                    array('login, password', 'required', 'on'=>'login', 'message'=>'Необходимо заполнить поле.'),
                    array('password', 'authenticate', 'on'=>'login'),
                    array('login', 'email', 'on'=>'login'),
                    array('rememberMe', 'boolean', 'on'=>'login'),
                
                // signup
                    array('surname, name, patronymic, date_birthday, passport_num, passport_date, passport_issuingAuthority, country_id, postcode, login, pass, passR', 'required', 'on'=>'signup'),
                    array('country_id', 'numerical', 'integerOnly'=>true, 'on'=>'signup'),
                    array('region_id, city_id', 'numerical', 'integerOnly'=>true, 'allowEmpty'=>true, 'on'=>'signup'),
                    array('referer_id', 'numerical', 'integerOnly'=>true, 'allowEmpty'=>true, 'on'=>'signup'),
                    array('surname, name, patronymic', 'length', 'max'=>32, 'min'=>2, 'on'=>'signup'),
                    array('phone, phoneHome', 'length', 'max'=>32, 'on'=>'signup'),
                    array('date_birthday, passport_date', 'safe', 'on'=>'signup'),
                    array('passport_num', 'length', 'max'=>16, 'min'=>2, 'on'=>'signup'),
                    array('passport_issuingAuthority, address', 'length', 'max'=>255, 'on'=>'signup'),
                    array('postcode', 'length', 'max'=>8, 'on'=>'signup'),
                    array('login', 'unique', 'on'=>'signup'),
                    array('login', 'email', 'on'=>'signup'),
                    array('login', 'length', 'max'=>64, 'min'=>5, 'on'=>'signup'),
                    array('pass, passR', 'length', 'min'=>6, 'max'=>16, 'on'=>'signup'),
                    array('passR', 'compare', 'compareAttribute'=>'pass', 'on'=>'signup'),
                    //array('referer_id', 'checkReferer', 'on'=>'signup'), 
            
                // search
                    array('id, login, password, balance, points, phone, skype, surname, name, patronymic, date_create, date_update, date_activity, role, active, hash, deliveryPoint_id, referer_id, date_birthday, passport_num, passport_date, passport_issuingAuthority, phoneHome, office_id, info, alert_news, alert_products, alert_events, alert_promo, alert_balance, country_id, region_id, city_id, postcode, address', 'safe', 'on'=>'search'),
            );
	}
        /*public function checkReferer()
        {
            if ( !$this->hasErrors() ) {
                if ( (int)$this->referer_id>0 && !Yii::app()->db->createCommand()->select('id')->from('user')->where('id=:id', array(':id'=>$this->referer_id))->queryScalar() ) {
                    $this->addError('referer_id', 'Пользователь с указанным ID не найден.');
                }
            }
        }*/


	public function relations()
	{
            return array(
//                    'feedbacks' => array(self::HAS_MANY, 'Feedback', 'user_id'),
//                    'messages' => array(self::HAS_MANY, 'Message', 'receiver_id'),
//                    'messages1' => array(self::HAS_MANY, 'Message', 'sender_id'),
//                    'news' => array(self::HAS_MANY, 'News', 'user_id'),
//                    'newsComments' => array(self::HAS_MANY, 'NewsComment', 'user_id'),
//                    'orders' => array(self::HAS_MANY, 'Order', 'user_id'),
//                    'products' => array(self::HAS_MANY, 'Product', 'user_id'),
//                    'relEventUsers' => array(self::HAS_MANY, 'RelEventUser', 'author_id'),
//                    'relEventUsers1' => array(self::HAS_MANY, 'RelEventUser', 'user_id'),
//                    'relProductUsers' => array(self::HAS_MANY, 'RelProductUser', 'user_id'),
//                    'reviews' => array(self::HAS_MANY, 'Review', 'user_id'),
//                    'office' => array(self::BELONGS_TO, 'Office', 'office_id'),
//                    'referer' => array(self::BELONGS_TO, 'User', 'referer_id'),
//                    'users' => array(self::HAS_MANY, 'User', 'referer_id'),
//                    'userCodes' => array(self::HAS_MANY, 'UserCode', 'user_id'),
//                    'userOperations' => array(self::HAS_MANY, 'UserOperation', 'user_id'),
//                    'userProfiles' => array(self::HAS_MANY, 'UserProfile', 'user_id'),
//                    'userTransfers' => array(self::HAS_MANY, 'UserTransfer', 'receiver_id'),
//                    'userTransfers1' => array(self::HAS_MANY, 'UserTransfer', 'sender_id'),
                '_role'=>array(self::BELONGS_TO, 'Role', 'role'),
                'countEvents'=>array(self::STAT, 'RelEventUser', 'user_id', 'condition'=>'`event_date`>'.time()),      //  todo mb
                'countMessagesInbox'=>array(self::STAT, 'Message', 'receiver_id', 'condition'=>'`isRead`=0'),
            );
	}


	public function attributeLabels()
	{
            return array(
                'id' => 'ID',
                'login' => 'Логин / E-mail',
                'password' => 'Пароль',
                'balance' => 'Баланс',
                'points' => 'Бонусные баллы',
                'phone' => 'Мобильный телефон',
                'skype' => 'Skype',
                'surname' => 'Фамилия',
                'name' => 'Имя',
                'patronymic' => 'Отчество',
                'date_create' => 'Дата создания',
                'date_update' => 'Последнее обновление',
                'date_activity' => 'Последняя активность',
                'role' => 'Роль',
                'active' => 'Активный',
                'hash' => 'Hash',
                'deliveryPoint_id' => 'Delivery Point',
                'referer_id' => 'Номер договора (ID) консультанта',
                'date_birthday' => 'Дата рождения',
                'passport_num' => 'Серия и № паспорта',
                'passport_date' => 'Дата выдачи',
                'passport_issuingAuthority' => 'Кем выдан',
                'phoneHome' => 'Городской телефон',
                'office_id' => 'Office',
                'info' => 'Info',
                'alert_news' => 'Alert News',
                'alert_products' => 'Alert Products',
                'alert_events' => 'Alert Events',
                'alert_promo' => 'Alert Promo',
                'alert_balance' => 'Alert Balance',
                'country_id' => 'Страна',
                'region_id' => 'Область',
                'city_id' => 'Город',
                'postcode' => 'Индекс',
                'address' => 'Улица, дом, квартира',
                
                'pass'=>'Придумайте пароль',
                'passR'=>'Подтвердите пароль',
                'rememberMe'=>'Запомнить меня в системе',
            );
	}


	public function search()
	{
            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);         
            $criteria->compare('login',$this->login,true);         
            $criteria->compare('password',$this->password,true);         
            $criteria->compare('balance',$this->balance);         
            $criteria->compare('points',$this->points);         
            $criteria->compare('phone',$this->phone,true);         
            $criteria->compare('skype',$this->skype,true);         
            $criteria->compare('surname',$this->surname,true);         
            $criteria->compare('name',$this->name,true);         
            $criteria->compare('patronymic',$this->patronymic,true);         
            $criteria->compare('date_create',$this->date_create);         
            $criteria->compare('date_update',$this->date_update);         
            $criteria->compare('date_activity',$this->date_activity);         
            $criteria->compare('role',$this->role);         
            $criteria->compare('active',$this->active);         
            $criteria->compare('hash',$this->hash,true);         
            $criteria->compare('deliveryPoint_id',$this->deliveryPoint_id);         
            $criteria->compare('referer_id',$this->referer_id);         
            $criteria->compare('date_birthday',$this->date_birthday);         
            $criteria->compare('passport_num',$this->passport_num,true);         
            $criteria->compare('passport_date',$this->passport_date);         
            $criteria->compare('passport_issuingAuthority',$this->passport_issuingAuthority,true);         
            $criteria->compare('phoneHome',$this->phoneHome,true);         
            $criteria->compare('office_id',$this->office_id);         
            $criteria->compare('info',$this->info,true);         
            $criteria->compare('alert_news',$this->alert_news);         
            $criteria->compare('alert_products',$this->alert_products);         
            $criteria->compare('alert_events',$this->alert_events);         
            $criteria->compare('alert_promo',$this->alert_promo);         
            $criteria->compare('alert_balance',$this->alert_balance);         
            $criteria->compare('country_id',$this->country_id);         
            $criteria->compare('region_id',$this->region_id);         
            $criteria->compare('city_id',$this->city_id);         
            $criteria->compare('postcode',$this->postcode,true);         
            $criteria->compare('address',$this->address,true);         

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
        
        
        public function authenticate($attribute, $params)
	{
            if( !$this->hasErrors() ) {
                $this->_identity = new UserIdentity($this->login, $this->password);
                $auth = $this->_identity;
                if( !$auth->authenticate() ) {
                    $this->addError('password', 'Неверный логин или пароль.');
                } elseif ( !$auth->active ) {
                    $this->addError('login', 'Аккаунт не активирован.');
                }
            }
	}


	public function login()
	{
            if ( $this->_identity===null ) {
                $this->_identity=new UserIdentity($this->login, $this->password);
                $this->_identity->authenticate();
            }
            if ( $this->_identity->errorCode===UserIdentity::ERROR_NONE ) {
                $duration = $this->rememberMe ? 3600*24*30 : 0;
                Yii::app()->user->login($this->_identity, $duration);
                return true;
            } else {
                return false;
            }
	}
        
        
        public function signup()
        {
            $password = $this->pass;
            $this->password         =   CPasswordHelper::hashPassword($this->pass);
            $this->date_create      =   time();
            $this->role             =   1;                                      //  участник - id этой роли будет статичен
            $this->hash             =   md5($this->login.microtime().rand(0, 1000000));
            $this->date_birthday    =   strtotime($this->date_birthday);
            $this->passport_date    =   strtotime($this->passport_date);
            
            // если ID реферера указан неправильно
            if ( (int)$this->referer_id>0 ) {
                if ( !Yii::app()->db->createCommand()->select('id')->from('user')->where('id=:id', array(':id'=>$this->referer_id))->queryScalar() ) {
                    $this->referer_id = null;
                }
            }
            
            // код далее нужен против засранцев
            if ( (int)$this->city_id>0 ) {
                $city = Yii::app()->db->createCommand()->select('id, country_id, region_id')->from('city')->where('id=:id', array(':id'=>(int)$this->city_id))->queryRow();
                if ( $city ) {
                    $this->region_id = $city['region_id'];
                    $this->country_id = $city['country_id'];
                } else {
                    $this->city_id = null;
                }
            } elseif ( (int)$this->region_id>0 ) {
                $region = Yii::app()->db->createCommand()->select('id, country_id')->from('region')->where('id=:id', array(':id'=>(int)$this->region_id))->queryRow();
                if ( $region ) {
                    $this->country_id = $region['country_id'];
                } else {
                    $this->region_id = null;
                }
            }
            
            if ( $this->save(false) ) {
                
                $message = Yii::app()->controller->renderPartial('/messages/signup', array(
                    'name' => $this->name,
                    'link' => CHtml::link(Yii::app()->controller->createAbsoluteUrl('site/activate', array('hash' => $this->hash)), Yii::app()->controller->createAbsoluteUrl('site/activate', array('hash' => $this->hash))),
                    'login'=>$this->login,
                    'password'=>$password,
                ), true);

                MyPhpMailer::send($this->login, 'Регистрация на '.$_SERVER['SERVER_NAME'], $message, $_SERVER['SERVER_NAME']);
                
                return true;
            } else {
                return false;
            }
        }
        
        
        public function get_io()
        {
            return mb_convert_case($this->name.' '.$this->patronymic, MB_CASE_TITLE, 'UTF-8');
        }
        
        
        //  todo
        public function get_basket()
        {
            return array(
                'countProducts'=>0,
                'word'=>'товаров',
                'total'=>0,
            );
        }
}