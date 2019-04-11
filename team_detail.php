<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 10-4-2019
 * Time: 14:14
 */

require 'config.php';
$id = $_GET['id'];
$sql = "SELECT * FROM teams WHERE id = :id";
$prepare = $db->prepare($sql);
$prepare->execute([
    ':id' => $id
]);
$team = $prepare->fetch(PDO::FETCH_ASSOC);
$team_name = $team['team_name'];

$sql2 = "SELECT * FROM players WHERE team_name=:team_name";
$prepare2 = $db->prepare($sql2);
$prepare2->execute([
    ':team_name' => $team_name
]);

$players = $prepare2->fetchAll(PDO::FETCH_ASSOC);

session_start();

require 'header.php';

?>

<header>
    <h1>Name_here</h1>
    <a href="index.php">Home</a>
</header>

<?php
echo "<h2>$team_name</h2>"
?>

<div class="players">

    <?php
    echo '<ul>';
    foreach ($players as $player){
        $player_name =  htmlentities($player['player_name']);
        echo "<li>{$player_name}</li>";
    }
    ?>

    <?php
    if (isset($_SESSION['username'])){

        echo"<form action='add_player.php?id=$id' method= 'post'>
        <input type='text' id='player_name' name='player_name' required placeholder='Speler naam'>
        <input type='submit' VALUE='Voeg speler toe'>
    </form>";
    }
    ?>

</div>

