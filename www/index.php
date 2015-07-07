<?php

mb_internal_encoding("UTF-8");
ini_set('date.timezone', 'Etc/GMT-3');
error_reporting( E_ERROR );

$yii=dirname(__FILE__).'/../yii-1.1.16/framework/yii.php';
$config=dirname(__FILE__).'/../protected/config/main.php';

defined('YII_DEBUG') or define('YII_DEBUG',true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();