<?php
    
?>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="cat-ico"></i> <span>Редактировать категорию новостей - "<?= CHtml::encode($model->name) ?>"</span>
        </div>
    </div>
    <div class="page-content-wrap border-left-wrap">
        
        <?php $this->renderPartial('_form', array('model'=>$model)); ?>

    </div>
</div>