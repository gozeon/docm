<?php

require 'utils.php';

$auth = Utils::check_auth();
if (!$auth['isLogin']) {
    header('location: pages/login.php?' . 'next=' . $_SERVER['REQUEST_URI']);
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
    <meta charset="UTF-8">
    <title>Docm - 控制台</title>
    <link rel="stylesheet" type="text/css" href="static/themes/metro/easyui.css">
    <link rel="stylesheet" type="text/css" href="static/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="static/demo/demo.css">
    <script type="text/javascript" src="static/jquery.min.js"></script>
    <script type="text/javascript" src="static/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="static/locale/easyui-lang-zh_CN.js"></script>
</head>
<body class="easyui-layout">
<div data-options="region:'north',border:false" style="height:60px;padding:0 10px; line-height: 60px">DOCM</div>
<div data-options="region:'west',split:true,title:'菜单'" style="width:220px; padding: 6px;">
    <div id="leftSideMenu" class="easyui-sidemenu"></div>
</div>
<div data-options="region:'east',split:true,collapsed:true,title:'East'" style="width:100px;padding:10px;">east region
</div>
<div data-options="region:'south',border:false" style="height:50px;padding:0 10px;line-height: 50px;">Copyright
    ©<?php echo date('Y'); ?>
    Goze
</div>
<div data-options="region:'center',title:'工作区'">
    <div id="tabs" class="easyui-tabs" style="width:100%;height: 100%;"></div>
</div>

<script>

    // 左侧菜单栏
    $('#leftSideMenu').sidemenu({
        border: false,
        data: [
            {
                text: '内容管理',
                state: 'open',
                iconCls: 'icon-sum',
                children: [
                    {text: '项目', url: 'pages/project.php'},
                ]
            }
        ],
        onSelect: function (item) {
            // 添加tab
            addTab(item.text, item.url)
        }
    })

    $('#tabs').tabs({
        border: false
    });

    addTab('主页', 'pages/home.php', false)

    function addTab(title, url, closable=true) {
        if ($('#tabs').tabs('exists', title)) {
            $('#tabs').tabs('select', title);
        } else {
            var content = `<iframe scrolling="auto" width="100%" height="100%" src="${url}" frameborder="0"></iframe>`
            $('#tabs').tabs('add', {
                title: title,
                content: content,
                closable: closable,
                tools: [{
                    iconCls: 'icon-mini-refresh',
                    handler: function () {
                        $.messager.confirm('确认', `是否需要刷新 '${title}' 页面?`, function (r) {
                            if (r) {
                                $('#tabs').tabs('update', {
                                    tab: $('#tabs').tabs('getSelected'),
                                    options: {
                                        content: content
                                    }
                                });
                            }
                        });
                    }
                }]
            })
        }
    }
</script>
</body>
</html>
