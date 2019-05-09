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
$made_by = $team['made_by'];

$sql2 = "SELECT * FROM players WHERE team_name=:team_name";
$prepare2 = $db->prepare($sql2);
$prepare2->execute([
    ':team_name' => $team_name
]);

$players = $prepare2->fetchAll(PDO::FETCH_ASSOC);
$player_id = '0';
$admin = 'ikbenrobin5';

session_start();
require 'header.php';

?>

<header>
    <h1>FIFA</h1>
    <a href="index.php">Home</a>
</header>

<?php
echo "<h2>$team_name</h2>";
echo " <p>Aangemaakt door: $made_by</p>";
?>

<div class="players">

    <?php
    if (isset($_SESSION['username']) == $made_by){
        echo '<ul>';
        foreach ($players as $player){
            $player_name =  htmlentities($player['player_name']);
            $player_id = htmlentities($player['id']);
            echo"<button onclick='remove_player()'>{$player_name}</button>";
        }
    }else{
        foreach ($players as $player){
            $player_name = htmlentities($player['player_name']);
            $player_id = htmlentities($player['id']);
            echo "<button class='noRightsBtn'>$player_name</button>";
        }
    }

    if (isset($_SESSION['username']) && $_SESSION['username'] == $made_by) {
        echo "
             <form action='add_player.php?id=$id' method= 'post'>
                <input type='text' id='player_name' name='player_name' required placeholder='Speler naam'>
                <input type='submit' VALUE='Voeg speler toe'>
             </form>
        ";
    }elseif (isset($_SESSION['username']) && $_SESSION['username'] == $admin)
        echo "
             <form action='add_player.php?id=$id' method= 'post'>
                <input type='text' id='player_name' name='player_name' required placeholder='Speler naam'>
                <input type='submit' VALUE='Voeg speler toe'>
             </form>
        ";
    ?>

</div>

<?php
if (isset($_SESSION['username']) && $_SESSION['username'] == $made_by ) {

    if (!isset($player_id)) {
        echo "
            <div class='remove'>
                <button onclick='remove_team()'>Verwijder team</button>
            </div>
         ";

    } else {
        echo "
            <div class='remove'>
                <button onclick='remove()'>Verwijder team</button>
            </div>
         ";
    }
}

if (isset($_SESSION['username']) && $_SESSION['username'] == $admin ) {

    if (!isset($player_id)) {
        echo "
            <div class='remove'>
                <button onclick='remove_team()'>Verwijder team</button>
            </div>
         ";

    } else {
        echo "
            <div class='remove'>
                <button onclick='remove()'>Verwijder team</button>
            </div>
         ";
    }
}

?>

<script>


    var buttons = document.querySelectorAll('.noRightsBtn');
    console.log(buttons);

    buttons.forEach( function(button) {
        button.addEventListener('click', function() {
            alert('Je hebt niet voldoende rechten om deze speler te verwijderen!');
        })
    })


    function remove() {
        var r = confirm('Als je een team verwijderd dan verwijder je het permanent en alle spelers die er nu inzitten!');
        if(r == true){
            window.location.href = 'remove_team.php?id=<?=$id;?>';
        }
    }

    function remove_team() {

        var r = confirm('Als je een team verwijderd dan verwijder je het permanent en alle spelers die er nu inzitten!');
        if(r == true){
            window.location.href = 'remove_team.php?id=<?=$id?>';
        }
    }

    function remove_player() {
        var r = confirm('Weet je zeker dat je deze speler wil verwijderen?');
        if(r == true){
            window.location.href = 'remove_player.php?id=<?=$player_id?>';
        }
    }

</script>