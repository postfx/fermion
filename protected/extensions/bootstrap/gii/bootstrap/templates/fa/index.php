<?= "<?php\n" ?>
    $this->breadcrumbs[] = 'Список записей';
<?= "?>" ?>
    
    
<?= "<?php" ?> $this->beginWidget('bootstrap.widgets.BsPanel', array(
    'title' => $this->navigation,
)); <?= "?>" ?>


    <div class="buttons_for_panel">
        <?= "<?=" ?> BsHtml::linkButton('Добавить запись', array(
            'icon' => BsHtml::GLYPHICON_PLUS,
            'color' => BsHtml::BUTTON_COLOR_SUCCESS,
            'url' => array('create'),
        )); <?= "?>\n" ?>
    </div>

    <?= "<?php" ?> $this->widget('bootstrap.widgets.BsGridView',array(
        'id'=>'<?= $this->class2id($this->modelClass) ?>-grid',
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
        //'beforeAjaxUpdate'=>'function(){beforeUpdateGrid_<?= $this->class2id($this->modelClass) ?>();}',
        //'afterAjaxUpdate'=>'function(){updateGrid_<?= $this->class2id($this->modelClass) ?>();}',
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
            
<?php
$count = 0;
foreach ($this->tableSchema->columns as $column) {
    echo "\t\t". ( (++$count >= 7)?'//':'' ) ."'".  $column->name . "',\n";
}
?>
            
            array(
                'header'=>'',
                'value'=>''
                . 'BsHtml::linkButton("", array("url"=>array("delete", "id"=>$data-><?= $this->tableSchema->primaryKey ?>), "size"=>BsHtml::BUTTON_SIZE_SMALL, "data-toggle"=>"tooltip", "title"=>"Удалить", "icon"=>BsHtml::GLYPHICON_TRASH, "color"=>BsHtml::BUTTON_COLOR_DEFAULT, "onclick"=>"if ( !confirm(\'Действительно удалить?\') ) return false;"))." ".'
                . 'BsHtml::linkButton("", array("url"=>array("update", "id"=>$data-><?= $this->tableSchema->primaryKey ?>), "size"=>BsHtml::BUTTON_SIZE_SMALL, "data-toggle"=>"tooltip", "title"=>"Изменить", "icon"=>BsHtml::GLYPHICON_PENCIL, "color"=>BsHtml::BUTTON_COLOR_WARNING))." ".'
                . 'BsHtml::linkButton("", array("url"=>array("view", "id"=>$data-><?= $this->tableSchema->primaryKey ?>), "size"=>BsHtml::BUTTON_SIZE_SMALL, "data-toggle"=>"tooltip", "title"=>"Обзор", "icon"=>BsHtml::GLYPHICON_EYE_OPEN, "color"=>BsHtml::BUTTON_COLOR_INFO))',
                'htmlOptions'=>array(
                    'class'=>'myActions',
                ),
                'type'=>'raw',
            ),
        ),
    )); <?= "?>" ?>
    
    
<?= "<?php" ?> $this->endWidget(); <?= "?>" ?>