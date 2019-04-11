<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 11-4-2019
 * Time: 12:20
 */

require 'config.php';

$id = $_GET['id'];


$query = "SELECT * FROM players WHERE id=:id";
$prepare1 = $db->($query);
$prepare1->execute([
    ':id' => $id
]);

$players = $prepare1->fetchAll(PDO::FETCH_ASSOC);

foreach ($players as $player){
    $player_id = htmlentities($player['id']);
}


$sql = "DELETE FROM players WHERE id=:id";
$prepare= $db->prepare($sql);
$prepare->execute([
    ':id' => $id
]);

header("Location: team_detail.php?id=$id");