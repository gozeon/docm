<?php

require '../utils.php';

$auth = Utils::check_auth();
if (!$auth['isLogin']) {
    header('location: login.php?' . 'next=' . $_SERVER['REQUEST_URI']);
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Docm - 首页</title>
    <link rel="stylesheet" type="text/css" href="../static/themes/metro/easyui.css">
    <link rel="stylesheet" type="text/css" href="../static/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="../static/demo/demo.css">
    <script type="text/javascript" src="../static/jquery.min.js"></script>
    <script type="text/javascript" src="../static/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="../static/locale/easyui-lang-zh_CN.js"></script>
</head>
<body>
<div>
    Home
</div>
</body>
</html>
