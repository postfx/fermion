<?php

    $cs = Yii::app()->clientScript;
    $pt = Yii::app()->homeUrl;
    
    $cs->registerCssFile($pt.'css/jquery.timepicker.css');
    $cs->registerScriptFile($pt.'js/jquery.timepicker.js',CClientScript::POS_END);

?>

<script>
    $(document).ready(function(){
        $('#Office_country_id').change(function(){
            $.ajax({
                url: '/site/_ajax?action=getRegions',
                type: 'POST',
                dataType: 'json',
                data: {
                    country_id: $('#Office_country_id').val()
                },
                success: function(data) {
                    $('#Office_region_id').html('<option value="">Выберите...</option>');
                    for ( var i in data ) {
                        $('#Office_region_id').append('<option value="'+data[i].id+'">'+data[i].value+'</option>');
                    }
                    $('#Office_region_id').trigger('refresh');
                }
            });
        });
        $('#Office_region_id').change(function(){
            $.ajax({
                url: '/site/_ajax?action=getCities',
                type: 'POST',
                dataType: 'json',
                data: {
                    region_id: $('#Office_region_id').val()
                },
                success: function(data) {
                    $('#Office_city_id').html('<option value="">Выберите...</option>');
                    for ( var i in data ) {
                        $('#Office_city_id').append('<option value="'+data[i].id+'">'+data[i].value+'</option>');
                    }
                    $('#Office_city_id').trigger('refresh');
                }
            });
        });
        <?php if ( $model->isNewRecord ): ?>
            $('#Office_country_id').trigger('change');
        <?php endif; ?>
        
        $('#Office_workingHours_begin').timepicker({
            show2400: true,
            timeFormat: 'H:i'
        });
        $('#Office_workingHours_begin').on('changeTime', function() {

        });

        $('#Office_workingHours_end').timepicker({
            show2400: true,
            timeFormat: 'H:i'
        });
        $('#Office_workingHours_end').on('changeTime', function() {

        });
        
    });
</script>

<?php $form=$this->beginWidget('CActiveForm', array(
    //'action'=>array('site/signup'),
    'id'=>'office-form',
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
            <?= $form->checkBox($model,'isDeliveryPoint'); ?>
            <?= $model->getAttributeLabel('isDeliveryPoint') ?>
        </label>
        <?= $form->error($model,'active'); ?>
    </div>

    <div class="clearfix">
        <div class="fl">
            <div class="enter-form-row">
                <?= $form->labelEx($model,'name'); ?>
                <?= $form->textField($model,'name'); ?>
                <?= $form->error($model,'name'); ?>
            </div>
        </div>
        <div class="fl ml40">
            <div class="enter-form-row">
                <label>
                    График работы
                </label>
                <div class="time-wrap">
                    <div class="inlineBlock">
                        <span class="label">c <span class="required">*</span></span>
                        <?= $form->textField($model, 'workingHours_begin', array(
                            'class'=>'small-input numb-only ui-timepicker-input',
                            'autocomplete'=>'off',
                        )) ?>
                        <?= $form->error($model,'workingHours_begin'); ?>
                    </div>
                    <div class="inlineBlock">
                        <span class="label">до <span class="required">*</span></span>
                        <?= $form->textField($model, 'workingHours_end', array(
                            'class'=>'small-input numb-only ui-timepicker-input',
                            'autocomplete'=>'off',
                        )) ?>
                        <?= $form->error($model,'workingHours_end'); ?>
                    </div>
                    <div class="inlineBlock">
                        <span class="label">инфо</span>
                        <?= $form->textField($model,'workingHours_comment'); ?>
                        <?= $form->error($model,'workingHours_comment'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

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

    <div class="enter-form-row clearfix">
        <div class="sub-row">
            <div class="subtitle">
                <?= $form->labelEx($model, 'street') ?>
            </div>
            <?= $form->textField($model,'street'); ?>
            <?= $form->error($model, 'city_id') ?>
        </div>
        <div class="sub-row">
            <div class="subtitle">
                <?= $form->labelEx($model, 'house') ?>
            </div>
            <?= $form->textField($model,'house', array(
                'class'=>'small-input',
            )); ?>
            <?= $form->error($model, 'house') ?>
        </div>
        <div class="sub-row">
            <div class="subtitle">
                <?= $form->labelEx($model, 'office') ?>
            </div>
            <?= $form->textField($model, 'office', array(
                'class'=>'small-input',
            )) ?>
            <?= $form->error($model, 'office') ?>
        </div>
    </div>

    <div class="enter-form-row">
        <?= $form->labelEx($model,'desc'); ?>
        <?= $form->textArea($model,'desc',array('rows'=>6, 'cols'=>50, 'class'=>'tiny-field')); ?>
        <?= $form->error($model,'desc'); ?>
    </div>


    <div class="enter-form-row">
        <?= CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array(
            'class'=>'custom-btn-gray',
        )); ?>
    </div>

<?php $this->endWidget(); ?>