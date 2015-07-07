<?php

class SiteController extends Controller
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


    // главная
    public function actionIndex()
    {
        
        
        $this->render('index', array(
            //'model'=>$model,
        ));
    }
    
    
    // о системе
    public function actionAbout()
    {
        
        
        $this->render('about', array(
            //'model'=>$model,
        ));
    }
    
    
    // новости
    public function actionNews($id=null)
    {
        
        
        $this->render('news', array(
            //'model'=>$model,
        ));
    }
    
    
    // продукция
    public function actionProducts()
    {
        
        
        $this->render('products', array(
            //'model'=>$model,
        ));
    }
    
    
    // каталог продукции
    public function actionCatalog($id=null)
    {
        
        
        $this->render('catalog', array(
            //'model'=>$model,
        ));
    }
    
    
    // события
    public function actionEvents($category_id=null)
    {
        
        
        $this->render('events', array(
            //'model'=>$model,
        ));
    }
    
    
    // событие
    public function actionEvent($id)
    {
        
        
        $this->render('event', array(
            //'model'=>$model,
        ));
    }
    
    
    // календарь
    public function actionCalendar()
    {
        
        
        $this->render('calendar', array(
            //'model'=>$model,
        ));
    }
    
    
    // отзывы
    public function actionReviews($id=null)
    {
        
        
        $this->render('reviews', array(
            //'model'=>$model,
        ));
    }
    
    
    // контакты
    public function actionContacts()
    {
        
        
        $this->render('contacts', array(
            //'model'=>$model,
        ));
    }
    
    
    // faq
    public function actionFaq($category_id=null)
    {
        
        
        $this->render('faq', array(
            //'model'=>$model,
        ));
    }
    
    
    // карта сайта
    public function actionMap()
    {
        
        
        $this->render('map', array(
            //'model'=>$model,
        ));
    }
    
    
    // страница "все права защищены" (это страницы и/или страницы ниже может не быть)
    public function actionAllRightsReserved()
    {
        
        
        $this->render('allRightsReserved', array(
            //'model'=>$model,
        ));
    }
    // страница "пользовательское соглашение"
    public function actionAgreement()
    {
        
        
        $this->render('agreement', array(
            //'model'=>$model,
        ));
    }
    
    
//    public function actionInfo()
//    {
//        $model = new KadastrForm();
//        
//        if ( isset($_POST['ajax']) && $_POST['ajax']==='kadastr-form' ) {
//            echo CActiveForm::validate($model);
//            Yii::app()->end();
//        }
//        
//        if ( isset($_POST['KadastrForm']) ) {
//            $model->attributes = $_POST['KadastrForm'];
//            if ( $model->validate() && $model->goTest() ) {
//                //echo '1';
//            } else {
//                //echo '0';
//            }
//        }
//    }
    
    

    public function actionTest()
    {
//        echo md5(md5(microtime().'10000').rand(0, 1000000));
        
//        $tickets = Ticket::model()->findAll();
//        
//        foreach ( $tickets as $ticket ) {
//            $ticket->hash = md5(md5(microtime().$ticket->user_id).rand(0, 1000000));
//            $ticket->update(array('hash'));
//        }

//        echo '<pre>';
//        print_r($_SERVER);
//        echo '</pre>';

//        echo $this->renderPartial('application.components.emails.recovery', [
//            'login'=>'test@mail.ru',
//        ]);

//        echo $lastWinners = Yii::app()->db->createCommand()
//                            ->from('ticket')
//                            ->select('user_name, type, date_used, win, status')
//                            ->where('`status`=1 AND `win`<>0')
//                            ->order('date_used DESC')
//                            ->limit(4)
//                            ->text;

//        include_once 'fake_names.php';
//        $type = rand(0, 1);
//        switch ($type) {
//            case 0:
//                if ( rand(0, 300)==0 ) {
//                    $win = 3000;
//                } elseif ( rand(0, 20)==0 ) {
//                    $win = 120;
//                } else {
//                    $win = 20;
//                }
//                break;
//            case 1:
//                if ( rand(0, 4000)==0 ) {
//                    $win = 360000;
//                } elseif ( rand(0, 100)==0 ) {
//                    $win = 10000;
//                } elseif ( rand(0, 15)==0 ) {
//                    $win = 500;
//                } else {
//                    $win = 100;
//                }
//                break;
//        }
//        Yii::app()->db->createCommand()
//            ->insert('ticketF', array(
//                'type'=>$type,
//                'win'=>$win,
//                'date_used'=>time(),
//                'user_name'=> mb_convert_case($namesF[array_rand($namesF)], MB_CASE_TITLE, 'UTF-8'),
//            ));
        
//        echo Yii::app()->controller->renderPartial('application.components.emails.signup', array(
//            'login'=>'123',
//            'password'=>'123',
//        ), true);
        //echo md5('136660');
        //echo date('d.m.Y, H:i');
        //echo round(Yii::getLogger()->executionTime, 3).' сек';
//        echo 0=='#';
//        $app = Yii::app();
//        for ( $i=0; $i<100000; $i++ ) {
//            echo '<div style="display: none;">'.$app->name.'</div>';
//        }
//        echo round(Yii::getLogger()->executionTime, 3).' сек';
//        for ( $i=0; $i<100000; $i++ ) {
//            $temp = rand(0, 1000000);
//        }
        $roles = Yii::app()->db->createCommand()->select('id, name, active')->from('role')->where('active=1')->queryAll();
        var_dump($roles);
        echo '<hr />'.round(Yii::getLogger()->executionTime, 3).' сек';
    }
    

    public function actionError()
    {
        if( $error=Yii::app()->errorHandler->error ) {
            if ( Yii::app()->request->isAjaxRequest ) {
                echo $error['message'];
            } else {
                $this->render('error', $error);
            }
        }
    }

        
    public function actionApp()
    {
        require_once 'app.php';
    }
    
    
    public function action_ajax()
    {
        $r = Yii::app()->request;
        $c = $this->config;
        
        switch ( $r->getParam('action') ) {
            case 'getRegions':
                echo json_encode(Region::items($r->getParam('country_id')));
                break;
            case 'getCities':
                echo json_encode(City::items($r->getParam('region_id')));
                break;

            default:
                echo json_encode(null);
                break;
        }
    }
    
    
    public function actionContact()
    {
        $model = new ContactForm();
        
        if ( isset($_POST['ajax']) && $_POST['ajax']==='contact-form' ) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        
        if ( isset($_POST['ContactForm']) ) {
            $model->attributes = $_POST['ContactForm'];
            if ( $model->validate() ) {
                $model->goContact();
                echo '1';
            } else {
                echo '0';
            }
        }
    }
    
    
    // регистрация
    public function actionSignup()
    {
        if ( !Yii::app()->user->isGuest ) {
            $this->redirect(Yii::app()->homeUrl);
        }
        
        $model = new User('signup');
        
        if ( isset($_POST['ajax']) && $_POST['ajax']==='signup-form' ) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        
        if ( isset($_POST['User']) ) {
            $model->attributes = $_POST['User'];
            if ( $model->validate() && $model->signup() ) {
                Yii::app()->user->setFlash('signup_success', true);
                $this->redirect(array('site/signupComplete'));
            } else {
                $this->redirect(array('site/signup'));
            }
        }
        
        $this->render('signup', array(
            'model'=>$model,
        ));
    }
    public function actionSignupComplete()
    {
        // нечего сюда смотреть кому попало
        if ( Yii::app()->user->getFlash('signup_success')!==true ) {
            $this->redirect(Yii::app()->homeUrl);
        }
        
        $this->render('signupComplete', array(
            
        ));
    }
    
    
    // активация
    public function actionActivate($hash)
    {
        $user = User::model()->findByAttributes(array(
            'hash'=>$hash,
        ));
        
        if ( $user ) {
            $user->hash = null;
            $user->active = 1;
            $user->date_activity = time();
            $user->update(array('hash', 'active', 'date_activity'));
            Yii::app()->user->setFlash('activate_success', true);
            $user->scenario = 'login';
            $user->login();
            $this->redirect(array('cabinet/default/index'));
        } else {
            $this->redirect(Yii::app()->homeUrl);
        }
    }
    
    
    public function actionLogin()
    {
        if ( !Yii::app()->user->isGuest ) {
            $this->redirect(Yii::app()->homeUrl);
            //echo '0';
        }
        
        $model = new User('login');
        
        if ( isset($_POST['ajax']) && ($_POST['ajax']==='login-form' || $_POST['ajax']==='login-form2') ) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        
        if ( isset($_POST['User']) ) {
            $model->attributes = $_POST['User'];
            if ( $model->validate() && $model->login() ) {
                //echo '1';
                $this->redirect(array('cabinet/default/index'));
            } else {
                //echo '0';
                $this->redirect(Yii::app()->homeUrl);
            }
        }
    }
    
    
    // восстановление пароля
    public function actionRecovery($hash=null)
    {
        
        
        $this->render('recovery', array(
            //'model'=>$model,
        ));
    }
    
    
//    public function actionRecovery($hash=null)
//    {
//        if ( !Yii::app()->user->isGuest ) {
//            $this->redirect(Yii::app()->homeUrl);
//        }
//        
//        if ( $hash===null ) {
//            // ajax
//            $model = new User('recovery');
//
//            if ( isset($_POST['ajax']) && $_POST['ajax']==='recovery-form' ) {
//                echo CActiveForm::validate($model);
//                Yii::app()->end();
//            }
//
//            if ( isset($_POST['User']) ) {
//                $model->attributes = $_POST['User'];
//                if ( $model->validate() && $model->recovery() ) {
//                    echo '1';
//                } else {
//                    echo '0';
//                }
//            }
//            
//        } else {
//            
//            $model = User::model()->findByAttributes(array(
//                'hash'=>$hash,
//            ));
//            
//            if ( $model ) {
//                $model->scenario = 'new_password';
//                
//                if ( isset($_POST['User']) ) {
//                    $model->attributes = $_POST['User'];
//                    if ( $model->validate() && $model->new_password() ) {
//                        $this->redirect(array('user/profile'));
//                    }
//                }
//                
//                $this->render('recovery', array(
//                    'model'=>$model,
//                ));
//            } else {
//                $this->redirect(Yii::app()->homeUrl);
//            }
//            
//        }
//    }
    
    
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
    
    
    public function actionCron($key)
    {
        // 70988abde379ea7be1b9c3f173d19850
        if ( $key!=md5('136660') ) {
            echo json_encode('0');
            Yii::app()->end();
        }
        
        
        
        echo json_encode('1');
    }
    
    
//    public function actionPayment()
//    {
//        $rc = Yii::app()->robokassa;
//
//        $rc->onSuccess = function($event){
//            $transaction = Yii::app()->db->beginTransaction();
//            $InvId = Yii::app()->request->getParam('InvId');
//            $payment = Payment::model()->findByPk($InvId);
//            $payment->isPayment = 1;
//            $payment->date_payment = time();
//            $payment->update(array('isPayment', 'date_payment'));
//            $transaction->commit();
//            $user = $payment->user;
//            $user->changeBalance(Yii::app()->request->getParam('nOutSum'), 'Пополнение баланса через Робокассу.');
//        };
//
//        $rc->onFail = function($event){
//            $InvId = Yii::app()->request->getParam('InvId');
//            Payment::model()->findByPk($InvId)->delete();
//        };
//
//        $rc->result();
//    }
    
    /**/
//    public function loadTicketD($id)
//    {
//        //$model = Ticket::model()->findByPk($id);
//        $model = TicketD::model()->findByAttributes(array('hash'=>$id));
//        if ( !$model ) {
//            throw new CHttpException(404, 'Билет не найден.');
//        }
//        return $model;
//    }
    
    
}