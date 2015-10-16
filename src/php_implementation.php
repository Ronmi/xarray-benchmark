<?php

function php_array_is_indexed(array $arr)
{
    return array_keys($arr) == range(0, count($arr)-1);
}

function php_array_keys_join(array $arr, $delim)
{
    return implode($delim, array_keys($arr));
}

function php_array_pluck(array $arr, $key)
{
    $ret = array();
    foreach ($arr as $k => $v) {
        $ret = $v[$key];
    }
    return $ret;
}

function php_array_first(array $arr, callable $cb)
{
    foreach ($arr as $k => $v) {
        if ($cb($k, $v)) {
            return $v;
        }
    }
}

function php_array_each_foreach(array $arr, callable $cb)
{
    foreach ($arr as $k => $v) {
        if (!$cb($k, $v)) {
            return;
        }
    }
}

function php_array_each_arraymap(array $arr, callable $cb)
{
    array_map($cb, $arr);
}

function php_array_build(array $arr, callable $cb)
{
    $ret = array();
    foreach ($arr as $k => $v) {
        list($k, $v) = $cb($k, $v);
        $ret[$k] = $v;
    }
    return $ret;
}

function php_array_keys_prefix(array $arr, $prefix)
{
    $ret = array();
    foreach ($arr as $k => $v) {
        $ret[$prefix . $k] = $v;
    }
    return $ret;
}

function php_array_keys_suffix(array $arr, $prefix)
{
    $ret = array();
    foreach ($arr as $k => $v) {
        $ret[$k . $prefix] = $v;
    }
    return $ret;
}

function php_array_keys_replace(array &$arr, array $rep, $opt = 0)
{
    foreach (array_keys($arr) as $k) {
        if ($opt == XARRAY_FULLMATCH) {
            if (isset($rep[$k])) {
                $v = $arr[$k];
                unset($arr[$k]);
                $arr[$rep[$k]] = $v;
            }
        } else {
            foreach ($rep as $old => $new) {
                $new_k = str_replace($old, $new, $k);
                if ($new_k == $k) continue;
                $v = $arr[$k];
                unset($arr[$k]);
                $arr[$new_k] = $v;
            }
        }
    }
}
