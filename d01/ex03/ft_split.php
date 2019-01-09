<?php
    function ft_split($str)
    {
	   	$words = explode(" ", $str);
		$array = array_filter($words);
		sort($array);
		return ($array);
    }
?>
