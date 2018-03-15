<?php 

namespace WoodenGear;

class View {

    protected $header;

    public function __construct() {
        if(file_exists(VIEW_DIR . '/header.php')) {
            $this->header = VIEW_DIR . '/header.php';
        }
    }

    public function render($viewName) {
        require VIEW_DIR . '/' . $viewName . '.php';
    }

}