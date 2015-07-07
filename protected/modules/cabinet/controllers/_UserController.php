<?php

Class UserController extends AdminController
{
    

    public function init() {
        parent::init();
        
        $this->breadcrumbs = array(
            '/admin/user/index'=>'Управление пользователями',
        );
    }

    
    public function actionIndex()
    {
        $model = new User('search');
        $model->unsetAttributes();
        
        if ( isset($_GET['User']) ) {
            $model->attributes = $_GET['User'];
        }
        
        $this->render('index', array(
            'model'=>$model,
        ));
    }
    
    
    public function actionView($id)
    {
        $model = $this->loadModel($id);
        
        $this->render('view', array(
            'model'=>$model,
        ));
    }
    
    
    public function actionCreate()
    {
        $model = new User('create_admin');
        
        if ( isset($_POST['User']) ) {
            $model->attributes = $_POST['User'];
            if ( $model->validate() && $model->create_admin() ) {
                $this->redirect(array('view', 'id'=>$model->id));
            }
        }
        
        $this->render('create', array(
            'model'=>$model,
        ));
    }
    
    
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = 'update_admin';
        $model->pre_admin();
        
        if ( isset($_POST['User']) ) {
            $model->attributes = $_POST['User'];
            if ( $model->validate() && $model->update_admin() ) {
                $this->redirect(array('view', 'id'=>$model->id));
            }
        }
        
        $this->render('update', array(
            'model'=>$model,
        ));
    }
    
    
    public function actionDelete($id)
    {
        $model = $this->loadModel($id);
        $model->delete();

        if ( !isset($_GET['ajax']) ) {
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
    }
    
    
    public function loadModel($id)
    {
        $model = User::model()->findByPk($id);
        if ( !$model ) {
            throw new CHttpException(404, 'Запись не найдена.');
        }
        return $model;
    }
    
    
    
}