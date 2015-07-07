<?= "<?php" ?> $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id'=>'<?= $this->class2id($this->modelClass) ?>-form',
    'enableAjaxValidation'=>false,
    'layout' => BsHtml::FORM_LAYOUT_HORIZONTAL,
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnChange'=>true,
        'validateOnSubmit'=>true,
    ),
    'htmlOptions'=>array(
        //'enctype'=>'multipart/form-data',
    ),
)); <?= "?>" ?>


    <?= "<?=" ?> $form->errorSummary($model); <?= "?>" ?>
    
    <fieldset>
    
<?php
foreach ($this->tableSchema->columns as $column) :
    if ($column->autoIncrement) {
        continue;
    }
    ?>
        <?php echo "<?= " . $this->generateActiveControlGroup($this->modelClass, $column) . "; ?>\n"; ?>
<?php endforeach; ?>
        
    </fieldset>

    <?= "<?=" ?> BsHtml::formActions(array(
        BsHtml::resetButton('Сброс', array(
            'color' => BsHtml::BUTTON_COLOR_WARNING,
            'icon' => BsHtml::GLYPHICON_REFRESH,
        )),
        BsHtml::submitButton('Готово', array(
            'color' => BsHtml::BUTTON_COLOR_SUCCESS,
            'icon' => BsHtml::GLYPHICON_OK,
        )),
    ), array('class'=>'form-actions')); <?= "?>" ?>
    

<?= "<?php \$this->endWidget(); ?>\n"; ?>