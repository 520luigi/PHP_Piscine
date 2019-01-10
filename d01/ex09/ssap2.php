#!/usr/bin/env php
<?php
    function ft_is_sort ($str)
    {
        $sort = $str;
        sort($sort, SORT_NATURAL | SORT_FLAG_CASE);
        foreach ($sort as $key => $value)
            if ($value != $str[$key])
                return (false);
        return (true);
    }
    $tab = array();
    for ($i = 1; $i < $argc; $i++)
    {
        $arr = explode(" ", preg_replace('/\s\s+/', ' ', $argv[$i]));
        $tab = array_merge($tab, $arr);
    }
    sort($tab, SORT_STRING | SORT_FLAG_CASE);
    foreach ($tab as $elem)
        if (is_numeric($elem))
            $numeric[] = $elem;
    $tab = array_diff($tab, $numeric);
    foreach ($tab as $elem)
    {
        $char = ord($elem);
        if (($char >= 32 && $char <= 47) || ($char >= 58 && $char <= 64) ||
            ($char >= 91 && $char <= 96) || ($char >= 123 && $char <= 126))
            $special[] = $elem;
    }
    $tab = array_diff($tab, $special);
    foreach ($tab as $elem)
        echo "$elem\n";
    foreach ($numeric as $elem)
        echo "$elem\n";
    foreach ($special as $elem)
        echo "$elem\n";
?>
