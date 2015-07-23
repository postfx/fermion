<?php
    $app = Yii::app();
    $config = $this->config;
?>

<div class="container">
    <div class="clearfix">
        
        <div class="left-col">
            <div class="section-about">
                <?= $config['content_index_1'] ?>
            </div>
            <div class="section-actions">
                <?= CHtml::link('<div class="rect-btn-inside">Регистрация в системе</div>', array('/site/signup'), array(
                    'class'=>'btn rect-btn reg-btn',
                )) ?>
            </div>
            <div class="section-reviews">
                <?= $config['content_index_2'] ?>
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
            
            <?php if ( count($news)!=0 ): ?>
                <div class="section-company-news">
                    <div class="section-title">
                        <i class="articles-icon"></i> <span>Новости компании</span>
                    </div>
                    <div class="company-news">
                        
                        <?php foreach ( $news as $n ): ?>
                            <div class="company-news-item">
                                <div class="company-news-item-title">
                                    <?= CHtml::encode($n->title) ?>
                                </div>
                                <div class="company-news-item-detail">
                                    <span><?= Yii::app()->dateFormatter->format('dd MMMM yyyy', $n->date_create) ?></span> <span class="news-tag"><?= CHtml::encode($n->category_name) ?></span>
                                </div>
                                <div class="company-news-descr">
                                    <?= $n->_desc ?>
                                    <?= CHtml::link('подробнее', array('/site/news', 'slug'=>$n->slug), array(
                                        'class'=>'news-detail',
                                    )) ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        
                        <div class="all-news-wrap">
                            <?= CHtml::link('Все новости', array('/site/news'), array(
                                'class'=>'all-news',
                            )) ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
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

<div class="bottom-content">
    <div class="container">
        <?php if ( count($popularNews)!=0 ): ?>
            <div class="section-popular">
                <div class="section-title">
                    <i class="articles-icon"></i> <span>Последние или популярные статьи</span>
                </div>
                <div class="clearfix">
                    <?php foreach ( $popularNews as $key => $pn ): ?>
                        <div class="<?= ($key==0)?'left-col':'right-col' ?>">
                            <div class="articles-item clearfix">
                                <div class="articles-item-col">
                                    <div class="articles-item-prev">
                                        <div class="articles-item-create">
                                            <div class="articles-item-create-day"><?= date('d', $pn->date_create) ?></div>
                                            <div class="articles-item-create-month"><?= Yii::app()->dateFormatter->format('MMM', $pn->date_create) ?></div>
                                        </div>
                                        <?= (strlen($pn->img)!=0) ? CHtml::image('/uploads/news/preview/'.$pn->img, '', array(
                                            'class'=>'img-responsive',
                                        )) : '' ?>
                                    </div>
                                </div>
                                <div class="articles-item-col">
                                    <div class="articles-item-title">
                                        <?= CHtml::encode($pn->title) ?>
                                    </div>
                                    <div class="articles-item-descr">
                                        <?= $pn->_desc ?>
                                    </div>
                                    <div class="articles-actions">
                                        <?= CHtml::link('подробнее', array('/site/news', 'slug'=>$pn->slug), array('class'=>'articles-detail')) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>