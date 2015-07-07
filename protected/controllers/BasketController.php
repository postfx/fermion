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
        
        
        $this->render('index', array(
            //'model'=>$model,
        ));
    }
   
    
    
}