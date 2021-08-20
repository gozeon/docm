<?php

require '../../utils.php';
try {
    date_default_timezone_set('PRC');
    $name = $_REQUEST['name'];
    $desc = $_REQUEST['description'];

    $pdo = Utils::db();

    $sql = 'INSERT INTO project(name, description, create_user, created_at, updated_at) 
        VALUES(:name, :description, :create_user, :created_at, :updated_at)';
    $statement = $pdo->prepare($sql);

    $statement->execute([
        ':name' => $name,
        ':description' => $desc,
        ':create_user' => Utils::check_auth()["user"],
        ':created_at' => date('Y-m-d H:i:s'),
        ':updated_at' => date('Y-m-d H:i:s'),
    ]);

    $id = $pdo->lastInsertId();

    echo json_encode(array(
        'id' => $id,
        'name' => $name,
        'description' => $desc,
        'create_user' => Utils::check_auth()["user"],
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ));

} catch (PDOException $e) {
    echo json_encode(array(
        'isError' => true,
        'msg' => $e->getMessage(),
    ));
} catch (Exception $e) {
    echo json_encode(array(
        'isError' => true,
        'msg' => '未知错误',
    ));
}
