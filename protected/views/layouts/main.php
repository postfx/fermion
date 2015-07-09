<?php

    $configs = Yii::app()->clientScript;
    $pt = Yii::app()->homeUrl;

    $configs
        ->registerCssFile($pt.'css/font-awesome.min.css')
        ->registerCssFile($configs->getCoreScriptUrl().'/jui/css/base/jquery-ui.css')
        ->registerCssFile($pt.'js/fancybox/jquery.fancybox.css')
        ->registerCssFile($pt.'css/jquery.formstyler.css')   
        ->registerCssFile($pt.'css/jquery.scrollbar.css') 
        
        ->registerCssFile($pt.'css/main.css');
    
    $configs
        ->registerCoreScript('jquery',CClientScript::POS_END)
        ->registerCoreScript('jquery.ui',CClientScript::POS_END)
        ->registerCoreScript('cookie',CClientScript::POS_END)
        ->registerScriptFile('https://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU',CClientScript::POS_END)
        ->registerScriptFile($pt.'js/jquery.easing.1.3.js',CClientScript::POS_END)
        ->registerScriptFile($pt.'js/jquery.bxslider.js',CClientScript::POS_END)
        ->registerScriptFile($pt.'js/fancybox/jquery.fancybox.pack.js',CClientScript::POS_END)
        ->registerScriptFile($pt.'js/jquery.formstyler.js',CClientScript::POS_END)
        ->registerScriptFile($pt.'js/numeric.js',CClientScript::POS_END)
        ->registerScriptFile($pt.'js/jquery.scrollbar.js',CClientScript::POS_END)
        ->registerScriptFile($pt.'js/datepicker-ru.js',CClientScript::POS_END)
            
        ->registerScriptFile($pt.'js/jquery.scrollTo.min.js',CClientScript::POS_END)

        ->registerScriptFile($pt.'js/main.js',CClientScript::POS_END);
    
    $app = Yii::app();
    if ( !Yii::app()->user->isGuest ) {
        $user = User::model()->findByPk(Yii::app()->user->id);
    }
    $config = $this->config;
    
?>
<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="maximum-scale=1.0,width=680" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!--link href="/images/favicon.ico" rel="shortcut icon" type="image/x-icon" /-->
    
    <title><?= ($this->metaTitle)?$this->metaTitle:$config['metaTitle'] ?></title>
    <meta name="description" content="<?= ($this->metaDesc)?$this->metaDesc:$config['metaDesc'] ?>">
    <meta name="keywords" content="<?= ($this->metaKeys)?$this->metaKeys:$config['metaKeys'] ?>">

</head>

<body>
    
    <div class="wrapper<?= ($this->route!='site/index')?' inside':'' ?>">

        <div class="content">
            
            <div class="header">
                <div class="top-wrap">
                    <div class="top">
                        <div class="container">
                            <?php if ( $app->user->isGuest ): ?>
                                <div class="non-auth-wrap">
                                    <div class="non-auth-text">
                                        Здравствуй, посетитель! Для доступа ко всем возможностям сайта мы просим пройти <?= CHtml::link('регистрацию', array('/site/signup')) ?> или <?= CHtml::link('авторизироваться', '#modal-auth', array('id'=>'goLogin', 'class'=>'no-link modal-open')) ?>.
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="auth-wrap">
                                    <div class="top-user-room">
                                        <span>Здравствуйте</span>
                                        <div class="select-wrap">
                                            <?= CHtml::dropDownList('user', null, array(
                                                $app->createUrl('cabinet/default/index')    => $user->_io,
                                                $app->createUrl('cabinet/messages/index')   => 'Мои сообщения',
                                                $app->createUrl('site/logout')              => 'Выход',
                                            ), array(
                                                'class'=>'optionIsLink',
                                            )) ?>
                                        </div>
                                    </div>
                                    <div class="user-room-section">
                                        <div class="user-row">
                                            <div class="user-row">
                                                <?= CHtml::link('Мои данные', array('/cabinet/user/info'), array(
                                                    'class'=>'user-actions',
                                                )) ?>
                                            </div>
                                            <div class="user-row">
                                                <?= CHtml::link(/*'Быстрый заказ'*/'Мои заказы', array('/cabinet/shop/orders'), array(
                                                    'class'=>'user-actions',
                                                )) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-room-section">
                                        <div class="user-row">
                                            <div class="user-row">
                                                <?= CHtml::link('События', array('/cabinet/shop/events'), array(
                                                    'class'=>'user-actions',
                                                )) ?><span class="user-actions">:</span>
                                                <span class="room-value"><?= $user->countEvents ?></span>
                                            </div>
                                            <div class="user-row">
                                                <?= CHtml::link('Сообщения', array('/cabinet/messages/inbox'), array(
                                                    'class'=>'user-actions',
                                                )) ?><span class="user-actions">:</span>
                                                <span class="room-value"><?= $user->countMessagesInbox ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-room-section">
                                        <div class="user-row">
                                            <div class="user-room-money">
                                                <div class="user-row">
                                                    <div class="balance">
                                                        <span class="room-field">Баланс:</span>
                                                        <span class="room-value"><?= $user->balance ?> руб</span>
                                                    </div>
                                                    <div class="points">
                                                        <span class="room-field">Бонусные баллы:</span>
                                                        <span class="room-value"><?= $user->points ?></span>
                                                    </div>
                                                </div>
                                                <div class="user-row">
                                                    <?= CHtml::link('Пополнение', array('/cabinet/balance/deposit'), array(
                                                        'class'=>'user-money-actions user-actions',
                                                    )) ?>
                                                    <?= CHtml::link('Просмотр операций', array('/cabinet/user/operations'), array(
                                                        'class'=>'user-money-actions user-actions',
                                                    )) ?>
                                                    <?= CHtml::link('Перевод', array('/cabinet/balance/transfer'), array(
                                                        'class'=>'user-money-actions user-actions',
                                                    )) ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-room-section">
                                        <div class="user-room-basket">
                                            <div class="user-row">
                                                <div class="basket">
                                                    <span class="room-field"><?= $user->_basket['countProducts'] ?> <?= $user->_basket['word'] ?>:</span>
                                                    <span class="room-value"><?= $user->_basket['total'] ?> руб</span>
                                                </div>
                                            </div>
                                            <div class="user-row">
                                                <?= CHtml::link('Оформить заказ', array('/basket/index'), array(
                                                    'class'=>'user-money-actions user-actions',
                                                )) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="nav">
                    <div class="container clearfix">
                        <?= CHtml::link(CHtml::image('/images/elements/logo.png', $config['metaTitle']), $app->homeUrl, array(
                            'class'=>'logo',
                        )) ?>
                        <div class="nav-static">
                            <div class="clearfix">
                                <div class="header-phone-block">
                                    <div class="phone-block">
                                        Есть вопросы? <span><?= $config['phone'] ?></span>
                                    </div>
                                    <div class="phone-hint">
                                        Звонок бесплатный из любого города России
                                    </div>
                                </div>
                                <!-- todo -->
                                    <div class="header-chat-block">
                                        <a href="javascript:void(0)" class="chat-link">Онлайн чат</a>
                                        <div class="chat-hint">
                                            консультант на месте
                                        </div>
                                    </div>
                                <!-- -->
                            </div>
                            <?php $this->widget('zii.widgets.CMenu', array(
                                'id'=>'mainMenu',
                                'htmlOptions'=>array(
                                    'class'=>'menu',
                                ),
                                'submenuHtmlOptions'=>array(
                                    'class'=>'submenu-block',
                                ),
                                'items'=>array(
                                    array(
                                        'label'=>'О системе',
                                        'url'=>array('/site/about'),
                                    ),
                                    array(
                                        'label'=>'Новости',
                                        'url'=>array('/site/news'),
                                    ),
                                    array(
                                        'label'=>'Продукция',
                                        'url'=>array('/site/products'),
                                    ),
                                    array(
                                        'label'=>'События',
                                        'url'=>array('/site/events'),
                                        'itemOptions'=>array(
                                            'class'=>'submenu',
                                        ),
                                        'items'=>array(
                                            array(
                                                'label'=>'Календарь',
                                                'url'=>array('/site/calendar'),
                                            ),
                                            //  ниже будет формироваться список категорий событий
                                            array(
                                                'label'=>'Акции',
                                                'url'=>array('/site/events', 'category_id'=>1),
                                            ),
                                            array(
                                                'label'=>'Семинары',
                                                'url'=>array('/site/events', 'category_id'=>2),
                                            ),
                                            array(
                                                'label'=>'Опросы',
                                                'url'=>array('/site/events', 'category_id'=>3),
                                            ),
                                        ),
                                    ),
                                    array(
                                        'label'=>'Отзывы',
                                        'url'=>array('/site/reviews'),
                                    ),
                                    array(
                                        'label'=>'Контакты',
                                        'url'=>array('/site/contacts'),
                                    ),
                                ),
                            )); ?>
                        </div>
                        <div class="nav-right">
                            <div class="geo-user">
                                <!-- todo -->
                                    <a href="javascript:void(0)">Санкт-Петербург</a>
                                <!-- -->
                            </div>
                            <div class="search-form-block">
                                <!-- todo -->
                                    <form method="post" action="" class="search-form clearfix">
                                        <input type="text" name="search-field" placeholder="поиск на сайте">
                                        <button type="submit" class="search-btn">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                <!-- -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php if ( $this->route=='site/index'): ?>
            
                <div class="slider">
                    <div class="slider-nav-wrap">
                        <div class="slider-nav"></div>
                    </div>
                    <!-- todo -->
                        <ul class="main-slider">
                            <li>
                                <div class="slide" style="background: url(/images/slider/slide-1.jpg) no-repeat center;">
                                    <div class="container">
                                        <div class="slide-title">
                                            ЖИЗНЬ БЕЗ ГРАНИЦ
                                        </div>
                                        <div class="slide-text">
                                            Каждый партнер<br>
                                            Компании «ИВП Фермион»<br>
                                            имеет все возможности<br>
                                            для воплощения в<br>
                                            реальность любых своих<br>
                                            желаний.
                                        </div>
                                        <a href="javascript:void(0)" class="btn circle-btn">
                                            <div class="circle-btn-inside">
                                                <div class="circle-btn-text">
                                                    жизнь<br>
                                                    <span>без</span><br>
                                                    границ
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="slide" style="background: url(/images/slider/slide-1.jpg) no-repeat center;">
                                    <div class="container">
                                        <div class="slide-title">
                                            СЛАЙД 2
                                        </div>
                                        <div class="slide-text">
                                            Каждый партнер<br>
                                            Компании «ИВП Фермион»<br>
                                            имеет все возможности<br>
                                            для воплощения в<br>
                                            реальность любых своих<br>
                                            желаний.
                                        </div>
                                        <a href="javascript:void(0)" class="btn circle-btn">
                                            <div class="circle-btn-inside">
                                                <div class="circle-btn-text">
                                                    жизнь<br>
                                                    <span>без</span><br>
                                                    границ 2
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="slide" style="background: url(/images/slider/slide-1.jpg) no-repeat center;">
                                    <div class="container">
                                        <div class="slide-title">
                                            СЛАЙД 3
                                        </div>
                                        <div class="slide-text">
                                            Каждый партнер<br>
                                            Компании «ИВП Фермион»<br>
                                            имеет все возможности<br>
                                            для воплощения в<br>
                                            реальность любых своих<br>
                                            желаний.
                                        </div>
                                        <a href="javascript:void(0)" class="btn circle-btn">
                                            <div class="circle-btn-inside">
                                                <div class="circle-btn-text">
                                                    жизнь<br>
                                                    <span>без</span><br>
                                                    границ 3
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    <!-- -->
                </div>
            
            <?php else: ?>
            
                <div class="inside-page"></div>
            
            <?php endif; ?>
                
            <div class="center-content">
                <?= $content ?>
            </div>   
            
        </div>
    </div>
    
    <div class="footer">
        <div class="footer-top">
            <div class="container clearfix">
                <div class="contacts">
                    <div class="footer-title">
                        контакты
                    </div>
                    <div class="contacts-title">
                        Адрес для приема почтовой корреспонденции
                    </div>
                    <div class="contacts-text">
                        <?= $config['addressInfo'] ?>
                    </div>
                    <div class="contacts-bottom">
                        <div class="contacts-phone">
                            <span><?= $config['phone'] ?></span> - звонок бесплатный по России
                        </div>
                        <div>
                            <!-- todo -->
                                <a href="javascript:void(0)" class="footer-chat-link">онлайн чат</a>
                            <!-- -->
                            <?= CHtml::link($config['adminEmail'], 'mailto:'.$config['adminEmail'], array(
                                'class'=>'footer-email',
                                'target'=>'_blank',
                            )) ?>
                        </div>
                    </div>
                </div>
                <div class="footer-nav">
                    <div class="footer-title">
                        навигация
                    </div>
                    <div class="footer-nav-list">
                        <div class="nav-list-row">
                            <div class="nav-item has-subitem">
                                <?= CHtml::link('О системе', array('/site/about')) ?>
                            </div>
                            <div class="nav-item nav-subitem">
                                <?= CHtml::link('Часто задаваемые вопросы', array('/site/faq')) ?>
                            </div>
                        </div>
                        <div class="nav-list-row">
                            <div class="nav-item">
                                <?= CHtml::link('Новости', array('/site/news')) ?>
                            </div>
                        </div>
                        <div class="nav-list-row">
                            <div class="nav-item has-subitem">
                                <?= CHtml::link('Продукция', array('/site/products')) ?>
                            </div>
                            <div class="nav-item nav-subitem">
                                <?= CHtml::link('Каталог продукции', array('/site/catalog')) ?>
                            </div>
                        </div>
                        <div class="nav-list-row">
                            <div class="nav-item has-subitem">
                                <?= CHtml::link('События', array('/site/events')) ?>
                            </div>
                            <div class="nav-item nav-subitem">
                                <?= CHtml::link('Календарь событий', array('/site/calendar')) ?>
                            </div>
                        </div>
                        <div class="nav-list-row">
                            <div class="nav-item">
                                <?= CHtml::link('Отзывы', array('/site/reviews')) ?>
                            </div>
                        </div>
                        <div class="nav-list-row">
                            <div class="nav-item">
                                <?= CHtml::link('Контакты', array('/site/contacts')) ?>
                            </div>
                            <div class="nav-item nav-subitem">
                                <?= CHtml::link('<span>Карта сайта</span>', array('/site/map'), array(
                                    'class'=>'site-map',
                                )) ?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="footer-actions">
                    <div class="footer-title">
                        E-mail подписка
                    </div>
                    <div class="footer-form">
                        <?php
                            $subscriptionForm = new Subscription();
                        ?>
                        <?php $form=$this->beginWidget('CActiveForm', array(
                            'action'=>array('site/subscription'),
                            'id'=>'subscription-form',
                            'enableAjaxValidation'=>true,
                            'enableClientValidation'=>true,
                            'clientOptions'=>array(
                                'validateOnChange'=>false,
                                'validateOnSubmit'=>true,
                                'afterValidate'=>'js:function(form, data, hasError){
                                    if ( !hasError ) {

                                        $.ajax({
                                            type: "POST",
                                            url: form[0].action,
                                            data: $(form).serialize(),
                                            success: function(ret) {
                                                if ( ret==1 ) {
                                                    $("#subscription-form").html("<span class=\"text-success\">На указанный e-mail отправлена ссылка для подтверждения подписки.</span>");
                                                } else {
                                                    alert("Неизвестная ошибка. Повторите позже или обратитесь в поддержку.");
                                                }
                                                //location = location;
                                            }
                                        });

                                        return false;
                                    }
                                }',
                            ),
                            'htmlOptions'=>array(
                                'class'=>'clearfix',
                            ),
                        )); ?>
                        
                            <?= $form->textField($subscriptionForm, 'email', array(
                                'placeHolder'=>$subscriptionForm->getAttributeLabel('email'),
                            )) ?>
                            <?= $form->error($subscriptionForm, 'email') ?>
                            <button type="submit">Отправить</button>
                            
                        <?php $this->endWidget(); ?>
                    </div>
                    <div class="footer-title">
                        Мы в социальных сетях
                    </div>
                    <div class="social">
                        <?= ( $config['social_twitter'] ) ? CHtml::link('<i class="fa fa-twitter"></i>', $config['social_twitter']) : /*''*/CHtml::link('<i class="fa fa-twitter"></i>', '#') ?>
                        <?= ( $config['social_facebook'] ) ? CHtml::link('<i class="fa fa-facebook"></i>', $config['social_facebook']) : /*''*/CHtml::link('<i class="fa fa-facebook"></i>', '#') ?>
                        <?= ( $config['social_google'] ) ? CHtml::link('<i class="fa fa-google-plus"></i>', $config['social_google']) : /*''*/CHtml::link('<i class="fa fa-google-plus"></i>', '#') ?>
                        <?= ( $config['social_pinterest'] ) ? CHtml::link('<i class="fa fa-pinterest-p"></i>', $config['social_pinterest']) : /*''*/CHtml::link('<i class="fa fa-pinterest-p"></i>', '#') ?>
                        <?= ( $config['social_tumblr'] ) ? CHtml::link('<i class="fa fa-tumblr"></i>', $config['social_tumblr']) : /*''*/CHtml::link('<i class="fa fa-tumblr"></i>', '#') ?>
                        <?= ( $config['social_instagram'] ) ? CHtml::link('<i class="fa fa-instagram"></i>', $config['social_instagram']) : /*''*/CHtml::link('<i class="fa fa-instagram"></i>', '#') ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="rights">
            <div class="container clearfix">
                <?= CHtml::link(CHtml::image('/images/elements/logo-2.png', $config['metaTitle']), $app->homeUrl, array(
                    'class'=>'logo',
                )) ?>
                <div class="rights-text">
                    © 2005-<?= date('Y') ?>
                    <span>ООО «Инновационный венчурный проект Фермион»</span>
                    <?= CHtml::link('Все права защищены', array(/*'site/allRightsReserved'*/'#'/*'site/agreement'*/)) ?>
                </div>

                <?= CHtml::link('<span>Наверх</span>
                    <div class="top-rect">
                        <i class="fa fa-angle-up"></i>
                    </div>', '#', array('class'=>'scroll-top')) ?>
            </div>
        </div>

    </div>
    
    <?php if ( Yii::app()->user->isGuest ): ?>
        <?php
            $loginForm = new User('login');
        ?>
        <div id="modal-auth" class="modal hidden">
            <div class="modal-content">
                <a href="javascript:void(0)" class="modal-close">закрыть окно</a>
                <div class="modal-title">
                    Вход в личный кабинет
                </div>
                <div class="modal-form">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'action'=>array('site/login'),
                        'id'=>'login-form2',
                        //'focus'=>array($loginForm,'login'),
                        'enableAjaxValidation'=>true,
                        'enableClientValidation'=>true,
                        'clientOptions'=>array(
                            'validateOnChange'=>false,
                            'validateOnSubmit'=>true,
                            /*'afterValidate'=>'js:function(form, data, hasError){
                                if ( !hasError ) {

                                    $.ajax({
                                        type: "POST",
                                        url: form[0].action,
                                        data: $(form).serialize(),
                                        success: function(ret) {
                                            if ( ret==1 ) {

                                            } else {
                                                alert("Неизвестная ошибка. Повторите позже или обратитесь в поддержку.");
                                            }
                                            location = location;
                                        }
                                    });

                                    return false;
                                }
                            }',*/
                        ),
                        'htmlOptions'=>array(
                            //'enctype'=>'multipart/form-data',
                        ),
                    )); ?>
                        <div>
                            <?= $form->textField($loginForm, 'login', array(
                                //'id'=>'login2',
                                'placeHolder'=>$loginForm->getAttributeLabel('login'),
                            )) ?>
                            <?= $form->error($loginForm, 'login') ?>
                        </div>
                        <div>
                            <?= $form->passwordField($loginForm, 'password', array(
                                //'id'=>'password2',
                                'placeHolder'=>$loginForm->getAttributeLabel('password'),
                            )) ?>
                            <?= $form->error($loginForm, 'password') ?>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="custom-btn" value="Войти">
                        </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

</body>
</html>