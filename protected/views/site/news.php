<?php
    
?>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="articles-icon"></i> <span>Новости компании</span>
        </div>
        <?= $this->renderPartial('application.components.views.calendar') ?>
    </div>
    <div class="news-list page-content-wrap">
        
        <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$model->search(),
            'itemView'=>'_news',
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
</div>