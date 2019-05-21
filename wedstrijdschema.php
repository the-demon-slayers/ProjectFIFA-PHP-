<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 21-5-2019
 * Time: 10:53
 */
require 'config.php';

//$sql = "SELECT team_name FROM teams";
//$query = $db->query($sql);
//$teams = $query->fetchAll(PDO::FETCH_ASSOC);
//
//$amount_of_teams = count($teams);
//
//echo "$amount_of_teams";
//
//$amount_of_matches = $amount_of_teams * $amount_of_teams - $amount_of_teams;
//$amount_of_matches = $amount_of_matches / 2;
//var_dump($amount_of_matches);


require 'header.php';
?>

<?php
require 'Config.php';
$sql = "SELECT team_name FROM teams;";
$prepare = $db->prepare($sql);
$prepare->execute();
$teams = $prepare->fetchAll(PDO::FETCH_ASSOC);
$teamsLength = count($teams);
$minute = 0;

$min = 1;
$max = 4;

?>
<table>
    <tr>
        <th>Team 1</th>
        <th>Team 2</th>
    </tr>
    <?php
    foreach ($teams as $team) {
        $teams = array_slice($teams, 1, $teamsLength);
        foreach ($teams as $otherTeam) {
            $teamName = $team['team_name'];
            $otherTeamName = $otherTeam['team_name'];


            ?>
            <tr>
            <?php


            echo "<td>$teamName</td>";
            echo "<td>$otherTeamName</td>";


        }
        ?>
        </tr>

        <?php

    }
    ?> </table>

















<?php require 'footer.php'; ?>
