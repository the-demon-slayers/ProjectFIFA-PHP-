<?php
require 'config.php';
session_start();

$sql = "SELECT * FROM teams";
$query = $db->query($sql);
$teams = $query->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';
?>

<header>
    <h1>Name_here</h1>

    <?php
    if (!isset($_SESSION['username'])){
        echo"
        <div class='login''>
        <form action='login.php' method='post'>
            <input type='text' id='username' name='username' placeholder='Gebruikersnaam' required>
            <input type='password' id='password' name='password' placeholder='Wachtwoord' required>
            <input type='submit' value='Login'>
        </form>

    </div>
    ";
    }else{
        echo "<a href='logout.php'>Uitloggen voor ".$_SESSION['username']."</a>";

        if ($_SESSION['username'] == 'ikbenrobin5') {

            echo "<a href='register_form.php'>Registreer een profiel</a>";
        }
    }
    ?>

</header>

<div class="banner">
    <h2>Voetbal wedstrijden voor jou bedrijf</h2>
</div>

<div class="teams">
    <h3>Teams</h3>
    <?php
        echo '<ul>';
        foreach ($teams as $team){
            $team_name =  htmlentities($team['team_name']);
            echo "<li><a href='team_detail.php?id={$team['id']}'> {$team_name}</a></li>";
        }
    ?>

    <?php
    if (isset($_SESSION['username'])){
        echo"
        <form action='add_team.php' method='post' id='teams'>
        <input type='text' name='team_name' id='team_name' placeholder='Team naam' required>
        <input type='submit' value='Maak aan'>
    </form>
    ";
    }
    ?>

</div>

<?php require 'footer.php'; ?>
