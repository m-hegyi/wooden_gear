<?php 

namespace WoodenGear;

class Config {

    protected $configFile;
    protected $parsedConfig;
    protected $environment;

    public function __construct($configFile, $environment = 'prod') {
        $this->configFile = $configFile;
        $this->environment = $environment;

        foreach ($configFile as $key => $value) {
            $tmp = explode(":" , $key);
            if (count($tmp) == 2) {
                if ($tmp[1] == $this->environment) {
                    $this->config[$tmp[0]] = $value;
                }
                else {
                    continue;
                }
            }
            else {
                $this->config[$key] = $value;
            }
        }
    }

    public function get($field) {
        $array = explode("/", $field);

        if (count($array) == 1) {
            return $array[0];
        }
        else {
            if (array_key_exists($array[0], $this->config)) {
                if (array_key_exists($array[1], $this->config[$array[0]])) {
                    return $this->config[$array[0]][$array[1]];
                }
                else {
                    return false;
                }
            }           
        }

        return false;
    }

}