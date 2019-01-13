<?php
    if (!$_POST["login"] === "" || $_POST["passwd"] === "" || $_POST["submit"] !== "OK")
    {
        echo ("ERROR\n");
        return ;
    }
    if (!file_exists("../private") || !file_exists("../private/passwd"))
       mkdir ("../private");
    if (file_exists("../private/passwd"))
    {
        $account = unserialize(file_get_contents("../private/passwd"));
        foreach ($account as $key => $value)
        {
            if ($value["login"] === $_POST["login"])
            {
                echo ("ERROR\n");
                return ;
            }
        }
    }
    $tmp["login"] = $_POST["login"];
    $tmp["passwd"] = hash('whirlpool', $_POST["passwd"]);
    $account[] = $tmp;
    file_put_contents("../private/passwd", serialize($account));
    echo ("OK\n");
?>
