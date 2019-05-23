<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 21-5-2019
 * Time: 10:53
 */
require 'config.php';

require 'header.php';
?>

<?php
$sql = "SELECT team_name FROM teams;";
$prepare = $db->prepare($sql);
$prepare->execute();
$teams = $prepare->fetchAll(PDO::FETCH_ASSOC);
$teamsLength = count($teams);


$sql_games = "INSERT INTO games (team1, team2) VALUES (:team1, :team2)";
$prepare_games = $db->prepare($sql_games);


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

            $prepare_games->execute([
                ':team1' => $team['team_name'],
                ':team2' => $otherTeam['team_name']
            ]);

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
    ?>
</table>

<?php require 'footer.php'; ?>
