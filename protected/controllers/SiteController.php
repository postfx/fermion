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
        $criteria = new CDbCriteria();
        $criteria->select = '`id`, `title`, `date_create`, `category_name`, `desc`, `slug`, `img`';
        $criteria->compare('active', 1);
        $time = time();
        $criteria->addCondition('`date_begin`<'.$time.' AND `date_end`>'.$time);        //  mb edit
        $criteria->limit = 2;
        $criteria->order = '`id` DESC';
        $news = News::model()->findAll($criteria);
        
        $criteria->compare('show_index', 1);
        $popularNews = News::model()->findAll($criteria);
        
        $this->render('index', array(
            //'model'=>$model,
            'news'=>$news,
            'popularNews'=>$popularNews,
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
    public function actionNews($slug=null)
    {
        if ( $slug===null ) {
            $model = new News('search');
            $model->unsetAttributes();
            
            $model->isList = true;
            $model->category_id = Yii::app()->request->getParam('category_id');
            
            $this->render('news', array(
                'model'=>$model,
            ));
        } else {
            $model = $this->loadNews($slug);
            $model->saveCounters(array('countViews'=>1));                       //  to memcache mb
            
            $comment = new NewsComment();
            
            if ( isset($_POST['ajax']) && $_POST['ajax']==='newsComment-form' ) {
                echo CActiveForm::validate($comment);
                Yii::app()->end();
            }

            if ( isset($_POST['NewsComment']) ) {
                $comment->attributes = $_POST['NewsComment'];
                $comment->news_id = $model->id;
                $comment->user_id = Yii::app()->user->id;
                if ( $comment->validate() && $comment->preSave() ) {
                    $comment->unsetAttributes();
                    Yii::app()->user->setFlash('comment_success', true);
                    $this->redirect(array('/site/news', 'slug'=>$model->slug, '#'=>'comments'));
                }
            }
            
            $criteria = new CDbCriteria();
            $criteria->compare('news_id', $model->id);
            $criteria->order = '`id` ASC';
            $comments = NewsComment::model()->findAll($criteria);
            
            $this->render('news_inner', array(
                'model'=>$model,
                'comment'=>$comment,
                'comments'=>$comments,
            ));
        }
    }
    
    
    // продукция
    public function actionProducts($id=null)
    {
        if ( $id===null ) {
            $model = new ProductCategory('search');
            $model->unsetAttributes();

            $this->render('products', array(
                'model'=>$model,
            ));
        } else {
            $model = $this->loadProducts($id);
            
            $this->render('products_inner', array(
                'model'=>$model,
            ));
        }
        
    }
    
    
    // каталог продукции
    public function actionCatalog($id=null)
    {
        $model = new Product('search');
        $model->unsetAttributes();
        $model->category_id = Yii::app()->request->getParam('id');
        
        if ( isset($_GET['Product']) ) {
            $model->attributes = $_GET['Product'];
        }
        
        $this->render('catalog', array(
            'model'=>$model,
        ));
    }
    
    
    // карточка товара
    public function actionProduct($id)
    {
        $model = $this->loadProduct($id);
        
        $this->render('product', array(
            'model'=>$model,
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
        $model = new Feedback();
        if ( !Yii::app()->user->isGuest ) {
            $user = User::model()->findByPk(Yii::app()->user->id);
            $model->fio = $user->_fio;
            $model->email = $user->login;
            $model->phone = $user->phone;
        }
        
        if ( isset($_POST['ajax']) && $_POST['ajax']==='feedback-form' ) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        
        if ( isset($_POST['Feedback']) ) {
            $model->attributes = $_POST['Feedback'];
            if( $model->validate() ) {
                if ( $model->preSave() ) {
                    Yii::app()->user->setFlash('success_create', true);
                    $this->redirect(array('contacts'));
                }
            }
        }
        
        $this->render('contacts', array(
            'model'=>$model,
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
    
    
    // страница "все права защищены" (этой страницы и/или страницы ниже может не быть)
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
//        $roles = Yii::app()->db->createCommand()->select('id, name, active')->from('role')->where('active=1')->queryAll();
//        var_dump($roles);
//        echo '<hr />'.round(Yii::getLogger()->executionTime, 3).' сек';
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
        
        if ( $user && $user->activate() ) {
            Yii::app()->user->setFlash('activate_success', true);
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
    public function actionRecovery()
    {
        $model = new User('recovery');

        if ( isset($_POST['ajax']) && $_POST['ajax']==='recovery-form' ) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if ( isset($_POST['User']) ) {
            $model->attributes = $_POST['User'];
            if ( $model->validate() && $model->recovery() ) {
                Yii::app()->user->setFlash('recovery_success', true);
            } else {
                Yii::app()->user->setFlash('recovery_success', false);
            }
        }

        $this->render('recovery', array(
            'model'=>$model,
        ));
    }
    
    
    // второй шаг воссстановления - задаем новый пароль
    public function actionNewPassword($hash=null)
    { 
        if ( $hash===null ) {
            $hash = Yii::app()->request->getParam('hash');
        }
        $model = User::model()->findByAttributes(array(
            'hash'=>$hash,
        ));

        if ( $model && $model->active ) {
            
            $model->scenario = 'newPassword';

            if ( isset($_POST['ajax']) && $_POST['ajax']==='newPassword-form' ) {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }

            if ( isset($_POST['User']) ) {
                $model->attributes = $_POST['User'];
                if ( $model->validate() && $model->newPassword() ) {
                    Yii::app()->user->setFlash('newPassword_success', true);
                    $model->login();
                    $this->redirect(array('cabinet/default/index'));
                } else {
                    Yii::app()->user->setFlash('newPassword_success', false);
                }
            }

            $this->render('newPassword', array(
                'model'=>$model,
            ));

        } else {
            $this->redirect(Yii::app()->homeUrl);
        }
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
    
    
    // подписка
    public function actionSubscription()
    {
        $model = new Subscription();
        
        if ( isset($_POST['ajax']) && $_POST['ajax']==='subscription-form' ) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        
        if ( isset($_POST['Subscription']) ) {
            $model->attributes = $_POST['Subscription'];
            if ( $model->validate() && $model->goSubscription() ) {
                echo '1';
            } else {
                echo '0';
            }
        }
    }
    
    
    // подтверждение подписки
    public function actionSubscriptionConfirm($hash)
    {
        $model = Subscription::model()->findByAttributes(array(
            'hash'=>$hash,
        ));
        
        if ( $model && !$model->isConfirm && $model->confirm() ) {
            $this->render('subscriptionConfirm', array(
                'model'=>$model,
            ));
        } else {
            $this->redirect(Yii::app()->homeUrl);
        }
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
    public function loadNews($slug)
    {
        //$model = Ticket::model()->findByPk($id);
        $model = News::model()->findByAttributes(array('slug'=>$slug));
        if ( !$model ) {
            throw new CHttpException(404, 'Новость не найдена.');
        }
        if ( !$model->active ) {
            throw new CHttpException(404, 'Новость неактивна.');
        }
        return $model;
    }
    
    
    public function loadProducts($id)
    {
        $model = ProductCategory::model()->findByPk($id);
        if ( !$model ) {
            throw new CHttpException(404, 'Продукция не найдена.');
        }
        return $model;
    }
    
    
    public function loadProduct($id)
    {
        $model = Product::model()->findByPk($id);
        if ( !$model ) {
            throw new CHttpException(404, 'Товар не найден.');
        }
        if ( !$model->active ) {
            throw new CHttpException(404, 'Товар неактивен.');
        }
        return $model;
    }
    
    
}