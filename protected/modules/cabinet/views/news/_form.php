<?php

    

?>

<script>
    $(document).ready(function(){
        $( "#News_date_begin" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 2,
            onClose: function( selectedDate ) {
                $("#News_date_end").datepicker("option", "minDate", selectedDate);
            }
        });
        
        $( "#News_date_end" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 2,
            onClose: function( selectedDate ) {
                $( "#News_date_begin" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
    });
</script>

<?php $form=$this->beginWidget('CActiveForm', array(
    //'action'=>array('site/signup'),
    'id'=>'news-form',
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

    <div class="enter-section-text">
        поля помеченные <span>*</span>, обязательны для заполнения
    </div>

    <?= $form->errorSummary($model, null, null, array(
        'class'=>'error-message',
    )) ?>

    <div class="enter-form-row checkbox-wrap">
        <div class="fl">
            <label class="checkbox-wrap">
                <?= $form->checkBox($model,'active'); ?>
                <?= /*$model->getAttributeLabel('active')*/'Активная новость' ?>
            </label>
            <?= $form->error($model,'active'); ?>
        </div>
        <div class="fl ml40">
            <label class="checkbox-wrap">
                <?= $form->checkBox($model,'show_index'); ?>
                <?= /*$model->getAttributeLabel('active')*/'Отображать на главной' ?>
            </label>
            <?= $form->error($model,'show_index'); ?>
        </div>
    </div>

    <div class="enter-form-row">
        <div class="enter-form-row">
            <label>
                Период действия новости <span>*</span>
            </label>
            <div class="event-date-wrap">
                <span class="label">Начало</span>
                <div class="inline">
                    <?= $form->textField($model,'date_begin'); ?>
                </div>
                <span class="label">Конец</span>
                <div class="inline">
                    <?= $form->textField($model,'date_end'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="enter-form-row data-header">
        <?= $form->labelEx($model,'category_id'); ?>
        <div class="select-wrap">
            <?= $form->dropDownList($model,'category_id',CHtml::listData(NewsCategory::items(), 'id', 'value')); ?>
        </div>
        <?= $form->error($model,'category_id'); ?>
    </div>

    <div class="enter-form-row">
        <?= $form->labelEx($model,'title'); ?>
        <?= $form->textField($model,'title'); ?>
        <?= $form->error($model,'title'); ?>
    </div>
    <div class="enter-form-row">
        <?= $form->labelEx($model,'desc'); ?>
        <?= $form->textArea($model,'desc',array('rows'=>6, 'cols'=>50, 'class'=>'tiny-field')); ?>
        <?php /* $form->error($model,'desc');*/ ?>
    </div>
    <div class="enter-form-row">
        <?= $form->labelEx($model,'text'); ?>
        <?= $form->textArea($model,'text',array('rows'=>6, 'cols'=>50, 'class'=>'tiny-field')); ?>
        <?php /* $form->error($model,'text');*/ ?>
    </div>

    <div class="enter-form-row">
        <?= $form->labelEx($model,'_images[]'); ?>
        <?php if ( !$model->isNewRecord && strlen($model->img)!=0 ): ?>
            <div>
                <div>
                    <?= $model->_img ?>
                </div>
                <div>
                    Выбор нового изображения удалит существующее.
                </div>
                <br />
            </div>
        <?php endif; ?>
        <div class="input-file-wrap">
            <?= $form->fileField($model, '_images[]', array(
                'data-browse'=>'Добавить',
            )) ?>
        </div>
        <?= $form->error($model,'_images[]'); ?>
    </div>

    <div class="enter-form-row">
        <?= CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array(
            'class'=>'custom-btn-gray',
        )); ?>
    </div>

<?php $this->endWidget(); ?>