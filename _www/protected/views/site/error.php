<?php
	$this->pageTitle=Yii::app()->name;
?>
<h1>Ошибка <?php echo $code; ?></h1>
<div>
<?php echo CHtml::encode($message); ?>
</div>
