<?php
    
    $config = $this->config;

?>

<script>
    $(document).ready(function(){
        /*renderGeo();
        $('#User_country_id, #User_region_id, #User_city_id').change(function(){
            renderGeo();
        });*/
        <?php if ( $config['referralSystem'] ): ?>
            $('.reg-continue').on('click', function(){
                setTimeout(function(){
                    if ( $('#User_referer_id_em_').css('display')=='none' ) {
                        $('.reg-section .overlayer').addClass('hidden');
                        $.scrollTo('#_step_2', 300, {offset: -75});
                    }
                }, 400);
            });
        <?php endif; ?>
        
        $('#User_country_id').change(function(){
            $.ajax({
                url: '/site/_ajax?action=getRegions',
                type: 'POST',
                dataType: 'json',
                data: {
                    country_id: $('#User_country_id').val()
                },
                success: function(data) {
                    $('#User_region_id').html('<option value="">Выберите...</option>');
                    for ( var i in data ) {
                        $('#User_region_id').append('<option value="'+data[i].id+'">'+data[i].value+'</option>');
                    }
                    $('#User_region_id').trigger('refresh');
                }
            });
        });
        $('#User_region_id').change(function(){
            $.ajax({
                url: '/site/_ajax?action=getCities',
                type: 'POST',
                dataType: 'json',
                data: {
                    region_id: $('#User_region_id').val()
                },
                success: function(data) {
                    $('#User_city_id').html('<option value="">Выберите...</option>');
                    for ( var i in data ) {
                        $('#User_city_id').append('<option value="'+data[i].id+'">'+data[i].value+'</option>');
                    }
                    $('#User_city_id').trigger('refresh');
                }
            });
        });
        $('#User_country_id').trigger('change');
    });
    
    /*function renderGeo()
    {
        window.config_geo = {
            country_id: $('#User_country_id').val(),
            region_id: $('#User_region_id').val(),
            city_id: $('#User_city_id').val()
        };
        if ( config_geo.country_id.length!=0 ) {
            $.ajax({
                url: '/site/_ajax?action=getRegions',
                type: 'POST',
                dataType: 'json',
                data: {
                    country_id: config_geo.country_id
                },
                success: function(data) {
                    $('#User_region_id').html('<option value="">Выберите...</option>');
                    for ( var i in data ) {
                        $('#User_region_id').append('<option value="'+data[i].id+'">'+data[i].value+'</option>');
                    }
                    $('#User_region_id').trigger('refresh');
                }
            });
        }
    }*/
</script>
<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="people-icon"></i> <span>Регистрация</span>
        </div>
    </div>
    <div class="page-content-wrap border-left-wrap">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'action'=>array('site/signup'),
            'id'=>'signup-form',
            'focus'=>array($model,'referer_id'),
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
                //'enctype'=>'multipart/form-data',
            ),
        )); ?>
            
            <?php if ( $config['referralSystem'] ): ?>
                <div class="reg-section">
                    <div class="reg-section-title">
                        шаг 1
                    </div>
                    <div class="enter-section-text">
                        Введите номер договора (ID) консультанта, который дал вам рекомендацию.<br>
                        Если вы зашли на сайт самостоятельно, позвоните в Компанию по бесплатному номеру  8 (800) 2000-420
                    </div>
                    <div class="reg-field">
                        <?= $form->textField($model, 'referer_id') ?>
                        <?= $form->error($model, 'referer_id') ?>
                    </div>
                    <a href="javascript:void(0)" class="custom-btn-gray reg-continue">Продолжить</a>
                </div>
            <?php endif; ?>
        
            <div class="reg-section" id="_step_2">
                <?php if ( $config['referralSystem'] ): ?>
                    <div class="overlayer"></div>
                    <div class="reg-section-title">
                        шаг 2
                    </div>
                <?php endif; ?>
                <?= $form->errorSummary($model, null, null, array(
                    'class'=>'error-message',
                )) ?>
                <div class="enter-section-text">
                    поля помеченные  <span>*</span> , обязательны для заполнения
                </div>
                <div class="clearfix">
                    <div class="reg-col">
                        <div class="col-title">
                            Паспортные данные
                        </div>
                        <div class="reg-field">
                            <?= $form->labelEx($model, 'surname') ?>
                            <?= $form->textField($model, 'surname') ?>
                            <?= $form->error($model, 'surname') ?>
                        </div>
                        <div class="reg-field">
                            <?= $form->labelEx($model, 'name') ?>
                            <?= $form->textField($model, 'name') ?>
                            <?= $form->error($model, 'name') ?>
                        </div>
                        <div class="reg-field">
                            <?= $form->labelEx($model, 'patronymic') ?>
                            <?= $form->textField($model, 'patronymic') ?>
                            <?= $form->error($model, 'patronymic') ?>
                        </div>
                        <div class="reg-field">
                            <div class="clearfix">
                                <?= $form->labelEx($model, 'date_birthday') ?>
                                <i class="event-reg-icon"></i>
                                <?= $form->textField($model, 'date_birthday', array(
                                    'class'=>'datepicker-birth',
                                )) ?>
                                <?= $form->error($model, 'date_birthday') ?>
                            </div>
                        </div>
                        <div class="reg-field">
                            <?= $form->labelEx($model, 'passport_num') ?>
                            <?= $form->textField($model, 'passport_num') ?>
                            <?= $form->error($model, 'passport_num') ?>
                        </div>
                        <div class="reg-field">  
                            <div class="clearfix">
                                <?= $form->labelEx($model, 'passport_date') ?>
                                <i class="event-reg-icon"></i>
                                <?= $form->textField($model, 'passport_date', array(
                                    'class'=>'datepicker-pass',
                                )) ?>
                                <?= $form->error($model, 'passport_date') ?>
                            </div>
                        </div>
                        <div class="reg-field">
                            <?= $form->labelEx($model, 'passport_issuingAuthority') ?>
                            <?= $form->textField($model, 'passport_issuingAuthority') ?>
                            <?= $form->error($model, 'passport_issuingAuthority') ?>
                        </div>
                    </div>
                    <div class="reg-col">
                        <div class="col-title">
                            Место проживания
                        </div>
                        <div class="reg-field data-header">
                            <?= $form->labelEx($model, 'country_id') ?>
                            <div class="select-wrap">
                                <?= $form->dropDownList($model, 'country_id', CHtml::listData(Country::model()->findAllByPk(3159), 'id', 'name')) ?>
                            </div>
                            <?= $form->error($model, 'country_id') ?>
                        </div>
                        <div class="reg-field data-header">
                            <?= $form->labelEx($model, 'region_id') ?>
                            <div class="select-wrap">
                                <?= $form->dropDownList($model, 'region_id', array(''=>'')) ?>
                            </div>
                            <?= $form->error($model, 'region_id') ?>
                        </div>
                        <div class="reg-field data-header">
                            <?= $form->labelEx($model, 'city_id') ?>
                            <div class="select-wrap">
                                <?= $form->dropDownList($model, 'city_id', array(''=>'')) ?>
                            </div>
                            <?= $form->error($model, 'city_id') ?>
                        </div>
                        <div class="reg-field">
                            <?= $form->labelEx($model, 'postcode') ?>
                            <?= $form->textField($model, 'postcode') ?>
                            <?= $form->error($model, 'postcode') ?>
                        </div>
                        <div class="reg-field">
                            <?= $form->labelEx($model, 'address') ?>
                            <?= $form->textField($model, 'address') ?>
                            <?= $form->error($model, 'address') ?>
                        </div>
                    </div>
                </div>
                <div class="reg-col">
                    <div class="col-title">
                        Контактные данные
                    </div>
                    <div class="reg-field">
                        <?= $form->labelEx($model, 'phone') ?>
                        <?= $form->textField($model, 'phone') ?>
                        <?= $form->error($model, 'phone') ?>
                    </div>
                    <div class="reg-field">
                        <?= $form->labelEx($model, 'phoneHome') ?>
                        <?= $form->textField($model, 'phoneHome') ?>
                        <?= $form->error($model, 'phoneHome') ?>
                    </div>
                </div>
                <div class="reg-col">
                    <div class="col-title">
                        Данные для сайта
                    </div>
                    <div class="reg-field">
                        <?= $form->labelEx($model, 'login') ?>
                        <?= $form->textField($model, 'login') ?>
                        <?= $form->error($model, 'login') ?>
                    </div>
                    <div class="reg-field">
                        <?= $form->labelEx($model, 'pass') ?>
                        <?= $form->passwordField($model, 'pass') ?>
                        <?= $form->error($model, 'pass') ?>
                    </div>
                    <div class="reg-field">
                        <?= $form->labelEx($model, 'passR') ?>
                        <?= $form->passwordField($model, 'passR') ?>
                        <?= $form->error($model, 'passR') ?>
                    </div>
                </div>
                <?= CHtml::submitButton('Регистрация', array(
                    'class'=>'custom-btn-gray',
                )) ?>
            </div>
        <?php $this->endWidget(); ?>

    </div>
</div>