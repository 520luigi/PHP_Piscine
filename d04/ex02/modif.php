<?php
    if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] && $_POST['submit'] === "OK") {
        $account = unserialize(file_get_contents('../private/passwd'));
        $newpw = hash('whirlpool', $_POST['newpw']);
        $oldpw = hash('whirlpool', $_POST['oldpw']);
        if ($account) {
            foreach ($account as $key => $value) {
                if ($value['login'] === $_POST['login'] && $value['passwd'] === $oldpw && $oldpw !== $newpw) {
                    $account[$key]['passwd'] = $newpw;
                    file_put_contents('../private/passwd', serialize($account));
                    echo "OK\n";
                    return ;
                }
            }
        }
    }
    echo "ERROR\n";
    return ;
?>
