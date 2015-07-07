<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id'=>'user-form',
    'enableAjaxValidation'=>false,
    'layout' => BsHtml::FORM_LAYOUT_HORIZONTAL,
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnChange'=>true,
        'validateOnSubmit'=>true,
    ),
    'htmlOptions'=>array(
        //'enctype'=>'multipart/form-data',
    ),
)); ?>

    <?= $form->errorSummary($model); ?>    
    <fieldset>
    
        <?= $form->textFieldControlGroup($model,'login',array('maxlength'=>64)); ?>
        <?= $form->textFieldControlGroup($model,'password',array(
            'maxlength'=>16,
            'help'=>(!$model->isNewRecord)?'Заполняйте это поле только если хотите изменить пароль.':'',
        )); ?>
        <?= $form->dropDownListControlGroup($model,'role', $model::$roles); ?>
        <?= $form->textFieldControlGroup($model,'name',array('maxlength'=>64)); ?>
        <?= $form->textFieldControlGroup($model,'time_rest_day1'); ?>
        <?= $form->textFieldControlGroup($model,'time_rest_day2'); ?>
        <?= $form->textFieldControlGroup($model,'time_rest_day3'); ?>
        <?= $form->textFieldControlGroup($model,'time_rest_day4'); ?>
        <?= $form->textFieldControlGroup($model,'time_rest_day5'); ?>
        <?= $form->textFieldControlGroup($model,'time_rest_day6'); ?>
        <?= $form->textFieldControlGroup($model,'time_rest_day7'); ?>
        <?= $form->textFieldControlGroup($model,'time_work_day1'); ?>
        <?= $form->textFieldControlGroup($model,'time_work_day2'); ?>
        <?= $form->textFieldControlGroup($model,'time_work_day3'); ?>
        <?= $form->textFieldControlGroup($model,'time_work_day4'); ?>
        <?= $form->textFieldControlGroup($model,'time_work_day5'); ?>
        <?= $form->textFieldControlGroup($model,'time_work_day6'); ?>
        <?= $form->textFieldControlGroup($model,'time_work_day7'); ?>
        
    </fieldset>

    <?= BsHtml::formActions(array(
        BsHtml::resetButton('Сброс', array(
            'color' => BsHtml::BUTTON_COLOR_WARNING,
            'icon' => BsHtml::GLYPHICON_REFRESH,
        )),
        BsHtml::submitButton('Готово', array(
            'color' => BsHtml::BUTTON_COLOR_SUCCESS,
            'icon' => BsHtml::GLYPHICON_OK,
        )),
    ), array('class'=>'form-actions')); ?>    

<?php $this->endWidget(); ?>
