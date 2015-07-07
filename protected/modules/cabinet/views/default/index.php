<?php

    $role = $user->_role;

?>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="user-icon"></i> <span>Личный кабинет <?= $role->name_genitive ?></span>
        </div>
    </div>
    <?php if ( Yii::app()->user->getFlash('activate_success')===true ): ?>
        <div class="success-content fa_success">
            <div class="success-title">
                Ваш аккаунт активирован
            </div>
        </div>
    <?php endif; ?>
    <!-- todo -->
    <?php if ( Yii::app()->user->role==0 ): ?>
        <div class="page-content-wrap">
            <div class="clearfix user-menu-row">
                <div class="user-menu-section">
                    <div class="user-menu-header">
                        События
                    </div>
                    <div class="user-menu-list">
                        <a href="javascript:void(0)" class="user-menu-item clearfix">
                            <div class="user-menu-img">
                                <img src="/images/icons/event-ico-create.png">
                            </div>
                            <div class="user-menu-title-wrap">
                                <div class="user-menu-title">
                                    создать событие
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="user-menu-item clearfix">
                            <div class="user-menu-img">
                                <img src="/images/icons/cat-ico.png">
                            </div>
                            <div class="user-menu-title-wrap">
                                <div class="user-menu-title">
                                    создать категорию событий
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="user-menu-item clearfix">
                            <div class="user-menu-img">
                                <img src="/images/icons/eye-ico-2.png">
                            </div>
                            <div class="user-menu-title-wrap">
                                <div class="user-menu-title">
                                    просмотр событий
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="user-menu-item clearfix">
                            <div class="user-menu-img">
                                <img src="/images/icons/cat-eye-ico.png">
                            </div>
                            <div class="user-menu-title-wrap">
                                <div class="user-menu-title">
                                    просмотр категорий событий
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="user-menu-section">
                    <div class="user-menu-header">
                        Новости
                    </div>
                    <div class="user-menu-list">
                        <a href="javascript:void(0)" class="user-menu-item clearfix">
                            <div class="user-menu-img">
                                <img src="/images/icons/news.png">
                            </div>
                            <div class="user-menu-title-wrap">
                                <div class="user-menu-title">
                                    создать новость
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="user-menu-item clearfix">
                            <div class="user-menu-img">
                                <img src="/images/icons/cat-ico.png">
                            </div>
                            <div class="user-menu-title-wrap">
                                <div class="user-menu-title">
                                    создать категорию новостей
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="user-menu-item clearfix">
                            <div class="user-menu-img">
                                <img src="/images/icons/eye-ico-2.png">
                            </div>
                            <div class="user-menu-title-wrap">
                                <div class="user-menu-title">
                                    просмотр новостей
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="user-menu-item clearfix">
                            <div class="user-menu-img">
                                <img src="/images/icons/cat-eye-ico.png">
                            </div>
                            <div class="user-menu-title-wrap">
                                <div class="user-menu-title">
                                    просмотр категорий новостей
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="user-menu-section">
                    <div class="user-menu-header">
                        Каталоги
                    </div>
                    <div class="user-menu-list">
                        <a href="javascript:void(0)" class="user-menu-item clearfix">
                            <div class="user-menu-img">
                                <img src="/images/icons/basket-ico-3.png">
                            </div>
                            <div class="user-menu-title-wrap">
                                <div class="user-menu-title">
                                    создать товар
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="user-menu-item clearfix">
                            <div class="user-menu-img">
                                <img src="/images/icons/cat-ico.png">
                            </div>
                            <div class="user-menu-title-wrap">
                                <div class="user-menu-title">
                                    создать категорию товаров
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="user-menu-item clearfix">
                            <div class="user-menu-img">
                                <img src="/images/icons/eye-ico-2.png">
                            </div>
                            <div class="user-menu-title-wrap">
                                <div class="user-menu-title">
                                    просмотр товаров
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="user-menu-item clearfix">
                            <div class="user-menu-img">
                                <img src="/images/icons/cat-eye-ico.png">
                            </div>
                            <div class="user-menu-title-wrap">
                                <div class="user-menu-title">
                                    просмотр категорий товаров
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="clearfix user-menu-row">
                <div class="user-menu-section">
                    <div class="user-menu-header">
                        Пользователи
                    </div>
                    <div class="user-menu-list">
                        <a href="javascript:void(0)" class="user-menu-item clearfix">
                            <div class="user-menu-img">
                                <img src="/images/icons/user-create-ico.png">
                            </div>
                            <div class="user-menu-title-wrap">
                                <div class="user-menu-title">
                                    создать пользователя
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="user-menu-item clearfix">
                            <div class="user-menu-img">
                                <img src="/images/icons/cat-ico.png">
                            </div>
                            <div class="user-menu-title-wrap">
                                <div class="user-menu-title">
                                    создать категорию пользователей
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="user-menu-item clearfix">
                            <div class="user-menu-img">
                                <img src="/images/icons/user-create-ico.png">
                            </div>
                            <div class="user-menu-title-wrap">
                                <div class="user-menu-title">
                                    просмотр пользователей
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="user-menu-item clearfix">
                            <div class="user-menu-img">
                                <img src="/images/icons/cat-eye-ico.png">
                            </div>
                            <div class="user-menu-title-wrap">
                                <div class="user-menu-title">
                                    просмотр категорий пользователей
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="user-menu-item clearfix">
                            <div class="user-menu-img">
                                <img src="/images/icons/planet-ico.png">
                            </div>
                            <div class="user-menu-title-wrap">
                                <div class="user-menu-title">
                                    создать место
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0)" class="user-menu-item clearfix">
                            <div class="user-menu-img">
                                <img src="/images/icons/doc-ico.png">
                            </div>
                            <div class="user-menu-title-wrap">
                                <div class="user-menu-title">
                                    журнал административных единиц
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="user-menu-custom-group">
                    <div class="user-menu-section">
                        <div class="user-menu-header">
                            Журнал всех событий
                        </div>
                        <div class="user-menu-list">
                            <a href="javascript:void(0)" class="user-menu-item clearfix">
                                <div class="user-menu-img">
                                    <img src="/images/icons/time-ico.png">
                                </div>
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        просмотр журнала
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="user-menu-section">
                        <div class="user-menu-header">
                            Сообщения
                        </div>
                        <div class="user-menu-list">
                            <a href="javascript:void(0)" class="user-menu-item clearfix">
                                <div class="user-menu-img">
                                    <img src="/images/icons/message-ico.png">
                                </div>
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        список сообщений
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="user-menu-section">
                        <div class="user-menu-header">
                            Настройки
                        </div>
                        <div class="user-menu-list">
                            <a href="javascript:void(0)" class="user-menu-item clearfix">
                                <div class="user-menu-img">
                                    <img src="/images/icons/option-ico.png">
                                </div>
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        просмотр настроек
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php endif; ?>
    
    <?php if ( Yii::app()->user->role==1 ): ?>
        <div class="full-width-content">
            <div class="clearfix user-menu-row user-lk-menu">
                <div class="user-menu-col">
                    <div class="user-menu-section">
                        <div class="user-menu-header">
                            Интернет Магазин
                        </div>
                        <div class="user-menu-list">
                            <a href="javascript:void(0)" class="user-menu-item clearfix">
                                <div class="user-menu-img">
                                    <img src="/images/icons/basket-ico-3.png">
                                </div>
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        в корзине 0 товаров
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="user-menu-item clearfix">
                                <div class="user-menu-img">
                                    <img src="/images/icons/mess-ico.png">
                                </div>
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        у вас 0 новых событий
                                    </div>
                                </div>
                            </a>
                            <div class="clearfix user-menu-small">
                                <div>
                                    <a href="javascript:void(0)" class="user-menu-item clearfix">
                                        <div class="user-menu-title-wrap">
                                            <div class="user-menu-title">
                                                мои заказы
                                            </div>
                                        </div>
                                        <div class="user-menu-img">
                                            <img src="/images/icons/my-orders-icon.png">
                                        </div>
                                    </a>
                                </div>
                                <div>
                                    <a href="javascript:void(0)" class="user-menu-item clearfix">
                                        <div class="user-menu-title-wrap">
                                            <div class="user-menu-title">
                                                мои отзывы
                                            </div>
                                        </div>
                                        <div class="user-menu-img">
                                            <img src="/images/icons/my-reviews-icon.png">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="user-menu-col">
                    <div class="user-menu-section">
                        <div class="user-menu-header">
                            Личный счет
                        </div>
                        <div class="user-menu-list">
                            <a href="javascript:void(0)" class="user-menu-item clearfix">
                                <div class="user-menu-img">
                                    <img src="/images/icons/account-bal-icon.png">
                                </div>
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        на вашем счете<br>
                                        <span>0 руб.</span>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="user-menu-item clearfix">
                                <div class="user-menu-img">
                                    <img src="/images/icons/account-points-icon.png">
                                </div>
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        бонусных баллов<br>
                                        <span>0</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="user-menu-col">
                    <div class="user-menu-section">
                        <div class="user-menu-header">
                            Мои данные
                        </div>
                        <div class="user-menu-list">
                            <a href="javascript:void(0)" class="user-menu-item clearfix">
                                <div class="user-menu-img">
                                    <img src="/images/icons/account-info-icon.png">
                                </div>
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        общая информация
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="user-menu-item clearfix">
                                <div class="user-menu-img">
                                    <img src="/images/icons/account-history-icon.png">
                                </div>
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        история всех<br>
                                        операций
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="user-menu-item clearfix">
                                <div class="user-menu-img">
                                    <img src="/images/icons/account-option-icon.png">
                                </div>
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        управление профилями
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="user-menu-col">
                    <div class="user-menu-section">
                        <div class="user-menu-header">
                            Быстрый заказ
                        </div>
                        <div class="user-menu-list">
                            <a href="javascript:void(0)" class="user-menu-item user-menu-custom clearfix">
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title user-menu-two-rows">
                                        закажите товары прямо сейчас
                                    </div>
                                </div>
                                <div class="user-menu-img">
                                    <img src="/images/icons/order-now-icon.png">
                                </div>

                            </a>
                        </div>
                    </div>
                </div>
                <div class="user-menu-col">
                    <div class="user-menu-section">
                        <div class="user-menu-header">
                            Мои инструменты
                        </div>
                        <div class="user-menu-list">
                            <a href="javascript:void(0)" class="user-menu-item user-menu-custom clearfix">
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        подписаться на новость
                                    </div>
                                </div>
                                <div class="user-menu-img">
                                    <img src="/images/icons/rss-icon.png">
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="user-menu-item clearfix">
                                <div class="user-menu-img">
                                    <img src="/images/icons/friend-icon.png">
                                </div>
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        пригласить друга
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="user-menu-item user-menu-custom clearfix">
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        настроить уведомления
                                    </div>
                                </div>
                                <div class="user-menu-img">
                                    <img src="/images/icons/notification-icon.png">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="user-menu-col">
                    <div class="user-menu-section">
                        <div class="user-menu-header">
                            Мои сообщения
                        </div>
                        <div class="user-menu-list">
                            <a href="javascript:void(0)" class="user-menu-item user-menu-custom clearfix">
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        у вас 0 новых сообщений
                                    </div>
                                </div>
                                <div class="user-menu-img">
                                    <img src="/images/icons/user-mes-icon.png">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    
    <?php if ( Yii::app()->user->role==3 ): ?>
        <div class="full-width-content">
            <div class="clearfix user-menu-row user-lk-menu">
                <div class="user-menu-col">
                    <div class="user-menu-section">
                        <div class="user-menu-header">
                            Интернет Магазин
                        </div>
                        <div class="user-menu-list">
                            <a href="javascript:void(0)" class="user-menu-item clearfix">
                                <div class="user-menu-img">
                                    <img src="/images/icons/basket-ico-3.png">
                                </div>
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        в корзине 6 товаров
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="user-menu-item clearfix">
                                <div class="user-menu-img">
                                    <img src="/images/icons/mess-ico.png">
                                </div>
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        у вас 25 новых событий
                                    </div>
                                </div>
                            </a>
                            <div class="clearfix user-menu-small">
                                <div>
                                    <a href="javascript:void(0)" class="user-menu-item clearfix">
                                        <div class="user-menu-title-wrap">
                                            <div class="user-menu-title">
                                                мои заказы
                                            </div>
                                        </div>
                                        <div class="user-menu-img">
                                            <img src="/images/icons/my-orders-icon.png">
                                        </div>
                                    </a>
                                </div>
                                <div>
                                    <a href="javascript:void(0)" class="user-menu-item clearfix">
                                        <div class="user-menu-title-wrap">
                                            <div class="user-menu-title">
                                                мои отзывы
                                            </div>
                                        </div>
                                        <div class="user-menu-img">
                                            <img src="/images/icons/my-reviews-icon.png">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="user-menu-col">
                    <div class="user-menu-section">
                        <div class="user-menu-header">
                            Личный счет
                        </div>
                        <div class="user-menu-list">
                            <a href="javascript:void(0)" class="user-menu-item clearfix">
                                <div class="user-menu-img">
                                    <img src="/images/icons/account-bal-icon.png">
                                </div>
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        на вашем счете<br>
                                        <span>125 600 руб.</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="user-menu-col">
                    <div class="user-menu-section">
                        <div class="user-menu-header">
                            Мои данные
                        </div>
                        <div class="user-menu-list">
                            <a href="javascript:void(0)" class="user-menu-item clearfix">
                                <div class="user-menu-img">
                                    <img src="/images/icons/account-info-icon.png">
                                </div>
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        общая информация
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="user-menu-item clearfix">
                                <div class="user-menu-img">
                                    <img src="/images/icons/account-history-icon.png">
                                </div>
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        история всех<br>
                                        операций
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="user-menu-item clearfix">
                                <div class="user-menu-img">
                                    <img src="/images/icons/account-option-icon.png">
                                </div>
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        управление профилями
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="user-menu-col">
                    <div class="user-menu-section">
                        <div class="user-menu-header">
                            Быстрый заказ
                        </div>
                        <div class="user-menu-list">
                            <a href="javascript:void(0)" class="user-menu-item user-menu-custom clearfix">
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title user-menu-two-rows">
                                        закажите товары прямо сейчас
                                    </div>
                                </div>
                                <div class="user-menu-img">
                                    <img src="/images/icons/order-now-icon.png">
                                </div>

                            </a>
                        </div>
                    </div>
                </div>
                <div class="user-menu-col">
                    <div class="user-menu-section">
                        <div class="user-menu-header">
                            Мои отчеты
                        </div>
                        <div class="user-menu-list">
                            <a href="javascript:void(0)" class="user-menu-item clearfix">
                                <div class="user-menu-img">
                                    <img src="/images/icons/user-st-icon.png">
                                </div>
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        личная структура
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="user-menu-col">
                    <div class="user-menu-section">
                        <div class="user-menu-header">
                            Мои инструменты
                        </div>
                        <div class="user-menu-list">
                            <a href="javascript:void(0)" class="user-menu-item user-menu-custom clearfix">
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        подписаться на новость
                                    </div>
                                </div>
                                <div class="user-menu-img">
                                    <img src="/images/icons/rss-icon.png">
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="user-menu-item clearfix">
                                <div class="user-menu-img">
                                    <img src="/images/icons/friend-icon.png">
                                </div>
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        пригласить друга
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="user-menu-col">
                    <div class="user-menu-section">
                        <div class="user-menu-header">
                            Мои сообщения
                        </div>
                        <div class="user-menu-list">
                            <a href="javascript:void(0)" class="user-menu-item user-menu-custom clearfix">
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        у вас 5 новых сообщений
                                    </div>
                                </div>
                                <div class="user-menu-img">
                                    <img src="/images/icons/user-mes-icon.png">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="user-menu-col">
                    <div class="user-menu-section">
                        <div class="user-menu-header">
                            Я лектор
                        </div>
                        <div class="user-menu-list">
                            <a href="javascript:void(0)" class="user-menu-item clearfix">
                                <div class="user-menu-img">
                                    <img src="/images/icons/timer-icon.png">
                                </div>
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        будущие события
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0)" class="user-menu-item clearfix">
                                <div class="user-menu-img">
                                    <img src="/images/icons/doc-ico-2.png">
                                </div>
                                <div class="user-menu-title-wrap">
                                    <div class="user-menu-title">
                                        заявки на услуги
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- -->
</div>