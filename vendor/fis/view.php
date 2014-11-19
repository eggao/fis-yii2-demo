<?php
/**
 * Created by PhpStorm.
 * User: 77
 * Date: 14-11-10
 * Time: 下午10:16
 */

namespace fis;

use yii;

class view extends yii\web\View
{
    private $map = [];
    public function init()
    {
        parent::init();
       // $map_file = Yii::$app->viewPath . '/map' . self::MAP_EXT;
      //  echo ($this->theme->applyTo('@app/')) ;
        //如果没有设置$pathMap映射，则使用$basePath，




        if($this->theme->pathMap){
            foreach($this->theme->pathMap as $k => $v){
                if(is_array($v)){

                    foreach($v as $vv){
                        self::_addMap(Yii::getAlias($vv.'/map.json'));
                    }
                }else{
                    self::_addMap(Yii::getAlias($v.'/map.json'));
                }
            }
            self::_addMap(Yii::getAlias('@app/views/map.json'));
        }else{
            self::_addMap(Yii::getAlias('@app/views/map.json'));
        }
        //file_exists($map_file);
        //json_decode(file_get_contents($map_file), true);

    }
    private function _addMap($path){
        $path = Yii::getAlias($path);

        if(file_exists($path)){
            $temp=json_decode(file_get_contents($path), true);
            $this->map += $temp;

        }
    }
    private function _getInfo($id){
        if(isset($this->map['res'][$id])){
            return $this->map['res'][$id];
        } else {
            //trigger_error('undefined resource [' . $id . ']', E_USER_ERROR);
            return null;
        }

    }
    public function registerCssFile($css, $options = [], $key = null){
        $info = self::_getInfo($css);

        if($info){
            $uri = $info['uri'];
            $type = $info['type'];
            if(isset($info['pkg'])){
                $info = $this->map['pkg'][$info['pkg']];
                $uri = $info['uri'];

            }
            if(isset($info['deps'])){
                foreach($info['deps'] as $dId){
                    self::registerCssFile($dId);
                }
            }
            parent::registerCssFile($uri, $options, $key);

        } else {
            parent::registerCssFile($css, $options, $key);
        }



    }
    public function registerJsFile($js, $options = [], $key = null){
        $info = self::_getInfo($js);

        if($info){
            $uri = $info['uri'];
            $type = $info['type'];
            if(isset($info['pkg'])){
                $info = $this->map['pkg'][$info['pkg']];
                $uri = $info['uri'];

            }
            if(isset($info['deps'])){
                foreach($info['deps'] as $dId){
                    self::registerJsFile($dId);
                }
            }
            parent::registerJsFile($uri, $options, $key);

        } else {
            parent::registerJsFile($js, $options, $key);
        }



    }

}
