/**
 * Created by 77 on 2014/11/19.
 */


fis.config.set('roadmap.domain','/fis-yii2-demo');// 如果你的项目运行在根目录请注释本行
fis.config.set('roadmap.path',[
    {
        //map.json文件
        reg : 'map.json',
        //发布到/views/themes/basic/map.json
        release :'views/themes/basic/map.json'
    },
    {
        reg: /^\/views\/(.*)/i,  //匹配模板文件
        release: 'views/themes/basic/$1' //输出到 views/themes/basic/目录下，保持目录结构
    },
    {
        reg: /^\/static\/(.*)/i, //匹配资源文件
        release: 'web/themes/basic/static/$1' //输出到web/themes/basic/static 目录下，保持目录结构
    }
]);
