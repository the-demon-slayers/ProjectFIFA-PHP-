<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 4-6-2019
 * Time: 10:44
 */

require 'config.php';
$game_id = $_GET['id'];
$sql = "SELECT * FROM games WHERE id = :id";
$prepare = $db->prepare($sql);
$prepare->execute([
    ':id' => $game_id
]);

$game = $prepare->fetch(PDO::FETCH_ASSOC);
$team1_name = $game['team1'];
$team2_name = $game['team2'];
$team1_points = $game['team1_points'];
$team2_points = $game['team2_points'];
require 'header.php';
?>
<div class="background">
    <div class="point-page">
        <header>
            <div class="header-content" id="header">
                <a href="index.php" class="vertical-align"><img src="img/logo.png" alt="FIFA" class="logo"></a>
            </div>
        </header>
        <?php
        echo"
        <form action='add_points_config.php?id=$game_id' method='post'>
            <div class='point-input'>
                <h1>Team 1</h1>
                <h1>Team 2</h1>
                <div class='point-input-1'>
                    <label for=''>$team1_name</label>
                    <input type='number' placeholder='$team1_points' name='team1_points' id='team1_points' min='0'>
                </div>
                
                <div class='point-input-2'>
                    <label for=''>$team2_name</label>
                    <input type='number' placeholder='$team2_points' name='team2_points' id='team2_points' min='0'>
                </div>
            </div>
            <input type='submit' value='Voeg punten toe'>
        </form>
        ";
        ?>
    </div>
</div>



<?php
require 'footer.php';
?>
