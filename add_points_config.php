<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 4-6-2019
 * Time: 10:56
 */
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: index.php');
    exit();
}

$game_id = $_GET['id'];
$team1_points = $_POST['team1_points'];
$team2_points = $_POST['team2_points'];
require 'config.php';

$sql = "INSERT INTO games (team1_points, team2_points) VALUES (:team1_points, :team2_points) WHERE id = :id";
$prepare = $db->prepare($sql);
$prepare->execute([
    ':team1_points' => $team1_points,
    ':team2_points' => $team2_points,
    ':id' => $game_id
]);

header('Location: wedstrijdschema.php')

?>