<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 10-5-2019
 * Time: 09:21
 */


require 'config.php';

$sql = "SELECT * FROM players";
$query = $db->query($sql);
$teams = $query->fetchAll(PDO::FETCH_ASSOC);

$myJSON = json_encode($teams);
echo $myJSON;

?>


