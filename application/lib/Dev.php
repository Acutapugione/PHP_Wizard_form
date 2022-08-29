<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

function debug( $item ){
    echo '<pre>';
    var_dump($item);
    echo '</pre>';
    exit;
}