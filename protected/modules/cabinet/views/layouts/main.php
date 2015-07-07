<?php
    $cs = Yii::app()->clientScript;
    $pt = Yii::app()->homeUrl;

    $cs
        ->registerCssFile($pt.'css/bootstrap.min.css')
        ->registerCssFile($pt.'css/bootstrap-theme.min.css')
        //->registerCssFile($cs->getCoreScriptUrl().'/jui/css/base/jquery-ui.css')
        ->registerCssFile($pt.'css/font-awesome.min.css')
        //->registerCssFile($pt.'css/awesome-bootstrap-checkbox.css')
        ->registerCssFile($pt.'css/bootstrap-switch.min.css')
        ->registerCssFile($pt.'css/bootstrap-editable.css')
        ->registerCssFile($pt.'css/bootstrap-datetimepicker.min.css')
        
        ->registerCssFile($pt.'css/common.css')
        ->registerCssFile($pt.'css/admin.css');    
    
    $cs
        ->registerCoreScript('jquery',CClientScript::POS_END)
        //->registerCoreScript('jquery.ui',CClientScript::POS_END)
        ->registerCoreScript('cookie',CClientScript::POS_END)
        ->registerScriptFile($pt.'js/bootstrap.min.js',CClientScript::POS_END)
        ->registerScriptFile($pt.'js/holder.min.js',CClientScript::POS_END)
        ->registerScriptFile($pt.'js/bootstrap-switch.min.js',CClientScript::POS_END)
        ->registerScriptFile($pt.'js/bootstrap-editable.min.js',CClientScript::POS_END)
        ->registerScriptFile($pt.'js/moment.min.js',CClientScript::POS_END)
        ->registerScriptFile($pt.'js/ru.js',CClientScript::POS_END)
        ->registerScriptFile($pt.'js/bootstrap-datetimepicker.min.js',CClientScript::POS_END)
            
        ->registerScriptFile($pt.'js/common.js',CClientScript::POS_END)
        ->registerScriptFile($pt.'js/admin.js',CClientScript::POS_END)

        /*->registerScript('tooltip',
            "$('[data-toggle=\"tooltip\"]').tooltip();
            $('[data-toggle=\"popover\"]').tooltip()"
            ,CClientScript::POS_READY)*/;

    //$user = User::model()->findByPk(Yii::app()->user->id);
    //$config = $this->config;
?>

<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <link rel="icon" type="image/png" href="/images/favicon.png" />

    <title><?= CHtml::encode($this->pageTitle); ?></title>

</head>

<body>
    
    <div class="container-fluid">
        
        <div class="row">
            
            <div id="header">
                <?php
                    $this->widget('bootstrap.widgets.BsNavbar', array(
                        //'color' => BsHtml::NAVBAR_COLOR_INVERSE,
                        'brandLabel' => BsHtml::icon(BsHtml::GLYPHICON_HOME),
                        /*'brandUrl' => Yii::app()->homeUrl,
                        'brandOptions'=>array(
                            'title'=>'Вернуться на сайт',
                            'data-toggle'=>'tooltip',
                            'data-placement'=>'bottom',
                        ),*/
                        'brandUrl' => array('default/index'),
                        'brandOptions'=>array(
                            'title'=>'Главная страница административной панели',
                            'data-toggle'=>'tooltip',
                            'data-placement'=>'bottom',
                        ),
                        'items' => array(
                            array(
                                'class' => 'bootstrap.widgets.BsNav',
                                'encodeLabel' => false,
                                'type' => 'navbar',
                                'activateParents' => true,
                                'items' => $this->_menu_left,
                            ),
                            array(
                                'class' => 'bootstrap.widgets.BsNav',
                                'encodeLabel' => false,
                                'type' => 'navbar',
                                'activateParents' => true,
                                'items' => $this->_menu_right,
                                'htmlOptions' => array(
                                    'pull' => BsHtml::NAVBAR_NAV_PULL_RIGHT,
                                    'style' => 'margin-right: 10px;',
                                ),
                            ),
                        ),
                    ));
                ?>
            </div>
                
            <!--div id="specialPanel">
                <?php /*$this->beginWidget('bootstrap.widgets.BsPanel', array()); ?>
                    <div class="row">
                        <div class="col-lg-4">
                            <p>Здравствуйте, <?= BsHtml::bold($user->_name) ?>!</p>
                            <p>
                                Ваша роль:
                                <?= BsHtml::bsLabel($user->_role, array(
                                    'color' => BsHtml::LABEL_COLOR_PRIMARY,
                                    'style'=>'font-size: 100%;',
                                )); ?>
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <?= BsHtml::linkButton('Мой профиль', array(
                                'color'=>BsHtml::BUTTON_COLOR_INFO,
                                'icon'=>BsHtml::GLYPHICON_EYE_OPEN,
                                'block'=>true,
                                'url'=>array('/admin/user/view', 'id'=>Yii::app()->user->id),
                            )) ?>
                        </div>
                        <div class="col-lg-4">
                            <?php if ( Yii::app()->user->role==2 ): ?>
                                <?= BsHtml::linkButton('Мои агенства', array(
                                    'color'=>BsHtml::BUTTON_COLOR_PRIMARY,
                                    'icon'=>BsHtml::GLYPHICON_BRIEFCASE,
                                    'block'=>true,
                                    'url'=>array('/admin/user/index', 'myAgents'=>Yii::app()->user->id),
                                )) ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php $this->endWidget();*/ ?>
            </div-->

            <div id="content">
                <?= $content ?>
            </div>

            <div id="footer" class="panel panel-footer panel-default text-muted">
                <div class="row">
                    <div class="col-lg-6">
                        <div id="timeInfo" class="text-left"><small>Время сервера: <?= date('d.m.Y, H:i') ?>.</small></div>
                    </div>
                    <div class="col-lg-6">
                        <div id="logInfo" class="text-right"><small>Страница сгенерирована за: <?=round(Yii::getLogger()->executionTime, 3).' сек' ?>.</small></div>
                    </div>
                </div>
            </div>

        </div>
        
    </div>
    
</body>
</html>