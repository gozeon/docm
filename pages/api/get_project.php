<?php

require '../../utils.php';

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id';
$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';

$offset = ($page - 1) * $rows;
$result = array();

$pdo = Utils::db();

$sql = 'SELECT count(*) FROM project WHERE deleted_at <=> :deleted_at';
$statement = $pdo->prepare($sql);

$statement->execute([
    ':deleted_at' => null,
]);

$result["total"] = $statement->fetchColumn();

$sql = "SELECT * FROM project WHERE deleted_at <=> :deleted_at ORDER BY  $sort $order LIMIT :offset,:rows ";
$statement = $pdo->prepare($sql);

$statement->execute([
    ':deleted_at' => null,
    ':offset' => $offset,
    ':rows' => $rows,
]);



$result["rows"] = $statement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);

