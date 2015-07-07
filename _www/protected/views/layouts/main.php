<?php
	$this->pageTitle=Yii::app()->name;

	$clientScript = Yii::app()->clientScript;
	$clientScript->registerCoreScript('jquery');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="maximum-scale=1.0,width=680">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" href="/fonts/font-awesome-4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/js/fancybox/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.formstyler.css" />
    <link rel="stylesheet" type="text/css" href="/css/jquery.scrollbar.css" />
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/css/style_extended.css" />

    <!--<script type="text/javascript" src="/js/jquery-1.11.2.js"></script>-->
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>
    <script type="text/javascript" src="/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="/js/jquery.bxslider.js"></script>
    <script type="text/javascript" src="/js/fancybox/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="/js/jquery.formstyler.js"></script>
    <script type="text/javascript" src="/js/numeric.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/jquery.scrollbar.js"></script>
    <script type="text/javascript" src="/js/extended.js"></script>

</head>
<body>
    <div class="wrapper">

        <div class="content">
            <div class="header">
                <div class="top-wrap">
                    <div class="top">
                        <div class="container">
                            <div class="non-auth-wrap">
                                <div class="non-auth-text">
                                    Здравствуй, посетитель! Для доступа ко всем возможностям сайта мы просим пройти <a href="javascript:void(0)">регистрацию</a> или <a href="javascript:void(0)">авторизироваться</a>
                                </div>
                            </div>
                            <div class="auth-wrap" style="display: none;">
                                <div class="top-user-room">
                                    <span>Здравствуйте</span>
                                    <div class="select-wrap">
                                        <select name="user">
                                            <option>Константин Сергеевич</option>
                                            <option>Мои сообщения</option>
                                            <option>Выход</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="user-room-section">
                                    <div class="user-row">
                                        <div class="user-row">
                                            <a href="javascript:void(0)" class="user-actions">Мои данные</a>
                                        </div>
                                        <div class="user-row">
                                            <a href="javascript:void(0)" class="user-actions">Быстрый заказ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-room-section">
                                    <div class="user-row">
                                        <div class="user-row">
                                            <a href="javascript:void(0)" class="user-actions">События:</a> <span class="room-value">2</span>
                                        </div>
                                        <div class="user-row">
                                            <a href="javascript:void(0)" class="user-actions">Сообщения:</a> <span class="room-value">5</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-room-section">
                                    <div class="user-row">
                                        <div class="user-room-money">
                                            <div class="user-row">
                                                <div class="balance">
                                                    <span class="room-field">Баланс:</span>
                                                    <span class="room-value">35231 руб</span>
                                                </div>
                                                <div class="points">
                                                    <span class="room-field">Бонусные баллы:</span>
                                                    <span class="room-value">500</span>
                                                </div>
                                            </div>
                                            <div class="user-row">
                                                <a href="javascript:void(0)" class="user-money-actions user-actions">Пополнение</a>
                                                <a href="javascript:void(0)" class="user-money-actions user-actions">Просмотр операций</a>
                                                <a href="javascript:void(0)" class="user-money-actions user-actions">Перевод</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-room-section">
                                    <div class="user-room-basket">
                                        <div class="user-row">
                                            <div class="basket">
                                                <span class="room-field">6 товаров:</span>
                                                <span class="room-value">16200 руб</span>
                                            </div>
                                        </div>
                                        <div class="user-row">
                                            <a href="javascript:void(0)" class="user-money-actions user-actions">Оформить заказ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="nav">
                    <div class="container clearfix">
                        <a href="/" class="logo">
                            <img src="/images/elements/logo.png">
                        </a>
                        <div class="nav-static">
                            <div class="clearfix">
                                <div class="header-phone-block">
                                    <div class="phone-block">
                                        Есть вопросы? <span>8 (800) 2000-420</span>
                                    </div>
                                    <div class="phone-hint">
                                        Звонок бесплатный из любого города России
                                    </div>
                                </div>
                                <div class="header-chat-block">
                                    <a href="javascript:void(0)" class="chat-link">Онлайн чат</a>
                                    <div class="chat-hint">
                                        консультант на месте
                                    </div>
                                </div>
                            </div>
                            <ul class="menu">
                                <li>
                                    <a href="javascript:void(0)">О системе</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">новости</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">продукция</a>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0)">события</a>
                                    <div class="submenu-block">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    Календарь
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    Путешествия
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    Фотогалерея
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    Корпоративы
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    Архивы
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    Пункт меню
                                                </a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    Пункт меню
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    Пункт меню
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    Пункт меню
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    Пункт меню
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    Пункт меню
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    Пункт меню
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </li>
                                <li>
                                    <a href="javascript:void(0)">отзывы</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">контакты</a>
                                </li>
                            </ul>

                        </div>
                        <div class="nav-right">
                            <div class="geo-user">
                                <a href="javascript:void(0)">Санкт-Петербург</a>
                            </div>
                            <div class="search-form-block">
                                <form method="post" action="" class="search-form clearfix">
                                    <input type="text" name="search-field" placeholder="поиск на сайте">
                                    <button type="submit" class="search-btn">
                                        <i class="fa fa-search"></i>
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($this->id == 'site' && $this->action->id == 'index'):?>
            <div class="slider">
                <div class="slider-nav-wrap">
                    <div class="slider-nav"></div>
                </div>

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
            </div>
            <?php else: ?>
            <div class="inside-page"></div>
            <?php endif; ?>
            <div class="center-content"><?php print($content); ?></div>
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
                        Компания «ИВП Фермион»<br>
                        190000, Санкт-Петербург, "ИВП Фермион", а/я 645
                    </div>
                    <div class="contacts-bottom">
                        <div class="contacts-phone">
                            <span>8 (800) 2000-420</span> - звонок бесплатный по России
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="footer-chat-link">онлайн чат</a>
                            <a href="mailto:email@fermion.ru" class="footer-email">email@fermion.ru</a>
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
                                <a href="javascript:void(0)">О системе</a>
                            </div>
                            <div class="nav-item nav-subitem">
                                <a href="javascript:void(0)">часто задаваемые вопросы</a>
                            </div>
                        </div>
                        <div class="nav-list-row">
                            <div class="nav-item">
                                <a href="javascript:void(0)">Новости</a>
                            </div>
                        </div>
                        <div class="nav-list-row">
                            <div class="nav-item has-subitem">
                                <a href="javascript:void(0)">Продукция</a>
                            </div>
                            <div class="nav-item nav-subitem">
                                <a href="javascript:void(0)">Каталог продукции</a>
                            </div>
                        </div>
                        <div class="nav-list-row">
                            <div class="nav-item has-subitem">
                                <a href="javascript:void(0)">События</a>
                            </div>
                            <div class="nav-item nav-subitem">
                                <a href="javascript:void(0)">Календарь событий</a>
                            </div>
                        </div>
                        <div class="nav-list-row">
                            <div class="nav-item">
                                <a href="javascript:void(0)">Отзывы</a>
                            </div>
                        </div>
                        <div class="nav-list-row">
                            <div class="nav-item">
                                <a href="javascript:void(0)">Контакты</a>
                            </div>
                            <div class="nav-item nav-subitem">
                                <a href="javascript:void(0)" class="site-map"><span>Карта сайта</span></a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="footer-actions">
                    <div class="footer-title">
                        E-mail подписка
                    </div>
                    <div class="footer-form">
                    	<?php $form = $this->beginWidget("CActiveForm", array("enableAjaxValidation" => true, "clientOptions" => array("validateOnSubmit" => true), "htmlOptions" => array("class" => "clearfix") ,"id"=>"subscription-form", "action"=>Yii::app()->createUrl("site/subscript"),)); ?>
                    		<div style="display:inline">
	                    		<?php echo $form->textField($this->subscription_form, "email", array("placeholder"=>"Введите свой e-mail")); ?>
					            <?php echo $form->error($this->subscription_form, "email"); ?>
							</div>
                            <button type="submit">Отправить</button>
                        <?php $this->endWidget(); ?>
                    </div>
                    <div class="footer-title">
                        Мы в социальных сетях
                    </div>
                    <div class="social">
                        <a href="javascript:void(0)">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="javascript:void(0)">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="javascript:void(0)">
                            <i class="fa fa-google-plus"></i>
                        </a>
                        <a href="javascript:void(0)">
                            <i class="fa fa-pinterest-p"></i>
                        </a>
                        <a href="javascript:void(0)">
                            <i class="fa fa-tumblr"></i>
                        </a>
                        <a href="javascript:void(0)">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="rights">
            <div class="container clearfix">
                <a href="javascript:void(0)" class="logo">
                    <img src="/images/elements/logo-2.png">
                </a>
                <div class="rights-text">
                    © 2005-2015 <span>ООО «Инновационный венчурный проект Фермион»</span> <a href="javascript:void(0)">все права защищены</a>
                </div>

                <a href="javascript:void(0)" class="scroll-top">
                    <span>Наверх</span>
                    <div class="top-rect">
                        <i class="fa fa-angle-up"></i>
                    </div>
                </a>
            </div>
        </div>

    </div>
</body>
</html>