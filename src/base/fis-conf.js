/**
 * Created by 77 on 2014/11/19.
 */
fis.config.set('roadmap.domain','/fis-yii2-demo');// 如果你的项目运行在根目录请注释本行
fis.config.set('roadmap.path',[
    {
        //map.json文件
        reg : 'map.json',
        //发布到/views/map.json
        release :'views/map.json'
    },
    {
        reg: 'views/**',  //匹配模板文件
        release: 'views/$&' //输出到 views目录下，保持目录结构
    },
    {
        reg: "static/**", //匹配资源文件
        release: 'web/static/$&' //输出到web/static 目录下，保持目录结构
    }
]);
