<?php
    $cs = Yii::app()->clientScript;
    $pt = Yii::app()->homeUrl;

    $cs
        // bootstrap 3.3.1
        ->registerCssFile($pt.'css/bootstrap.min.css')
        // bootstrap theme
        ->registerCssFile($pt.'css/bootstrap-theme.min.css')
        ->registerCssFile($pt.'css/bootstrap-login.css');
        //->registerCssFile($pt.'css/common.css')
        //->registerCssFile($pt.'css/admin.css');
    
    $cs
        ->registerCoreScript('jquery',CClientScript::POS_END)
        //->registerCoreScript('jquery.ui',CClientScript::POS_END)
        //->registerCoreScript('cookie',CClientScript::POS_END)
        ->registerScriptFile($pt.'js/bootstrap.min.js',CClientScript::POS_END);
        //->registerScriptFile($pt.'js/admin.js');
?>

<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <link rel="icon" type="image/png" href="/favicon.png" />

    <title><?= CHtml::encode($this->pageTitle); ?></title>

</head>

<body class="login">
    
    <div class="container">

        <?= $content ?>

    </div>
    
</body>