<?php

use Fruit\BenchKit\Benchmark;

function BenchmarkPHPArrayIndexed(Benchmark $b)
{
    $index = makeIndexedArray(ARRSIZE);
    $assoc = makeAssocArray(ARRSIZE);
    $mixed = makeMixedArray(HALFSIZE);
    $b->resetTimer();
    for ($i = 0; $i < $b->N(); $i++) {
        php_array_is_indexed($index);
        php_array_is_indexed($assoc);
        php_array_is_indexed($mixed);
    }
}

function BenchmarkXarrayIndexed(Benchmark $b)
{
    $index = makeIndexedArray(ARRSIZE);
    $assoc = makeAssocArray(ARRSIZE);
    $mixed = makeMixedArray(HALFSIZE);
    $b->resetTimer();
    for ($i = 0; $i < $b->N(); $i++) {
        array_is_indexed($index);
        array_is_indexed($assoc);
        array_is_indexed($mixed);
    }
}

function BenchmarkXarrayAssoc(Benchmark $b)
{
    $index = makeAssocArray(ARRSIZE);
    $assoc = makeAssocArray(ARRSIZE);
    $mixed = makeMixedArray(HALFSIZE);
    $b->resetTimer();
    for ($i = 0; $i < $b->N(); $i++) {
        array_is_assoc($index);
        array_is_assoc($assoc);
        array_is_assoc($mixed);
    }
}

function BenchmarkPHPArrayKeysJoin(Benchmark $b)
{
    $arr = makeMixedArray(HALFSIZE);
    $b->resetTimer();
    for ($i = 0; $i < $b->N(); $i++) {
        php_array_keys_join($arr, ',');
    }
}

function BenchmarkXarrayKeysJoin(Benchmark $b)
{
    $arr = makeMixedArray(HALFSIZE);
    $b->resetTimer();
    for ($i = 0; $i < $b->N(); $i++) {
        array_keys_join($arr, ',');
    }
}

function BenchmarkPHPArrayPluck(Benchmark $b)
{
    $arr = makeUserArray(ARRSIZE);
    $b->resetTimer();
    for ($i = 0; $i < $b->N(); $i++) {
        php_array_pluck($arr, 'uid');
    }
}

function BenchmarkXarrayPluck(Benchmark $b)
{
    $arr = makeUserArray(ARRSIZE);
    $b->resetTimer();
    for ($i = 0; $i < $b->N(); $i++) {
        array_pluck($arr, 'uid');
    }
}

function BenchmarkPHPArrayFirst(Benchmark $b)
{
    $arr = makeUserArray(ARRSIZE);
    $b->resetTimer();
    for ($i = 0; $i < $b->N(); $i++) {
        php_array_first($arr, function($k, $v) {return $v['uid'] == 2;});
    }
}

function BenchmarkXarrayFirst(Benchmark $b)
{
    $arr = makeUserArray(ARRSIZE);
    $b->resetTimer();
    for ($i = 0; $i < $b->N(); $i++) {
        array_first($arr, function($k, $v) {return $v['uid'] == 2;});
    }
}

function BenchmarkPHPArrayEach_foreach(Benchmark $b)
{
    $arr = makeUserArray(ARRSIZE);
    $b->resetTimer();
    for ($i = 0; $i < $b->N(); $i++) {
        php_array_each_foreach($arr, function($k, $v) {return true;});
    }
}

function BenchmarkPHPArrayEach_arraymap(Benchmark $b)
{
    $arr = makeUserArray(ARRSIZE);
    $b->resetTimer();
    for ($i = 0; $i < $b->N(); $i++) {
        php_array_each_arraymap($arr, function($v) {return true;});
    }
}

function BenchmarkXarrayEach(Benchmark $b)
{
    $arr = makeUserArray(ARRSIZE);
    $b->resetTimer();
    for ($i = 0; $i < $b->N(); $i++) {
        array_each($arr, function($k, $v) {return true;});
    }
}

function BenchmarkPHPArrayBuild(Benchmark $b)
{
    $arr = makeUserArray(ARRSIZE);
    $b->resetTimer();
    for ($i = 0; $i < $b->N(); $i++) {
        php_array_build($arr, function($k, $v) {return array($v["uid"], $v);});
    }
}

function BenchmarkXarrayBuild(Benchmark $b)
{
    $arr = makeUserArray(ARRSIZE);
    $b->resetTimer();
    for ($i = 0; $i < $b->N(); $i++) {
        array_build($arr, function($k, $v) {return array($v["uid"], $v);});
    }
}

function BenchmarkPHPArrayKeysPrefix(Benchmark $b)
{
    $arr = makeAssocArray(ARRSIZE);
    $b->resetTimer();
    for ($i = 0; $i < $b->N(); $i++) {
        php_array_keys_prefix($arr, "prefix");
    }
}

function BenchmarkXarrayKeysPrefix(Benchmark $b)
{
    $arr = makeAssocArray(ARRSIZE);
    $b->resetTimer();
    for ($i = 0; $i < $b->N(); $i++) {
        array_keys_prefix($arr, "prefix");
    }
}

function BenchmarkPHPArrayKeysSuffix(Benchmark $b)
{
    $arr = makeAssocArray(ARRSIZE);
    $b->resetTimer();
    for ($i = 0; $i < $b->N(); $i++) {
        php_array_keys_suffix($arr, "suffix");
    }
}

function BenchmarkXarrayKeysSuffix(Benchmark $b)
{
    $arr = makeAssocArray(ARRSIZE);
    $b->resetTimer();
    for ($i = 0; $i < $b->N(); $i++) {
        array_keys_suffix($arr, "suffix");
    }
}

function BenchmarkPHPArrayKeysReplace(Benchmark $b)
{
    $arr = makeAssocArray(ARRSIZE);
    $b->resetTimer();
    for ($i = 0; $i < $b->N(); $i++) {
        php_array_keys_replace($arr, array("ran" => "qwe"));
    }
}

function BenchmarkXarrayKeysReplace(Benchmark $b)
{
    $arr = makeAssocArray(ARRSIZE);
    $b->resetTimer();
    for ($i = 0; $i < $b->N(); $i++) {
        array_keys_replace($arr, array("ran" => "qwe"));
    }
}

function BenchmarkPHPArrayAdd(Benchmark $b)
{
    $arr = array();
    $b->resetTimer();
    for ($i = 0; $i < $b->N(); $i++) {
        if (!isset($arr['a'])) {
            $arr['a'] = 1;
        }
    }
}

function BenchmarkXarrayAdd(Benchmark $b)
{
    $arr = array();
    $b->resetTimer();
    for ($i = 0; $i < $b->N(); $i++) {
        array_add($arr, "a", 1);
    }
}
