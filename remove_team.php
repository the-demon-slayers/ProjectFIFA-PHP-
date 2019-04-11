<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 11-4-2019
 * Time: 11:05
 */


require 'config.php';
$id = $_GET['id'];

$query = "SELECT * FROM teams WHERE id=:id";
$prepare = $db->prepare($query);
$prepare->execute([
    ':id' => $id
]);

$team = $prepare->fetch(PDO::FETCH_ASSOC);
$team_name = $team['team_name'];

$sql="DELETE FROM teams WHERE id=:id";
$prepare2 = $db->prepare($sql);
$prepare2->execute([
    ':id' => $id
]);

$sql2 = "DELETE FROM players WHERE team_name = :team_name";
$prepare3 = $db->prepare($sql2);
$prepare3->execute([
    ':team_name' => $team_name
]);

header('location: index.php');


