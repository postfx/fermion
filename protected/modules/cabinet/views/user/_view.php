<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('login')); ?>:</b>
	<?php echo CHtml::encode($data->login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('balance')); ?>:</b>
	<?php echo CHtml::encode($data->balance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('points')); ?>:</b>
	<?php echo CHtml::encode($data->points); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skype')); ?>:</b>
	<?php echo CHtml::encode($data->skype); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('surname')); ?>:</b>
	<?php echo CHtml::encode($data->surname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('patronymic')); ?>:</b>
	<?php echo CHtml::encode($data->patronymic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_create')); ?>:</b>
	<?php echo CHtml::encode($data->date_create); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_update')); ?>:</b>
	<?php echo CHtml::encode($data->date_update); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_activity')); ?>:</b>
	<?php echo CHtml::encode($data->date_activity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('role')); ?>:</b>
	<?php echo CHtml::encode($data->role); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hash')); ?>:</b>
	<?php echo CHtml::encode($data->hash); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deliveryPoint_id')); ?>:</b>
	<?php echo CHtml::encode($data->deliveryPoint_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('referer_id')); ?>:</b>
	<?php echo CHtml::encode($data->referer_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_birthday')); ?>:</b>
	<?php echo CHtml::encode($data->date_birthday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('passport_num')); ?>:</b>
	<?php echo CHtml::encode($data->passport_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('passport_date')); ?>:</b>
	<?php echo CHtml::encode($data->passport_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('passport_issuingAuthority')); ?>:</b>
	<?php echo CHtml::encode($data->passport_issuingAuthority); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phoneHome')); ?>:</b>
	<?php echo CHtml::encode($data->phoneHome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('office_id')); ?>:</b>
	<?php echo CHtml::encode($data->office_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('info')); ?>:</b>
	<?php echo CHtml::encode($data->info); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alert_news')); ?>:</b>
	<?php echo CHtml::encode($data->alert_news); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alert_products')); ?>:</b>
	<?php echo CHtml::encode($data->alert_products); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alert_events')); ?>:</b>
	<?php echo CHtml::encode($data->alert_events); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alert_promo')); ?>:</b>
	<?php echo CHtml::encode($data->alert_promo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alert_balance')); ?>:</b>
	<?php echo CHtml::encode($data->alert_balance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country_id')); ?>:</b>
	<?php echo CHtml::encode($data->country_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('region_id')); ?>:</b>
	<?php echo CHtml::encode($data->region_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_id')); ?>:</b>
	<?php echo CHtml::encode($data->city_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('postcode')); ?>:</b>
	<?php echo CHtml::encode($data->postcode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	*/ ?>

</div>