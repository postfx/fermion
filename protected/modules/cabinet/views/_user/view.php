<?php
    $this->breadcrumbs[] = 'Обзор пользователя №'.$model->id;
?>
    
<?php
 $this->beginWidget('bootstrap.widgets.BsPanel', array(
    'title' => $this->navigation,
)); ?>       

    <div class="buttons_for_panel">
        <?= BsHtml::linkButton('Вернуться к списку пользователей', array(
            'icon' => BsHtml::GLYPHICON_BACKWARD,
            'color' => BsHtml::BUTTON_COLOR_DEFAULT,
            'url' => array('index'),
        )); ?>
        <?= BsHtml::linkButton('Удалить пользователя', array(
            'icon' => BsHtml::GLYPHICON_TRASH,
            'color' => BsHtml::BUTTON_COLOR_DANGER,
            'url' => array('delete', 'id'=>$model->id),
            'onclick'=>'if ( !confirm(\'Действительно удалить?\') ) return false;',
        )); ?>
        <?= BsHtml::linkButton('Изменить пользователя', array(
            'icon' => BsHtml::GLYPHICON_PENCIL,
            'color' => BsHtml::BUTTON_COLOR_WARNING,
            'url' => array('update', 'id'=>$model->id),
        )); ?>
    </div>

    <?php $this->widget('bootstrap.widgets.BsDetailView', array(
        'data'=>$model,
        'attributes'=>array(
		'id',
            array(
                'name'=>'date_create',
                'value'=>Yii::app()->dateFormatter->format('dd MMMM yyyy, HH:mm', $model->date_create),
            ),
		'login',
		//'password',

            array(
                'name'=>'role',
                'value'=>$model->_role,
            ),
		'name',
		
		'time_rest_day1',
		'time_rest_day2',
		'time_rest_day3',
		'time_rest_day4',
		'time_rest_day5',
		'time_rest_day6',
		'time_rest_day7',
		'time_work_day1',
		'time_work_day2',
		'time_work_day3',
		'time_work_day4',
		'time_work_day5',
		'time_work_day6',
		'time_work_day7',
        ),
    )); ?>
    
<?php $this->endWidget(); ?>