<?php
    
?>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="event-icon"></i> <span>События</span>
        </div>
        <?= $this->renderPartial('application.components.views.eventsArch') ?>
    </div>
    <div class="page-content-wrap">
        <div class="data-header clearfix">
            <div class="data-header-text">
                Сортировать события:
            </div>
            <label class="checkbox-wrap">
                <input type="checkbox" name="date-filter"/>
                по дате
            </label>
            <label class="checkbox-wrap">
                <input type="checkbox" name="reit-filter"/>
                по реитингу
            </label>
            <div class="data-filter">
                <div class="data-header-text">
                    Фильтр:
                </div>
                <a href="javascript:void(0)" class="active">Все события</a>
                <a href="javascript:void(0)">Акции</a>
                <a href="javascript:void(0)">Семинары</a>
                <a href="javascript:void(0)">Опросы</a>
            </div>
        </div>
        <div class="events-list clearfix">
            <div class="event-item-block clearfix">
                <div class="events-img-wrap">
                    <img src="/images/content/event-1.jpg" class="img-responsive">
                </div>
                <div class="event-content">
                    <div class="event-title">
                        Базовое обучение в Уфе с 02.04.2015 по 05.04.2015
                    </div>
                    <div class="event-date">
                        даты события: <span>с 02.04.2015 по 04.04.2015</span>
                    </div>
                    <div class="event-sec-sep"></div>
                    <div class="event-content-text">
                        <p>
                            Проводит профессиональный консультант Бородулина Ирина Григорьевна.
                        </p>
                        <p>
                            Организаторы: Воинцева Т.В., Фатыхова А.И.
                        </p>
                        <p>
                            Контактные телефоны: +7927-089-98-08,+ 7917-046-31-75.
                        </p>
                    </div>
                    <a href="javascript:void(0)" class="event-reg">регистрация на событие</a>
                    <div class="event-detail">
                        <div class="event-price">
                            Стоимость события 2000 руб
                        </div>
                        <a href="javascript:void(0)" class="event-buy">Купить событие</a>
                    </div>
                </div>
            </div>
            <div class="event-item-block clearfix">
                <div class="events-img-wrap">
                    <img src="/images/content/event-1.jpg" class="img-responsive">
                </div>
                <div class="event-content">
                    <div class="event-title">
                        Базовое обучение в Уфе с 02.04.2015 по 05.04.2015
                    </div>
                    <div class="event-date">
                        даты события: <span>с 02.04.2015 по 04.04.2015</span>
                    </div>
                    <div class="event-sec-sep"></div>
                    <div class="event-content-text">
                        <p>
                            Приглашаем Вас принять участие в мастер классе «Косметика  «Фальтонэ» и Современные технологии XXI века». Каждого участника пригласившего новичка на мастер класс ждет подарок! Адрес: м. Чистые пруды (или м.Тургеневская), ул. Малая Лубянка, д.16 строение 4 (3 подъезд, 2й этаж), офис 219. Телефон офиса: +7985-215-14-16.
                        </p>
                    </div>
                    <a href="javascript:void(0)" class="event-reg">регистрация на событие</a>
                </div>
            </div>
            <div class="event-item-block clearfix">
                <div class="events-img-wrap">
                    <img src="/images/content/event-1.jpg" class="img-responsive">
                </div>
                <div class="event-content">
                    <div class="event-title">
                        Базовое обучение в Уфе с 02.04.2015 по 05.04.2015
                    </div>
                    <div class="event-date">
                        даты события: <span>с 02.04.2015 по 04.04.2015</span>
                    </div>
                    <div class="event-sec-sep"></div>
                    <div class="event-content-text">
                        <p>
                            Проводит профессиональный консультант Бородулина Ирина Григорьевна.
                        </p>
                        <p>
                            Организаторы: Воинцева Т.В., Фатыхова А.И.
                        </p>
                        <p>
                            Контактные телефоны: +7927-089-98-08,+ 7917-046-31-75.
                        </p>
                    </div>
                    <a href="javascript:void(0)" class="event-reg">регистрация на событие</a>
                    <div class="event-detail">
                        <div class="event-price">
                            Стоимость события 2000 руб
                        </div>
                        <a href="javascript:void(0)" class="event-buy">Купить событие</a>
                    </div>
                </div>
            </div>
            <div class="event-item-block clearfix">
                <div class="events-img-wrap">
                    <img src="/images/content/event-1.jpg" class="img-responsive">
                </div>
                <div class="event-content">
                    <div class="event-title">
                        Базовое обучение в Уфе с 02.04.2015 по 05.04.2015
                    </div>
                    <div class="event-date">
                        даты события: <span>с 02.04.2015 по 04.04.2015</span>
                    </div>
                    <div class="event-sec-sep"></div>
                    <div class="event-content-text">
                        <p>
                            Приглашаем Вас принять участие в мастер классе «Косметика  «Фальтонэ» и Современные технологии XXI века». Каждого участника пригласившего новичка на мастер класс ждет подарок! Адрес: м. Чистые пруды (или м.Тургеневская), ул. Малая Лубянка, д.16 строение 4 (3 подъезд, 2й этаж), офис 219. Телефон офиса: +7985-215-14-16.
                        </p>
                    </div>
                    <a href="javascript:void(0)" class="event-reg">регистрация на событие</a>
                </div>
            </div>
            <div class="event-item-block clearfix">
                <div class="events-img-wrap">
                    <img src="/images/content/event-1.jpg" class="img-responsive">
                </div>
                <div class="event-content">
                    <div class="event-title">
                        Базовое обучение в Уфе с 02.04.2015 по 05.04.2015
                    </div>
                    <div class="event-date">
                        даты события: <span>с 02.04.2015 по 04.04.2015</span>
                    </div>
                    <div class="event-sec-sep"></div>
                    <div class="event-content-text">
                        <p>
                            Проводит профессиональный консультант Бородулина Ирина Григорьевна.
                        </p>
                        <p>
                            Организаторы: Воинцева Т.В., Фатыхова А.И.
                        </p>
                        <p>
                            Контактные телефоны: +7927-089-98-08,+ 7917-046-31-75.
                        </p>
                    </div>
                    <a href="javascript:void(0)" class="event-reg">регистрация на событие</a>
                    <div class="event-detail">
                        <div class="event-price">
                            Стоимость события 2000 руб
                        </div>
                        <a href="javascript:void(0)" class="event-buy">Купить событие</a>
                    </div>
                </div>
            </div>

        </div>
        <ul class="pagination">
            <li class="active">
                <span>1</span>
            </li>
            <li>
                <a href="javascript:void(0)">2</a>
            </li>
            <li>
                <a href="javascript:void(0)">3</a>
            </li>
            <li>
                <a href="javascript:void(0)">4</a>
            </li>
            <li>
                <a href="javascript:void(0)">5</a>
            </li>
            <li>
                <a href="javascript:void(0)">6</a>
            </li>
            <li>
                <a href="javascript:void(0)">7</a>
            </li>
            <li>
                <a href="javascript:void(0)">8</a>
            </li>
            <li>
                <a href="javascript:void(0)">9</a>
            </li>
            <li>
                <a href="javascript:void(0)">10</a>
            </li>
            <li class="next">
                <a href="javascript:void(0)">...</a>
            </li>
        </ul>
    </div>
</div>