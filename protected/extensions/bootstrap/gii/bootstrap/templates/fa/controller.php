<?= "<?php\n" ?>

Class <?= $this->controllerClass ?> extends <?= $this->baseControllerClass . "\n" ?>
{
    

    public function init() {
        parent::init();
        
        $this->breadcrumbs = array(
            '/admin/<?= strtolower(substr($this->modelClass, 0, 1)).substr($this->modelClass, 1) ?>/index'=>'Управление записями',
        );
    }

    
    public function actionIndex()
    {
        $model = new <?= $this->modelClass ?>('search');
        $model->unsetAttributes();
        
        if ( isset($_GET['<?= $this->modelClass ?>']) ) {
            $model->attributes = $_GET['<?= $this->modelClass ?>'];
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
        $model = new <?= $this->modelClass ?>('create');
        
        if ( isset($_POST['<?= $this->modelClass ?>']) ) {
            $model->attributes = $_POST['<?= $this->modelClass ?>'];
            if ( $model->validate() ) {
                if ( $model->save(false) ) {
                    $this->redirect(array('view', 'id'=>$model-><?= $this->tableSchema->primaryKey ?>));
                }
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
        
        if ( isset($_POST['<?= $this->modelClass ?>']) ) {
            $model->attributes = $_POST['<?= $this->modelClass ?>'];
            if ( $model->validate() ) {
                if ( $model->save(false) ) {
                    $this->redirect(array('view', 'id'=>$model-><?= $this->tableSchema->primaryKey ?>));
                }
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
        $model = <?= $this->modelClass ?>::model()->findByPk($id);
        if ( !$model ) {
            throw new CHttpException(404, 'Запись не найдена.');
        }
        return $model;
    }
    
    
    
}