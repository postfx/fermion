<?php
    $c = $this->config;
    
    $cs = Yii::app()->clientScript;
    $pt = Yii::app()->homeUrl;
    
    $cs->registerScriptFile('https://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU',CClientScript::POS_END);
?>

<script>
    $(document).ready(function(){
        ymaps.ready(init);
        
        var myMap,
            myPlacemark;
        
        function init(){
            myMap = new ymaps.Map("map", {
                center: [50.2591,28.6544],
                zoom: 14,
                controls: []
            });
        
            myPlacemark_1 = new ymaps.Placemark([50.2591,28.6544], { balloonContent: 'Тестовый пункт выдачи.' });
        
            myMap.geoObjects.add(myPlacemark_1);
            myMap.behaviors.disable("scrollZoom");
            myMap.controls.add('zoomControl');
        }
    });
</script>

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
                        <?= $c['phoneInfo'] ?>
                    </div>
                </div>
                <div class="contacts-section">
                    <div class="contacts-header post-header">Адрес для приема почтовой корреспонденции</div>
                    <div class="contacts-descr">
                        <?= $c['addressInfo'] ?>
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
                    <?php if ( Yii::app()->user->getFlash('success_create')!==true ): ?>
                        
                        <?php $form=$this->beginWidget('CActiveForm', array(
                            //'action'=>array('site/signup'),
                            'id'=>'feedback-form',
                            //'focus'=>array($model,'referer_id'),
                            'enableAjaxValidation'=>true,
                            'enableClientValidation'=>true,
                            'clientOptions'=>array(
                                'validateOnChange'=>true,
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
                                'enctype'=>'multipart/form-data',
                            ),
                        )); ?>

                            <?= $form->errorSummary($model, null, null, array(
                                'class'=>'error-message',
                            )) ?>

                            <div class="fa_form-row">
                                <?= $form->labelEx($model, 'fio') ?>
                                <?= $form->textField($model, 'fio', array(
                                    'placeHolder'=>$model->getAttributeLabel('fio'),
                                )) ?>
                                <?= $form->error($model, 'fio') ?>
                            </div>
                            <div class="fa_form-row">
                                <?= $form->labelEx($model, 'email') ?>
                                <?= $form->textField($model, 'email', array(
                                    'placeHolder'=>$model->getAttributeLabel('email'),
                                )) ?>
                                <?= $form->error($model, 'email') ?>
                            </div>
                            <div class="fa_form-row">
                                <?= $form->labelEx($model, 'phone') ?>
                                <?= $form->textField($model, 'phone', array(
                                    'placeHolder'=>$model->getAttributeLabel('phone'),
                                )) ?>
                                <?= $form->error($model, 'phone') ?>
                            </div>
                            <div class="fa_form-row select-wrap">
                                <?= $form->labelEx($model, 'question_id') ?>
                                <?= $form->dropDownList($model, 'question_id', CHtml::listData(array(-1=>array('id'=>null))+FeedbackQuestion::items(), 'id', 'value')) ?>
                                <?= $form->error($model, 'question_id') ?>
                            </div>
                            <div class="fa_form-row">
                                <?= $form->labelEx($model, 'text') ?>
                                <?= $form->textArea($model, 'text', array(
                                    'placeHolder'=>$model->getAttributeLabel('text'),
                                )) ?>
                                <?= $form->error($model, 'text') ?>
                            </div>

                            <div class="text-center">
                                <input type="submit" class="custom-btn-gray" value="Отправить">
                            </div>

                        <?php $this->endWidget(); ?>
                    
                    <?php else: ?>
                    
                        <div class="success-message">
                            <p>Ваш вопрос отправлен администрации.</p>
                        </div>
                    
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>