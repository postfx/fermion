<?php
    
    

?>

<script>
    $(document).ready(function(){
        
    });
</script>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="logs-news-icon"></i> <span>ЖУРНАЛ АДМИНИСТРАТИВНЫХ ЕДИНИЦ</span>
        </div>
        <!-- todo -->
            <!--label class="checkbox-wrap filter-use-wrap">
                <input type="checkbox" name="use-filter"/>
                Использовать фильтры
            </label-->
        <!-- -->
        <?php if ( $this->role->opt_role_create ): ?>
            <?= CHtml::link('Создать место', array('create'), array(
                'class'=>'custom-btn faIndexButton',
            )) ?>
        <?php endif; ?>
    </div>
    <div class="full-width-content">
        <!-- todo -->
            <form class="data-header hide-filter-wrap clearfix" id="filterForm">
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
            'id'=>'office-grid',
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
                'class'=>'users-table-wrap logs-table-wrap dataTables_wrapper',
            ),
            'columns'=>array(
                array(
                    'name'=>'date_create',
                    'value'=>'Yii::app()->dateFormatter->format("dd.MM.yyyy", $data->date_create)',
                ),
                array(
                    'name'=>'name',
                ),
                array(
                    'name'=>'desc',
                    'value'=>'$data->_desc',
                    'sortable'=>false,
                ),
                array(
                    //'name'=>'office_id',
                    'header'=>'Адрес',
                    'value'=>'$data->_address',
                    'sortable'=>false,
                ),
                array(
                    //'name'=>'office_id',
                    'header'=>'Время работы',
                    'value'=>'$data->_workingHours',
                    'sortable'=>false,
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


