#!/usr/bin/env php
<?php
    $array = array();
    unset($argv[0]);
    foreach($argv as $i)
    {
       $argument= array_filter(explode(' ', $i));
       foreach ($argument as $j)
           $array[] = $j;
    }
    sort($array);
    foreach ($array as $value)
       echo ("$value\n");
?>
