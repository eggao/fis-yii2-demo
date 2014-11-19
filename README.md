集成方式
---
+增加 `fis/view.php` 至 `vendor` 目录

+增加 `src` 目录至 `根目录`用以存放前端开发资源 （ `模板`、`静态资源` ）

*修改 入口文件 `web/index.php` 在引入`yii.php` 之后将`fis\view`加入类map `Yii::$classMap['fis\view'] = '@app/vendor/fis/view.php';`

*修改 配置文件 `config/web.php` 增加 `config.components.view` 相关配置

立即体验
---
1. 打开文件`wwwroot/src/basic/fis-conf.js`
2. 修改 `fis.config.set('roadmap.domain','/fis-yii2-demo');`配置项
3. cmd定位到`wwwroot/src/basic` 运行 `fis release -Dd ../../`
4. 打开项目访问地址查看结果
资源引入
---
资源引入方式见 `src/basic/site/index.php`

1. css文件 `$this->registerCssFile('static/css/site.css');`
2. js文件 `$this->registerJsFile('static/js/app.js');`

说明

资源路径为相对于当前主题为根目录路径

`src/base` 目录做了特别配置，当作项目默认样式所以输出路径做了特殊配置。

MAP.JSON
---
每个主题的map.json被输出到yii2对应的主题目录：

如：`src/basic`的`map.json`输出到了`views/themes/basic/map.json`

资源加载
---------
`fis/view` 类会自动加载 `views/map.json` (若存在).

如果设置了`theme->pathMap`则会首先依次寻找并加载 `theme->pathMap` 中配置的目录下的`map.json`。

加载遵循yii2主题模板调用规则，同名资源将会只加载最新主题的资源。

例如：

	'theme' => [
                // 设置替换映射关系
                'pathMap' => [

                    '@app/views' => [
                        '@app/views/themes/basic',  	//首先加载web/themes/basic下的静态资源
                        '@app/views/themes/default', 	//如果web/themes/basic没有资源则加载web/themes/default的资源
                    ],									//如果都没有则加载web/下的资源

                ],
                // 设置要访问的资源的url（结尾不加“/”）
                'baseUrl' => '@web/themes/basic',

            ]



--------------------------------------------------------------------------
Yii 2 Basic Application Template
================================

Yii 2 Basic Application Template is a skeleton Yii 2 application best for
rapidly creating small projects.

The template contains the basic features including user login/logout and a contact page.
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.


DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this application template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install from an Archive File

Extract the archive file downloaded from [yiiframework.com](http://www.yiiframework.com/download/) to
a directory named `basic` that is directly under the Web root.

You can then access the application through the following URL:

~~~
http://localhost/basic/web/
~~~


### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this application template using the following command:

~~~
php composer.phar global require "fxp/composer-asset-plugin:1.0.0-beta2"
php composer.phar create-project --prefer-dist --stability=dev yiisoft/yii2-app-basic basic
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/basic/web/
~~~


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTE:** Yii won't create the database for you, this has to be done manually before you can access it.

Also check and edit the other files in the `config/` directory to customize your application.
