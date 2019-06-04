<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 21-5-2019
 * Time: 10:53
 */
require 'config.php';
session_start();
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

$sql_points = "SELECT team1, team2, team1_points, team2_points FROM games";
$prepare = $db->prepare($sql_points);
$prepare->execute();
$points = $prepare->fetchAll(PDO::FETCH_ASSOC);

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

?>
<header>
     
    <div class="header-content" id="header">
            <a href="index.php" class="vertical-align"><img src="img/logo.png" alt="FIFA" class="logo"></a>
        <?php
        if (isset($_SESSION['username']) && $_SESSION['username'] == 'ikbenrobin5'){
           echo"<a href='reload_schema.php'>Reset schema</a>";
        }
        ?>
<!--            --><?php
//            if (!isset($_SESSION['username'])){
//                echo"
//                <div class='login'>
//                <form action='login.php' method='post'>
//                    <input type='text' id='username' name='username' placeholder='Gebruikersnaam' required>
//                    <input type='password' id='password' name='password' placeholder='Wachtwoord' required>
//                    <input type='submit' value='Login'>
//                </form>
//                <a href='register_form.php' class='register-link'>Maak een account aan</a>
//            </div>
//            ";
//            }else{
//                echo "<a href='logout.php'>Uitloggen voor ".$_SESSION['username']."</a>";

//                if ($_SESSION['username'] == 'ikbenrobin5') {
//                    echo "<a href='all_profiles.php'>Alle profielen</a>";
//                }
//            }
            ?>
        </div>
    </header>
   
</header>
<div class="background">


<!--<table>-->
<!--    <tr>-->
<!--        <th>Punten</th>-->
<!--        <th>Team 1</th>-->
<!--        <th></th>-->
<!--        <th>Team 2</th>-->
<!--       <th>Punten</th>-->
<!--    </tr>-->
    <?php

    foreach ($teams as $team) {
        $teams = array_slice($teams, 1, $teamsLength);
        foreach ($teams as $otherTeam) {
            $teamName = $team['team_name'];
            $otherTeamName = $otherTeam['team_name'];

//            foreach ($points as $poin){
////                if($team == $poin['team1']){
//                    $team1_points = $poin['team1_points'];
//                    $team2_points = $poin['team2_points'];
            ?>

<!--    <tr>-->
     <?php
//                echo "<td>
//                                    <form action='' method='post'>
//                                         <input type='text' placeholder='$team1_points'>
//                                    </form>
//                                    </td>";
//                    echo "<td>$teamName</td>";
//                    echo "<td> VS </td>";
//                    echo "<td>$otherTeamName</td>";
////                    echo "<td>
//                                    <form action='' method='post'>
//                                        <input type='text' placeholder='$team2_points'>
//                                    </form>
//                        </td>";
//                }// if
//            } // foreach ($points as $poin)
        } // foreach ($teams as $otherTeam)
    } // foreach ($teams as $team)
     ?>
<!--    </tr>-->
<!--</table>-->

    <?php
    $sql = "SELECT * FROM games";
    $prepare = $db->prepare($sql);
    $prepare->execute();
    $games = $prepare->fetchALL(PDO::FETCH_ASSOC);
    ?>


            <?php
            echo"<div class='box'>";
            foreach ($games as $game){
                $team1 = $game['team1'];
                $team2 = $game['team2'];
                $game_id = $game['id'];
                $team1_points = $game['team1_points'];
                $team2_points = $game['team2_points'];
            echo"<div class='row'>";
                echo"<p>";
                echo"$team1 ";
                echo"VS ";
                echo"$team2 ";
                if (isset($_SESSION['username']) && $_SESSION['username'] == 'ikbenrobin5') {
                    echo "<a href='add_points.php?id=$game_id'>$team1_points:$team2_points</a>";
                }else{
                    echo"$team1_points:$team2_points";
                }
                echo"</p>";
                echo"</div>";
            }
            echo"</div>";
            ?>

<?php require 'footer.php'; ?>
