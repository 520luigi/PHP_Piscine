#!/usr/bin/env php
<?php
    if ($argc != 4)
    {
        echo ("Incorrect Parameters\n");
        exit();
    }
    $operation = trim($argv[2], " \t");
    $first = trim($argv[1], " \t");
    $second = trim($argv[3], " \t");
    switch ($operation)
    {
        case ("+") :
            echo ($first + $second);
            break;
        case ("-") :
            echo ($first - $second);
            break;
        case ("*") :
            echo ($first * $second);
            break;
        case ("/") :
            echo ($first / $second);
            break;
        case ("%") :
            echo ($first % $second);
            break;
   }
   echo ("\n");
?>
