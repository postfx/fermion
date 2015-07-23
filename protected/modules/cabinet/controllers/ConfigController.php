<?php

class ConfigController extends CabinetController
{

	//public $layout='//layouts/column2';

    
//	public function filters()
//	{
//		return array(
//			'accessControl',
//			'postOnly + delete',
//		);
//	}
//
//
//	public function accessRules()
//	{
//		return array(
//			array('allow',  // allow all users to perform 'index' and 'view' actions
//				'actions'=>array('index','view'),
//				'users'=>array('*'),
//			),
//			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create','update'),
//				'users'=>array('@'),
//			),
//			array('allow', // allow admin user to perform 'admin' and 'delete' actions
//				'actions'=>array('admin','delete'),
//				'users'=>array('admin'),
//			),
//			array('deny',  // deny all users
//				'users'=>array('*'),
//			),
//		);
//	}

        public function actionIndex()
	{
            //$model = Config::model()->find

            $this->render('index', array(
                //'model'=>$model,
            ));
	}
        
        
        public function action_ajax()
        {
            $r = Yii::app()->request;
            //$c = $this->config;

            switch ( $r->getParam('action') ) {
                case 'reviews-enable':
                    Config::model()->updateByPk(1, array(
                        'reviews'=> ( $r->getParam('value')==1 ) ? 1 : 0, 
                    ));
                    echo json_encode( 1 );
                    break;
                case 'calendar-enable':
                    Config::model()->updateByPk(1, array(
                        'eventCalendar'=> ( $r->getParam('value')==1 ) ? 1 : 0, 
                    ));
                    echo json_encode( 1 );
                    break;
                case 'pay-points-enable':
                    Config::model()->updateByPk(1, array(
                        'paymentPoints'=> ( $r->getParam('value')==1 ) ? 1 : 0, 
                    ));
                    echo json_encode( 1 );
                    break;
                case 'similar-news-enable':
                    Config::model()->updateByPk(1, array(
                        'relatedNews'=> ( $r->getParam('value')==1 ) ? 1 : 0, 
                    ));
                    echo json_encode( 1 );
                    break;
                case 'check-product-enable':
                    Config::model()->updateByPk(1, array(
                        'checkStockStatus'=> ( $r->getParam('value')==1 ) ? 1 : 0, 
                    ));
                    echo json_encode( 1 );
                    break;
                case 'recoveryPassPhone':
                    Config::model()->updateByPk(1, array(
                        'recoveryPassPhone'=> ( $r->getParam('value')==1 ) ? 1 : 0, 
                    ));
                    echo json_encode( 1 );
                    break;
                case 'recoveryPassEmail':
                    Config::model()->updateByPk(1, array(
                        'recoveryPassEmail'=> ( $r->getParam('value')==1 ) ? 1 : 0, 
                    ));
                    echo json_encode( 1 );
                    break;
                case 'ref-enable':
                    Config::model()->updateByPk(1, array(
                        'referralSystem'=> ( $r->getParam('value')==1 ) ? 1 : 0, 
                    ));
                    echo json_encode( 1 );
                    break;

                default:
                    echo json_encode(null);
                    break;
            }
        }
    
}
