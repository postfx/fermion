<?php

class Controller extends CController
{

	public $layout='//layouts/main';
	//public $menu=array();
	public $breadcrumbs=array();
        
        public $metaTitle = null;
        public $metaDesc = null;
        public $metaKeys = null;

        
        public function init()
        {
            // logout если пользователь стал неактивным
            /*if ( !Yii::app()->user->isGuest && !User::model()->findByPk(Yii::app()->user->id)->isActive ) {
                Yii::app()->user->logout();
            }
            
            $request = Yii::app()->request;
            
            // регион
            if ( $request->getParam('region')!==null ) {
                $this->region = $request->getParam('region');
            }
            if ( $this->region!==null ) {                                               //  если пришел параметр, то запись в куки
                $request->cookies['region'] = new CHttpCookie('region', $this->region, array('path'=>'/', 'expire'=>time()+3600*24*30));
            } else {                                                            //  если параметр не пришел
                if ( !$request->cookies['region'] ) {                           //  если в куки ничего нет
                    $this->region = Yii::app()->db->createCommand()->select('id')->from('region')->order('zIndex ASC, id ASC')->limit(1)->queryScalar();
                    //var_dump($region_slug);
                    $request->cookies['region'] = new CHttpCookie('region', $this->region, array('path'=>'/', 'expire'=>time()+3600*24*30));
                } else {
                    $this->region = $request->cookies['region']->value;
                }
            }*/
            
            /*$request = Yii::app()->request;
            
            // language
            if ( in_array($this->_language, array('ru', 'en', 'es')) ) {
                Yii::app()->setLanguage($this->_language);
            } else {
                Yii::app()->setLanguage('ru');
                $request->cookies['language'] = new CHttpCookie('language', 'ru', array('path'=>'/', 'expire'=>time()+3600*24*30));
            }*/
        }
        
        
        // для доступов
        public function filters()
        {
            return array(
                'accessControl',
            );
        }
        
        
        public function accessRules()
        {
            /*
                users
             *  *   любой
             *  ?   анонимный
             *  @   авторизованный
             *              */
            return array(                
//                array('allow',
//                    'controllers'=>array('site'),
//                    //'actions'=>array('login', 'signup', 'error', 'test', 'logout'),
//                    'users'=>array('*'),
//                ),
//                array('allow',
//                    'controllers'=>array('user'),
//                    'users'=>array('@'),
//                ),
                /*array('allow',
                    'controllers'=>array('admin/default'),
                    'roles'=>array('1'),
                ),*/

                array('allow',
                    'users'=>array('*'),
                    'deniedCallback' => function() { Yii::app()->controller->redirect(array('/site/index', 'login'=>'1')); },
                ),
            );
        }
        
        
        public function getConfig()
        {
            //return Config::model()->findByPk(1);
            return Yii::app()->db->createCommand()->select('*')->from('config')->queryRow();
        }
        
        
        // display errors
        public function error403()
        {
            throw new CHttpException(403, 'У вас недостаточно прав для выполнения указанного действия.');
        }
        
        
//        public function getNavigation()
//        {
//            $result = '';
//            $i = 0;
//            foreach ( $this->breadcrumbs as $url => $label ) {
//                $i++;
//                if ( $i==count($this->breadcrumbs) ) {
//                    $result .= $label;
//                } else {
//                    $result .= BsHtml::link($label, $url).' / ';
//                }
//            }
//            return $result;
//        }
        
        
        // frontend menu
//        public function get_menu_left()
//        {
//            if ( !Yii::app()->user->isGuest ) {
//                $user = User::model()->findByPk(Yii::app()->user->id);
//            }
//            
//            return array(
//                array(
//                    //'icon'=> BsHtml::GLYPHICON_HOME,
//                    //'label' => 'Главная',
//                    'label' => '<i class="fa fa-home"></i> '.'Главная',
//                    'url' => array('/site/index'),
//                    //'visible' => Yii::app()->user->isGuest,
//                ),
//                array(
//                    'label' => '<i class="fa fa-ticket"></i> '.'Мои билеты ('.$user->countTickets0.')',
//                    'url' => array('/user/ticket'),
//                    'visible' => !Yii::app()->user->isGuest,
//                ),
//                
//                array(
//                    //'icon'=> BsHtml::GLYPHICON_HOME,
//                    //'label' => 'Главная',
//                    'label' => '<i class="fa fa-child"></i> '.'О сервисе',
//                    'url' => array('/site/service'),
//                    //'visible' => Yii::app()->user->isGuest,
//                ),
//                
//                array(
//                    //'icon'=> BsHtml::GLYPHICON_HOME,
//                    //'label' => 'Главная',
//                    'label' => '<i class="fa fa-leanpub"></i> '.'Об организаторе',
//                    'url' => array('/site/about'),
//                    //'visible' => Yii::app()->user->isGuest,
//                ),
//            );
//        }
//        public function get_menu_right()
//        {
//            return array(
//                array(
//                    //'icon'=>BsHtml::GLYPHICON_PLUS_SIGN,
//                    //'label' => 'Регистрация',
//                    'label' => '<i class="fa fa-user-plus"></i> '.'Регистрация',
//                    'url' => array('/site/signup'),
//                    'visible' => Yii::app()->user->isGuest,
//                    'linkOptions'=>array(
//                        'onclick'=>'$("#modalSignup").modal("show"); return false;',
//                    ),
//                ),
//                array(
//                    //'icon'=>BsHtml::GLYPHICON_LOG_IN,
//                    //'label' => 'Вход',
//                    'label' => '<i class="fa fa-sign-in"></i> '.'Вход',
//                    'url' => array('/site/login'),
//                    'visible' => Yii::app()->user->isGuest,
//                    'linkOptions'=>array(
//                        'onclick'=>'$("#modalLogin").modal("show"); return false;',
//                    ),
//                ),
//                array(
//                    'label' => '<i class="fa fa-user"></i> '.'Мой профиль',
//                    'url' => array('/user/profile'),
//                    'visible' => !Yii::app()->user->isGuest,
//                ),
//                array(
//                    'label' => '<i class="fa fa-sign-out"></i> '.'Выход',
//                    'url' => array('/site/logout'),
//                    'visible' => !Yii::app()->user->isGuest,
//                ),
//            );
//        }
}