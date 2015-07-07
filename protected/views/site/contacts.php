<?php
    //$c = $this->config;
?>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="articles-icon"></i> <span>Контактная информация</span>
        </div>
        <?= $this->renderPartial('application.components.views.calendar') ?>
    </div>
    <div class="page-content-wrap">
        <div class="clearfix">
            <div class="contacts-left">
                <div class="contacts-section">
                    <div class="contacts-header phone-header">Многоканальный телефон: <?= /*$c['phone']*/'8(800) 2000-420' ?></div>
                    <div class="contacts-descr">
                        <?= /*$c['phoneInfo']*/'Звонок бесплатный из любого города России. Пн-Пт с 10-00 до 19-00 по мск. времени' ?>
                    </div>
                </div>
                <div class="contacts-section">
                    <div class="contacts-header post-header">Адрес для приема почтовой корреспонденции</div>
                    <div class="contacts-descr">
                        <?= /*$c['addressInfo']*/'Компания «ИВП Фермион» <span>190000, Санкт-Петербург, "ИВП Фермион", а/я 645</span>' ?>
                    </div>
                </div>
                <!-- todo -->
                <div class="contacts-section">
                    <div class="contacts-header delivery-header">Ближайший к Вам пункт выдачи</div>
                    <div class="map-area" id="map"></div>
                    <div class="delivery-point-block">
                        <div>
                            <span>Адрес:</span> г. Москва, ул. Малая Лубянка, д. 16, оф. 219
                        </div>
                        <div>
                            <span>График работы:</span> 11:00 - 22:00, выходной среда
                        </div>
                        <div>
                            <span>Телефон:</span> +7 (985) 123-45-67
                        </div>
                    </div>
                    <div>
                        <a href="javascript:void(0)" class="city-stores">Посмотреть другие пункты выдачи в Москве</a>
                    </div>
                    <div>
                        <a href="javascript:void(0)" class="other-city-stores">Пункты выдачи в других городах</a>
                    </div>
                </div>
                <!-- -->
            </div>
            <div class="contacts-right">
                <div class="contacts-header email-header">Обратная связь</div>
                <div class="contacts-descr">
                    Попробуйте найти ответ на Ваш вопрос в разделе <?= CHtml::link('Часто Задаваемых Вопросов (ЧАВО)', array('site/faq')) ?>
                </div>
                <div class="contacts-label">
                    Не нашли?
                </div>
                <div class="contacts-descr">
                    Тогда отправьте вопрос нам, и мы постараемся ответить как можно быстрее
                </div>
                <div class="contacts-form">
                    <!-- todo -->
                        <form method="post" action="">
                            <input type="text" name="fio" placeholder="ФИО">
                            <input type="text" name="email" placeholder="E-mail">
                            <input type="text" name="phone" placeholder="Телефон">
                            <div class="select-wrap">
                                <select name="country">
                                    <option>Тема вопроса</option>
                                    <option>Тема № 1</option>
                                    <option>Тема № 2</option>
                                    <option>Тема № 3</option>
                                </select>
                            </div>
                            <textarea name="question" placeholder="Вопрос"></textarea>
                            <div class="text-center">
                                <input type="submit" class="custom-btn-gray" value="Отправить">
                            </div>
                        </form>
                    <!-- -->
                </div>
            </div>
        </div>
    </div>
</div>