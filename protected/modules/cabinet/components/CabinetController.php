<?php

Class CabinetController extends Controller
{
    public $layout='//layouts/main';
    //public $header='';
    //public $menu=array();
    public $breadcrumbs=array();
 
    
    public function filters()
    {
        return array(
            'accessControl',
        );
    }
//
//    
    public function accessRules()
    {
        return array(

            array('allow',
//                'controllers'=>array('admin/default'),
//                'actions'=>array('login'),
                'users'=>array('@'),
            ),
//            array('allow',
//                'roles'=>array('1'),
//            ),
            
            array('deny',
                'users'=>array('*'),
                //'deniedCallback' => function() { Yii::app()->controller->redirect(array('/admin/default/login')); },
                'deniedCallback' => function() { Yii::app()->controller->redirect(array('/site/index')); },
            ),
        );
    }

    
//    public function init()
//    {
//        parent::init();
//        
//    }

//    public function get_menu_left()
//    {
//        $requestCount = Yii::app()->db->createCommand()->from('request')->select('COUNT(*)')->where('`date_done` IS NULL')->queryScalar();
//        return array(
////            array(
////                'label'=>'Товары',
////                'url'=>array('/admin/product/index'),
////            ),
////            array(
////                'label'=>'Заказы',
////                'url'=>array('/admin/order/index'),
////            ),
////            array(
////                'label'=>'Отзывы',
////                'url'=>array('/admin/review/index'),
////            ),
////            array(
////                'label'=>'Блог',
////                'url'=>array('/admin/blog/index'),
////            ),
//            array(
//                'label'=>'<i class="fa fa-cogs"></i> Настройки системы',
//                'url'=>array('/admin/default/settings'),
//            ),
////            array(
////                'label'=>'Контент',
////                'url'=>'#',
////                'items'=>array(
////                    array(
////                        'label'=>'Главная',
////                        'url'=>array('/admin/default/contentIndex'),
////                    ),
////                    array(
////                        'label'=>'О нас',
////                        'url'=>array('/admin/default/contentAbout'),
////                    ),
////                    array(
////                        'label'=>'О нас - Слайдер',
////                        'url'=>array('/admin/aboutSlider/index'),
////                    ),
////                ),
////            ),
////            array(
////                'label'=>'Списки',
////                'url'=>'#',
////                'items'=>array(
////                    array(
////                        'label'=>'Категории товаров',
////                        'url'=>array('/admin/category/index'),
////                    ),
////                    array(
////                        'label'=>'Отели',
////                        'url'=>array('/admin/hotel/index'),
////                    ),
////                ),
////            ),
////            
////            array(
////                'label'=>'Баннера',
////                'url'=>'#',
////                'items'=>array(
////                    array(
////                        'label'=>'Баннера на сайте',
////                        'url'=>array('/admin/banner/index'),
////                    ),
////                    array(
////                        'label'=>'Баннера в корзине',
////                        'url'=>array('/admin/basketBanner/index'),
////                    ),
////                ),
////            ),
//        );
//    }
//    
//    
//    public function get_menu_right()
//    {
//        return array(
//            
//            array(
//                'label' => mb_convert_case(Yii::app()->user->name, MB_CASE_TITLE, 'UTF-8'),
//                'icon'=>BsHtml::GLYPHICON_USER,
//                'url' => '#',
//                //'visible' => !Yii::app()->user->isGuest,
//                'items'=>array(
//                    array(
//                        'label' => 'Сменить пароль',
//                        'icon' => BsHtml::GLYPHICON_LOCK,
//                        'url' => array('/admin/default/changePass'),
//                    ),
//                    BsHtml::menuDivider(),
//                    array(
//                        'label' => 'На сайт',
//                        'icon' => BsHtml::GLYPHICON_SHARE_ALT,
//                        'url' => array('/site/index'),
//                    ),
//                    array(
//                        'label' => 'Выход',
//                        'icon' => BsHtml::GLYPHICON_LOG_OUT,
//                        'url' => array('/admin/default/logout'),
//                    ),
//                ),
//            ),
//            
//            
//            
//        );
//    }
    
    
}