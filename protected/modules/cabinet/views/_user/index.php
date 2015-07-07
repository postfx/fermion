<?php
    $this->breadcrumbs[] = 'Список записей';
?>    
    
<?php $this->beginWidget('bootstrap.widgets.BsPanel', array(
    'title' => $this->navigation,
)); ?>

    <div class="buttons_for_panel">
        <?= BsHtml::linkButton('Добавить запись', array(
            'icon' => BsHtml::GLYPHICON_PLUS,
            'color' => BsHtml::BUTTON_COLOR_SUCCESS,
            'url' => array('create'),
        )); ?>
    </div>

    <?php $this->widget('bootstrap.widgets.BsGridView',array(
        'id'=>'user-grid',
        'dataProvider'=>$model->search(),
        'filter'=>$model,
        'type' => BsHtml::GRID_TYPE_HOVER/*. ' ' . BsHtml::GRID_TYPE_CONDENSED*/,
        'template' => '{summary}{items}{pager}',
        'pager'=>array(
            'class' => 'bootstrap.widgets.BsPager',
            'size'=>BsHtml::PAGINATION_SIZE_DEFAULT,
        ),
        'nullDisplay'=>'-',
        'selectableRows'=>0,
        //'enableSorting'=>false,
        //'beforeAjaxUpdate'=>'function(){beforeUpdateGrid_user();}',
        //'afterAjaxUpdate'=>'function(){updateGrid_user();}',
        'columns'=>array(
            //array(
            //    'class'=>'CCheckBoxColumn',
            //    //'checkBoxHtmlOptions' => array('class' => 'classname'),
            //),
            
            //array(
            //    'name'=>'date_create',
            //    'value'=>'Yii::app()->dateFormatter->format(\'dd.MM.yy, HH:mm\', $data->date_create)',
            //    'filter'=>false,
            //    //'sortable'=>false,
            //),
            
            //array(
            //    'name'=>'role',
            //    'value'=>'$data->_role',
            //    'filter'=>BsHtml::activeDropDownList($model, 'role', array(
            //        ''=>'-',
            //        '0'=>'',
            //        '1'=>'',
            //        '2'=>'',
            //    )),
            //),

            //array(
            //    //'header'=>'Действия',
            //    'class'=>'bootstrap.widgets.BsButtonColumn',
            //    //'template'=>'{view} {update} {delete}',
            //),
            
		'id',
            array(
                'name'=>'date_create',
                'value'=>'Yii::app()->dateFormatter->format("dd MMMM yyyy, HH:mm", $data->date_create)',
                'filter'=>false,
            ),
		'login',
		//'password',
		array(
                    'name'=>'role',
                    'value'=>'$data->_role',
                    'filter'=>$model::$roles,
                ),
		'name',
		
		//'time_rest_day1',
		//'time_rest_day2',
		//'time_rest_day3',
		//'time_rest_day4',
		//'time_rest_day5',
		//'time_rest_day6',
		//'time_rest_day7',
		//'time_work_day1',
		//'time_work_day2',
		//'time_work_day3',
		//'time_work_day4',
		//'time_work_day5',
		//'time_work_day6',
		//'time_work_day7',
            
            array(
                'header'=>'',
                'value'=>''
                . 'BsHtml::linkButton("", array("url"=>array("delete", "id"=>$data->id), "size"=>BsHtml::BUTTON_SIZE_SMALL, "data-toggle"=>"tooltip", "title"=>"Удалить", "icon"=>BsHtml::GLYPHICON_TRASH, "color"=>BsHtml::BUTTON_COLOR_DEFAULT, "onclick"=>"if ( !confirm(\'Действительно удалить?\') ) return false;"))." ".'
                . 'BsHtml::linkButton("", array("url"=>array("update", "id"=>$data->id), "size"=>BsHtml::BUTTON_SIZE_SMALL, "data-toggle"=>"tooltip", "title"=>"Изменить", "icon"=>BsHtml::GLYPHICON_PENCIL, "color"=>BsHtml::BUTTON_COLOR_WARNING))." ".'
                . 'BsHtml::linkButton("", array("url"=>array("view", "id"=>$data->id), "size"=>BsHtml::BUTTON_SIZE_SMALL, "data-toggle"=>"tooltip", "title"=>"Обзор", "icon"=>BsHtml::GLYPHICON_EYE_OPEN, "color"=>BsHtml::BUTTON_COLOR_INFO))',
                'htmlOptions'=>array(
                    'class'=>'myActions',
                ),
                'type'=>'raw',
            ),
        ),
    )); ?>    
    
<?php $this->endWidget(); ?>