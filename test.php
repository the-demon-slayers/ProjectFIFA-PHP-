<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 10-5-2019
 * Time: 09:21
 */


require 'config.php';

$sql = "SELECT * FROM users";
$query = $db->query($sql);
$users = $query->fetchAll(PDO::FETCH_ASSOC);

//$myJSON = json_encode($players);
//echo $myJSON;

//$sql = "SELECT * FROM teams";
//$query = $db->query($sql);
//$teams = $query->fetchAll(PDO::FETCH_ASSOC);
//echo "<pre>";
//var_dump($teams);


require 'header.php';
$team_id = 9;
?>
<style>
    .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {background-color: #ddd;}

    .dropdown:hover .dropdown-content {display: block;}

    .dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>

<div class='dropdown'>
    <button class='dropbtn'>Kies een speler</button>
    <div class='dropdown-content'>
        <?php
        foreach ($users as $user){
            $username = htmlentities($user['username']);
            $user_id = htmlentities($user['id']);
            echo "<a href='test.php?id=$team_id&$user_id'>$username</a>";
        }
        ?>
    </div>
</div>




<?php require 'footer.php'; ?>


