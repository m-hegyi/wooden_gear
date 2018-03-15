<?php 

namespace WoodenGear;

class Module {

    protected $view;
    protected $dao;

    public function __construct() {
        $this->view = new View();
        $this->dao  = new Dao();
    }

    public function render($viewName) {
        $this->view->render($viewName);
    }

}