<?php 

namespace WoodenGear;

class Engine {

    protected $url;
    protected $module;
    protected $request;
    protected $router;

    public function __construct() {
        $this->module = new Module();
        $this->request = new Request();
        $this->router = new Router();
    }

    public function getUrl() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
    }

    public function loadModule($moduleName, $moduleFunction = null) {
        if(file_exists(MODULE_DIR . '/' . $moduleName . '.php')) {
            require MODULE_DIR . '/' . $moduleName . '.php';
        }

        $moduleName = $moduleName . 'Module';

        $module = new $moduleName();

        if ($moduleFunction === null) {
            $module->index();
        }
        else {
            $module->$moduleFunction();
        }
    }

    public function getEngine() {
        return $this;
    }

    public function getRequest() {
        return $this->request;
    }

}