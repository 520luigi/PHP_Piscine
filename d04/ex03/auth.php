<?php
    function auth($login, $passwd)
    {
        if (!$login || !$passwd)
            return False;
        $account = unserialize(file_get_contents('../private/passwd'));
        if ($account)
        {
            foreach ($account as $key => $value)
            {
                if ($value['login'] === $login && $value['passd'] == hash('whirlpool', $passwd))
                    return True;
            }
        }
        return False;
    }
?>
