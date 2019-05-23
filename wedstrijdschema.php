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
require 'Config.php';
$sql = "SELECT team_name FROM teams;";
$prepare = $db->prepare($sql);
$prepare->execute();
$teams = $prepare->fetchAll(PDO::FETCH_ASSOC);
$teamsLength = count($teams);

?>
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

                if ($_SESSION['username'] == 'ikbenrobin5') {
                    echo "<a href='all_profiles.php'>Alle profielen</a>";
                }
            }
            ?>
        </div>
    </header>
   
</header>
<div class="background">   
<table>
    <tr>
        <th>Team 1</th>
        <th>  </th>
        <th>Team 2</th>
    </tr>
    <?php
    foreach ($teams as $team) {
        $teams = array_slice($teams, 1, $teamsLength);
        foreach ($teams as $otherTeam) {
            $teamName = $team['team_name'];
            $otherTeamName = $otherTeam['team_name'];
            ?>
            <tr>
            <?php
            echo "<td>$teamName</td>";
            echo "<td> VS. </td>";
            echo "<td>$otherTeamName</td>";
        }
        ?>
        </tr>
        <?php
    }
    ?> 
</table>
</div>
<?php require 'footer.php'; ?>
