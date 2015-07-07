<?= "<?php\n" ?>
    $this->breadcrumbs[] = 'Обзор записи №'.$model-><?= $this->tableSchema->primaryKey ?>;
<?= "?>" ?>

    
<?= "<?php\n" ?> $this->beginWidget('bootstrap.widgets.BsPanel', array(
    'title' => $this->navigation,
)); <?= "?>" ?>
       

    <div class="buttons_for_panel">
        <?= "<?=" ?> BsHtml::linkButton('Вернуться к списку записей', array(
            'icon' => BsHtml::GLYPHICON_BACKWARD,
            'color' => BsHtml::BUTTON_COLOR_DEFAULT,
            'url' => array('index'),
        )); <?= "?>\n" ?>
        <?= "<?=" ?> BsHtml::linkButton('Удалить запись', array(
            'icon' => BsHtml::GLYPHICON_TRASH,
            'color' => BsHtml::BUTTON_COLOR_DANGER,
            'url' => array('delete', 'id'=>$model->id),
            'onclick'=>'if ( !confirm(\'Действительно удалить?\') ) return false;',
        )); <?= "?>\n" ?>
        <?= "<?=" ?> BsHtml::linkButton('Изменить запись', array(
            'icon' => BsHtml::GLYPHICON_PENCIL,
            'color' => BsHtml::BUTTON_COLOR_WARNING,
            'url' => array('update', 'id'=>$model->id),
        )); <?= "?>\n" ?>
    </div>

    <?= "<?php" ?> $this->widget('bootstrap.widgets.BsDetailView', array(
        'data'=>$model,
        'attributes'=>array(
<?php
foreach ($this->tableSchema->columns as $column) {
    echo "\t\t'" . $column->name . "',\n";
}
?>
        ),
    )); <?= "?>" ?>

    
<?= "<?php" ?> $this->endWidget(); <?= "?>" ?>