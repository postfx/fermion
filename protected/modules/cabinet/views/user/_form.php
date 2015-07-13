<?php

    

?>

<script>
    $(document).ready(function(){
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
        <?php if ( $model->isNewRecord ): ?>
            $('#User_country_id').trigger('change');
        <?php endif; ?>
        
        // todo - render office_id  on change location
    });
</script>

<?php $form=$this->beginWidget('CActiveForm', array(
    //'action'=>array('site/signup'),
    'id'=>'user-form',
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
        //'enctype'=>'multipart/form-data',
    ),
)); ?>

    <div class="enter-section-text">
        поля помеченные <span>*</span>, обязательны для заполнения
    </div>

    <?= $form->errorSummary($model, null, null, array(
        'class'=>'error-message',
    )) ?>

    <div class="enter-form-row checkbox-wrap">
        <label class="checkbox-wrap">
            <?= $form->checkBox($model,'active'); ?>
            <?= /*$model->getAttributeLabel('active')*/'Активный пользователь' ?>
        </label>
        <?= $form->error($model,'active'); ?>
    </div>

    <div class="clearfix">
        <div class="fl">
            <div class="enter-form-row">
                <?= $form->labelEx($model,'surname'); ?>
                <?= $form->textField($model,'surname'); ?>
                <?= $form->error($model,'surname'); ?>
            </div>

            <div class="enter-form-row">
                <?= $form->labelEx($model,'name'); ?>
                <?= $form->textField($model,'name'); ?>
                <?= $form->error($model,'name'); ?>
            </div>

            <div class="enter-form-row">
                <?= $form->labelEx($model,'patronymic'); ?>
                <?= $form->textField($model,'patronymic'); ?>
                <?= $form->error($model,'patronymic'); ?>
            </div>
        </div>
        <div class="fl ml40">
            <div class="enter-form-row data-header">
                <?= $form->labelEx($model, 'country_id') ?>
                <div class="select-wrap">
                    <?= $form->dropDownList($model, 'country_id', CHtml::listData(Country::model()->findAllByPk(3159), 'id', 'name')) ?>
                </div>
                <?= $form->error($model, 'country_id') ?>
            </div>
            <div class="enter-form-row data-header">
                <?= $form->labelEx($model, 'region_id') ?>
                <div class="select-wrap">
                    <?= $form->dropDownList($model, 'region_id', ($model->isNewRecord) ? array(''=>'') : CHtml::listData(Region::items($model->country_id), 'id', 'value') ) ?>
                </div>
                <?= $form->error($model, 'region_id') ?>
            </div>
            <div class="enter-form-row data-header">
                <?= $form->labelEx($model, 'city_id') ?>
                <div class="select-wrap">
                    <?= $form->dropDownList($model, 'city_id', ($model->isNewRecord) ? array(''=>'') : CHtml::listData(City::items($model->region_id), 'id', 'value') ) ?>
                </div>
                <?= $form->error($model, 'city_id') ?>
            </div>
        </div>
        <div class="fl ml40">
            <div class="enter-form-row">
                <?= $form->labelEx($model,'postcode'); ?>
                <?= $form->textField($model,'postcode'); ?>
                <?= $form->error($model,'postcode'); ?>
            </div>

            <div class="enter-form-row">
                <?= $form->labelEx($model,'address'); ?>
                <?= $form->textField($model,'address'); ?>
                <?= $form->error($model,'address'); ?>
            </div>
        </div>
    </div>

    <div class="clearfix">
        <div class="fl">
            <div class="enter-form-row data-header">
                <?= $form->labelEx($model,'role'); ?>
                <div class="select-wrap">
                    <?= $form->dropDownList($model, 'role', CHtml::listData(Role::items(), 'id', 'value')) ?>
                </div>
                <?= $form->error($model,'role'); ?>
            </div>
            <div class="enter-form-row">
                <?= $form->labelEx($model,'login'); ?>
                <?= $form->textField($model,'login'); ?>
                <?= $form->error($model,'login'); ?>
            </div>
            <div class="enter-form-row">
                <?= $form->labelEx($model,'pass'); ?>
                <?= $form->passwordField($model,'pass'); ?>
                <?= $form->error($model,'pass'); ?>
            </div>
            <div class="enter-form-row">
                <?= $form->labelEx($model,'passR'); ?>
                <?= $form->passwordField($model,'passR'); ?>
                <?= $form->error($model,'passR'); ?>
            </div>
        </div>
        <div class="fl ml40">
            <div class="enter-form-row data-header">
                <?= $form->labelEx($model,'office_id'); ?>
                <div class="select-wrap">
                    <?= $form->dropDownList($model, 'office_id', CHtml::listData(Office::items(), 'id', 'value')) ?>
                </div>
                <?= $form->error($model,'office_id'); ?>
                <a href="javascript:void(0)" class="custom-link fa_custom-link">Добавить</a>
            </div>
            <div class="enter-form-row">
                <?= $form->labelEx($model,'phone'); ?>
                <?= $form->textField($model,'phone'); ?>
                <?= $form->error($model,'phone'); ?>
            </div>
            <div class="enter-form-row">
                <?= $form->labelEx($model,'phoneHome'); ?>
                <?= $form->textField($model,'phoneHome'); ?>
                <?= $form->error($model,'phoneHome'); ?>
            </div>
            <div class="enter-form-row">
                <?= $form->labelEx($model,'skype'); ?>
                <?= $form->textField($model,'skype'); ?>
                <?= $form->error($model,'skype'); ?>
            </div>
        </div>
    </div>

    <div class="enter-form-row">
        <?= $form->labelEx($model,'info'); ?>
        <?= $form->textArea($model,'info',array('rows'=>6, 'cols'=>50, 'class'=>'tiny-field')); ?>
        <?= $form->error($model,'info'); ?>
    </div>

    <hr />
    
    <div class="clearfix">
        <div class="fl">
            <div class="enter-form-row">
                <?= $form->labelEx($model,'passport_num'); ?>
                <?= $form->textField($model,'passport_num'); ?>
                <?= $form->error($model,'passport_num'); ?>
            </div>
            <div class="enter-form-row">
                <?= $form->labelEx($model,'passport_date'); ?>
                <?= $form->textField($model,'passport_date', array(
                    'class'=>'datepicker-birth',
                )); ?>
                <?= $form->error($model,'passport_date'); ?>
            </div>
            <div class="enter-form-row">
                <?= $form->labelEx($model,'passport_issuingAuthority'); ?>
                <?= $form->textField($model,'passport_issuingAuthority'); ?>
                <?= $form->error($model,'passport_issuingAuthority'); ?>
            </div>
        </div>
        <div class="fl ml40">
            <div class="enter-form-row">
                <?= $form->labelEx($model,'date_birthday'); ?>
                <?= $form->textField($model,'date_birthday', array(
                    'class'=>'datepicker-birth',
                )); ?>
                <?= $form->error($model,'date_birthday'); ?>
            </div>
        </div>
    </div>
    
    <hr />
    
    <div class="clearfix">
        <div class="fl">
            <div class="enter-form-row">
                <?= $form->labelEx($model,'balance'); ?>
                <?= $form->textField($model,'balance'); ?>
                <?= $form->error($model,'balance'); ?>
            </div>
            <div class="enter-form-row">
                <?= $form->labelEx($model,'points'); ?>
                <?= $form->textField($model,'points'); ?>
                <?= $form->error($model,'points'); ?>
            </div>
        </div>
    </div>

    <div class="enter-form-row">
        <?= CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array(
            'class'=>'custom-btn-gray',
        )); ?>
    </div>

<?php $this->endWidget(); ?>