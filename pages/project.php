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
    <title>Docm - 文档项目</title>
    <link rel="stylesheet" type="text/css" href="../static/themes/metro/easyui.css">
    <link rel="stylesheet" type="text/css" href="../static/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="../static/demo/demo.css">
    <script type="text/javascript" src="../static/jquery.min.js"></script>
    <script type="text/javascript" src="../static/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="../static/plugins/jquery.edatagrid.js"></script>
    <script type="text/javascript" src="../static/locale/easyui-lang-zh_CN.js"></script>
    <script type="text/javascript" src="../static/lib/moment.js"></script>
</head>
<body>
<table id="dg" title="项目管理"
       toolbar="#toolbar" pagination="true" multiSort="true"
       rownumbers="true" fitColumns="true" singleSelect="true">
    <thead>
    <tr>
        <th field="id" width="50" sortable="true">ID</th>
        <th field="name" width="50" editor="{type:'validatebox',options:{required:true}}" sortable="true">项目名字</th>
        <th field="description" width="50" editor="text">描述</th>
        <th field="create_user" width="50">创建人</th>
        <th field="created_at" width="50" sortable="true" formatter="formattedDate">创建时间</th>
        <th field="updated_at" width="50" sortable="true" formatter="formattedDate">修改时间</th>
    </tr>
    </thead>
</table>
<div id="toolbar">
    <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true"
       onclick="javascript:$('#dg').edatagrid('addRow')">New</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true"
       onclick="javascript:$('#dg').edatagrid('destroyRow')">Destroy</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true"
       onclick="javascript:$('#dg').edatagrid('saveRow')">Save</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true"
       onclick="javascript:$('#dg').edatagrid('cancelRow')">Cancel</a>
</div>

<script>
    $('#dg').edatagrid({
        url: 'api/get_project.php',
        saveUrl: 'api/save_project.php',
        updateUrl: 'api/update_project.php',
        destroyUrl: 'api/destroy_project.php',
        onError: function (index, row) {
            $.messager.alert("错误", row.msg || '未知错误')
        },
    });

    function formattedDate(date) {
        return date ? moment(date).format('YYYY-MM-DD HH:mm:ss'): ''
    }
</script>
</body>
</html>
