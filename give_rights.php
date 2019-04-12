<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 12-4-2019
 * Time: 09:27
 */

require 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id=:id";
$prepare = $db->prepare($sql);
$prepare->execute([
    ':id' => $id
]);

$user = $prepare->fetch(PDO::FETCH_ASSOC);
if ($user['rights'] == 1) {
    $rights = 0;

    $sql = "UPDATE users SET rights=:rights WHERE id=:id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':rights' => $rights,
        ':id' => $id
    ]);
}else{
    $rights = 1;

    $sql = "UPDATE users SET rights=:rights WHERE id=:id";
    $prepare = $db->prepare($sql);
    $prepare->execute([
        ':rights' => $rights,
        ':id' => $id
    ]);
}

header('Location: all_profiles.php');




