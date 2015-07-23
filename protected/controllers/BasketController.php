<?php

class BasketController extends Controller
{
    
    /*public function actions()
    {
        return array(
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                //'backColor'=>0xFFFFFF,
                'transparent'=>true,
            ),
        );
    }*/


    // 
    public function actionIndex()
    {
        $model = new Basket('search');
        $model->unsetAttributes();
        
        $this->render('index', array(
            'model'=>$model,
        ));
    }
    
    
    public function action_ajax()
    {
        $r = Yii::app()->request;
        $c = $this->config;
        
        switch ( $r->getParam('action') ) {
            case 'addProduct':
                $model = new Basket('addProduct');
                $model->product_id = $r->getParam('product_id');
                $model->count = $r->getParam('count');
                echo json_encode((int)$model->addProduct());
                break;
            case 'addEvent':
                $model = new Basket('addEvent');
                $model->event_id = $r->getParam('event_id');
                $model->count = $r->getParam('count');
                echo json_encode((int)$model->addEvent());
                break;
            case 'changeCount':
                $basket = $this->loadBasket($r->getParam('id'));
                if ( ((int)$r->getParam('count')==1 && $basket->count<1000) || ((int)$r->getParam('count')==-1 && $basket->count>1) ) {
                    $basket->saveCounters(array('count'=>(int)$r->getParam('count')));
                    echo json_encode(1);
                } else {
                    echo json_encode(0);
                }
                break;
            case 'removeFromBasket':
                $basket = $this->loadBasket($r->getParam('id'));
                echo json_encode((int)$basket->delete());
                break;

            default:
                echo json_encode(null);
                break;
        }
    }
   
    
    public function loadBasket($id)
    {
        $model = Basket::model()->findByPk($id);
        if( $model===null ) {
            throw new CHttpException(404, 'Запись не найдена.');
        }
        if( $model->user_id !== Yii::app()->user->id ) {
            $this->error403();
        }
        
        return $model;
    }
    
}