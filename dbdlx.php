<?php
require 'config.php';
session_start();

$sql = "SELECT * FROM games";
$query = $db->query($sql);
$games= $query->fetchAll(PDO::FETCH_ASSOC);
$admin = 'ikbenrobin5';
echo json_encode($games);


?>