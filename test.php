<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 10-5-2019
 * Time: 09:21
 */


require 'config.php';

//$sql = "SELECT * FROM players";
//$query = $db->query($sql);
//$players = $query->fetchAll(PDO::FETCH_ASSOC);
//
//$myJSON = json_encode($players);
//echo $myJSON;

$sql = "SELECT * FROM teams";
$query = $db->query($sql);
$teams = $query->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
var_dump($teams);



foreach ($teams as $team){
    $teams
}
?>


