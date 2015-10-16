<?php

//require_once('vendor/autoload.php');

define("ARRSIZE", 1000);
define("HALFSIZE", ARRSIZE/2);

function makeIndexedArray($size)
{
    return range(1, $size);
}

function makeAssocArray($size)
{
    $ret = array();
    for ($i = 0; $i < $size; $i++) {
        $ret[sprintf("rand%d", $i)] = true;
    }
    return $ret;
}

function makeMixedArray($halfSize)
{
    return array_merge(makeIndexedArray($halfSize), makeAssocArray($halfSize));
}

function makeUserArray($size)
{
    $ret = array();
    for ($i = 0; $i < $size; $i++) {
        $ret[$i] = array("uid" => $i);
    }
    return $ret;
}

require_once(__DIR__ . '/php_implementation.php');
