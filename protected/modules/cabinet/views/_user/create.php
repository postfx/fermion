<?php
    $this->breadcrumbs[] = 'Добавление пользователя';
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
    </div>

    <?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>