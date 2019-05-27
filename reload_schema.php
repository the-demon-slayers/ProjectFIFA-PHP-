<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 27-5-2019
 * Time: 09:50
 */

require 'config.php';

$sql = "SELECT team_name FROM teams;";
$prepare = $db->prepare($sql);
$prepare->execute();
$teams = $prepare->fetchAll(PDO::FETCH_ASSOC);
$teamsLength = count($teams);

$sql_delete = "DELETE FROM games";
$query_delete = $db->query($sql_delete);

$sql_games = "INSERT INTO games (team1, team2) VALUES (:team1, :team2)";
$prepare_games = $db->prepare($sql_games);


foreach ($teams as $team) {
    $teams = array_slice($teams, 1, $teamsLength);
    foreach ($teams as $otherTeam) {
        $teamName = $team['team_name'];
        $otherTeamName = $otherTeam['team_name'];

        $prepare_games->execute([
            ':team1' => $team['team_name'],
            ':team2' => $otherTeam['team_name']
        ]);
    }
}

header('Location: wedstrijdschema.php');