<?php
//ini_set('display_errors',1);
// change the following paths if necessary
$yii=dirname(__FILE__).'/../../framework/yii.php';
$aws=dirname(__FILE__).'/../../aws/aws-autoloader.php';
//$yii=dirname(__FILE__).'/../../framework/yii.php'; // moved famework dir outside htdocs so that it wont load the entire project again n again.
$config=dirname(__FILE__).'/protected/config/main.php';
// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
require_once($aws);
Yii::createWebApplication($config)->run();








