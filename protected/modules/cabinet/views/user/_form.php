<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textField($model,'login',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'login'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'balance'); ?>
		<?php echo $form->textField($model,'balance'); ?>
		<?php echo $form->error($model,'balance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'points'); ?>
		<?php echo $form->textField($model,'points'); ?>
		<?php echo $form->error($model,'points'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'skype'); ?>
		<?php echo $form->textField($model,'skype',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'skype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'surname'); ?>
		<?php echo $form->textField($model,'surname',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'surname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'patronymic'); ?>
		<?php echo $form->textField($model,'patronymic',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'patronymic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_create'); ?>
		<?php echo $form->textField($model,'date_create'); ?>
		<?php echo $form->error($model,'date_create'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_update'); ?>
		<?php echo $form->textField($model,'date_update'); ?>
		<?php echo $form->error($model,'date_update'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_activity'); ?>
		<?php echo $form->textField($model,'date_activity'); ?>
		<?php echo $form->error($model,'date_activity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'role'); ?>
		<?php echo $form->textField($model,'role'); ?>
		<?php echo $form->error($model,'role'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hash'); ?>
		<?php echo $form->textField($model,'hash',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'hash'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deliveryPoint_id'); ?>
		<?php echo $form->textField($model,'deliveryPoint_id'); ?>
		<?php echo $form->error($model,'deliveryPoint_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'referer_id'); ?>
		<?php echo $form->textField($model,'referer_id'); ?>
		<?php echo $form->error($model,'referer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_birthday'); ?>
		<?php echo $form->textField($model,'date_birthday'); ?>
		<?php echo $form->error($model,'date_birthday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'passport_num'); ?>
		<?php echo $form->textField($model,'passport_num',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'passport_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'passport_date'); ?>
		<?php echo $form->textField($model,'passport_date'); ?>
		<?php echo $form->error($model,'passport_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'passport_issuingAuthority'); ?>
		<?php echo $form->textField($model,'passport_issuingAuthority',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'passport_issuingAuthority'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phoneHome'); ?>
		<?php echo $form->textField($model,'phoneHome',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'phoneHome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'office_id'); ?>
		<?php echo $form->textField($model,'office_id'); ?>
		<?php echo $form->error($model,'office_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'info'); ?>
		<?php echo $form->textArea($model,'info',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'info'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alert_news'); ?>
		<?php echo $form->textField($model,'alert_news'); ?>
		<?php echo $form->error($model,'alert_news'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alert_products'); ?>
		<?php echo $form->textField($model,'alert_products'); ?>
		<?php echo $form->error($model,'alert_products'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alert_events'); ?>
		<?php echo $form->textField($model,'alert_events'); ?>
		<?php echo $form->error($model,'alert_events'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alert_promo'); ?>
		<?php echo $form->textField($model,'alert_promo'); ?>
		<?php echo $form->error($model,'alert_promo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alert_balance'); ?>
		<?php echo $form->textField($model,'alert_balance'); ?>
		<?php echo $form->error($model,'alert_balance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country_id'); ?>
		<?php echo $form->textField($model,'country_id'); ?>
		<?php echo $form->error($model,'country_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'region_id'); ?>
		<?php echo $form->textField($model,'region_id'); ?>
		<?php echo $form->error($model,'region_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city_id'); ?>
		<?php echo $form->textField($model,'city_id'); ?>
		<?php echo $form->error($model,'city_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'postcode'); ?>
		<?php echo $form->textField($model,'postcode',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'postcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->