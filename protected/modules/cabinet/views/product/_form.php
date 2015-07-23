<?php

    

?>

<script>
    $(document).ready(function(){
        
    });
</script>

<?php $form=$this->beginWidget('CActiveForm', array(
    //'action'=>array('site/signup'),
    'id'=>'product-form',
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
                <?= /*$model->getAttributeLabel('active')*/'Активный товар' ?>
            </label>
            <?= $form->error($model,'active'); ?>
        </div>
    </div>

    <div class="clearfix">
        <div class="fl">
            <div class="enter-form-row">
                <?= $form->labelEx($model,'name'); ?>
                <?= $form->textField($model,'name'); ?>
                <?= $form->error($model,'name'); ?>
            </div>
            <div class="enter-form-row">
                <?= $form->labelEx($model,'article'); ?>
                <?= $form->textField($model,'article'); ?>
                <?= $form->error($model,'article'); ?>
            </div>
            <div class="enter-form-row data-header">
                <?= $form->labelEx($model,'category_id'); ?>
                <div class="select-wrap">
                    <?= $form->dropDownList($model,'category_id',CHtml::listData(ProductCategory::items(), 'id', 'value')); ?>
                </div>
                <?= $form->error($model,'category_id'); ?>
            </div>
            <div class="enter-form-row">
                <?= $form->labelEx($model,'price'); ?>
                <?= $form->textField($model,'price'); ?>
                <?= $form->error($model,'price'); ?>
            </div>
            <div class="enter-form-row">
                <?= $form->labelEx($model,'points'); ?>
                <?= $form->textField($model,'points'); ?>
                <?= $form->error($model,'points'); ?>
            </div>
            <div class="enter-form-row">
                <?= $form->labelEx($model,'countBasket'); ?>
                <?= $form->textField($model,'countBasket'); ?>
                <?= $form->error($model,'countBasket'); ?>
            </div>
            <div class="enter-form-row">
                <?= $form->labelEx($model,'shelfLife'); ?>
                <?= $form->textField($model,'shelfLife'); ?>
                <?= $form->error($model,'shelfLife'); ?>
            </div>
        </div>
        <div class="fl ml40">
            <div class="enter-form-row">
                <?= $form->labelEx($model,'countPack'); ?>
                <?= $form->textField($model,'countPack'); ?>
                <?= $form->error($model,'countPack'); ?>
            </div>
            <div class="enter-form-row">
                <?= $form->labelEx($model,'countPack_unit'); ?>
                <?= $form->textField($model,'countPack_unit'); ?>
                <?= $form->error($model,'countPack_unit'); ?>
            </div>
            <div class="enter-form-row">
                <?= $form->labelEx($model,'packSize'); ?>
                <?= $form->textField($model,'packSize'); ?>
                <?= $form->error($model,'packSize'); ?>
            </div>
            <div class="enter-form-row">
                <?= $form->labelEx($model,'weight'); ?>
                <?= $form->textField($model,'weight'); ?>
                <?= $form->error($model,'weight'); ?>
            </div>
            <div class="enter-form-row">
                <?= $form->labelEx($model,'weight_unit'); ?>
                <?= $form->textField($model,'weight_unit'); ?>
                <?= $form->error($model,'weight_unit'); ?>
            </div>
            <div class="enter-form-row">
                <?= $form->labelEx($model,'volume'); ?>
                <?= $form->textField($model,'volume'); ?>
                <?= $form->error($model,'volume'); ?>
            </div>
            <div class="enter-form-row">
                <?= $form->labelEx($model,'volume_unit'); ?>
                <?= $form->textField($model,'volume_unit'); ?>
                <?= $form->error($model,'volume_unit'); ?>
            </div>
        </div>
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

    <div class="clearfix">
        <div class="fl">
            <div class="enter-form-row">
                <?= $form->labelEx($model,'ingredients'); ?>
                <?= $form->textArea($model,'ingredients',array('rows'=>6, 'cols'=>50, 'class'=>'tiny-field')); ?>
            </div>
        </div>
        <div class="fl ml40">
            <div class="enter-form-row">
                <?= $form->labelEx($model,'structure'); ?>
                <?= $form->textArea($model,'structure',array('rows'=>6, 'cols'=>50, 'class'=>'tiny-field')); ?>
            </div>
        </div>
    </div>

    <div class="enter-form-row">
        <?= $form->labelEx($model,'_images[]'); ?>
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
            )) ?>
        </div>
        <?= $form->error($model,'_images[]'); ?>
    </div>

    <div class="enter-form-row">
        <?= $form->labelEx($model,'video'); ?>
        <?= $form->textField($model,'video'); ?>
        <?= $form->error($model,'video'); ?>
        <div class="help-block">Ссылка на видео (youtube).</div>
    </div>

    <!-- todo deliveryType -->

    <div class="enter-form-row">
        <?= CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array(
            'class'=>'custom-btn-gray',
        )); ?>
    </div>

<?php $this->endWidget(); ?>