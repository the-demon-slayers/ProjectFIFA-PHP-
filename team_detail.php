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

require 'header.php';

?>

<header>
    <h1>Name_here</h1>
    <a href="index.php">Home</a>
</header>

<?php

echo "<h2>$team_name</h2>"
?>

