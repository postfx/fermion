<?php
    $c = $this->config;
?>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="key-icon"></i> <span>Восстановление пароля</span>
        </div>
    </div>
    <div class="page-content-wrap">
        <div class="recovery-form">
            <?php $form=$this->beginWidget('CActiveForm', array(
                'action'=>array('site/newPassword'),
                'id'=>'newPassword-form',
                'enableAjaxValidation'=>true,
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                    'validateOnChange'=>false,
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
                    'class'=>'custom-form',
                ),
            )); ?>

                <div>
                    <?= $form->labelEx($model, 'pass', array(
                        'class'=>'form-text',
                    )) ?>
                    <?= $form->passwordField($model, 'pass', array(
                        'placeHolder'=>$model->getAttributeLabel('pass'),
                    )) ?>
                    <?= $form->error($model, 'pass') ?>
                </div>

                <div>
                    <?= $form->labelEx($model, 'passR', array(
                        'class'=>'form-text',
                    )) ?>
                    <?= $form->passwordField($model, 'passR', array(
                        'placeHolder'=>$model->getAttributeLabel('passR'),
                    )) ?>
                    <?= $form->error($model, 'passR') ?>
                </div>
            
                <?= CHtml::hiddenField('hash', Yii::app()->request->getParam('hash')) ?>

                <div>
                    <?= CHtml::submitButton('Продолжить', array(
                        'class'=>'custom-btn-gray',
                    )) ?>
                </div>

            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>