<?php
require 'config.php';
session_start();

$sql = "SELECT * FROM teams";
$query = $db->query($sql);
$teams = $query->fetchAll(PDO::FETCH_ASSOC);
$admin = 'ikbenrobin5';
require 'header.php';



?>

<div class="background">
<div class="fixed-header">
    <header>
        <div class="header-content" id="header">
            <a href="index.php" class="vertical-align"><img src="img/logo.png" alt="FIFA" class="logo"></a>
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

//                if ($_SESSION['username'] == 'ikbenrobin5') {
//                    echo "<a href='all_profiles.php'>Alle profielen</a>";
//                }
            }
            ?>
        </div> 

    </header>
    <div class="menu">
        <div class="menu-items">
            <ul class="menu-list">
                <li><a href="#team-page" class="menu-item">Teams</a></li>
                <li><a href="#info" class="menu-item">Info</a></li>
                <?php
                if(isset($_SESSION['username'])) {
                    echo "
                <li><a href='wedstrijdschema.php' class='menu-item'>Wedstrijdschema</a></li>
                ";
                }
                ?>
                <li><a href="downloads/GokApp1_0.zip" class="menu-item">Download Gok App</a></li>
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

<div class="teams" id="team-page">
    <h3>Teams</h3>
    <?php
    echo '<div class="team">';
        echo '<ul>';
        foreach ($teams as $team){
            $team_name =  htmlentities($team['team_name']);
            echo "<a href='team_detail.php?id={$team['id']}'><div class='team-name'><li>{$team_name}</li></div></a>";
        }
    echo '</div>';
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

    <div class="information" id="info">
        <div class="info-text">
            <h1>Informatie over het toernooi</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium illum minima modi quas quibusdam quis sapiente? Adipisci deleniti distinctio, dolorum fugit id illo impedit magni modi necessitatibus nulla sequi voluptatum.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aspernatur autem earum est explicabo fuga fugiat harum incidunt, iste molestias nesciunt nobis numquam porro provident quibusdam quidem ratione sint temporibus.</p>
        </div>
    </div>
</div>

<?php require 'footer.php'; ?>
<!-- && $_SESSION['rights'] == 1 -->