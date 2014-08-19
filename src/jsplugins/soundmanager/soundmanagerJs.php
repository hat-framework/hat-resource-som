<?php

class soundmanagerJs extends JsPlugin{
    
    private static $instance = NULL;
    public static function getInstanceOf($plugin){
        $class_name = __CLASS__;
        if (!is_object(self::$instance))self::$instance = new $class_name($plugin);
        return self::$instance;
    }

    public function init(){
        $this->Html->LoadBowerComponent("SoundManager2/script/soundmanager2-jsmin");
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