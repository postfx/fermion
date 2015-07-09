<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'login',
		'password',
		'balance',
		'points',
		'phone',
		'skype',
		'surname',
		'name',
		'patronymic',
		'date_create',
		'date_update',
		'date_activity',
		'role',
		'active',
		'hash',
		'deliveryPoint_id',
		'referer_id',
		'date_birthday',
		'passport_num',
		'passport_date',
		'passport_issuingAuthority',
		'phoneHome',
		'office_id',
		'info',
		'alert_news',
		'alert_products',
		'alert_events',
		'alert_promo',
		'alert_balance',
		'country_id',
		'region_id',
		'city_id',
		'postcode',
		'address',
	),
)); ?>
