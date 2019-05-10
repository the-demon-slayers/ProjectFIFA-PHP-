<?php
require 'config.php';
session_start();

$sql = "SELECT * FROM teams";
$query = $db->query($sql);
$teams = $query->fetchAll(PDO::FETCH_ASSOC);

require 'header.php';
?>

<div class="background">
<div class="fixed-header">
    <header>
        <div class="header-content">
            <h1>FIFA</h1>
            <?php
            if (!isset($_SESSION['username'])){
                echo"
                <div class='login'>
                <form action='login.php' method='post'>
                    <input type='text' id='username' name='username' placeholder='Gebruikersnaam' required>
                    <input type='password' id='password' name='password' placeholder='Wachtwoord' required>
                    <input type='submit' value='Login'>
                </form>
                <a href='register_form.php' class='register-link'>Maak een account aan</a>       
            </div>    
            ";
            }else{
                echo "<a href='logout.php'>Uitloggen voor ".$_SESSION['username']."</a>";

                if ($_SESSION['username'] == 'ikbenrobin5') {
                    echo "<a href='all_profiles.php'>Alle profielen</a>";
                }
            }
            ?>
        </div> 

    </header>
    <div class="menu">
        <div class="menu-items">
            <ul class="menu-list">
                <li><a href="404.html" class="menu-item">Teams</a></li>
                <li><a href="404.html" class="menu-item">Info</a></li>
                <li><a href="404.html" class="menu-item">Boek toernooi</a></li>
                <li><a href="404.html" class="menu-item">Gok app</a></li>
            </ul>
        </div>
     </div>
</div>
<div class="banner">

    <div class="bannerText">
        <h1>FIFA</h1>
        <h2>Voetbal wedstrijden voor Uw bedrijf</h2>
    </div>
</div>

<div class="teams">
    <h3>Teams</h3>
    <?php
    echo '<div class="team">';
        echo '<ul>';
        foreach ($teams as $team){
            $team_name =  htmlentities($team['team_name']);
            echo "<li><a href='team_detail.php?id={$team['id']}'> {$team_name}</a><img src='img/teambg.png'></li>";
        }
    echo '</div>';
    ?>


    <?php
    if (isset($_SESSION['username']) && $_SESSION['rights'] == 1){
        echo"
        <form action='add_team.php' method='post' id='teams'>
        <input type='text' name='team_name' id='team_name' placeholder='Team naam' required>
        <input type='submit' value='Maak aan'>
    </form>
    ";
    }
    ?>

</div>
</div>

<?php require 'footer.php'; ?>
