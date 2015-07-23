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
    
    
    // информация на главной            opt_content
    public function actionContent_index()
    {
        $model = Config::model()->findByPk(1);
        
        if ( isset($_POST['Config']) ) {
            $model->attributes = $_POST['Config'];
            if ( $model->save() ) {
                Yii::app()->user->setFlash('config', true);
                $this->redirect(array('content_index'));
            }
        }
        
        $this->render('content_index', array(
            'model'=>$model,
        ));
    }
    
    
    // страница о системе            opt_content
    public function actionContent_about()
    {
        $model = Config::model()->findByPk(1);
        
        if ( isset($_POST['Config']) ) {
            $model->attributes = $_POST['Config'];
            if ( $model->save() ) {
                Yii::app()->user->setFlash('config', true);
                $this->redirect(array('content_about'));
            }
        }
        
        $this->render('content_about', array(
            'model'=>$model,
        ));
    }
    
}