<?php
    
    $roles = Role::items();

?>

<script>
    $(document).ready(function(){
        $('input[name="user-role"]').on('change', function(e) {
            $('#User_role').val($(this).val());
            $('#user-grid').yiiGridView('update', {
                data: $('#filterForm').serialize()
            });
        });
    });
</script>

<div class="container">
    <div class="clearfix">
        <div class="section-title">
            <i class="logs-news-icon"></i> <span>СПИСОК ПОЛЬЗОВАТЕЛЕЙ СИСТЕМЫ</span>
        </div>
        <!-- todo -->
            <!--label class="checkbox-wrap filter-use-wrap">
                <input type="checkbox" name="use-filter"/>
                Использовать фильтры
            </label-->
        <!-- -->
        <?php if ( $this->role->opt_role_create ): ?>
            <?= CHtml::link('Создать пользователя', array('create'), array(
                'class'=>'custom-btn faIndexButton',
            )) ?>
        <?php endif; ?>
    </div>
    <div class="full-width-content">
        <!-- todo -->
            <form class="data-header hide-filter-wrap clearfix" id="filterForm">
                <?= CHtml::hiddenField('User[role]', '') ?>
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
        
        <div class="clearfix list-filter-wrap">
            
            <div class="list-filter-block">
                <form method="post" class="list-filter-items" id="fa_roles">
                    <label class="list-filter-item">
                        <input type="radio" name="user-role" value="">
                        Все
                    </label>
                    <?php foreach ( $roles as $role ): ?>
                        <label class="list-filter-item">
                            <input type="radio" name="user-role" value="<?= $role['id'] ?>">
                            <?= $role['value'] ?>
                        </label>
                    <?php endforeach; ?>
                </form>
            </div>
            
            <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'user-grid',
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
                    'class'=>'users-table-wrap logs-table-wrap dataTables_wrapper right-table-style',
                ),
                'columns'=>array(
                    array(
                        'name'=>'date_create',
                        'value'=>'Yii::app()->dateFormatter->format("dd.MM.yyyy", $data->date_create)',
                    ),
                    array(
                        'name'=>'login',
                    ),
                    array(
                        'header'=>'ФИО',
                        'name'=>'surname',
                        'value'=>'$data->_fio',
                    ),
                    array(
                        'name'=>'office_id',
                        'value'=>'$data->office->name',
                        'sortable'=>false,
                    ),
                    array(
                        'header'=>'Телефон',
                        'name'=>'phone',
                        'value'=>'$data->_phone',
                        'sortable'=>false,
                    ),
                    array(
                        'name'=>'active',
                        'value'=>'$data->_active',
                    ),
                    array(
                        'header'=>'Последняя активность',
                        'value'=>'$data->_activity',
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
</div>


