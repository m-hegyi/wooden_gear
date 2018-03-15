<?php 

/**
 *
 * @author Márió Hegyi <mario.hegyi93@gmail.com>
 * @copyright 2018 (c)
 */


function debug($var, $exit = true) {

    $trace = debug_backtrace();
    $trace = $trace[0];
    
    if($var) {
        echo '<pre>';
        echo '<div class="debug">';
        echo 'Debug: ' . $trace['file'] . ' at line ' . $trace['line'] ;
        echo '</div>';
        if (is_array($var) && $var) {
            print_r($var);
        }
        else{
            var_dump($var);
        }
        echo '</pre>';
    }

    if ($exit) {
        exit();
    }
}