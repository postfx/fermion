<?php

Class DefaultController extends CabinetController
{
    
    // личный кабинет пользователя
    public function actionIndex()
    {
        $user = User::model()->findByPk(Yii::app()->user->id);
        
        $this->render('index', array(
            'user'=>$user,
        ));
    }
    
}