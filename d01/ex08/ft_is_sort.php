<?php
    function ft_is_sort($argv)
    {
        $temp = $argv;
        sort($temp);
        if ($argv == $temp)
            return true;
        return false;
    }
?>
