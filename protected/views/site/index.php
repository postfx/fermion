<?php
    $app = Yii::app();
?>

<div class="container">
    <div class="clearfix">
        
        <div class="left-col">
            <div class="section-about">
                <div class="default-title">
                    Основная идея компании «ИВП Фермион»  состоит в том,  что человек сам является творцом своей жизни.
                </div>
                <p>
                    Сколько стоит ваш час работы? Будет поступать доход, если перестанете работать?
                    На сколько ваш финансовый результат зависит от вашего личного участия в работе?
                </p>
                <p>
                    Сетевой Маркетинг – это феноменальный бизнес,  позволяющий расширить границы времени и пространства. Сетевой Маркетинг – это
                </p>
                <div class="section-about-list">
                    <div class="section-about-item">
                        <div class="section-about-block">
                            <div class="about-item-title">
                                Бизнес саморазвития
                            </div>
                            <div class="about-item-descr">
                                Переходя со ступени на ступень, вы каждый раз растете профессионально и личносто.
                            </div>
                        </div>

                    </div>
                    <div class="section-about-item">
                        <div class="section-about-block">
                            <div class="about-item-title">
                                Бизнес, дающий время
                            </div>
                            <div class="about-item-descr">
                                Появляется больше свободного времени, которое можете провести со своей семьей.
                            </div>
                        </div>

                    </div>
                    <div class="section-about-item">
                        <div class="section-about-block">
                            <div class="about-item-title">
                                Бизнес с минимальными
                                финансовыми вложениями
                            </div>
                            <div class="about-item-descr">
                                Возможность начать бизнес с небольшими вложениями дает шанс каждому, кто желает изменить свою жизнь, открыть свое дело.
                            </div>
                        </div>

                    </div>
                    <div class="section-about-item">
                        <div class="section-about-block">
                            <div class="about-item-title">
                                Бизнес больших желаний
                                и возможностей
                            </div>
                            <div class="about-item-descr">
                                Самые смелые мечты и желания, планы и намерения становятся реальными для достижения. Все зависит только от вас!
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="section-actions">
                <?= CHtml::link('<div class="rect-btn-inside">Регистрация в системе</div>', array('/site/signup'), array(
                    'class'=>'btn rect-btn reg-btn',
                )) ?>
            </div>
            <div class="section-reviews">
                <div class="reviews-slider-wrap">
                    <div class="review-slide-nav-wrap">
                        <div class="review-slide-nav"></div>
                    </div>

                    <ul class="reviews-slider">
                        <li>
                            <div class="review-slide clearfix">
                                <div class="review-slide-content">
                                    <div class="review-name">
                                        Каверина Наталья Николаевна:
                                    </div>
                                    <div class="review-text">
                                        <p>
                                            Я счастлива, что попала в «ИВП Фермион».
                                        </p>
                                        <p>
                                            Удивительно открывать себя, свои возможности,
                                            начинать жить более осознанно и находить ответы
                                            на многие вопросы, на которые, казалось, нет ответа.
                                        </p>
                                        <p>
                                            Базовое обучение дало мне очень многое.<br>
                                            Появилось ощущение спокойствия и уверенности!
                                        </p>
                                    </div>
                                </div>
                                <img src="/images/elements/rev.png" class="review-img">
                            </div>
                        </li>
                        <li>
                            <div class="review-slide clearfix">
                                <div class="review-slide-content">
                                    <div class="review-name">
                                        Хомчук Наталья Николаевна:
                                    </div>
                                    <div class="review-text">
                                        <p>
                                            Я счастлива, что попала в «ИВП Фермион».
                                        </p>
                                        <p>
                                            Удивительно открывать себя, свои возможности,
                                            начинать жить более осознанно и находить ответы
                                            на многие вопросы, на которые, казалось, нет ответа.
                                        </p>
                                        <p>
                                            Базовое обучение дало мне очень многое.<br>
                                            Появилось ощущение спокойствия и уверенности!
                                        </p>
                                        <p>
                                            Удивительно открывать себя, свои возможности.
                                        </p>
                                    </div>
                                </div>
                                <img src="/images/elements/rev.png" class="review-img">
                            </div>
                        </li>
                        <li>
                            <div class="review-slide clearfix">
                                <div class="review-slide-content">
                                    <div class="review-name">
                                        Каверина Наталья Николаевна:
                                    </div>
                                    <div class="review-text">
                                        <p>
                                            Я счастлива, что попала в «ИВП Фермион».
                                        </p>
                                        <p>
                                            Удивительно открывать себя, свои возможности,
                                            начинать жить более осознанно и находить ответы
                                            на многие вопросы, на которые, казалось, нет ответа.
                                        </p>
                                        <p>
                                            Базовое обучение дало мне очень многое.<br>
                                            Появилось ощущение спокойствия и уверенности!
                                        </p>
                                    </div>
                                </div>
                                <img src="/images/elements/rev.png" class="review-img">
                            </div>
                        </li>

                    </ul>
                </div>

            </div>

        </div>
        
        <div class="right-col">
            <?php if ( $app->user->isGuest ): ?>
                <?php
                    $loginForm = new User('login');
                ?>
                <div class="section-user-room">
                    <div class="section-title clearfix">
                        <i class="lk-icon"></i> <span>Личный кабинет</span>
                    </div>
                    <div class="user-room-block non-auth">
                        <?php $form=$this->beginWidget('CActiveForm', array(
                            'action'=>array('site/login'),
                            'id'=>'login-form',
                            'focus'=>array($loginForm,'login'),
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
                            <div class="clearfix">
                                <div class="form-col">
                                    <?= $form->textField($loginForm, 'login', array(
                                        'placeHolder'=>$loginForm->getAttributeLabel('login'),
                                    )) ?>
                                    <?= $form->error($loginForm, 'login') ?>
                                    
                                    <div class="after-input">
                                        <label class="checkbox-wrap">
                                            <?= $form->checkBox($loginForm, 'rememberMe') ?>
                                            <?= $loginForm->getAttributeLabel('rememberMe') ?>
                                        </label>
                                    </div>

                                </div>
                                <div class="form-col pass-wrap">
                                    <?= $form->passwordField($loginForm, 'password', array(
                                        'placeHolder'=>$loginForm->getAttributeLabel('password'),
                                    )) ?>
                                    <?= $form->error($loginForm, 'password') ?>
                                    <div class="after-input">
                                        <?= CHtml::link('Восстановление пароля', array('site/recovery'), array(
                                            'class'=>'link',
                                        )) ?>
                                    </div>
                                </div>

                                <button type="submit" class="btn circle-btn enter-btn">
                                    <div class="circle-btn-inside">
                                        <div class="circle-btn-text">
                                            вход
                                        </div>
                                    </div>
                                </button>
                            </div>
                        <?php $this->endWidget(); ?>
                    </div>
                </div>
            <?php else: ?>
                <?php 
                    $user = User::model()->findByPk($app->user->id);
                ?>
                <div class="section-user-room">
                    <div class="section-title clearfix">
                        <i class="lk-icon"></i> <span>Личный кабинет</span>
                        <div class="select-wrap">
                            <?= CHtml::dropDownList('user-index', null, array(
                                $app->createUrl('cabinet/default/index')    => $user->_io,
                                $app->createUrl('cabinet/messages/index')   => 'Мои сообщения',
                                $app->createUrl('site/logout')              => 'Выход',
                            ), array(
                                'class'=>'optionIsLink',
                            )) ?>
                        </div>
                    </div>
                    <div class="user-room-block clearfix">
                        <div class="user-room-left">
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
                            <div class="user-row">
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
                        <div class="user-room-right">
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


                    </div>
                </div>
            <?php endif; ?>
            
            <div class="section-company-news">
                <div class="section-title">
                    <i class="articles-icon"></i> <span>Новости компании</span>
                </div>
                <!-- todo -->
                    <div class="company-news">
                        <div class="company-news-item">
                            <div class="company-news-item-title">
                                Новые устройства серии Фрегат
                            </div>
                            <div class="company-news-item-detail">
                                <span>22 марта 2015</span> <span class="news-tag">продукция</span>
                            </div>
                            <div class="company-news-descr">
                                Компания вводит антикризисную программу, по которой клиент может приобрести
                                устройство по доступной цене и получить яркий результат!
                                <a href="javascript:void(0)" class="news-detail">подробнее</a>
                            </div>
                        </div>
                        <div class="company-news-item">
                            <div class="company-news-item-title">
                                Встреча с Президентом компании
                            </div>
                            <div class="company-news-item-detail">
                                <span>20 февраля 2015</span> <span class="news-tag">события</span>
                            </div>
                            <div class="company-news-descr">
                                6-7 февраля 2015 года состоялась встреча Верховцева Николая Владимировича с
                                Профессиональными консультантами компании!
                                <a href="javascript:void(0)" class="news-detail">подробнее</a>
                            </div>
                        </div>
                        <div class="all-news-wrap">
                            <?= CHtml::link('Все новости', array('/site/news'), array(
                                'class'=>'all-news',
                            )) ?>
                        </div>
                    </div>
                <!-- -->
            </div>
            <div class="section-events">
                <div class="section-title">
                    <i class="event-icon"></i> <span>ближайшие события</span>
                </div>
                <!-- todo -->
                    <div class="company-events">
                        <div class="company-event-item clearfix">
                            <div class="event-left">
                                <div class="company-event-title">
                                    Семинар "Технологии увеличения объёма продаж"
                                    в г. Москва
                                </div>
                                <div class="company-event-descr">
                                    Проводит руководитель маркетингового  направления Егорова
                                    Светлана. Время проведения: в 18ч.
                                    <a href="javascript:void(0)" class="news-detail">подробнее</a>
                                </div>
                            </div>
                            <div class="event-right">
                                <div class="company-event-date">
                                    <div class="event-day">
                                        25
                                    </div>
                                    <div class="event-month">
                                        марта
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="company-event-item clearfix">
                            <div class="event-left">
                                <div class="company-event-title">
                                    Базовое обучение в г. Грозный
                                </div>
                                <div class="company-event-descr">
                                    Проводит руководитель маркетингового  направления Егорова
                                    Светлана.
                                    <a href="javascript:void(0)" class="news-detail">подробнее</a>
                                </div>
                            </div>
                            <div class="event-right">
                                <div class="company-event-date">
                                    <div class="event-day">
                                        25
                                    </div>
                                    <div class="event-month">
                                        октября
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="all-news-wrap">
                            <?= CHtml::link('Все события', array('/site/events'), array(
                                'class'=>'all-news',
                            )) ?>
                        </div>
                    </div>
                <!-- todo -->
            </div>
        </div>
    </div>
</div>

<!-- todo -->
    <div class="bottom-content">
        <div class="container">
            <div class="section-popular">
                <div class="section-title">
                    <i class="articles-icon"></i> <span>Последние или популярные статьи</span>
                </div>
                <div class="clearfix">
                    <div class="left-col">
                        <div class="articles-item clearfix">
                            <div class="articles-item-col">
                                <div class="articles-item-prev">
                                    <div class="articles-item-create">
                                        <div class="articles-item-create-day">15</div>
                                        <div class="articles-item-create-month">окт</div>
                                    </div>
                                    <img src="/images/content/news-1.jpg" class="img-responsive">
                                </div>
                            </div>
                            <div class="articles-item-col">
                                <div class="articles-item-title">
                                    Бизнес-предложение
                                </div>
                                <div class="articles-item-descr">
                                    Вся цивилизация планеты Земля находится в состоянии перехода. Индустриальное общество входит в информационную эпоху. Меняется общество, меняется человек, причем скорость изменений стремительно нарастает.  Человек новой эры – это гармонически развитая творческая личность.
                                </div>
                                <div class="articles-actions">
                                    <a href="javascript:void(0)" class="articles-detail">подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right-col">
                        <div class="articles-item clearfix">
                            <div class="articles-item-col">
                                <div class="articles-item-prev">
                                    <div class="articles-item-create">
                                        <div class="articles-item-create-day">31</div>
                                        <div class="articles-item-create-month">дек</div>
                                    </div>
                                    <img src="/images/content/news-2.jpg" class="img-responsive">
                                </div>

                            </div>
                            <div class="articles-item-col">
                                <div class="articles-item-title">
                                    Эволюция сознания
                                </div>
                                <div class="articles-item-descr">
                                    Мы живем в эпоху информации. Кто владеет информацией, тот владеет миром. И это действительно так. Если в давние времена новости приходили с караванами купцов, с почтовыми каретами.
                                </div>
                                <div class="articles-actions">
                                    <a href="javascript:void(0)" class="articles-detail">подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- todo -->