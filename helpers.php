<?php

/**
 * Inspect a value(s) (and kill the script after)
 * @param mixed $value
 * @return void
 */

function inspect($value){
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

}

function inspectAndDie($value){
    echo '<pre>';
    die(var_dump($value));
    echo '</pre>';
}





