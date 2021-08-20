<?php

require '../../utils.php';
date_default_timezone_set('PRC');

$id = intval($_REQUEST['id']);

$pdo = Utils::db();
$sql = 'UPDATE project SET deleted_at=:deleted_at WHERE id=:id';
$statement = $pdo->prepare($sql);

$statement->execute([
    ':id' => $id,
    ':deleted_at' => date('Y-m-d H:i:s'),
]);


echo json_encode(array(
    'rowCount' => $statement->rowCount(),
    'id' => $id,
    'success'=>true
));
