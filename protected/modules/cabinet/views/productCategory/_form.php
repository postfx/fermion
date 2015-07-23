<?php

    

?>

<script>
    $(document).ready(function(){
        
    });
</script>

<?php $form=$this->beginWidget('CActiveForm', array(
    //'action'=>array('site/signup'),
    'id'=>'productCategory-form',
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

    <div class="enter-form-row">
        <?= $form->labelEx($model,'name'); ?>
        <?= $form->textField($model,'name'); ?>
        <?= $form->error($model,'name'); ?>
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
        <label for="ProductCategory__images" class="required">Изображение<?= ( $model->isNewRecord ) ? ' <span class="required">*</span>' : '' ?></label>
        <?php if ( !$model->isNewRecord && strlen($model->img)!=0 ): ?>
            <div>
                <div>
                    <?= $model->_img ?>
                </div>
                <div class="help-block">
                    Выбор нового изображения удалит существующее.
                </div>
                <br />
            </div>
        <?php endif; ?>
        <div class="input-file-wrap">
            <?= $form->fileField($model, '_images[]', array(
                'data-browse'=>'Добавить',
                'required'=>($model->isNewRecord)?'required':null,
            )) ?>
        </div>
        <?= $form->error($model,'_images[]'); ?>
    </div>

    <div class="enter-form-row">
        <?= $form->labelEx($model,'zIndex'); ?>
        <?= $form->textField($model,'zIndex'); ?>
        <?= $form->error($model,'zIndex'); ?>
        <div class="help-block">Чем меньше это значение, тем первее будет расположена категория.</div>
    </div>

    <div class="enter-form-row">
        <?= $form->labelEx($model,'video'); ?>
        <?= $form->textField($model,'video'); ?>
        <?= $form->error($model,'video'); ?>
        <div class="help-block">Ссылка на видео (youtube).</div>
    </div>

    <div class="enter-form-row">
        <?= CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array(
            'class'=>'custom-btn-gray',
        )); ?>
    </div>

<?php $this->endWidget(); ?>