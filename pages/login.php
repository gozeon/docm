<?php

require '../utils.php';

setcookie(Utils::$Cookie_key, '', time() - 60 * 60);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Docm - 登录</title>
    <link rel="stylesheet" type="text/css" href="../static/themes/metro/easyui.css">
    <link rel="stylesheet" type="text/css" href="../static/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="../static/demo/demo.css">
    <script type="text/javascript" src="../static/jquery.min.js"></script>
    <script type="text/javascript" src="../static/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="../static/locale/easyui-lang-zh_CN.js"></script>
    <style>
        html {
            background: url(http://api.mtyqx.cn/api/random.php);
            background-size: cover;
            background-repeat: no-repeat;
        }
        .panel-body {
            background-color: #ffffffa6;
        }
        .panel-htop {
            margin: 20px auto;
        }
    </style>
</head>
<body>

<div class="easyui-panel" title="Login" style="width:100%;max-width:400px;padding:30px 60px;">
    <form id="ff" method="post" action="./api/do_login.php">
        <div style="margin-bottom:20px">
            <input class="easyui-textbox" name="name" style="width:100%" data-options="label:'Name:',required:true">
        </div>
        <div style="margin-bottom:20px">
            <input class="easyui-passwordbox" prompt="Password" iconWidth="28" name="password" style="width:100%"
                   data-options="label:'Password:',required:true">
        </div>

    </form>
    <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()" style="width:80px">Submit</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()" style="width:80px">Clear</a>
    </div>
</div>
<script>
    function submitForm() {
        $('#ff').form('submit', {
            success: function (data) {
                var json = JSON.parse(data)
                if (json.code === 200) {
                    location.href = '<?php echo $_GET['next']; ?>' ?? 'index.php'
                } else {
                    $.messager.alert("错误", json.message)
                }
            }
        });
    }

    function clearForm() {
        $('#ff').form('clear');
    }
</script>
</body>
</html>
