<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 10-4-2019
 * Time: 14:14
 */
require 'config.php';
require 'header.php';
session_start();
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

$sql = "SELECT * FROM users";
$query = $db->query($sql);
$users = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<header>
    <div class="header-content" id="header">
        <a href="index.php" class="vertical-align"><img src="img/logo.png" alt="FIFA" class="logo"></a>
    </div>
</header>
<div class="background">
<?php
echo "<h2>$team_name</h2>";
echo " <p>Aangemaakt door: $made_by</p>";
?>


<div class="players">

    <?php
    if (isset($_SESSION['username']) && $_SESSION['username'] == $made_by){
        echo '<ul>';
        foreach ($players as $player){
            $player_name =  htmlentities($player['player_name']);
            $player_id = htmlentities($player['id']);
            echo"<button onclick='remove_player($player_id)'>{$player_name}</button>";
        }
    }else if (isset($_SESSION['username']) && $_SESSION['username'] == $admin){

        echo '<ul>';
        foreach ($players as $player){
            $player_name =  htmlentities($player['player_name']);
            $player_id = htmlentities($player['id']);
            echo"<button onclick='remove_player($player_id)'>{$player_name}</button>";
        }
    }else{
        foreach ($players as $player){
            $player_name = htmlentities($player['player_name']);
            $player_id = htmlentities($player['id']);
            echo "<button class='noRightsBtn'>$player_name</button>";
        }
    }

    if (isset($_SESSION['username']) && $_SESSION['username'] == $made_by) {
        echo "<div class='dropdown'>
    <button class='dropbtn'>Kies een speler</button>
    <div class='dropdown-content'>";
        foreach ($users as $user){
            $username = htmlentities($user['username']);
            $user_id = htmlentities($user['id']);
            echo "<a href='add_player.php?id=$id&user_id=$user_id'>$username</a>";
        }

        echo"</div>
</div>
";
    }elseif (isset($_SESSION['username']) && $_SESSION['username'] == $admin) {

        echo "<div class='dropdown'>
    <button class='dropbtn'>Kies een speler</button>
    <div class='dropdown-content'>";
        foreach ($users as $user){
            $username = htmlentities($user['username']);
            $user_id = htmlentities($user['id']);
            echo "<a href='add_player.php?id=$id&user_id=$user_id'>$username</a>";
        }

        echo"</div>
</div>
";
    }
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
}elseif (isset($_SESSION['username']) && $_SESSION['username'] == $admin){

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
</div>


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

    function remove_player(player_id) {
        var r = confirm('Weet je zeker dat je deze speler wil verwijderen?');
        if(r == true){
            window.location.href = 'remove_player.php?id='+ player_id;
        }
    }

</script>