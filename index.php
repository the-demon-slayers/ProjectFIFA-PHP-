<?php


require 'config.php';

$sql = "SELECT * FROM teams";
$query = $db->query($sql);
$teams = $query->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';
?>


<header>
    <h1>Name_here</h1>

    <div class="login">
        <form action="login.php" method="post">
            <input type="text" id="username" name="username" placeholder="Gebruikersnaam" required>
            <input type="password" id="password" name="password" placeholder="Wachtwoord" required>
            <input type="submit" value="Login">
        </form>
    </div>
</header>

<div class="banner">
    <h2>Voetbal wedstrijden voor jou bedrijf</h2>
</div>

<div class="teams">
    <?php
        echo '<ul>';
        foreach ($teams as $team){
            $team_name =  htmlentities($team['team_name']);
            echo "<li><a href='team_detail.php?id={$team['id']}'> {$team_name}</a></li>";
        }
    ?>

    <form action="add_team.php" method="post">
        <input type="text" name="team_name" id="team_name" placeholder="Team naam" required>
        <input type="submit" value="Maak aan">
    </form>
</div>


<?php require 'footer.php'; ?>
