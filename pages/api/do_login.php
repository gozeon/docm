<?php

require '../../utils.php';

$name = $_REQUEST['name'];
$password = $_REQUEST['password'];

if ($name === 'admin' && $password === 'admin') {
    $cok = Utils::auth_code("admin", "ENCODE", Utils::$Cookie_key);
    setcookie(Utils::$Cookie_key, $cok , time() + 1 * 60 * 60, '/');

    echo json_encode(array(
        "code" => 200,
        "message" => "success"
    ));
} else {
    echo json_encode(array(
        "code" => 400,
        "message" => "用户名或密码不正确"
    ));
}

