<?php

require '../../utils.php';
date_default_timezone_set('PRC');

$id = intval($_REQUEST['id']);
$name = $_REQUEST['name'];
$desc = $_REQUEST['description'];

$pdo = Utils::db();
$sql = 'UPDATE project SET name=:name, description=:description, updated_at=:updated_at WHERE id=:id';
$statement = $pdo->prepare($sql);

$statement->execute([
    ':id' => $id,
    ':name' => $name,
    ':description' => $desc,
    ':updated_at' => date('Y-m-d H:i:s'),
]);

echo json_encode(array(
    'rowCount' => $statement->rowCount(),
    'id' => $id,
    'name' => $name,
    'description' => $desc,
    'updated_at' => date('Y-m-d H:i:s'),
));

