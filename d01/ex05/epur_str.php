#!/usr/bin/env php
<?php
    if ($argc == 2)
    {
        $str = preg_replace('/\s\s+/', ' ', $argv[1]);
        $new_str = trim($str);
        echo ("$new_str\n");
    }
?>
