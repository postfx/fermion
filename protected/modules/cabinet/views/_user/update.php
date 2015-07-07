<?php
    $this->breadcrumbs[] = 'Изменение пользователя №'.$model->id;
?>    
    
<?php $this->beginWidget('bootstrap.widgets.BsPanel', array(
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
        <?= BsHtml::linkButton('Обзор пользователя', array(
            'icon' => BsHtml::GLYPHICON_EYE_OPEN,
            'color' => BsHtml::BUTTON_COLOR_INFO,
            'url' => array('view', 'id'=>$model->id),
        )); ?>        
    </div>

    <?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>