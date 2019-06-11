<?php
require 'config.php';
session_start();

$sql = "SELECT * FROM teams";
$query = $db->query($sql);
$teams = $query->fetchAll(PDO::FETCH_ASSOC);
$admin = 'ikbenrobin5';
echo json_encode($teams);


?>