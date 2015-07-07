<?php

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'fermion',

        //'sourceLanguage' => 'en_US',
        'sourceLanguage' => 'ru_RU',
        'language' => 'ru',
    
	'preload'=>array('log'),

//        'aliases' => array(
//            'bootstrap' => 'ext.bootstrap',
//        ),
    
	'import'=>array(
            'application.models.*',
            'application.components.*',
            'application.helpers.*',
            
//            'bootstrap.behaviors.*',
//            'bootstrap.helpers.*',
//            'bootstrap.widgets.*',
            
            //
            //'application.extensions.CAdvancedArBehavior',
	),

	'modules'=>array(
            'gii'=>array(
                'class'=>'system.gii.GiiModule',
                'password'=>'pass',
                'ipFilters'=>array('127.0.0.1','::1'),

                //'generatorPaths' => array('bootstrap.gii'),
            ),
            
            'cabinet',
	),

	'components'=>array(
            
//            'bootstrap' => array(
//                'class' => 'bootstrap.components.BsApi',
//            ),
            
            'image'=>array(
                'class'=>'application.extensions.image.CImageComponent',
                'driver'=>'GD',
                'params'=>array('directory'=>'/opt/local/bin'),
            ),
            
            //
//            'email'=>array(
//                'class'=>'application.extensions.email.Email',
//            ),
            
            // sms.ru
//            'sms' => array
//            (
//                'class' => 'application.extensions.yii-sms.Sms',
//                'login' => '',
//                'password' => '',
//            ),
            
            'user'=>array(
                'allowAutoLogin'=>true,
                // uncomment with components/PhpAuthManager.php, WebUser.php, auth.php
                'class' => 'WebUser',
            ),
            
            // uncomment for auth
            'authManager' => array(
                'class' => 'PhpAuthManager',
            ),
		
            'urlManager'=>array(
                'urlFormat'=>'path',
                'showScriptName'=>false,
                'rules'=>array(
                    //'http://<region:\w+>.site/<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                    
                    //'site/news/<slug:[a-zA-Z0-9-]+>/'=>'site/news',
                    //'site/page/<slug:[a-zA-Z0-9-]+>/'=>'site/page',
                    
                    //'<controller:\w+>/<id:\d+>'=>'<controller>/view',
                    '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                    //'site/profile/<login:\w+>'=>'site/profile',
                    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                    '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<module>/<controller>/<action>',
                    '<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
                ),
            ),
            
//            'cache'=>array( 
//                'class'=>'system.caching.CDbCache'
//            ),
		
            'db'=>array(
                'connectionString' => 'mysql:host=127.0.0.1;dbname=fermion',
                'emulatePrepare' => true,
                'username' => 'root',
                'password' => '',
            'connectionString' => 'mysql:host=u337133.mysql.masterhost.ru;dbname=u337133_fermion',
            'username' => 'u337133_fermion',
            'password' => 'SisOngen_N7',
                'charset' => 'utf8',
                //'enableProfiling'=>true,
            ),
		
            'errorHandler'=>array(
                'errorAction'=>'site/error',
            ),
            
            'log'=>array(
                'class'=>'CLogRouter',
                'routes'=>array(
                    array(
                        'class'=>'CFileLogRoute',
                        'levels'=>'error, warning',
                    ),
//                    array(
//                        'class'=>'CWebLogRoute',
//                        'levels'=>'trace, info',
//                    ),
                ),
            ),
            
//            'request'=>array(
//                'enableCsrfValidation'=>true,
//            ),
//            'robokassa' => array(
//                'class' => 'application.components.Robokassa',
//                'sMerchantLogin' => '',
//                'sMerchantPass1' => '',
//                'sMerchantPass2' => '',
//                'sCulture' => 'ru',
//                'sIncCurrLabel' => '',
//                'orderModel' => 'LogPayment', // ваша модель для выставления счетов
//                'priceField' => 'price', // атрибут модели, где хранится сумма
//                'isTest' => true, // тестовый либо боевой режим работы
//            ),
	),

	'params'=>array(
		
	),
    
);