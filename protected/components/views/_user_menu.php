<?php
    if ( Yii::app()->user->role==0 ) {
        $user_menu = array(
            array(
                'label'=>'Информация',
                'url'=>array('/user/index'),
                'icon'=>BsHtml::GLYPHICON_INFO_SIGN,
            ),
            array(
                'label'=>'Настройки',
                'url'=>array('/user/settings'),
                'icon'=>BsHtml::GLYPHICON_COG,
            ),
            array(
                'label'=>'Избранные объявления',
                'url'=>array('/user/favorite'),
                'icon'=>BsHtml::GLYPHICON_STAR,
            ),
            array(
                'label'=>'Подписка на рассылку',
                'url'=>array('/user/subscription'),
                'icon'=>BsHtml::GLYPHICON_ENVELOPE,
            ),
        );
    }
    if ( Yii::app()->user->role==1 ) {
        $user_menu = array(
            array(
                'label'=>'Информация',
                'url'=>array('/user/index'),
                'icon'=>BsHtml::GLYPHICON_INFO_SIGN,
            ),
            array(
                'label'=>'Настройки',
                'url'=>array('/user/settings'),
                'icon'=>BsHtml::GLYPHICON_COG,
            ),
            array(
                'label'=>'Управление объявлениями',
                'url'=>array('/object/index'),
                'icon'=>BsHtml::GLYPHICON_LIST,
            ),
            array(
                'label'=>'Добавить объявления',
                'url'=>array('/object/create'),
                'icon'=>BsHtml::GLYPHICON_PLUS_SIGN,
            ),
            array(
                'label'=>'Платные услуги',
                'url'=>array('/user/services'),
                'icon'=>BsHtml::GLYPHICON_USD,
            ),
        );
    }
?>

<?= BsHtml::pageHeader('Личный кабинет') ?>

<?php $this->widget('BsNav', array(
    'id'=>'user_menu',
    'type'=>BsHtml::NAV_TYPE_TABS,
    //'stacked'=>false,
    'encodeLabel'=>false,
    //'linkLabelWrapper'=>'span',
    'items'=>$user_menu,
)); ?>