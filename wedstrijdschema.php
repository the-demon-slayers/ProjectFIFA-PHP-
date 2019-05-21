<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 21-5-2019
 * Time: 10:53
 */
require 'config.php';

$sql = "SELECT team_name FROM teams";
$query = $db->query($sql);
$teams = $query->fetchAll(PDO::FETCH_ASSOC);

$amount_of_teams = count($teams);

echo "$amount_of_teams";

$amount_of_matches = $amount_of_teams * $amount_of_teams - $amount_of_teams;
$amount_of_matches = $amount_of_matches / 2;
var_dump($amount_of_matches);


require 'header.php';
?>



















<?php require 'footer.php'; ?>
