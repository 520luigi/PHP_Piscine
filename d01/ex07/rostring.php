#!/usr/bin/env php
<?php
    if ($argc > 1)
    {
        $array = array_values(array_filter(explode(' ', $argv[1])));
    }
    $index = count($array);
    $array[$index] = $array[0];
    unset($array[0]);
    $str = implode(' ', $array);
    echo ("$str\n");
?>
