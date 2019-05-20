<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 10-4-2019
 * Time: 15:24
 */

//if ($_SERVER['REQUEST_METHOD'] != 'POST'){
//    header('Location: index.php');
//    exit;
//}

require 'config.php';
$user_id = $_GET['user_id'];
$team_id = $_GET['id'];

$query = "SELECT * FROM teams WHERE id = :id";
$prepare1 = $db->prepare($query);
$prepare1->execute([
    ':id' => $team_id
]);

$team = $prepare1->fetch(PDO::FETCH_ASSOC);
$team_name = $team['team_name'];

$sql1 = "SELECT * FROM users WHERE id=:id";
$prepare2 = $db->prepare($sql1);
$prepare2->execute([
    ':id' => $user_id
]);
$players = $prepare2->fetch(PDO::FETCH_ASSOC);
$player_name = $players['username'];

$sql = "INSERT INTO players (player_name, team_name) VALUES (:name, :team_name)";
$prepare = $db->prepare($sql);
$prepare->execute([
    ':name' => $player_name,
    ':team_name' => $team_name
]);





header("Location: team_detail.php?id=$team_id");

?>
