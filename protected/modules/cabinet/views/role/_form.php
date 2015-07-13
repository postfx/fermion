<?php

    

?>

<?php $form=$this->beginWidget('CActiveForm', array(
    //'action'=>array('site/signup'),
    'id'=>'role-form',
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

    <div class="enter-form-row">
        <?= $form->labelEx($model,'zIndex'); ?>
        <?= $form->textField($model,'zIndex'); ?>
        <?= $form->error($model,'zIndex'); ?>
    </div>

    <div class="enter-form-row">
        <?= $form->labelEx($model,'name'); ?>
        <?= $form->textField($model,'name',array('size'=>32,'maxlength'=>32)); ?>
        <?= $form->error($model,'name'); ?>
    </div>

    <div class="enter-form-row">
        <?= $form->labelEx($model,'name_genitive'); ?>
        <?= $form->textField($model,'name_genitive',array('size'=>32,'maxlength'=>32)); ?>
        <?= $form->error($model,'name_genitive'); ?>
    </div>

    <div class="enter-form-row checkbox-wrap">
        <label class="checkbox-wrap">
            <?= $form->checkBox($model,'active'); ?>
            <?= /*$model->getAttributeLabel('active')*/'Активная роль' ?>
        </label>
        <?= $form->error($model,'active'); ?>
    </div>

    <div class="enter-form-row">
        <label>
            Набор прав <span>*</span>
        </label>
        <div class="permissions-table">
            <?= $model->getPerimssionsTable($form) ?>
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