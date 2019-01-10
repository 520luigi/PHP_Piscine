#!/usr/bin/env php
<?php
    if ($argc < 2)
        exit();
    $str = trim(preg_replace('!\s+!', ' ', $argv[1]));
    echo ("$str\n");
?>
