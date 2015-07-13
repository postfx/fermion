<?php

class UserController extends CabinetController
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
            $model = new User('search');
            $model->unsetAttributes();

            if( isset($_GET['User']) ) {
                $model->attributes=$_GET['User'];
            }

            $this->render('index', array(
                'model'=>$model,
            ));
	}
    

	public function actionView($id)
	{
            $this->render('view', array(
                'model'=>$this->loadModel($id),
            ));
	}


	public function actionCreate()
	{
            $model = new User('create');

            $this->performAjaxValidation($model);

            if ( isset($_POST['User']) ) {
                $model->attributes = $_POST['User'];
                if( $model->validate() ) {
                    if ( $model->preSave() ) {
                        Yii::app()->user->setFlash('success_create', true);
                        $this->redirect(array('index'));
                    }
                    //$this->redirect(array('view','id'=>$model->id));
                }
            }

            $this->render('create', array(
                'model'=>$model,
            ));
	}


	public function actionUpdate($id)
	{
            $model = $this->loadModel($id);
            $model->scenario = 'update';
            $model->preUpdate();

            $this->performAjaxValidation($model);

            if ( isset($_POST['User']) ) {
                $model->attributes = $_POST['User'];
                if( $model->validate() ) {
                    if ( $model->preSave() ) {
                        Yii::app()->user->setFlash('success_update', true);
                        $this->redirect(array('index'));
                    }
                    //$this->redirect(array('view','id'=>$model->id));
                }
            }

            $this->render('update', array(
                'model'=>$model,
            ));
	}


	public function actionDelete($id)
	{
            $this->loadModel($id)->delete();

            if ( !isset($_GET['ajax']) ) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
	}


        /**/
	public function loadModel($id)
	{
            $model = User::model()->findByPk($id);
            if( $model===null ) {
                throw new CHttpException(404, 'Запись не найдена.');
            }
                    
            return $model;
	}


	protected function performAjaxValidation($model)
	{
            if( isset($_POST['ajax']) && $_POST['ajax']==='user-form' ) {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
	}
}
