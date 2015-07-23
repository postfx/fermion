<?php

    

?>

<script>
    $(document).ready(function(){
        
    });
</script>

<?php $form=$this->beginWidget('CActiveForm', array(
    //'action'=>array('site/signup'),
    'id'=>'feedbackQuestion-form',
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
        <?= $form->labelEx($model,'text'); ?>
        <?= $form->textField($model,'text'); ?>
        <?= $form->error($model,'text'); ?>
    </div>

    <div class="enter-form-row">
        <?= $form->labelEx($model,'zIndex'); ?>
        <?= $form->textField($model,'zIndex'); ?>
        <?= $form->error($model,'zIndex'); ?>
        <div class="help-block">Чем меньше это значение, тем первее будет расположена категория.</div>
    </div>

    <div class="enter-form-row">
        <?= CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array(
            'class'=>'custom-btn-gray',
        )); ?>
    </div>

<?php $this->endWidget(); ?>