<?php
    
?>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="products-icon"></i> <span>Продукция</span>
        </div>
        <?= $this->renderPartial('application.components.views.calendar') ?>
    </div>
    <div class="page-content-wrap">
        
        <div class="products-list">
            
            <?php $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$model->search(),
                'itemView'=>'_products',
                'template'=>'{items}{pager}',
                'pagerCssClass'=>'dataTables_paginate paging_simple_numbers',
                'pager'=>array(
                    'header'=>'',
                    'prevPageLabel'=>'<',
                    'nextPageLabel'=>'>',
                ),
                'htmlOptions'=>array(
                    //'class'=>'users-table-wrap logs-table-wrap dataTables_wrapper right-table-style',
                ),
            )); ?>
            
        </div>
        
        <?= CHtml::link('Перейти в каталог продукции', array('site/catalog'), array(
            'class'=>'custom-btn-gray',
        )) ?>
        
    </div>
</div>