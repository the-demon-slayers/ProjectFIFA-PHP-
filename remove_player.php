<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 11-4-2019
 * Time: 12:20
 */


require 'config.php';

$id = $_GET['id'];
var_dump($id);

$sql = "SELECT * FROM players WHERE id=:id";
$prepare = $db->prepare($sql);
$prepare->execute([
    ':id' => $id
]);

$player = $prepare->fetch(PDO::FETCH_ASSOC);
$team_name = $player['team_name'];

$sql = "DELETE FROM players WHERE id=:id";
$prepare= $db->prepare($sql);
$prepare->execute([
    ':id' => $id
]);

$sql = "SELECT * FROM teams WHERE team_name=:team_name ";
$prepare = $db->prepare($sql);
$prepare->execute([
    ':team_name' => $team_name
]);

$result = $prepare->fetch(PDO::FETCH_ASSOC);
$team_id = $result['id'];

header("Location: team_detail.php?id=$team_id");