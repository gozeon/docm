<?php
require 'utils.php';
$pdo = Utils::db();

try {
    $sort="id";
    $dir="asc";
    $sql = "SELECT * 
        FROM project
        WHERE deleted_at <=> :deleted_at
        ORDER BY $sort $dir
        LIMIT :offset, :rows
        ";
    $statement = $pdo->prepare($sql);

    $statement->execute([
        ':deleted_at' => null,
        ':offset' => 0,
        ':rows' => 5,
    ]);
    echo $statement->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
    echo $statement->errorInfo();
}
