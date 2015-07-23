<?php
    
?>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="cat-ico"></i> <span>Информация на главной</span>
        </div>
    </div>
    <div class="page-content-wrap border-left-wrap">
        
        <?php if ( Yii::app()->user->hasFlash('config') ): ?>
            <div class="success-message">
                <p>Изменения сохранены.</p>
            </div>
        <?php endif; ?>
        
        <?php $form=$this->beginWidget('CActiveForm', array(
            //'action'=>array('site/signup'),
            'id'=>'config-form',
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

            <div class="enter-form-row">
                <?= $form->labelEx($model, 'content_index_1') ?>
                <?php $this->widget('ext.ckeditor.CKEditorWidget', array(
                    'model' => $model,
                    'attribute' => 'content_index_1',
                    'defaultValue' => $model->content_index_1,
                    'config' => array(
                        //'height' => '400px',
                        //'width' => '100%',
                    ),
                )); ?>
            </div>
        
            <br />
        
            <div class="enter-form-row">
                <?= $form->labelEx($model, 'content_index_2') ?>
                <?php $this->widget('ext.ckeditor.CKEditorWidget', array(
                    'model' => $model,
                    'attribute' => 'content_index_2',
                    'defaultValue' => $model->content_index_2,
                    'config' => array(
                        //'height' => '400px',
                        //'width' => '100%',
                    ),
                )); ?>
            </div>

            <div class="enter-form-row">
                <?= CHtml::submitButton('Сохранить изменения', array(
                    'class'=>'custom-btn-gray',
                )); ?>
            </div>

        <?php $this->endWidget(); ?>

    </div>
</div>