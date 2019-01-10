#!/usr/bin/php
<?php
        //Parse the arguments (this way works too, but method I don't really understand...)
        $array = array_slice($argv, 1);
        $words = [];
        foreach ($array as $element)
            foreach (explode(' ', trim(preg_replace('/ +/', ' ', $element))) as $el)
                $words[] = $el;
        // Sorting alpha
        usort($words, function ($a, $b)
        {
            $a = strtolower($a);
            $b = strtolower($b);
            $sort = str_split("abcdefghijklmnopqrstuvwxyz0123456789");
            $sort = array_flip($sort);
            $b = str_split($b);
            foreach (str_split($a) as $i => $char) {
                if ($char === $b[$i])
                    continue;
                if (!isset($sort[$char]) && !isset($sort[$b[$i]]))
                    return strcmp($char, $b[$i]);
                if (!isset($sort[$char]))
                    return 1;
                else if (!isset($sort[$b[$i]]))
                    return -1;
                if ($sort[$char] === $sort[$b[$i]])
                    return 0;
                return ($sort[$char] > $sort[$b[$i]]) ? 1 : -1;
            }
            return 0;
        });
        // Display
        foreach ($words as $word)
                echo "$word\n";
?>
