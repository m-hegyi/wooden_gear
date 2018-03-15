<?php

namespace WoodenGear; 

class Router {

    protected $raw;
    protected $parsed;
    protected $routes;

    public function __construct($routeFile) {
        $this->raw = $routeFile;
        $this->parsed = parse_ini_file($routeFile, true);

        // foreach($this->parsed as $key => $value) {
        //     debug($key);
        // }
    }

    public function getRouteByName($routeName) {
        foreach($this->parsed as $key => $value) {
            if ($routeName === $key) {
                return $this->parsed[$key];
            }
        }

        return false;
    }

    /**
     * @param  array $pattern
     * @return array
     */
    public function getRouteByPattern($pattern) {
        $url = '';

        foreach($pattern as $value) {
            $url .= $value . '/';
        }

        foreach($this->parsed as $key => $value) {
            if($value['pattern'] === $url) {
                return $this->parsed[$key];
            }
        }

        return false;
    }

}