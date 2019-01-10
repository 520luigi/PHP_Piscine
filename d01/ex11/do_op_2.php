#!/usr/bin/env php
<?php
    if ($argc != 2)
    {
        echo ("Incorrect Parameters\n");
        exit();
    }
    $str = $argv[1];
    if (strpos($str, "+") !== false)
		$array = explode("+", $str);
	else if (strpos($str, "-") !== false)
		$array = explode("-", $str);
	else if (strpos($str, "*") !== false)
		$array = explode("*", $str);
	else if (strpos($str, "/") !== false)
		$array = explode("/", $str);
	else if (strpos($str, "%") !== false)
		$array = explode("%", $str);
	else
	{
		echo "Syntax Error\n";
		exit();
	}
	if (count($array) != 2)
	{
		echo "Syntax Error\n";
		exit();
	}
	else
	{
		foreach ($array as $value)
			$tab[] = trim($value);
		if (ctype_digit($tab[0]) && ctype_digit($tab[1]))
		{
			if (strpos($str, "+") !== false)
				echo ($tab[0] + $tab[1]);
			if (strpos($str, "-") !== false)
				echo ($tab[0] - $tab[1]);
			if (strpos($str, "*") !== false)
				echo ($tab[0] * $tab[1]);
			if (strpos($str, "/") !== false)
				echo ($tab[0] / $tab[1]);
			if (strpos($str, "%") !== false)
				echo ($tab[0] % $tab[1]);
			echo "\n";
		}
		else
			echo "Syntax Error\n";
	}
?>
