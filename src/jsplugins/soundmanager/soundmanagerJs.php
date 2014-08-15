<?php

class soundmanagerJs extends JsPlugin{
    
    private static $instance = NULL;
    public static function getInstanceOf($plugin){
        $class_name = __CLASS__;
        if (!is_object(self::$instance))self::$instance = new $class_name($plugin);
        return self::$instance;
    }

    public function init(){
        $this->Html->LoadJs($this->url."/js/sm2.min", true);
    }
    
    public function play($sound_file, $soundid){
        $this->Html->LoadJsFunction("
        soundManager.onready(function() {
            var s = soundManager.createSound({
                id: '$soundid',
                autoPlay: true,
                url: '$sound_file'
            });
            s.play();
        });
        ", true);
    }
}