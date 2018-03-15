<?php 

namespace WoodenGear;

class Autoloader {

    public function __construct() {
        spl_autoload_register([$this, "autoLoad"]);
    }

    public function autoLoad($class) {
        if (!strstr($class, 'WoodenGear')) {
            return;
        }
        $class = strtolower($class);
        //namespace kivétele belőle
        $class = explode('\\', $class);
        if (file_exists(ENGINE_DIR . '/lib/' . $class[1] . ".php")) {
            require ENGINE_DIR . '/lib/' . $class[1] . ".php";
        }
    }

}