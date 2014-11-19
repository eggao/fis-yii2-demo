<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');

require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

// 将重写后的view类文件地址加入类数组
Yii::$classMap['fis\view'] = '@app/vendor/fis/view.php';
$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();
