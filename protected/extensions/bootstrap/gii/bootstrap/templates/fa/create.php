<?= "<?php\n" ?>
    $this->breadcrumbs[] = 'Добавление записи';
<?= "?>" ?>
    
    
<?= "<?php" ?> $this->beginWidget('bootstrap.widgets.BsPanel', array(
    'title' => $this->navigation,
)); <?= "?>" ?>


    <div class="buttons_for_panel">
        <?= "<?=" ?> BsHtml::linkButton('Вернуться к списку записей', array(
            'icon' => BsHtml::GLYPHICON_BACKWARD,
            'color' => BsHtml::BUTTON_COLOR_DEFAULT,
            'url' => array('index'),
        )); <?= "?>\n" ?>
    </div>

    <?= "<?php \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>


<?= "<?php" ?> $this->endWidget(); <?= "?>" ?>