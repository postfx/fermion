<?php
    
?>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="logs-news-icon"></i> <span>Список товаров</span>
        </div>
        <!-- todo -->
            <!--label class="checkbox-wrap filter-use-wrap">
                <input type="checkbox" name="use-filter"/>
                Использовать фильтры
            </label-->
        <!-- -->
        <?php if ( $this->role->opt_product_create ): ?>
            <?= CHtml::link('Создать товар', array('create'), array(
                'class'=>'custom-btn faIndexButton',
            )) ?>
        <?php endif; ?>
    </div>
    <div class="full-width-content">
        <!-- todo -->
            <form class="data-header hide-filter-wrap clearfix">
                <div class="filters-col">
                    <label>
                        Активность
                    </label>
                    <div class="select-wrap">
                        <select name="activity">
                            <option>Активно</option>
                            <option>Не активно</option>
                            <option>Архив</option>
                            <option>Все</option>
                        </select>
                    </div>
                </div>
                <div class="filters-col date-filters-col">
                    <label>
                        Дата создания
                    </label>
                    <div class="date-filter">
                        <div>
                            <span>от</span> <input type="text" name="date-start" id="datepicker-start">
                        </div>
                        <div>
                            <span>до</span> <input type="text" name="date-start" id="datepicker-end">
                        </div>
                    </div>
                </div>
                <div class="filters-col">
                    <label>
                        Категории
                    </label>
                    <div class="select-wrap">
                        <select name="category">
                            <option>Активно</option>
                            <option>Акция</option>
                            <option>Событие</option>
                            <option>Все</option>
                        </select>
                    </div>
                </div>
                <div class="filters-col">
                    <label>
                        Поиск по содержанию
                    </label>
                    <div class="date-filter" id="browserFilter">
                        <input type="text" name="search-filter">
                    </div>
                    <div class="clearfix">
                        <input type="submit" class="custom-btn" value="Применить">
                    </div>
                </div>
            </form>
        <!-- -->
        
        <?php if ( Yii::app()->user->getFlash('success_create')===true ): ?>
            <div class="success-message">
                <p>Новая запись создана</p>
            </div>
        <?php endif; ?>
        <?php if ( Yii::app()->user->getFlash('success_update')===true ): ?>
            <div class="success-message">
                <p>Запись обновлена</p>
            </div>
        <?php endif; ?>
        
        <?php $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider'=>$model->search(),
            //'filter'=>$model,
            'template'=>'{items}{pager}',
            'pagerCssClass'=>'dataTables_paginate paging_simple_numbers',
            'pager'=>array(
                'header'=>'',
                'prevPageLabel'=>'<',
                'nextPageLabel'=>'>',
            ),
            'htmlOptions'=>array(
                'class'=>'logs-table-wrap dataTables_wrapper',
            ),
            'columns'=>array(
                'id',
                
                array(
                    'name'=>'date_create',
                    'value'=>'Yii::app()->dateFormatter->format("dd.MM.yyyy", $data->date_create)',
                ),
                array(
                    'name'=>'date_update',
                    'value'=>'Yii::app()->dateFormatter->format("dd.MM.yyyy", $data->date_update)',
                ),
                array(
                    'header'=>'Активность',
                    'name'=>'active',
                    'value'=>'$data->_active',
                ),
                'name',
                array(
                    'name'=>'category_id',
                    'value'=>'CHtml::link($data->category->name, array("/cabinet/productCategory/view", "id"=>$data->category_id))',
                    'sortable'=>false,
                    'type'=>'raw',
                ),
                'price',
                'article',

                array(
                    'name'=>'img', 
                    'value'=>'$data->_img',
                    'type'=>'raw',
                    'htmlOptions'=>array(
                        'class'=>'ta va withImg',
                    ),
                ),
                array(
                    'class'=>'CButtonColumn',
                    'viewButtonImageUrl'=>'/images/icons/watch-icon.png',
                    'updateButtonImageUrl'=>'/images/icons/edit-icon.png',
                    'deleteButtonImageUrl'=>'/images/icons/delete-icon.png',
                    'template'=>'{view} {update} {delete}',
                ),
            ),
        )); ?>
        
    </div>
</div>


