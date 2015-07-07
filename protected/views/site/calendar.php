<?php

    $cs = Yii::app()->clientScript;
    $pt = Yii::app()->homeUrl;
    
    $cs
        ->registerCssFile($pt.'css/fullcalendar.css')
        ->registerCssFile($pt.'css/fullcalendar.print.css', 'print');
    
    $cs
        ->registerScriptFile($pt.'js/moment.min.js',CClientScript::POS_END)
        ->registerScriptFile($pt.'js/fullcalendar.js',CClientScript::POS_END)
        ->registerScriptFile($pt.'js/lang-all.js',CClientScript::POS_END);
    
?>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="calendar-icon"></i> <span>Календарь всех событий</span>
        </div>
    </div>
    <div class="full-width-content">
        <div class="calendar-header-block clearfix">
            <div class="calendar-header-top">
                <div class="common-text">
                    Удобный инструмент для отслеживания всех событий
                </div>
                <form class="calendar-filter" method="post">
                    <label class="checkbox-wrap news-filter-wrap">
                        <input type="checkbox" checked name="only-news">
                        Новости
                    </label>
                    <label class="checkbox-wrap actions-filter-wrap">
                        <input type="checkbox" name="only-actions">
                        Акции
                    </label>
                    <label class="checkbox-wrap events-filter-wrap">
                        <input type="checkbox" name="only-events">
                        События
                    </label>
                    <label class="checkbox-wrap polls-filter-wrap">
                        <input type="checkbox" name="only-polls">
                        Опросы
                    </label>
                </form>
            </div>
            <div class="timer-block">
                <div class="timer-title">
                    До ежегодного праздника<br>
                    <span>"Созвездие"</span> осталось:
                </div>
                <div class="timer-counts">
                    <div class="timer-val days-val">
                        195
                    </div>
                    <span>
                        дней
                    </span>
                    <div class="timer-val hours-val">
                        23
                    </div>
                    <span>
                        часа
                    </span>
                </div>
            </div>
        </div>
        <div id="calendar">

        </div>
    </div>
</div>