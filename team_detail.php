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
        $player_id = htmlentities($player['id']);

        echo "<a onclick='remove_player()' href='remove_player.php?id=$player_id'>{$player_name}</a>";
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

<?php
echo"
<div class='remove'>
<button onclick='remove_team()'>Verwijder team</button> 
 ";
?>

 <script>
function remove_team() {
      var txt;
      var r = confirm('Als je een team verwijderd dan verwijder je het permanent en alle spelers die er nu inzitten!');
       if(r == true){
           window.location.href = 'remove_team.php?id=<?=$id;?>';
       }
}

function remove_player() {
    var txt;
    var r = confirm('Weet je zeker dat je deze speler wil verwijderen?');
    if(r == true){
        window.location.href = 'remove_player.php?id=<?=$player_id?>';
    }
}
</script>
</div>


